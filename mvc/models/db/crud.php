<?php

require_once 'connection.php';

interface CRUD
{
    static function all();
    static function find($id);
    static function delete($id);
    function update();
    function create();
}