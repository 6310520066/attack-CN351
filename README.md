# attack-CN351

## Member list
* 6310520066 - กันตภณ มากวงค์ - 6310520066@student.tu.ac.th
* 6310610958 - วริยา กิตติวัฒนะโชค - 6310610958@student.tu.ac.th
* 6310610982 - ซาบีน่า ลีเวลลีน - 6310610982@student.tu.ac.th
* 6310682635 - ณัฐณิชา ฟักสังข์ - 6310682635@student.tu.ac.th

## About Project
Attack demo is the assignment for CN351 Web Application Security.

### Built With

* [Docker](https://docs.docker.com/engine/install/)
* [MariaDB](https://mariadb.org)
* [PHP](https://www.php.net)

### Requirements

1. Choose 3 methods in chapter 21 from D. Stuttard and M. Pinto, "The Web Application Hacker's Handbook", 2E.
2. Implement and demonstrate your chosen methods.

## Getting Started

### Installation

1. Open terminal
2. Clone the repo
    ```sh
    git clone https://github.com/6310520066/attack-CN351.git
    ```
3. Change directory to **"attack-CN351"** directory
4. Run command 
    ```sh
    docker-compose up -d
    ```

## Usage

by using this container, make sure port number 8001, 8002 is available

1. Access wep app across [Web](http://localhost:8001) (`http://localhost:8001`)
2. Access database across [Database](http://localhost:8002) (`http://localhost:8002`)

    login to manage DB with username: db_user, password: db_pw

3. Drop php file into **"webroot"** directory

The **database** doesn't need to be created manually anymore. **Delete the old container first and then create a new one.** When you open the web page again, you can create an account right away. There won't be any duplicate email checks or easy password checks. If the website still has errors, try changing your browser or clearing the cache.
