<?
function listFolderFiles($dir)
{
    $ffs = scandir($dir);
    if (!empty($ffs))
        foreach ($ffs as $file)
        {
            if ($file !== '.' && $file !== '..')
                $arFiles[] = $file;
        }

    return $arFiles;
}
function p_d($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

spl_autoload_register(function ($className)
{
    $file = $_SERVER['DOCUMENT_ROOT'] . '/backdata/modules/';
    $arClassName = explode("\\", $className);

    foreach ($arClassName as $key => $part)
    {
        if ($key != count($arClassName) - 1)
            $file .= $part . '/';
        else
            $file .= $part . '.php';
    }

    if (file_exists($file))
        require_once $file;

});