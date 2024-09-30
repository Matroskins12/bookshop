CREATE TABLE regusers(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL,
    userole ENUM('admin','client') NOT NULL
);
CREATE TABLE products(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL, 
    price INT NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL,
    author VARCHAR(100) NOT NULL,
    display ENUM('show','hide') NOT NULL
);
CREATE TABLE productbasket(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    productid INT NOT NULL,
    productquantity INT NOT NULL,
    productuserid INT NOT NULL,
    productaddtime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`productid`) REFERENCES `products`(`id`)
);
CREATE TABLE bookcomments(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    productid INT NOT NULL,
    userid INT NOT NULL,  
    username VARCHAR(100) NOT NULL,
    comment VARCHAR(255) NOT NULL,
    raiting INT NOT NULL,   
    commentime TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);
-- CREATE TABLE orderproduct(
-- 	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
--     name VARCHAR(255) NOT NULL,
--     price INT NOT NULL,
--     quantity INT NOT NULL,
--     total INT NOT NULL
-- );
