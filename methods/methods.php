<?php

use methods\AppDB;
use methods\InitializerDB;

$start_DB = AppDB::get_values();
//$start_DB = AppDB::set_value();


InitializerDB::migrate_start();


