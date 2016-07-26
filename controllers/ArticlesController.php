<?php

include_once ROOT . '/models/Articles.php';
include_once ROOT . '/models/Users.php';

class ArticlesController
{
    public function actionView($id)
    {
        if ($id) {
            $articleItem = Articles::getArticlesItemById($id);
        }
        require_once(ROOT . '/views/articles/index.php');

        return true;
    }

    public function actionCreate()
    {
        $articleError = false;
        $articleCreated = false;
        $users = Users::getUsersList();

        if (!empty($_POST)) {
            $article = array();
            foreach ($_POST as $key => $value) {
                $article[$key] = $value;
            }
            $createArticle = Articles::createArticle($article);
            if (!$createArticle) {
                $articleError = true;
            } else {
                $articleCreated = true;
            }
        }
        require_once(ROOT . '/views/articles/form.php');

        return true;
    }
}
