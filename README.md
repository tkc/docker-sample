

# docker training


                        ##         .
                  ## ## ##        ==
               ## ## ## ## ##    ===
           /"""""""""""""""""\___/ ===
      ~~~ {~~ ~~~~ ~~~ ~~~~ ~~~ ~ /  ===- ~~~
           \______ o           __/
             \    \         __/
              \____\_______/


## docker
https://www.docker.com/


# 概要
( pull or build ) > image > ( run ) > contena > ( update )  > ( stop ) > ( commit ) > ( push ) > ( pull ) > image  ....


## install docker machine

Docker for Mac OS X

https://docs.docker.com/


## Dockerfile

````
docker build -t docker-file .
docker images
````

## docker pull
````
docker pull reinblau/lamp
docker images
````

## images
```
docker images
```

## run
```
docker run -it -h ubuntu_host reinblau/lamp /bin/bash
docker run --name web1 -p 8001:80 -d reinblau/lamp
docker run --name web2 -p 8002:80 -d reinblau/lamp
docker run --name web3 -p 8003:80 -d reinblau/lamp
```

## IP
```
// docker-machine ip <machine name>
docker-machine ip default
```

## ps
```
docker ps     //起動中
docker ps -a  //all
```

## exec
```
docker exec -ti <id or name > bash
```

## stop
```
docker syop <id>
```

## rm

```
docker rm -f <id>
docker rm -f $(docker ps -a -q) //よく使います。
```

## commit & push
ログインが必要
```
docker commit <name  or id > <user-name/new-image-name>
```

## pull
```
docker pull <image namge>
```

## Docker Compose

```
# up
docker-compose up -d

# rm
docker-compose rm
```

## env
```
env
```

## ネットワークサンプル
```
echo env('MYSQL_PORT_3306_TCP_ADDR')
```

```
docker exec -ti laravel5 bash
mysql -u root -p -h $MYSQLTESTING_PORT_3306_TCP_ADDR --port 3306
```

## Docker HUB
https://hub.docker.com/


# docker-machineの操作

ipを指定してdocker machineを作成する。

```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.98.1/24" test-machine
docker-machine ip test-machine
#192.168.98.100
```

```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.97.1/24" test-machine
docker-machine ip test-machine
#192.168.97.100
```

machineの切替

```
docker-machine ls
eval "$(docker-machine env test-machine)"
```

```
設定ファイルの確認
~/.docker/machine/machines/test-machine
```
