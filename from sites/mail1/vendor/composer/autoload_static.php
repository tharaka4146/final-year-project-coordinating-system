<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit18019621d69d319d738b6e68330ff7af
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit18019621d69d319d738b6e68330ff7af::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit18019621d69d319d738b6e68330ff7af::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}