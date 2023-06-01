<?php

include_once("conf.php");
include_once("models/Club.class.php");
include_once("views/Club.view.php");

class ClubController {
    private $club;

    function __construct() {
        $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->club->open();
        $this->club->getClub();

        $data = array('club' => array());
        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }
        $this->club->close();

        $view = new ClubView();
        $view->render($data);
    }
    
    function add($data) {
        $this->club->open();
        $this->club->addClub($data);
        $this->club->close();

        header("location:index.php");
    }

    function edit($id, $data) {
        $this->club->open();
        $this->club->editClub($id, $data);
        $this->club->close();

        header("location:index.php");
    }

    function delete($id) {
        $this->club->open();
        $this->club->deleteClub($id);
        $this->club->close();

        header("location:index.php");
    }
}