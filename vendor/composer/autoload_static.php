<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5fa6238a55c0af680fa6c770e4b2a8dd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5fa6238a55c0af680fa6c770e4b2a8dd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5fa6238a55c0af680fa6c770e4b2a8dd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
