.DEFAULT_GOAL := default

.PHONY:
	install app-install app-create-domain app-delete-domain app-code-fix start test stop clean docker-clean default

install:
	@echo "Building Docker Containers..."
	docker-compose up -d --build;

app-install:
	@echo "Installing App Dependencies..."
	docker exec -it onetool_php composer install;

app-code-fix:
	@echo "Fixing Code to PSR2 standard"
	docker exec -it onetool_php php phpcbf.phar --standard=PSR2 src

app-create-domain:
	@echo "Creating a new Domain"
	docker exec -it onetool_php bin/console app:create:ddd $(name)

app-delete-domain:
	@echo "Deleting a Domain"
	docker exec -it onetool_php bin/console app:delete:ddd $(name)

start:
	@echo "Running the Application"
	docker exec -it onetool_php symfony server:start -d;

test:
	@echo "Running Tests"
	docker exec -it onetool_php bin/phpunit --coverage-text;

stop:
	@echo "Stopping the Application"
	docker exec -it onetool_php symfony server:stop;

clean:
	@echo "Cleaning Docker Containers..."
	docker-compose down;

docker-clean:
	@echo "Cleaning Docker Process..."
	docker system prune --all -f -a;

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
	@echo "4. make docker-clean (cleans the whole docker process from the system but please use with caution)"
	@echo ""
	@echo ""
	@echo "Application Tier"
	@echo "------------------"
	@echo ""
	@echo "1. make app-install (installs app dependencies)"
	@echo "2. make start (starts the application and must run after make install and make app-install)"
	@echo "3. make stop (stops the application that you run it using make start)"
	@echo "4. make app-create-domain name=YourBusinessDomain (creates a new DDD directory structure)"
	@echo "5. make app-delete-domain name=YourBusinessDomain (deletes a DDD directory structure)"
	@echo "6. make app-code-fix (applies coding standards to the application)"
	@echo ""
	@echo ""
	@echo "More command are currently in development"
	@echo ""
	@echo ""
	@echo "To run the application successfully, run step 1 in the infrastructure tier then run steps 1 and 2 in the application tier respectively"
	@echo ""