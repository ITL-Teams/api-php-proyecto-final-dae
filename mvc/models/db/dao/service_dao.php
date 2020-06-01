<?php

require_once 'dao.php';

interface ServiceDataAccessObject extends DataAccessObject
{
    function findByName($user, $service_name);
}