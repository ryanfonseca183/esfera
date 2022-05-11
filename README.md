## **Tecnologias utilizadas** 

- PHP 7.3.29
- Laravel 8.83.12
- Bootstrap 5.1
- jQuery 3.6.0
- jQuery Mask
- Mysql
- Bootstrap Icons 1.8.1

## **Instalação**
Para obter uma copia do projeto e executa-la na sua máquina, siga as instruções abaixo:  
- Primeiro, gere um clone da aplicação 
- Instale as dependencias do projeto
```
  1. composer install
  2. npm install
```
- Renomeie o arquivo .env-exemple para .env e defina as varíaveis de ambiente
- Para informar as credenciais de acesso do usuário administrador, defina os valores para as variáveis de ambiente ADMIN_EMAIL e ADMIN_PASSWORD. Por padrão, será criado um usuário com email admin@admin.com.br e senha "senha".
- Gere a chave do projeto
```
  1. php artisan key:generate
```
- Execute os migrations e seeders
```
  1. php artisan migrate
  2. php artisan db:seed
  3. php artisan storage:link
```
## **Factories**
Para popular o banco com dados de teste, execute o seguinte comando através do php artisan tinker:
```
  1. App\Models\Empresa::factory()->has(App\Models\Funcionario::factory()->count(15))->count(15)->create()
```
Serão criadas 15 empresas com 15 funcionários em cada empresa.
## **Testando**
Para executar as classes de teste, execute o comando: 
```
  1. php artisan test
```
Os métodos de teste irão redefinir o banco de dados durante cada execução para que os dados de um teste anterior não interfiram nos testes subsequentes. Para evitar que os dados do banco principal sejam perdidos, crie um arquivo .env.testing e redefina as variáveis de ambiente do banco de dados para apontar para um banco de teste. Por fim, execute o seguinte comando: 
```
  1. php artisan test --env=testing
```
