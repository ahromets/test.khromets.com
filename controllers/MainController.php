<?php

include_once ROOT . '/models/Main.php';

class MainController
{
    public function actionIndex()
    {
        $usersList = array();
        $usersList = Main::getUsersList();
        require_once (ROOT . '/views/main/index.php');
    }

}