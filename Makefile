.DEFAULT_GOAL := default

install:
	echo "\nBuilding Docker Containers...\n";
	docker-compose up -d --build;

start:
	echo "\nRunning the Application\n";
	docker exec -it onetool_php symfony server:start -d;

test:
	echo "\nRunning Tests\n";
	docker exec -it onetool_php bin/phpunit;

stop:
	echo "\nStopping the Application\n";
	docker exec -it onetool_php symfony server:stop;

clean:
	echo "\nCleaning Docker Containers...\n";
	docker-compose down;

docker-clean:
	echo "\nCleaning Docker Process...\n";
	docker system prune --all -f -a;

default:
	echo "\nThese options are available: \n\n 1. make install (installs the web application containers)\n 2. make test (starts the testing) \n 3. make start (starts the application and must run after make install) \n 4. make stop (stops the application that you run it using make start) \n 5. make clean (stops the application containers that you installed using make install) \n 6. make docker-clean (cleans the whole docker process from the system but please use with caution)\n";
