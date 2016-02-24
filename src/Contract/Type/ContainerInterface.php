<?php namespace Liuitt\Component\Contract\Type;

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
	public function register(String $className, String $alias);
	public function registerArray(Array $data)
	public function resolve(String $aliasOrNamespace);
	public function resolveWith(String $aliasOrNamespace, Array $args);
	public function dispose(String $aliasOrNamespace);
}