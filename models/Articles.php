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

            $sql = "SELECT user.id as user_id, user.first_name, user.last_name, user.email, article.id as article_id, article.title, article.description, article.text, article.public_date 
FROM `article` 
INNER JOIN user ON user.id = article.author_id
WHERE article.id = :id";
            $result = $db->prepare($sql);
            $result->execute(array(
                'id' => $id,
            ));

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
            $articlesList[$i]['description'] = $row['description'];
            $articlesList[$i]['text'] = $row['text'];
            $articlesList[$i]['author_id'] = $row['author_id'];
            $articlesList[$i]['public_date'] = $row['public_date'];
            $i++;
        }

        return $articlesList;
    }

    /**
     * Returns validated and filtered article data
     * @param $articleData
     * @return mixed
     */
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

    /**
     * Creates a new article
     * @param $arr
     * @return bool
     */
    public static function createArticle($arr)
    {
        if ($arr) {
            self::validateArticle($arr);
            $db = Db::getConnection();

            $title = $arr['title'];
            $description = $arr['description'];
            $text = $arr['text'];
            $author_id = $arr['author_id'];

            $arr = array(
                'title' => $title,
                'description' => $description,
                'text' => $text,
                'author_id' => $author_id,
            );

            $sql = "INSERT INTO article (title, description, text, author_id) VALUES (:title, :description, :text, :author_id)";
            $stmt = $db->prepare($sql);
            $stmt->execute($arr);

            return true;
        } else {
            return false;
        }
    }
}