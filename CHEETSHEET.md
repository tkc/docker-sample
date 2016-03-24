
# Cheat Sheet

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