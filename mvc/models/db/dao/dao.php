<?php

require_once 'models/db/connection.php';

interface DataAccessObject
{
    function all();
    function find($id);
    function delete($id);
    function update($entity);
    function create($entity);
}