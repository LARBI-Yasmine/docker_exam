<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf2f3ea2b52dc1dc543fcff270d9d2335
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf2f3ea2b52dc1dc543fcff270d9d2335', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf2f3ea2b52dc1dc543fcff270d9d2335', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf2f3ea2b52dc1dc543fcff270d9d2335::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
