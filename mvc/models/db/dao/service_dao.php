<?php

require_once 'dao.php';

interface ServiceDataAccessObject extends DataAccessObject
{
    function findByName($user, $service_name);
    function findByService($service_name);
    function findByUser($user);
    function addSharedUser($sharedUser);
    function findAllShared($service);
    function deleteSharedUser($sharedUser);
    function deleteAllSharedUsers($service);
}