
# docker


                        ##         .
                  ## ## ##        ==
               ## ## ## ## ##    ===
           /"""""""""""""""""\___/ ===
      ~~~ {~~ ~~~~ ~~~ ~~~~ ~~~ ~ /  ===- ~~~
           \______ o           __/
             \    \         __/
              \____\_______/


## install Docker for Mac OS X
https://docs.docker.com/


laravelの環境をつくりたい。
mysqlのroot/passを決めたい。

docker pull eboraas/laravel


# docker HUB
https://hub.docker.com/

## docker laravel sample

```
# https://hub.docker.com/r/eboraas/laravel/
```

```
# docker images
```

```
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
eboraas/laravel     latest              16aaebcee7eb        13 months ago       404.5 MB
```

起動
```
# docker run -p 80:80 -d eboraas/laravel
# docker run -p 8091:80 -v /Users/tkc/Desktop/test/:/var/www/laravel -d eboraas/laravel
# docker run -p 8092:80 -v /Users/tkc/Desktop/test/:/var/www/laravel -d eboraas/laravel
```
run reference
https://docs.docker.com/engine/reference/commandline/run/

起動中のコンテナの確認

````
# docker ps -a
````

ps reference
https://docs.docker.com/engine/reference/commandline/ps/


```
CONTAINER ID        IMAGE                    COMMAND             CREATED             STATUS                     PORTS               NAMES
e7a782b7a588        eboraas/laravel:latest   "/bin/bash"         3 minutes ago       Exited (0) 3 minutes ago                       laravel_test
```

コンテナの起動
```
# docker start e7a782b7a588
```

IPデフォルト確認
```
docker-machine ip default
```

server login
```
# docker exec -ti e7a782b7a588 bash
```

コンテナの停止
```
# docker stop  e7a782b7a588
```

コンテナ削除
````
# docker rm e7a782b7a588

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

# Composer
```
docker-compose up -d
```

remove images
```
docker rmi [IMAGE ID]
```

例: ubuntu_hostというホスト名でubuntuを起動。
```
docker run -it -h ubuntu_host ubuntu:14.04 /bin/bash
```

例: 最大メモリ使用量を256MBに制限して起動。終了したらコンテナ自動削除
```
docker run -it -m 512m --rm ubuntu:14.04 /bin/bash
```

例: redisというコンテナ名でコンテナをバックグラウンドで起動
(コンテナ名はLink,マウント機能で利用)
```
docker run -d --name redis dockerfile/redis
```

例: 上で作成したredisコンテナに対してdbというエイリアスをつけてコンテナ間通信
```
docker run -it --link redis:db ubuntu /bin/bash
```

例: 6379ポートをホストにマッピング、ホストの/data/redisをコンテナの/dataにマッピング
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
docker pull NAME[:TAG]
docker images --tree     # イメージ一覧表示（ただし,treeオプションは非推奨）
docker inspect IMAGE     # イメージの情報を表示
docker rmi IMAGE         # イメージを削除
```

dockerfileからイメージ作成
```
docker build -t NAME[:TAG] .
```

またはコンテナからイメージを作成
```
docker commit -m "comment" CONTAINER NAME[:TAG]
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

server longin
```
docker exec -ti [name] bash
```

share Directory
```
docker run -p 80:80 -v /docker/www:/var/www/html --name php -d php:5.6-apache
```

image install
```
docker run -d php:5.6-apache
```


参考
Dockerコンテナ内にmysqlサーバを立てる
http://qiita.com/gologo13/items/1bdba6085ec79153bf1a

Dockerでmysqlサーバコンテナへ別のコンテナからアクセスする
http://j-caw.co.jp/blog/?p=1583

[docker] Docker ComposeでMySQLを使う
http://modegramming.blogspot.jp/2015/05/docker-docker-composemysql.html

Ansible Docker Connection Pluginを使う
http://tdoc.info/blog/2015/12/03/docker_connection_plugin.html
