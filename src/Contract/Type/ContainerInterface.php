<?php namespace Liuitt\Component\Container\Contract\Type;

/**
 * Liuitt Framework (http://framework.liuitt.com/)
 *
 * @package   Liuitt\Component
 * @link      http://github.com/liuitt/component-registry para acessar o repositório
 * @copyright Copyright (c) 2007-2016 Liuitt (http://www.liuitt.com)
 * @license   http://framework.liuitt.com/bsd-3-clause para acessar a licença
 */

interface ContainerInterface
{
	public static function register(String $alias, Callable $callback);
	public static function registerArray(Array $data);
	public static function resolve(String $alias);
	public static function resolveWith(String $aliasOrNamespace, $args);
	public static function dispose(String $aliasOrNamespace);
}
