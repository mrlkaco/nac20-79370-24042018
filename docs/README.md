# Sistemas para Internet - SecDevOps

**Objetivo:** Criar uma aplicação no formato "CRUD" executada em containers com base em "PHP" e "MySQL";

**Data de Entrega:** 

| Turma | Data Limite         |
|-------|---------------------|
| 2TINA | 16 de Abril de 2018 |
| 2TINR | 24 de Abril de 2018 |

---

## Execução

Criar os arquivos Dockerfile necessários para execução desta aplicação utilizando containers de acordo com a arquitetura descrita abaixo:

O entregável deverá ser desenvolvido conforme os items abaixo:

1. Executar um fork deste repositório para que alterações pessoais possam ser feitas;

2. Escrever o Dockerfile neceesário para que a aplicação possa rodar em um container de frontend executando PHP com apache ou somente PHP de acordo com [as imagens oficiais do projeto](https://hub.docker.com/_/php/), sendo que toda a estrutura necessária deve ser armazenada no repositório clonado;

**Dica:** Tenha em mente que para que o PHP se conecte ao banco será necessária instalação do módulo mysqli na imagem gerada, o que pode ser feito utilizando a instrução abaixo na composição de seu dockerfile:

```sh
RUN docker-php-ext-install mysqli
```

> Para maior detalhamento técnico verificar item "How to install more PHP extensions" na documentação do dockerhub na página oficial do php "https://hub.docker.com/_/php/".

3. Criar a documentação do projeto conforme descrito abaixo:

* 3.1: Na pasta raiz de cada componente (frontend e backend) criar o arquivo README.md com a documentação referente a estrutura e execução do projeto, este arquivo deverá conter instruções detalhadas sobre como executar o build do projeto (seja ele manual ou automatizado) e criar/acessar os containers bem como variáveis e arquivos de configuração relevantes a execução ou customização da aplicação;

* 3.2: Na pasta raiz do projeto "php-sample-app/" editar o arquivo README.md adicionando instruções sobre como executar a aplicação, ou seja, como executar os containers de frontend e backend e acessar o resultado além de quaisquer outros dados que julgar necessário e especificação de quais componentes são statefull e quais componentes são stateless;

4. Criar o Dockerfile ou instruções necessárias para execução do banco de dados, lembre-se de que o banco deverá ser populado com a tabela demo.sql disponível no diretório [backend/](https://github.com/fiapsecdevops/php-sample-app/tree/master/backend);

**Dica:** Para que os containers se comuniquem será necessário que o container de frontend seja executado com a criação de uma bridge ou com a instrução "--link", **este processo de configuração será executado em sala durante a NAC com o professor** mas você também pode utilizar como base o exemplo abaixo:

```sh
docker run -d -p 80:80 --link <nome-do-container-mysql> --name frontend <nome-do-container-php>
```

Verifique informações a respeito deste processo [nesta documentação](https://docs.docker.com/network/links/#communication-across-links);

Neste item verifique também qual a melhor forma de definir os parâmetros de comunicação com o banco e como armazenar esses dados, além disso considere que seria interessante NÃO UTILIZAR o usuário root e/ou definir uma senha para conexão com o banco, providencie as alterações necessárias com base em boas práticas e [twelve factory](https://12factor.net/pt_br/);

**Importante** Fica a cargo do desenvolvedor decidir se a o container com mysql será executado a partir da imagem original com comandos manuais para configurar o banco demo.sql ou se para execução será feito um processo de build via Dockerfile onde o banco "demo" será adicionado gerando uma imagem para o projeto a partir da [imagem oficial do mysql](https://hub.docker.com/_/mysql/);

## Critérios de Avaliação

A documentação criada deverá ser suficiente para execução da aplicação sem qualquer  informação adicional, ou seja, a correção será feita lendo a documentação e executando conforme descrito, o resultado esperado é o acesso ao CRUD com gravação no SGBD funcionando conforme esperado e demonstrado em sala;

### Items/Pontuação

| Item  | Descrição                                                                     | Peso             |
|-------|-------------------------------------------------------------------------------|------------------|
| 1 e 2 | Fork e criação do Dockerfile para execução do componente de frontend;         | 5 pontos         |
| 3     | Documentação incluindo informações de execução e detalhamento de componentes; | 3 pontos         |
| 4     | Dockerfile e/ou Intruções para configuração e execução do banco;              | 2 pontos         |
| extra | Build automatico do frontend no dockerhub e versionamento via TAGS;           | 1.5 pontos na PS |

---

Boa Avaliação!
