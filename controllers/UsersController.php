<?php

include_once ROOT . '/models/Users.php';

class UsersController
{
    public function actionIndex()
    {
        $usersList = array();
        $usersList = Users::getUsersList();

        require_once(ROOT . '/views/users/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $user = Users::getUserById($id);
        }

        echo '<pre>';
        print_r($user);
        echo '</pre>';

        return true;
    }

    public function actionCreate()
    {
        if (isset($_POST)) {
            $user = array();
            foreach ($_POST as $key => $value) {
                $user[$key] = $value;
            }
            $createUser = Users::CreateUser($user);
            if (!$createUser) {
                echo 'Email is already exists!';
            }
        }

        require_once(ROOT . '/views/users/form.php');
    }
}