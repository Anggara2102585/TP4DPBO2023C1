<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if (isset($_POST['add_member'])) {
    $member->add($_POST);

    header("location:member.php");
}
else if (isset($_POST['edit_member'])) {
    $member->edit($_POST['id'], $_POST);

    header("location:member.php");
}
else if (!empty($_GET['delete'])) {
    $member->delete($_GET['delete']);

    header("location:member.php");
}
else if (!empty($_GET['edit'])) {
    $member->showEdit($_GET['edit']);
}
else if (isset($_GET['add'])) {
    $member->showAdd();
}
else {
    $member->showTable();
}