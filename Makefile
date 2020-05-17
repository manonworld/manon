install:
	echo "\nBuilding Docker Containers...\n";
	docker-compose up -d --build;

clean:
	echo "\nCleaning Docker Containers...\n";
	docker-compose down;

clean-docker:
	echo "\nCleaning Docker Process...\n";
	docker system prune --all -f -a;
