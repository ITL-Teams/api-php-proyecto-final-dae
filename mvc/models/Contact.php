<?php

require_once 'db/crud.php';

class Contact implements CRUD
{
    private $id;
    private $email;
    private $comment;
    private $connection;

    public function __construct(
        $email,
        $comment
    ) {
        $this->email      = $email;
        $this->comment    = $comment;
        $this->connection = DataBase::getConnection();
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    // Crud functions
    public function create() {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("INSERT INTO contact(email,comment) VALUES (:email,:comment)");
        $statement->execute([
            "email"   => $this->email,
            "comment" => $this->comment
        ]);
    }

    public static function all() {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM contact");
        $statement->execute();

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        $contacts = [];
        foreach ($result_set as $contact) {
            $new_contact = new Contact($contact['email'], $contact['comment']);
            $new_contact->setId($contact['id']);
            array_push($contacts, $new_contact);
        }

        return $contacts;
    }

    public static function find($id) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM contact WHERE id=:id");
        $statement->execute(["id" => $id]);

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$result_set)
            return null;
        
        $contact = new Contact($result_set[0]['email'], $result_set[0]['comment']);
        $contact->setId($result_set[0]['id']);
        return $contact;
    }

    public function update() {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("UPDATE contact SET email=:email, comment=:comment WHERE id=:id");
        $statement->execute([
            "id"      => $this->id,
            "email"   => $this->email,
            "comment" => $this->comment
        ]);
    }

    public static function delete($id) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("DELETE FROM contact WHERE id=:id");
        $statement->execute([
            "id" => $id
        ]);
    }
}