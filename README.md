1) git clone https://github.com/mrlkaco/nac20-79370-24042018
2) Criamos em frontend o arquivo Dockerfile 
    Estrutura do Dockerfile do Frontend:
    ------------------------------------------------------
    FROM php:7.2-apache

    # Enable mysqli to connect to databse
    RUN docker-php-ext-install mysqli

    WORKDIR /var/www/html/

    COPY . /var/www/html/
    ------------------------------------------------------
    
3) Criamos em backend o arquivo Dockerfile
    Estrutura do Dockerfile do Frontend:
    ------------------------------------------------------
    FROM mysql:5.7

    COPY ./demo.sql /docker-entrypoint-initdb.d
    ------------------------------------------------------

4) Abrimos o "Docker Quickstart Terminal" (Anote o IP em que ele estará rodando)
5) Executamos comando: docker pull php:7.2-apache (para baixar a versão php utilizada)
6) Executamos comando: docker pull mysql:5.7 (para baixar a versão mysql utilizada)
7) Executamos comando: docker images (para ver imagens locais criadas localmente)
8) Entramos no diretório do banco: cd backend
9) Executamos comando: docker build . -t backend-mysql:0.1 (para buildar o mysql)
10) Saímos do backend e entramos no frontend: cd ../ depois cd frontend
11) Executamos comando: docker build . -t frontend-php:0.1 (para buildar o servidor) 
12) Até aqui temos as imagens necessárias para o projeto, agora falta rodar...
13) Executamos comando: docker run -d --rm --name backend -e MYSQL_DATABASE=demo -e MYSQL_ALLOW_EMPTY_PASSWORD=yes backend-mysql:0.1 (para rodar o projeto backend)
14) Executamos comando: docker run -d --rm --name frontend -p 80:80 --link backend frontend-php:0.1
15) Para verificar se está rodando pegue o IP mencionado acima (Item 4): http://192.168.99.100:80

-d      -> Execução em background
--name  -> Nome do container
-p      -> Conexão direcionada p/ porta 80