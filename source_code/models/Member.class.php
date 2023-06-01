<?php

class Member extends DB {
    // READ
    function getMember() {
        // Create query string
        $query = "SELECT * FROM members JOIN clubs ON members.id_club = clubs.id_club ORDER BY members.id_club";
        // Execute the query then return the value
        return $this->execute($query);
    }
    function getMemberById($id) {
        $query = "SELECT * FROM members JOIN clubs ON members.id_club = clubs.id_club WHERE members.id = $id";
        return $this->execute($query);
    }

    // ADD
    function addMember($data) {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_club = $data['id_club'];
        
        $query = "INSERT INTO members VALUES ('', '$name', '$email', '$phone', '$join_date', '$id_club')";
        return $this->execute($query);
    }

    // UPDATE
    function editMember($id, $data) {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_club = $data['id_club'];

        $query = "UPDATE members SET name='$name', email='$email', phone='$phone', join_date='$join_date', id_club='$id_club' WHERE id = $id";
        return $this->execute($query);
    }

    // DELETE
    function deletemember($id) {
        $query = "DELETE FROM members WHERE id = $id";
        return $this->execute($query);
    }
}