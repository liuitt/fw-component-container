<?php namespace Liuitt\Component\Container\Contract\Action;

use ReflectionClass;

use Liuitt\Component\Container\Contract\Type\ContainerInterface;

abstract class AbstractContainer implements ContainerInterface
{

    protected static $instance = null;
    private static $containers = [];
    private static $args = [];

    public function arg($key, $value = null)
    {
        self::$args[$key] = $value;
    }

    public static function register(String $alias, Callable $callable )
    {
        self::getInstance();
        self::$containers[$alias] = $callable;
    }

    public static function registerArray(Array $data)
    {

    }

    private static function resolveInternal($alias, $args)
    {
        return call_user_func_array(self::$containers[$alias], $args);
    }

    public static function resolve(String $alias)
    {
        return self::resolveInternal($alias, [self::getInstance()]);
    }

    public static function resolveWith(String $aliasOrNamespace, $args)
    {
        return self::resolveInternal($aliasOrNamespace, $args);
    }

    public static function dispose(String $aliasOrNamespace)
    {

    }

    final private static function getInstance()
    {
        if (!isset(static::$instance)) {
            $class = new ReflectionClass('\Liuitt\Component\Container');
            static::$instance = $class->newInstanceArgs(func_get_args());
        }

        return static::$instance;
    }

}
