<?php

include_once ROOT . '/models/Articles.php';
include_once ROOT . '/models/Users.php';

class ArticlesController
{
    public function actionCreate()
    {
        $users = Users::getUsersList();
        if (isset($_POST)) {
            $article = array();
            foreach ($_POST as $key => $value) {
                $article[$key] = $value;
            }
            $createArticle = Articles::createArticle($article);
            if (!$createArticle) {
//                echo 'Error!';
            }
        }
        require_once(ROOT . '/views/articles/form.php');
    }
}
