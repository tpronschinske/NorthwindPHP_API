<?php

namespace Core;

use Helpers\Database;

abstract class Service
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::get();
    }
}
