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
    public $modelo;
    public $fabricante;

    public function __construct($modelo, $fabricante)
    {
        $this->modelo = $modelo;
        $this->fabricante = $fabricante;
    }
}

class Carrinho
{
    public function __construct(Product $product)
    {
        echo var_export($product, true);
    }
}
```

### Container::__construct()

Para utilizar basta instanciar o Componente __Container__ sem passar argumentos para o Construtor:

```php
$container = new Liuitt\Component\Container();
```

### Container::register(String $alias, Callback $callback)

Para registrar um objeto informe um "Alias" que será usado posteriormente para "resolver|recuperar" o objeto e uma Função Anônima:

```php
$container->register('Celular', function(){
    return new Produto('Nokia 1520', 'Microsoft');
});
```

No exemplo acima, foi criado um __Registro__ com o nome 'Celular', que retornará um objeto Produto com modelo __Nokia 1520__ e fabricante __Microsoft__.

### Container::resolve(String $alias)

Para resolver um Registro você deverá informar o nome registrado para o mesmo:

```php
$celular = $container->resolve('Celular');
```

Inspecionando a variável $celular, você deverá ver algo como:

```php
<pre>echo var_export($celular, true) . '<hr>';</pre>
```










