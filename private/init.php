<?php
ob_start();
session_start();
const STAFFROLES = 'admin,officer,coursemaker,media,secretary,historian,treasure,teacher,president,vicepresident';
require_once('util.php');
require_once('route.php');
require_once('database.php');
require_once('validate.php');
require_once('query.php');
require_once ('auth.php');