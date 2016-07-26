<?php

include_once ROOT . '/models/Articles.php';
include_once ROOT . '/models/Users.php';

class ArticlesController
{
    public function actionIndex()
    {
        $articlesList = array();
        $articlesList = Articles::getArticlesList();

        require_once(ROOT . '/views/articles/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $articlesItem = Articles::getArticlesItemById($id);
        }

        return true;
    }

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
                echo 'Error!';
            }
        }
        require_once(ROOT . '/views/articles/form.php');
    }
}
