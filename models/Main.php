<?php

class Main
{
    /**
     * Returns an array of users and their articles
     */
    public static function getUsersList()
    {
        $db = Db::getConnection();

        $usersList = array();
        $sql = "SELECT user.id, user.first_name, user.last_name, user.email, COUNT(article.author_id) as articles
FROM `article`
INNER JOIN user
ON user.id = article.author_id
GROUP BY user.id";
        $result = $db->query($sql);

        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['first_name'] = $row['first_name'];
            $usersList[$i]['last_name'] = $row['last_name'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['articles'] = $row['articles'];
            $i++;
        }

        return $usersList;
    }
}