<?php

include_once ROOT . '/models/Articles.php';
include_once ROOT . '/models/Users.php';

class MainController
{
    public function actionIndex()
    {
        $usersList = array();
        $usersList = Users::getUsersList();
        require_once (ROOT . '/views/main/index.php');
    }

}