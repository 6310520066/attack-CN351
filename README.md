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

The **database** doesn't need to be created manually anymore. **Delete the old container first and then create a new one.** When you open the web page again, you can create an account right away. There won't be any duplicate email checks or easy password checks. If the website still has errors, try changing your browser or clearing the cache.


 
