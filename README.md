

# Docker Training


                        ##         .
                  ## ## ##        ==
               ## ## ## ## ##    ===
           /"""""""""""""""""\___/ ===
      ~~~ {~~ ~~~~ ~~~ ~~~~ ~~~ ~ /  ===- ~~~
           \______ o           __/
             \    \         __/
              \____\_______/


### Site

https://www.docker.com/

### Hub

https://hub.docker.com/

### Life Cycle

```
# run
docker run -itd -p 8001:80 -p 2222:22 --name web01 <name>

# start
docker start web01

# stop
docker stop web01

# restart
docker restart web01

# remove
docker rm web01

```

### Use Dockerfile
```
docker build -t docker-file .
```

### Pull Images
```
docker pull <name>
````

### Show Images
```
docker images
```

### Run Sample
```
docker run -it -h ubuntu_host reinblau/lamp /bin/bash
docker run --name web1 -p 8001:80 -d reinblau/lamp
docker run --name web2 -p 8002:80 -d reinblau/lamp
docker run --name web3 -p 8003:80 -d reinblau/lamp
```
 
### Ps
```
docker ps
docker ps -a
```

### Exec
```
docker exec -ti <name> bash
```

### Stop
```
docker stop <id>
```

### Rm

```
docker rm -f <id>
```

### Pull
```
docker pull <image namge>
```

### Compose Up

```
docker-compose up -d
```

### Compose Rm
```
docker-compose rm
```

### Show Env Value
```
echo env('MYSQL_PORT_3306_TCP_ADDR')
```

### Use Env 
```
docker exec -ti <name> bash
mysql -u root -p -h $MYSQLTESTING_PORT_3306_TCP_ADDR --port 3306
```

### Machine

```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.98.1/24" test-machine
```

### Machine IP
```
docker-machine ip <machine name>
```

### Change Machine

```
docker-machine ls
eval "$(docker-machine env test-machine)"
```

### Kill all containers
```
docker kill $(docker ps -q)
```

### Remove all containers
```
docker rm $(docker ps -a -q)
```

### Remove all networks
```
docker network rm $(docker network ls | grep "bridge" | awk '/ / { print $1 }')
```

### Run Example

```
docker run -it -h ubuntu_host ubuntu:14.04 /bin/bash
```

```
docker run -it -m 512m --rm ubuntu:14.04 /bin/bash
```

```
docker run -d --name redis dockerfile/redis
```

```
docker run -d -p 6379:6379 -v /data/redis:/data --name redis dockerfile/redis
```

##  MySQL Example

```
docker pull mysql
docker run --name mysqld -e MYSQL_ROOT_PASSWORD=secret -d mysql
docker run -p 80:80 -d eboraas/laravel --link mysqld:mysql -it --rm mysql bash
```
