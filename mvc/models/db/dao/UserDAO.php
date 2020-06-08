<?php

require_once 'UserSessionDAO.php';
require_once 'models/User.php';

class UserDAO implements DataAccessObject
{
    public function create($users)
    {
        $connection = DataBase::getConnection();

        $sql  = "INSERT INTO users(name,email,password,token,user_type) ";
        $sql .= "VALUES (:name,:email,:password,:token,:user_type)";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "name"      => $users->getName(),
            "email"     => $users->getEmail(),
            "password"  => $users->getPassword(),
            "token"     => $users->getToken(),
            "user_type" => $users->getUserType()
        ]);
    }

    public function all()
    {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM users");
        $statement->execute();

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($result_set as $users) {
            $new_users = new users(
                $users['name'],
                $users['mail'],
                $users['password']
            );
            $new_users->setId($users['id']);
            array_push($users, $new_users);
        }

        return $users;
    }

    public function find($id)
    {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM users WHERE id=:id");
        $statement->execute(["id" => $id]);

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$result_set)
            return null;
        
        $users = new User(
            $result_set[0]['name'],
            $result_set[0]['email'],
            $result_set[0]['password'],
             $result_set[0]['token']
        );
        $users->setId($result_set[0]['id']);
        return $users;
    }


 public function findEmail($email)
    {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $statement->execute(["email" => $email]);

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$result_set)
            return null;
        
        $users = new User(
            $result_set[0]['email'],
            $result_set[0]['password'],
            $result_set[0]['name'],
            $result_set[0]['token']
        );
        $users->setId($result_set[0]['id']);
        $users->setUserType($result_set[0]['user_type']);
        return $users;
    }




    public function update($users) {
        $connection = DataBase::getConnection();

        $sql  = "UPDATE users ";
        $sql .= "SET name=:name, mail=:mail, password=:password, token=:token, user_type=:user_type";
        $sql .= " WHERE id=:id";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "name"      => $users->getName(),
            "email"     => $users->getEmail(),
            "password"  => $users->getPassword(),
            "token"     => $users->getToken(),
            "user_type" => $users->getUserType()
        ]);
    }

    public function delete($users) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("DELETE FROM users WHERE id=:id");
        $statement->execute([
            "id" => $users->getId()
        ]);
    }
}