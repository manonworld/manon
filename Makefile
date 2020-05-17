install:
	echo "\nBuilding Docker Containers...\n";
	docker-compose up -d --build;

start:
	echo "\nRunning the Application\n";
	docker exec -it onetool_php symfony server:start -d;

stop:
	echo "\nStopping the Application\n";
	docker exec -it onetool_php symfony server:stop;

clean:
	echo "\nCleaning Docker Containers...\n";
	docker-compose down;

docker-clean:
	echo "\nCleaning Docker Process...\n";
	docker system prune --all -f -a;
