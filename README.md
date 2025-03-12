# 🚀 Laravel SQLSTATE Handler

![Packagist](https://img.shields.io/packagist/v/soarestheu/sqlstate-handler)
![License](https://img.shields.io/github/license/soarestheu/sqlstate-handler)
![Laravel](https://img.shields.io/badge/Laravel-7%20%7C%208%20%7C%209%20%7C%2010-blue)

### **Pacote Laravel para tratamento de erros SQLSTATE de forma amigável**  

Este pacote permite capturar e tratar **códigos de erro SQLSTATE** no Laravel, fornecendo mensagens personalizadas e registrando logs automaticamente para debug.



## 📌 **Instalação**

Você pode instalar o pacote via Composer:

```sh
composer require soarestheu/sqlstate-handler
```



## 📌 **Publicação da Configuração**

Após instalar o pacote, publique o arquivo de configuração para personalizar as mensagens SQLSTATE:

```sh
php artisan vendor:publish --tag=config
```

Isso criará um arquivo `config/sqlstate.php` no seu projeto, onde você pode personalizar as mensagens.



## 📌 **Como Usar no Laravel**

### 🔹 **Exemplo com Exception Personalizada**
```php
use Illuminate\Database\QueryException;
use SqlstateHandler\HandlerQueryException;

class StateException extends \Exception
{
    use HandlerQueryException;
}
```

Agora, você pode capturar erros SQLSTATE automaticamente:

```php
try {
    DB::table('user')->insert(['id' => 1, 'nome' => null]);
} catch (QueryException $e) {
    throw StateException::fromQueryException($e);
}
```

## 📌 Exemplo de Retorno JSON

Se ocorrer um erro SQLSTATE, como uma violação de chave única (`23000`), o Laravel retornará um JSON estruturado:

```json
{
    "message": "Violação de integridade: dado já cadastrado ou relacionado.",
    "code": 500,
}
```

Esse retorno facilita a depuração e mantém um padrão de resposta em APIs Laravel.



### 🔹 **Logs Automáticos para Debug**
Sempre que um erro SQLSTATE for capturado, ele será registrado automaticamente no **log do Laravel** (`storage/logs/laravel.log`).

Exemplo de log gerado:
```json
{
    "sqlstate": "23000",
    "mensagem": "Violação de integridade: dado já cadastrado ou relacionado.",
    "query": "INSERT INTO users (id, email) VALUES (?, ?)",
    "bindings": [1, "email@teste.com"],
    "arquivo": "/var/www/html/app/Http/Controllers/StateController.php",
    "linha": 22
}
```

Isso facilita o debug sem expor detalhes sensíveis para o usuário.



### 🔹 **Acessando via Container**
O pacote também registra um singleton no Laravel, permitindo que você o acesse diretamente:

```php
$sqlHandler = app('sqlstate.handler');
```



## 📌 **Personalização das Mensagens**
Para modificar as mensagens de erro, edite o arquivo **`config/sqlstate.php`**:

```php
return [
    'messages' => [
        '23000' => 'Este registro já existe no banco de dados.',
        '23503' => 'Erro de integridade: chave estrangeira inválida.',
        '42000' => 'Erro de sintaxe na query. Verifique seu SQL.',
    ]
];
```



## 📌 **Contribuindo**
Contribuições são bem-vindas! Para melhorar o pacote:

1. **Clone o repositório**  
   ```sh
   git clone https://github.com/username/sqlstate-handler.git
   ```

2. **Crie um branch para suas alterações**  
   ```sh
   git checkout -b minha-melhoria
   ```

3. **Faça o commit e envie o PR**  
   ```sh
   git commit -m "Melhoria na documentação"
   git push origin minha-melhoria
   ```

## 📌 **Licença**
Este pacote está sob a licença **MIT**.
