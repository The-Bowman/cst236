<?php

spl_autoload_register(function ($class) {

    $lastdirectories = substr(getcwd(), strlen(__DIR__));

    // echo "getcwd =  " . getcwd() . "<br>";
    // echo "__DIR__ =  " . __DIR__ . "<br>";
    // echo "last directories =  " . $lastdirectories . "<br>";

    $numoflastdirectories = substr_count($lastdirectories, '\\');

    // echo "num of directories different : " . $numoflastdirectories . "<br>";

    $directories = [
        'C:\\MAMP\\htdocs\\cst236\\milestone\\Database', 'C:\\MAMP\\htdocs\\cst236\\milestone\\Services', 'C:\\MAMP\\htdocs\\cst236\\milestone\\Services\\models',
        'C:\\MAMP\\htdocs\\cst236\\milestone\\UI', 'C:\\MAMP\\htdocs\\cst236\\milestone\\UI\\handlers', 'C:\\MAMP\\htdocs\\cst236\\milestone\\UI\\views'
    ];


    foreach ($directories as $d) {
        $currentDirectory = $d;
        // echo "looking in directory " . $d . "<br>";
        for ($x = 0; $x < $numoflastdirectories; $x++) {
            $currentDirectory =  $currentDirectory;
        }

        $classfile = $currentDirectory . '\\' . $class . '.php';

        // echo "going to check if " . $classfile . " is readable<br>";
        if (is_readable($classfile)) {
            // echo " WE MADE IT TO HERE<BR>";
            if (require $d . '\\' . $class . ".php") {
                // echo " it was read";
                break;
            } else {
                // echo $classfile . " is NOT readable";
            }
        } else {
            // echo $classfile . " COULD NOT BE READ<br>";
        }
    }
});