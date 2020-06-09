<?php

require_once 'models/db/connection.php';

interface DataAccessObject
{
    function all();
    function find($id);
    function delete($entity);
    function update($entity);
    function create($entity);
}