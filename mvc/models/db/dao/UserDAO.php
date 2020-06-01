<?php

require_once 'dao.php';
require_once 'models/User.php';

class UserDAO implements DataAccessObject
{
    public function create($users)
    {
        $connection = DataBase::getConnection();

        $sql  = "INSERT INTO users(name,email,password,token) ";
        $sql .= "VALUES (:name,:email,:password,:token)";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "name"  => $users->getName(),
            "mail" => $users->getEmail(),
            "password"  => $users->getPassword(),
             "token"  => $users->getToken()
            
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
        
        $users = new users(
            $result_set[0]['name'],
            $result_set[0]['mail'],
            $result_set[0]['password']
        );
        $users->setId($result_set[0]['id']);
        return $users;
    }

    public function update($users) {
        $connection = DataBase::getConnection();

        $sql  = "UPDATE users ";
        $sql .= "SET name=:name, mail=:mail, password=:password";
        $sql .= "WHERE id=:id";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "id"           => $service->getId(),
            "name"         => $service->getName(),
            "mail"      => $service->getMail(),
            "password" => $service->getPassword()
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