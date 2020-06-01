<?php

require_once 'dao.php';

interface UserSessionDataAccessObject
{
   
    function findEmail($email);
   
}