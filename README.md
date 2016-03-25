

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
(pull or build) > image > (run) > contena > (update)  > (stop) > (commit) > (push) > (pull) > image  ....


## install docker machine

Docker for Mac OS X

https://docs.docker.com/


## コンテナとは？

```
コンテナとはハイレベルから見ると軽量VMにみえます。
プロセスが隔離されているしネットワークも独自に振られていて、
リソースも分離されているしrootとして実行する。

chrootに近い、
chrootとは、UNIXオペレーティングシステムにおいて、
現在のプロセスとその子プロセス群に対してルートディレクトリを変更する操作である。
例えば1GBのOSを10個動かそうとすれば、
仮想マシンではディスクスペースはOSが10個分で10GBを使いますが、
Dockerなら親のOSイメージを共有する為に1つ分の1GBで済む。
```

## Dockerfile sample


````
docker build -t docker-file .
docker images
````

## docker pull sample
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

## ネットワークサンプル laravel
```
echo env('MYSQL_PORT_3306_TCP_ADDR')
```

```
docker exec -ti laravel5 bash
mysql -u root -p -h $MYSQLTESTING_PORT_3306_TCP_ADDR --port 3306
```

## Docker HUB
https://hub.docker.com/


