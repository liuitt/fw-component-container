# Liuitt Container
O Componente "Container" para o Framework Liuitt.

Este componente é utilizado para Injeção de Dependências de uma forma simples e prática.

Veja os exemplos a seguir para tirar suas conclusões!

## Instalação via Composer

Para instalar este Componente via Composer, execute o comando:

```bash
composer require liuitt/fw-component-container --prefer-dist dev-master
```

__IMPORTANTE__ Verifique se você precisa de permissão para utilizar o composer.
 
## Utilização

Uma vez instalado, lembre-se de certificar se o Autoloader do Composer está incluído em seu script.

```php
include 'vendor/autoload.php';
```

## Exemplos

Para fins didáticos de ilustração, todos os exemplos documentados a seguir utilizam duas classes simples:

```php
class Produto
{
    private $modelo;
    private $fabricante;

    public function __construct($modelo, $fabricante)
    {
        $this->modelo = $modelo;
        $this->fabricante = $fabricante;
    }
}

class Carrinho
{
    private $produto;
    
    public function __construct(Produto $produto)
    {
        echo var_export($produto, true);
    }
}
```

### Container::__construct()

Para utilizar basta instanciar o Componente __Container__ sem passar argumentos para o Construtor:

```php
use Liuitt\Component\Container;
$container = new Container();
```

### Container::register(String $alias, Callback $callback)

Para registrar um objeto informe um "Alias" que será usado posteriormente para "resolver|recuperar" o objeto e uma Função Anônima:

```php
$container->register('Celular', function(){
    return new Produto('Nokia 1520', 'Microsoft');
});
```

No exemplo acima, foi criado um __Registro__ com o nome 'Celular', que retornará um objeto Produto com modelo __Nokia 1520__ e fabricante __Microsoft__.

Alternativamene você poderá utilizar chamadas estáticas:

```php
Container::register('Tablet', function(){
    return new Produto('Asus Fonepad 7', 'Asus');
});
``` 

### Container::resolve(String $alias)

Para resolver um Registro você deverá informar o nome registrado para o mesmo:

```php
$celular = $container->resolve('Celular');
```

ou estaticamente:

```php
$tablet = Container::resolve('Tablet');
```
Inspecionando as variáveis __$celular__ e __$tablet__, 

```php
echo '<pre>';
echo var_export($celular, true) . PHP_EOL;
echo var_export($tablet, true) . PHP_EOL;
```

você deverá ver algo como:

```
Produto::__set_state(array(
   'modelo' => 'Nokia 1520',
   'fabricante' => 'Microsoft',
))
Produto::__set_state(array(
   'modelo' => 'Asus Fonepad 7',
   'fabricante' => 'Asus',
))
```
### Container::resolveWith(String $alias, $args)

Permite passar argumentos no momento em que um Registro é resolvido. No entanto, estes DEVEM ser informados na Função Anônima no momento que algo é registrado.

__Registrando com argumentos anonimamente__

```php
Container::register('Celulares', function($modelo, $fabricante){
    return new Produto($modelo, $fabricante);
});
```

__Resolvendo com argumentos__
```php
$iphone = $container->resolveWith('Celulares', ['iPhone S6', 'Apple'])
```

ou estaticamente

```php
$galaxy = Container::resolveWith('Celulares', ['Samsung Galaxy', 'Samsung']);
```

Inspecionando as variáveis __$iphone__ e __$galaxy__, 

```php
echo var_export($iphone, true) . PHP_EOL;
echo var_export($galaxy, true) . PHP_EOL;
```

você deverá ver algo como:

```
Produto::__set_state(array(
   'modelo' => 'iPhone S6',
   'fabricante' => 'Apple',
))
Produto::__set_state(array(
   'modelo' => 'Samsung Galaxy',
   'fabricante' => 'Samsung',
))
```







