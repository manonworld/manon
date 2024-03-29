# DDD Boilerplate in Symfony 5

[![manonworld](https://circleci.com/gh/manonworld/manon.svg?style=svg)](https://app.circleci.com/pipelines/github/manonworld/manon/47/workflows/f4c8b468-1c7e-4630-a0e7-2d673a731834/jobs/60)

Yet another DDD & CQRS boiler plate for Symfony 5 applications


________________________________________________________________________________
Tech stack:
________________________________________________________________________________

Redis 5

Symfony 5.2

PHP 7.4 Alpine Docker Image

ReactJS@latest Alpine Docker Image

Supervisord

Grafana

MySQL

Kubernetes

________________________________________________________________________________
Installation using docker-compose:
________________________________________________________________________________

``` docker-compose up -d ```

Alternatively, you can use the makefile by invoking the following commands:

``` make install ``` to install the application (Backend & Frontend)

``` make test ``` to test the application (Backend)

``` make clean ``` to uninstall the application (Backend and Frontend)

``` make dockerclean ``` to clean the whole docker service but it will remove any other containers running in your docker environment, please use it only when you know what you are doing.

``` make ``` to display make command help

``` make release ``` to create a release. (Make sure that https://github.com/liip/RMT is installed)


________________________________________________________________________________
## Front-End: (WIP)
________________________________________________________________________________

Still working on the scaffolder of the DDD structure for the front end


________________________________________________________________________________
## Backend Usage: (WIP)
________________________________________________________________________________

``` make appinstall ``` to install the application dependencies using composer (Backend)

``` make start ``` to run the application server (Backend)

``` make log ``` to start log tailing (Backend)

``` make stop ``` to stop the application server (Backend)

``` make domain name=ManonBusinessTestDomain ``` to create a new DDD structure (Backend)

``` make deldomain name=ManonBusinessTestDomain ``` to delete a DDD created structure (Backend)

Do not forget to replace ``` ManonBusinessTestDomain ``` with your desired business domain name

``` make fix ``` to Adjust the code to the PSR2 standard (Backend)

More commands are on the way


________________________________________________________________________________
## For the backend:
________________________________________________________________________________

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

``` make appinstall ```

``` make start ```

Or

Simply run ``` make install && make appinstall && make start ``` in one command



________________________________________________________________________________
Kubernetes
________________________________________________________________________________

``` make installkubernetes ```

And

``` make startkubernetes ```


_________________________________________________________________________________
Helm
_________________________________________________________________________________

``` make installhelm ```

And

``` make starthelm ```


Thanks


TODO:
 - Front End
 - Testing
