<?php

class Users
{
    /**
     * Returns single user by id
     * @param $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $res = $db->query('SELECT * FROM `user` WHERE id=' . $id);
            $res->execute(array(
                'id' => $id,
            ));
            $user = $res->fetch();

            return $user;
        }
    }

    /**
     * Returnes articles by user id
     * @param $userId
     * @return mixed
     */
    public static function getUserArticles($userId)
    {
        $userId = intval($userId);

        $db = Db::getConnection();

        $usersList = array();
        $sql = "SELECT user.id as user_id, user.first_name, user.last_name, user.email, article.id as article_id, article.title, article.description, article.text, article.public_date 
FROM `article` 
INNER JOIN user ON user.id = article.author_id
WHERE user.id = :userId";
        $result = $db->prepare($sql);
        $result->execute(array(
            'userId' => $userId,
        ));

        $i = 0;
        while ($row = $result->fetch()) {
            $userArticles[$i]['user_id'] = $row['user_id'];
            $userArticles[$i]['article_id'] = $row['article_id'];
            $userArticles[$i]['first_name'] = $row['first_name'];
            $userArticles[$i]['last_name'] = $row['last_name'];
            $userArticles[$i]['email'] = $row['email'];
            $userArticles[$i]['title'] = $row['title'];
            $userArticles[$i]['description'] = $row['description'];
            $userArticles[$i]['text'] = $row['text'];
            $userArticles[$i]['public_date'] = $row['public_date'];
            $i++;
        }

        return $userArticles;
    }

    /**
     * Returns an array of users
     */
    public static function getUsersList()
    {
        $db = Db::getConnection();

        $usersList = array();

        $result = $db->query('SELECT * FROM user');

        $i = 0;
        while ($row = $result->fetch()) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['first_name'] = $row['first_name'];
            $usersList[$i]['last_name'] = $row['last_name'];
            $usersList[$i]['email'] = $row['email'];
            $i++;
        }

        return $usersList;
    }

    /**
     * Returns validated and filtered user data
     * @param $userData
     * @return mixed
     */
    public static function validateUser($userData)
    {
        foreach ($userData as $key=>$value) {
            $data = trim($value);
            $data = stripslashes($value);
            $data = htmlspecialchars($value);
            $userValidate[$key] = $data;
        }
        return $userValidate;
    }

    /**
     * Check user email for non exists
     * @param $arr
     * @return bool
     */
    public static function checkUserEmail($arr)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM `user` WHERE `email` = :email LIMIT 1";
        $res = $db->prepare($sql);
        $res->execute(array(
            'email' => $arr['email'],
        ));
        $res = $res->fetch();
        $res = $res['email'];
        $emailAlreadyExists = false;

        if ($res == $arr['email']) {
            $emailAlreadyExists = true;
        }
            return $emailAlreadyExists;
    }

    /**
     * Creates a new user
     * @param $arr
     * @return bool
     */
    public static function CreateUser($arr)
    {        
        if($arr) {
            self::validateUser($arr);
            $emailAlreadyExists = self::checkUserEmail($arr);
            if($emailAlreadyExists) {
                return false;
            } else {
                $db = Db::getConnection();
                
                $firstName = $arr['first_name'];
                $lastName = $arr['last_name'];
                $email = $arr['email'];

                $arr = array(
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                );

                $sql = "INSERT INTO user (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
                $stmt = $db->prepare($sql);
                $stmt->execute($arr);
            }
        }
        return true;
    }
}