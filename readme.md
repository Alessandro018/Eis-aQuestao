# Eis a Questão

Este sistema tem como propósito servir como uma plataforma para que os professores possam criar questões baseadas em níveis de dificuldade e gerar provas de forma aleatória. A ideia é facilitar a elaboração das provas e ter um acompanhamento, inteligente e através de análise de dados, da evolução acadêmica dos alunos.

Para realizar a instalação e execução do projeto Eis a Questão siga as seguintes instruções abaixo:

- [Pré-Requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Ferramentas](#ferramentas)
## Pré-Requisitos
> Instalação do servidor Mysql,com o seguinte comando.
```
# apt-get install mysql-server
```
Instale o (make) digitando o comado abaixo, para executar as configurações do projeto.
```
# apt-get install make
```
Instale o  gerenciador de pacotes (composer)
```
# apt-get install composer
```
> Instalação do Laravel obrigatória para a execução do projeto, veja mais em :
* [Laravel-Installation](https://laravel.com/docs/5.8/installation) - Instalação completa na documentação do framework -
## Instalação
- Para Clonar o repositório do projeto no seu computador digite : ```git clone https://github.com/libna/monitoramento-estudantil.git ```
### Configuração
> Em seguida entre na pasta do projeto e utilize o programa make digitando o comando abaixo.
```
$ make conf
```
## Execução
> Após a configuração do make conf,coloque no navegador : ```localhost:8000 ``` ou  ``` http://127.0.0.1:8000 ``` e você terá acesso ao nosso projeto.

## Ferramentas
- [Laravel](https://laravel.com) - PHP Framework
- [Bootstrap](https://getbootstrap.com/) - CSS && HTML Framework
- [Sublime Text](https://www.sublimetext.com/) - Editor de texto
- [MYSQL](https://www.mysql.com/) -Sistema de gerenciamento de banco de dados
- [PHP](https://php.net/) - Linguagem de programação