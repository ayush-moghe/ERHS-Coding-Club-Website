<?php
ob_start();
session_start();
const STAFFROLES = 'admin,staff,coursemaker,media,secretary,historian,treasure,teacher';
require_once('util.php');
require_once('route.php');
require_once('database.php');
require_once('validate.php');
require_once('query.php');
require_once ('auth.php');