
# Docker Cheat Sheet

Composer
```
docker-compose up -d
```

ps list
```
docker ps
```

IP
```
docker-machine ip default
```
images
```
docker images
```

remove images
```
docker rmi [IMAGE ID]
```

docker run [OPTIONS] IMAGE [COMMAND] [ARG...]

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