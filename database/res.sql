CREATE DATABASE RES;

use restaurant ;


CREATE table
    role (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255)
    )

CREATE table
    users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255),
        role_id int,
        Foreign Key (role_id) REFERENCES role(id)
    )

CREATE table
    menu (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        chef_id INT,
        Foreign Key (chef_id) REFERENCES users(id) ON DELETE CASCADE on UPDATE cascade
    )

    CREATE table
    plate (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        menu_id INT,
        price INT,
        Foreign Key (menu_id) REFERENCES menu(id) ON DELETE CASCADE on UPDATE cascade
    )




    CREATE table
    orders (
        id INT PRIMARY KEY AUTO_INCREMENT,
        client_id INT,
        Foreign Key (client_id) REFERENCES users(id) ON DELETE CASCADE on UPDATE cascade
    )



  CREATE table
    commend (
        id INT PRIMARY KEY AUTO_INCREMENT,
        quantity VARCHAR(255),
        plate_id INT,
        order_id INT ,
        client_id INT ,
        Foreign Key (plate_id) REFERENCES plate(id) ON DELETE CASCADE on UPDATE cascade,
        Foreign Key (order_id) REFERENCES orders(id) ON DELETE CASCADE on UPDATE cascade,
        Foreign Key (client_id) REFERENCES users(id) ON DELETE CASCADE on UPDATE cascade
    )








