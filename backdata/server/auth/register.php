<?
$arPost = $_POST;

if (empty($arPost) && count($arPost) <= 0)
    die();

if (empty($arPost['NAME']))
    $strError = "need name; ";
if (empty($arPost['LOGIN']))
    $strError = "need login; ";
if (empty($arPost['EMAIL']))
    $strError .= "need email; ";
if (empty($arPost['PASS']))
    $strError .= "need password; ";
if (empty($arPost['PASS_CONFIRM']))
    $strError .= "need confirm password; ";
if ($arPost['PASS'] != $arPost['PASS_CONFIRM'])
    $strError .= "pass should be the same";

if (!empty($strError))
    die($strError);

$obAuth = new \Main\Auth();

if ($obAuth !== false)
{
    try {
        $result = $obAuth->registerNewUser($arPost);
        if ((int)$result > 0)
            echo 'register completed';
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}
