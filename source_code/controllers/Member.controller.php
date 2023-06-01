<?php

include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Club.class.php");
include_once("views/Member.view.php");

class MemberController {
    private $member;
    private $club;

    function __construct() {
        $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function showTable() {
        $this->member->open();
        $this->member->getMember();

        $data = array('member' => array());
        while ($row = $this->member->getResult()) {
            array_push($data['member'], $row);
        }
        $this->member->close();

        $view = new MemberView();
        $view->renderTable($data);
    }
    public function showEdit($id) {
        $this->member->open();
        $this->member->getMemberById($id);
        $this->club->open();
        $this->club->getClub();

        $data = array(
            'member' => array(),
            'club' => array()
        );
        $data['member'] = $this->member->getResult();
        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }
        $this->member->close();
        $this->club->close();

        $view = new MemberView();
        $view->renderEdit($data);
    }
    public function showAdd() {
        $this->club->open();
        $this->club->getClub();

        $data = array('club' => array());
        while ($row = $this->club->getResult()) {
            array_push($data['club'], $row);
        }
        $this->club->close();

        $view = new MemberView();
        $view->renderAdd($data);
    }
    
    function add($data) {
        $this->member->open();
        $this->member->addMember($data);
        $this->member->close();

        header("location:member.php");
    }

    function edit($id, $data) {
        $this->member->open();
        $this->member->editMember($id, $data);
        $this->member->close();

        header("location:member.php");
    }

    function delete($id) {
        $this->member->open();
        $this->member->deleteMember($id);
        $this->member->close();

        header("location:member.php");
    }
}