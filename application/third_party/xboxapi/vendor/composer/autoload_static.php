<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit180e38be3732eed933d6e9a55e2b479e
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OpenXBL\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OpenXBL\\' => 
        array (
            0 => __DIR__ . '/..' . '/openxbl/openxbl/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit180e38be3732eed933d6e9a55e2b479e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit180e38be3732eed933d6e9a55e2b479e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}