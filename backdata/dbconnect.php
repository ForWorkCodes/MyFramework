<?
/** @var array $db_data */

global $obDb;
global $obUser;

try {
    $obDb = new Query\QueryMain($db_data);
    $obUser = new User\User();
}
catch (\Exception $e)
{
    die($e->getMessage());
}