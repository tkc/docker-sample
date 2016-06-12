
# Cheat Sheet

```
docker save IMAGE > filename.tar
docker load < filename.tar

```

docker-machineの切替 defaultへ切り替える

```

docker-machine ls

docker-machine env default

export DOCKER_TLS_VERIFY="1"
export DOCKER_HOST="tcp://192.168.99.100:2376"
export DOCKER_CERT_PATH="/Users/tkc/.docker/machine/machines/default"
export DOCKER_MACHINE_NAME="default"

または
eval $(docker-machine env default)
```

conf
```
docker exec -it name env
docker exec name ./artisan route:list
```

```
docker-machine create --driver virtualbox --url=tcp://192.168.99:2376 custombox
docker-machine create --driver virtualbox custombox
docker-machine create --driver virtualbox --virtualbox-hostonly-cidr "172.30.0.102/24" ip
docker-machine create --driver virtualbox --virtualbox-hostonly-cidr "192.168.59.3/24" dev
```

ipの設定に関して、
https://github.com/docker/machine/issues/1709

192.168.98.100
```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.98.1/24" m98
```
192.168.97.100
```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.97.1/24" m97
```
192.168.96.100
```
docker-machine create -d virtualbox --virtualbox-hostonly-cidr "192.168.96.1/24" m96
```

```
docker-machine active
```

```
docker-machine stop default
docker-machine start default
```

run sample
```
docker run -p 80:80 -d eboraas/laravel
docker run -p 8091:80 -v /Users/tkc/Desktop/test/:/var/www/laravel -d eboraas/laravel
```
https://docs.docker.com/engine/reference/commandline/run/


起動中のコンテナの確認
````
docker ps -a
````
https://docs.docker.com/engine/reference/commandline/ps/


```
CONTAINER ID        IMAGE                    COMMAND             CREATED             STATUS                     PORTS               NAMES
e7a782b7a588        eboraas/laravel:latest   "/bin/bash"         3 minutes ago       Exited (0) 3 minutes ago                       laravel_test
```

docker Life Cycle

```
// Run
docker run -itd -p 8001:80 -p 2222:22 --name web01 eboraas/laravel:latest

// Stop
docker stop web01

// Start
docker start web01

// Restart
docker restart web01

// Remove
docker rm web01

```

IP
```
docker-machine ip default
```

server login
```
docker exec -ti e7a782b7a588 bash
```

コンテナの停止
```
docker stop  e7a782b7a588
```

コンテナ削除
````
docker rm e7a782b7a588
````

イメージの削除
```
docker rmi 16aaebcee7eb
```

## Mysql
```
docker pull mysql
docker run --name mysqld -e MYSQL_ROOT_PASSWORD=secret -d mysql
docker run -p 80:80 -d eboraas/laravel --link  mysqld:mysql -it --rm mysql bash
```

# docker compose
```
docker-compose up -d
```

build
```
docker-compose build
```

rm
```
docker-compose rm
```

remove images
```
docker rmi [IMAGE ID]
```

ubuntu_hostというホスト名でubuntuを起動。
```
docker run -it -h ubuntu_host ubuntu:14.04 /bin/bash
```

最大メモリ使用量を256MBに制限して起動。終了したらコンテナ自動削除
```
docker run -it -m 512m --rm ubuntu:14.04 /bin/bash
```

redisというコンテナ名でコンテナをバックグラウンドで起動
```
docker run -d --name redis dockerfile/redis
```

上で作成したredisコンテナに対してdbというエイリアスをつけてコンテナ間通信
```
docker run -it --link redis:db ubuntu /bin/bash
```

6379ポートをホストにマッピング、ホストの/data/redisをコンテナの/dataにマッピング
```
docker run -d -p 6379:6379 -v /data/redis:/data --name redis dockerfile/redis
```

```
docker ps -as            # コンテナ一覧(停止コンテナ含む、サイズ表示)
docker start CONTAINER   # コンテナを起動
docker restart CONTAINER # コンテナ再起動
docker stop CONTAINER    # コンテナ終了
docker kill CONTAINER    # コンテナ強制終了
docker attach CONTAINER  # コンテナへアタッチ
docker top CONTAINER     # コンテナのプロセスを表示
docker logs -f CONTAINER # コンテナのログを表示(ログ出力をfollow)
docker inspect CONTAINER # コンテナの情報を表示
docker rm CONTAINER      # コンテナを削除
docker pull NAME[:TAG]   # コンテナイメージの取得
docker images --tree     # イメージ一覧表示（ただし,treeオプションは非推奨）
docker inspect IMAGE     # イメージの情報を表示
docker rmi IMAGE         # イメージを削除
```

dockerfileからイメージ作成
```
docker build -t NAME[:TAG] .
```

コンテナからイメージを作成
```
docker commit -m "comment" CONTAINER NAME[:TAG]
docker commit org-name user-name/new-name
```

image push
```
docker login
docker push NAME[:TAG]
```

Remove all contena
```
docker ps -q | xargs docker stop | xargs docker rm
docker rm -f $(docker ps -a -q)
```

exec
```
docker exec -ti [name] bash
```

share Directory
```
docker run -p 80:80 -v /docker/www:/var/www/html --name php -d php:5.6-apache
```

Private HUB push
```
docker commit default <user_name>/name
docker login
docker push <user_name>/name
```

command
```
env
```

php
```
echo env('MYSQL_PORT_3306_TCP_ADDR')
```

bash
```
mysql -u homestead -p -h $MYSQL_PORT_3306_TCP_ADDR --port 3306
```

Data Volume

``
Data Volume を作成したコンテナを削除(docker rm <container>)すると、
メタデータが消えて Data Volume への参照は失われますが、Data Volume の実体は削除されないようです。
どこかのタイミングで Docker によってクリアされるのかもしれませんが、今の所消えるところを確認できていません。
実運用においては、頻繁に Data Volume を作ることは通常ないと思われますが、
開発環境で実験をしたりしていると大量のゴミが溜まっていきます。
``

Docker の Data Volume まわりを整理する

http://qiita.com/lciel/items/e21a4ede3bac7fb3ec5a


その他参考

OSXでdockerを使いたいだけならVagrantを捨て
dinghyを使ってみるといいかもしれない

http://qiita.com/suin/items/c2ef8ff06b844be656cc?utm_content=bufferffdce&utm_medium=social&utm_source=facebook.com&utm_campaign=buffer