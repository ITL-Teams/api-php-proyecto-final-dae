<?php

require_once 'dao.php';
require_once 'models/Contact.php';

class ContactDAO implements DataAccessObject
{
    public function create($contact) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("INSERT INTO contact(email,comment) VALUES (:email,:comment)");
        $statement->execute([
            "email"   => $contact->getEmail(),
            "comment" => $contact->getComment()
        ]);
    }

    public function all() {
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

    public function find($id) {
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

    public function update($contact) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("UPDATE contact SET email=:email, comment=:comment WHERE id=:id");
        $statement->execute([
            "id"      => $contact->getId(),
            "email"   => $contact->getEmail(),
            "comment" => $contact->getComment()
        ]);
    }

    public function delete($contact) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("DELETE FROM contact WHERE id=:id");
        $statement->execute([
            "id" => $contact->getId()
        ]);
    }
}