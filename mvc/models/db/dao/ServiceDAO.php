<?php

require_once 'dao.php';
require_once 'models/Service.php';

class ServiceDAO implements DataAccessObject
{
    public function create($service)
    {
        $connection = DataBase::getConnection();

        $sql  = "INSERT INTO services(type,privacy,service_name,description,code,reference) ";
        $sql .= "VALUES (:type,:privacy,:service_name,:description,:code,:reference)";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "type"         => $service->getType(),
            "privacy"      => $service->getPrivacy(),
            "service_name" => $service->getServiceName(),
            "description"  => $service->getDescription(),
            "code"         => $service->getCode(),
            "reference"    => $service->getReference()
        ]);
    }

    public function all()
    {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM services");
        $statement->execute();

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        $services = [];
        foreach ($result_set as $service) {
            $new_service = new Service(
                $service['type'],
                $service['privacy'],
                $service['service_name'],
                $service['description'],
                $service['code'],
                $service['reference']
            );
            $new_service->setId($service['id']);
            array_push($services, $new_service);
        }

        return $service;
    }

    public function find($id)
    {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("SELECT * FROM services WHERE id=:id");
        $statement->execute(["id" => $id]);

        $result_set = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$result_set)
            return null;
        
        $service = new Service(
            $result_set[0]['type'],
            $result_set[0]['privacy'],
            $result_set[0]['service_name'],
            $result_set[0]['description'],
            $result_set[0]['code'],
            $result_set[0]['reference']
        );
        $service->setId($result_set[0]['id']);
        return $service;
    }

    public function update($service) {
        $connection = DataBase::getConnection();

        $sql  = "UPDATE services ";
        $sql .= "SET type=:type, privacy=:privacy, service_name=:service_name, description=:description, code=:code, reference=:reference";
        $sql .= "WHERE id=:id";

        $statement = $connection->prepare($sql);
        $statement->execute([
            "id"           => $service->getId(),
            "type"         => $service->getType(),
            "privacy"      => $service->getPrivacy(),
            "service_name" => $service->getServiceName(),
            "description"  => $service->getDescription(),
            "code"         => $service->getCode(),
            "reference"    => $service->getReference()
        ]);
    }

    public function delete($service) {
        $connection = DataBase::getConnection();
        $statement = $connection->prepare("DELETE FROM services WHERE id=:id");
        $statement->execute([
            "id" => $service->getId()
        ]);
    }
}