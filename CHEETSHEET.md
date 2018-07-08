# Cheat Sheet

### Run 
```
docker run -p 80:80 -d <iamge name>
```

### Ps 

````
docker ps -a
````

### Bash

```
docker exec -ti <name> bash
```

### Ip
```
docker-machine ip default
```

### Start
```
docker start <id/name>
```

### Restart
```
docker restart <id/name>
```

### Logs
```
docker logs <id/name>
```

### Inspect
```
docker inspect <id/name>
```

### Stop
```
docker stop <id/name>
```

###  Remove Container
````
docker rm <id/name>
````

###  Remove Image
```
docker rmi <id/name
```

### Compose Up
``` 
docker-compose up -d
```

### Compose Build
```
docker-compose build
```

### Compose Rm Container
```
docker-compose rm <nam>
```

### Compose Rm Image
```
docker rmi <name>
```

### Mount
```
docker run -p 80:80 -v /docker/www:/var/www/html --name test -d php:5.6-apache
```

### Commit image
```
docker commit -m "comment" CONTAINER NAME[:TAG]
docker commit containerName userName/imageName
```

### Push image
```
docker login
docker push NAME[:TAG]
```

### Save as tar
```
docker save IMAGE > filename.tar
docker load < filename.tar
```
