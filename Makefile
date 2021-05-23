.DEFAULT_GOAL := default

.PHONY:
	install appinstall appuninstall domain deldomain fix start test stop restart clean dockerclean default;

install:
	@echo "Building Docker Containers...";
	@docker-compose down --remove-orphans;
	@docker-compose up -d --build;

appinstall:
	@echo "Installing App Dependencies...";
	@docker exec -it onetool_php bash -c "cd /var/www/html && php ./composer.phar install";

appuninstall:
	@echo "Uninstalling App Dependecies...";
	@docker exec -it onetool_php rm -R vendor;

fix:
	@echo "Fixing Code to PSR2 standard...";
	@docker exec -it onetool_php php phpcbf.phar --standard=PSR2 src;

domain:
	@echo "Creating a new Domain...";
	@docker exec -it onetool_php bin/console app:create:ddd $(name);

deldomain:
	@echo "Deleting a Domain...";
	@docker exec -it onetool_php bin/console app:delete:ddd $(name);

restart:
	@echo "Installing App Dependencies...";
	@docker exec -it onetool_php symfony server:stop;
	@docker exec -it onetool_php bin/console cache:clear --env=prod;
	@docker exec -it onetool_php bin/console cache:clear --env=dev;
	@docker exec -it onetool_php symfony server:start -d;

start:
	@echo "Running the Application...";
	@docker exec -it onetool_php symfony server:start -d;

log:
	@echo "Tailing the Log...";
	@docker exec -it onetool_php symfony server:log;

test:
	@echo "Running Tests...";
	@docker exec -it onetool_php bin/phpunit --coverage-text;

stop:
	@echo "Stopping the Application...";
	@docker exec -it onetool_php symfony server:stop;

clean:
	@echo "Cleaning Docker Containers..."
	@docker-compose down;

dockerclean:
	@echo "Cleaning Docker Process..."
	@docker system prune --all -f -a;

release:
	@echo "Making a New Release...";
	@./rmt.phar release;

meinphp:
	@echo "Entering PHP Container...";
	@docker exec -it onetool_php sh;

default:
	@echo ""
	@echo ""
	@echo "These options are available:"
	@echo ""
	@echo "Infrastructure Tier"
	@echo "--------------------"
	@echo ""
	@echo "1. make install (installs the web application containers)"
	@echo "2. make test (starts the testing)"
	@echo "3. make clean (stops the application containers that you installed using make install)"
	@echo "4. make dockerclean (cleans the whole docker process from the system but please use with caution)"
	@echo "5. make meinphp (logs you in the php container)"
	@echo ""
	@echo ""
	@echo "Application Tier"
	@echo "------------------"
	@echo ""
	@echo "1. make appinstall (installs app dependencies)"
	@echo "2. make start (starts the application and must run after make install and make app-install)"
	@echo "3. make stop (stops the application that you run it using make start)"
	@echo "4. make restart (restarts the application)"
	@echo "5. make test (starts the application testing)"
	@echo "6. make domain name=YourBusinessDomain (creates a new DDD directory structure)"
	@echo "7. make deldomain name=YourBusinessDomain (deletes a DDD directory structure)"
	@echo "8. make fix (applies coding standards to the application)"
	@echo ""
	@echo ""
	@echo "More command are currently in development"
	@echo ""
	@echo ""
	@echo "To run the application successfully, run step 1 in the infrastructure tier then run steps 1 and 2 in the application tier respectively"
	@echo ""
