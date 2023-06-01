<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Club.controller.php");

$club = new ClubController();

if (isset($_POST['add_club'])) {
    $club->add($_POST);

    header("location:index.php");
}
else if (isset($_POST['edit_club'])) {
    $club->edit($_POST['id_club'], $_POST);

    header("location:index.php");
}
else if (!empty($_GET['delete'])) {
    $club->delete($_GET['delete']);

    header("location:index.php");
}
else {
    $club->index();
}