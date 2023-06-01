<?php

class Template
{
    /* Properties */
    var $filename = '';
    var $content = '';

    /* Constructor */
    // Take the content of the template file and save it to $content as string
    function __construct($filename='')
    {
        $this->filename = $filename;

        $this->content = implode('', @file($filename));
    }

    // Clear the content from the "placeholder code"
    function clear()
    {
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    // Write the "cleared" html code from $content to the browser
    function write()
    {
        $this->clear();
        print $this->content;
    }

    // Return the "cleared" $content
    function getContent()
    {
        $this->clear();
        return $this->content;
    }

    // Replace part of $content that's equal to $old with $new
    function replace($old = '', $new = '')
    {
        // Convert $new to string
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        }
        elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        }
        elseif (is_array($new)) {
            $value = '';

            foreach ($new as $item) {
                $value .= $item. ' ';
            }
        }
        else {
            $value = $new;
        }
        // Replace the $old part of the $content with the $new value
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}


?>