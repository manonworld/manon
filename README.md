DDD Boilerplate in Symfony 5
________________________________________________________________________________

Yet another domain driven design boiler plate for Symfony 5 applications


________________________________________________________________________________

Build Status:
--------------
[[![Build Status](https://travis-ci.org/mostafaahamidmanon/symfony5dddboilerplate.svg?branch=master)](https://travis-ci.org/mostafaahamidmanon/symfony5dddboilerplate)
<a href="https://scan.coverity.com/projects/mostafaahamidmanon-symfony5dddboilerplate">
  <img alt="Coverity Scan Build Status"
       src="https://scan.coverity.com/projects/21378/badge.svg"/>
</a>


Tech stack:
------------

Redis 5.0

Symfony 5.0

PHP 7.4 Alpine Docker Image

ReactJS@latest Alpine Docker Image

Supervisord

Grafana

MariaDB

RabbitMQ


Installation using docker-compose:
------------------------------------

``` docker-compose up -d ```

Alternatively, you can use the makefile by invoking the following commands:

``` make install ``` to install the application (Backend & Frontend)

``` make test ``` to test the application (Backend)

``` make clean ``` to uninstall the application (Backend and Frontend)

``` make docker-clean ``` to clean the whole docker service but it will remove any other containers running in your docker environment, please use it only when you know what you are doing.

``` make ``` to display make command help

``` make release ``` to create a release. (Make sure that https://github.com/liip/RMT is installed)


Front-End: (WIP)
-----------------

Still working on the scaffolder of the DDD structure for the front end


Backend Usage: (WIP)
---------------------

``` make app-install ``` to install the application dependencies using composer (Backend)

``` make start ``` to run the application server (Backend)

``` make log ``` to start log tailing (Backend)

``` make stop ``` to stop the application server (Backend)

``` make domain name=ManonBusinessTestDomain ``` to create a new DDD structure (Backend)

``` make delete-domain name=ManonBusinessTestDomain ``` to delete a DDD created structure (Backend)

Do not forget to replace ``` ManonBusinessTestDomain ``` with your desired business domain name

``` make code-fix ``` to Adjust the code to the PSR2 standard (Backend)

More commands are on the way


For the backend:
-----------------

A step before browsing the backend is:

edit your /etc/hosts or Windows or MacOS hosts file using any editor and add the following entry to the end of the file:

``` 127.0.0.1   testdomain.wip ```

Just point your browser to 

https://testdomain.wip:8000/TestDomain 

or 

https://testdomain.wip:8000 

for the main page of Symfony 5

To run the application successfully, just follow the steps:

``` make install ```

``` make app-install ```

``` make start ```

Or

Simply run ``` make install && make app-install && make start ``` in one command


Thanks