<?php

class Club extends DB {
    // READ
    function getClub() {
        // Create query string
        $query = "SELECT * FROM clubs";
        // Execute the query then return the value
        return $this->execute($query);
    }

    // ADD
    function addClub($data) {
        $club_name = $data['club_name'];
        
        $query = "INSERT INTO clubs VALUES ('', '$club_name')";
        return $this->execute($query);
    }

    // UPDATE
    function editClub($id, $data) {
        $club_name = $data['club_name'];

        $query = "UPDATE clubs SET club_name = '$club_name' WHERE id_club = $id";
        return $this->execute($query);
    }

    // DELETE
    function deleteClub($id) {
        $query = "DELETE FROM clubs WHERE id_club = $id";
        return $this->execute($query);
    }
}