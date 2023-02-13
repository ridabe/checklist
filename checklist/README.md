<p align="center"><a href="https://checklistfacil.com/" target="_blank"><img src="https://www.checklistfacil.com/wp-content/uploads/2022/07/logo_checklist_facil.webp" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o Projeto

Realizar o desenvolvimento da proposta a seguir utilizando ao máximo as funcionalidades
do framework Laravel em sua versão mais recente.

### Desafio
- Criar um CRUD de rotas de API para o cadastro de bolos.
- Os bolos deverão ter Nome, Peso (em gramas), Valor, Quantidade disponível e uma lista
  de e-mail de interessados.
- Após o cadastro de e-mails interessados, caso haja bolo disponível, o sistema deve enviar
  um e-mail para os interessados sobre a disponibilidade do bolo.

## Tecnologias usadas

- Laravel V.9.51.0

- Composer version 2.4.1

- PHP 8.1.7

- MySql
## Iniciando o projeto

- Após clonar o repositorio, rodar o comando "docker-compose up -d" para subir o container docker da base de dados;
- Entrar na pasta do projeto e rodar o comando "composer install" para gerar as dependencias;
- Iniciar o projeto com o comando "php artisan serve"

### Rotas
**Dentro da pasta do projeto ira conter um arquivo de collection para ser utilizado no postmam**
- "api-cake.postman_collection.json"

### Utilização da queue/jobs
**O sistema possue uma queue que dispara os emails para os interessados nos bolos.**

**O job criado sera disparado por um "Command" criado espcificamente para ser usado dentro de uma cron e pode assim ter o agendamento destes disparos.**

**Os jobs estão sendo armazenados na base de dados na tabela jobs ate serem disparadas.**
- Por se tratar de um teste a fila podera ser executada de forma manual pelo conmando "php artisan queue:work", isso irá fazer o sistema fica 'escutando a fila para ser disparada'
- Em produção pode usar como gerenciador das filas o "Supervisor"
- O comand que ira criar as filas podera ser executado pelo comando "php artisan sendMail:interested".'
- Em Produção podera ser usado o cronJobs para rodar o Comand periodicamente

### Testando o recebimento dos emails
**Por se tratar de um teste o sistema ira disparar os emails que serao recebidos usando (https://mailtrap.io/i)**
- Dados de acesso da conta:
- Usuario: ricardo@algoritmum.com.br
- Senha: testeEmail123

**Assim que os emails forem sendo disparados, respeitando as regras de envio, eles deverao ir aparecendo no imbox do [mailtrap](https://mailtrap.io/i)**

### Regras de disparo de emails
**Para que ocorra o disparo dos emaisl, existem algumas regras que precisam ser seguidas:**
- Precisa ter em estoque o bolo escolhido pelo usuario para ser avisado, caso nao tenha a quantidade em estoque nenhum email sobre aquele bolo sera disparado;
- Todo usuario que tiver o email enviado sera setado com a flag "sent" na base de dados, e isso impedira que o email seja disparado novamente para o mesmo usuario a nao ser que ele crie outra instancia de aviso no sietma.


## Testes
- Para executar os testes vc podera rodar o comando "php artisan test" isso fara rodar todos os testes de uma vez, ou entao
podera rodar o comando com a flag '--filter=' e inserir o nome do teste que deseja realizar.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
