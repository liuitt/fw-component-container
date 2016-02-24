<?php namespace Liuitt\Component\Container\Contract\Action;

use Liuitt\Component\Container\Contract\Type\ContainerInterface;

use ReflectionClass;

trait Intantiable
{
    protected static $instance;

    final public static function getInstance()
    {
        if (!isset(static::$instance)) {
            $class = new ReflectionClass(__CLASS__);
            static::$instance = $class->newInstanceArgs(func_get_args());
        }

        return static::$instance;
    }

    final private function __clone()
    {
    }

    final private function __wakeup()
    {
    }
}
 
abstract class AbastractContainer implements ContainerInterface
{
	use Intantiable;
	
	private static $data = [];
	
	public function __call($name, $args)
	{
		return self::call($name, $args);
	}
	
	public function __callStatic($name, $args)
	{
		return self::call($name, $args);
	}
	
	public function call($name, $args)
	{
		// register
		
		// resolve
	}
	
	public function register(String $className, String $alias)
	{
		
	}
	
	public function registerArray(Array $data)
	{
		
	}
	
	public function resolve(String $aliasOrNamespace)
	{
		
	}

	public function resolveWith(String $aliasOrNamespace, Array $params)
	{
		
	}
	
	public function dispose(String $aliasOrNamespace)
	{
		
	}
	
}

$container = new Container();
$container->setEnvironment('dev', 'prod', 'homolog');

$product = $container->register(new Product($id), 'Product');
$product = $container->registerProduct($id);

$container->registerArray([
	'Produto' => [ new Product($id), 'Product' ],
	'Item' => new CartItem($container->resolveProduct())
]);

$item = $container->register(new CartItem($product));
$item = $container->register(new CartItem($container->resolve('Product')));
$item = $container->register(new CartItem($container->resolveProduct()));
$item = $container->registerWith('CartItem', [$container->resolveProduct()]);
$item = $container->registerWith('CartItem', [$container->resolveWith('Product', [1])])

Container::resolveProductFromHomolog();
Container::resolveProductFromHomologWith([1]);




