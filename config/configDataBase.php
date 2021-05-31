<?php

use core\Orm;
use helpers\SystemHelper;

$conn = new mysqli(SystemHelper::getEnv('host'), SystemHelper::getEnv('user'), SystemHelper::getEnv('password'));

Orm::useConnection($conn, SystemHelper::getEnv('name'));