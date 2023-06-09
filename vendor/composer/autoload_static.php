<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita2718c0a22cadcb9266c10af441d79b1
{
    public static $files = array (
        '290dd4ba42f11019134caca05dbefe3f' => __DIR__ . '/..' . '/teamtnt/tntsearch/helper/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TeamTNT\\TNTSearch\\' => 18,
        ),
        'D' => 
        array (
            'Dell\\BasecodeM\\' => 15,
        ),
        'A' => 
        array (
            'App\\User\\' => 9,
            'App\\Html\\' => 9,
            'App\\Database\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TeamTNT\\TNTSearch\\' => 
        array (
            0 => __DIR__ . '/..' . '/teamtnt/tntsearch/src',
        ),
        'Dell\\BasecodeM\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\User\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Public/Controllers/Class/UserClass',
        ),
        'App\\Html\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Public/Controllers/Class/FormClass',
        ),
        'App\\Database\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Public/Controllers/Class/DatabaseClass',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita2718c0a22cadcb9266c10af441d79b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita2718c0a22cadcb9266c10af441d79b1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita2718c0a22cadcb9266c10af441d79b1::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita2718c0a22cadcb9266c10af441d79b1::$classMap;

        }, null, ClassLoader::class);
    }
}
