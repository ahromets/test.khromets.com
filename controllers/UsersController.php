<?php

include_once ROOT . '/models/Users.php';

class UsersController
{
    public function actionView($id)
    {
        if ($id) {
            $user = Users::getUserArticles($id);
        }
        require_once(ROOT . '/views/users/index.php');

        return true;
    }

    public function actionCreate()
    {
        $userExists = false;

        if (!empty($_POST)) {
            $user = array();
            foreach ($_POST as $key => $value) {
                $user[$key] = $value;
            }
            $createUser = Users::CreateUser($user);
            if (!$createUser) {
                $userExists = true;
            }
        }

        require_once(ROOT . '/views/users/form.php');

        return true;
    }
}