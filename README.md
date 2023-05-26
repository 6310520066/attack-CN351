# attack-CN351

### Run this web with container using Docker
1. Open terminal/ command line
2. Change directory to **"attack-CN351"** directory
3. Run command 

```
docker-compose up -d
```

by using this container, make sure port number 8001, 8002 is available

4. Access wep app across [Web](http://localhost:8001) (`http://localhost:8001`)
5. Access database across [Database](http://localhost:8002) (`http://localhost:8002`)

login to manage DB with username: db_user, password: db_pw

6. Drop php file into **"webroot"** directory
7. TO PREPARE USERDATABASE **IMPRTANT** import file 'user.csv' to mariaDB 

with http://localhost:8002 username: db_user, password: db_pw 

onleftside select tab login_db select table 'user' and im port 'user.csv' select format 'CSV' then click import

After you edit code or add user, export database with csv format then upload it to github (increasing number after file name)
