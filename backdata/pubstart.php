<?
session_start();

if ($_GET['exit'] == 'Y') unset($_SESSION['USER']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/backdata/const.php';
require_once $_SERVER['DOCUMENT_ROOT'] . BACK . '/option.php';// DB options
require_once $_SERVER['DOCUMENT_ROOT'] . BACK . '/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . BACK . '/dbconnect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . BACK . '/include.php';