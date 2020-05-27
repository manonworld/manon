.DEFAULT_GOAL := default

.PHONY: install app-install app-create-domain start test stop clean docker-clean default

install:
	@echo "Building Docker Containers..."
	docker-compose up -d --build;

app-install:
	@echo "Installing App Dependencies..."
	docker exec -it onetool_php composer install;

app-create-domain:
	@echo "Creating a new Domain"
	docker exec -it onetool_php bin/console app:create:ddd $(name)

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
	@echo ""
	@echo "1. make install (installs the web application containers)"
	@echo "2. make app-install (installs app dependencies)"
	@echo "3. make test (starts the testing)"
	@echo "4. make start (starts the application and must run after make install and make app-install)"
	@echo "5. make stop (stops the application that you run it using make start)"
	@echo "6. make clean (stops the application containers that you installed using make install)"
	@echo "7. make docker-clean (cleans the whole docker process from the system but please use with caution)"
	@echo ""
	@echo ""
	@echo "Application Tier"
	@echo "------------------"
	@echo "1. make app-create-domain name=YourBusinessDomain (creates a new DDD directory structure)"
	@echo "2. more command are currently in development"
	@echo ""
	@echo ""
	@echo ""
	@echo "To run the application successfully, run step 1, 2 and 3 respectively"
	@echo ""