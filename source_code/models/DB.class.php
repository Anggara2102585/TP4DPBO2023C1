<?php

class DB
{
    /* Properties */
    // Connection properties
    var $db_host = "";
    var $db_user = "";
    var $db_pass = "";
    var $db_name = "";
    // Database properties
    var $db_link;
    var $result;

    /* Constructor */
    function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        // Set the properies for the database connection
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    // Open database connection
    function open()
    {
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }

    // Execute query
    function execute($query)
    {
        $this->result = mysqli_query($this->db_link, $query);
        return $this->result;
    }

    // Get results that has been set by other methods
    function getResult()
    {
        return mysqli_fetch_array($this->result);
    }

    // Close database connection
    function close()
    {
        mysqli_close($this->db_link);
    }
}

?>