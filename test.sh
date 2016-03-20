docker-compose rm
docker-compose up -d
docker exec -ti laravel5 bash
mysql -u homestead -p -h $MYSQLTESTING_PORT_3306_TCP_ADDR --port 3306
mysql -u root -p -h $MYSQLTESTING_PORT_3306_TCP_ADDR --port 3306
CREATE DATABASE test1;
