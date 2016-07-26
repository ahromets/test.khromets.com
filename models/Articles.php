<?php

class Articles
{
    /**
     * Returns single article by id
     * @param $id
     * @return mixed
     */
    public static function getArticlesItemById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM article WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $articlesItem = $result->fetch();

            return $articlesItem;
        }
    }

    /**
     * Returns an array of articles
     */
    public static function getArticlesList()
    {
        $db = Db::getConnection();

        $articlesList = array();

        $result = $db->query('SELECT * FROM article');

        $i = 0;
        while ($row = $result->fetch()) {
            $articlesList[$i]['id'] = $row['id'];
            $articlesList[$i]['title'] = $row['title'];
            $articlesList[$i]['text'] = $row['text'];
            $articlesList[$i]['author_id'] = $row['author_id'];
            $articlesList[$i]['public_date'] = $row['public_date'];
            $i++;
        }

        return $articlesList;
    }

    public static function validateArticle($articleData)
    {
        foreach ($articleData as $key => $value) {
            $data = trim($value);
            $data = stripslashes($value);
            $data = htmlspecialchars($value);
            $articleValidate[$key] = $data;
        }
        return $articleValidate;
    }

    public static function createArticle($arr)
    {
        if ($arr) {
            self::validateArticle($arr);
            $db = Db::getConnection();

            $title = $arr['title'];
            $text = $arr['text'];
            $author_id = $arr['author_id'];

            $arr = array(
                'title' => $title,
                'text' => $text,
                'author_id' => $author_id,
            );

            $sql = "INSERT INTO article (title, text, author_id) VALUES (:title, :text, :author_id)";
            $stmt = $db->prepare($sql);
            $stmt->execute($arr);
        }
    }
}