# DDD Boilerplate in Symfony 5

Yet another domain driven design boiler plate for Symfony5 applications

Please make sure that docker and docker-compose are installed


Tech stack:
------------

Redis 5.0

Symfony 5.0

PHP 7.4 Alpine Docker

ReactJS@latest

Supervisord

Grafana

MariaDB

RabbitMQ


Installation using docker-compose:
------------------------------------

docker-compose up -d

Alternatively, you can use the makefile by invoking the following commands:

``` make install ``` to install the application

``` make clean ``` to uninstall the application

``` make docker-clean ``` to clean the whole docker service but it will remove any other containers running in your docker environment, please use it only when you know what you are doing.




For the backend:
-----------------

Just point your browser to https://testdomain.wip:8000/



Thanks