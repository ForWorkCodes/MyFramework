<?
$arPost = $_POST;

if (empty($arPost) && count($arPost) <= 0)
    die();

if (empty($arPost['LOGIN']) && empty($arPost['EMAIL']))
    $strError = "need login or email; ";
if (empty($arPost['PASS']))
    $strError .= "need password; ";

if (!empty($strError))
    die($strError);

$obAuth = new \Main\Auth();

if ($obAuth !== false)
{
    try {
        $result = $obAuth->authUser($arPost);
        if ($result)
            echo 'auth completed';
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}
