CREATE DATABASE RES;

use RES ;

CREATE table
    users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        email VARCHAR(255),
        password VARCHAR(255)
    )

CREATE table
    chefs (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        age INT
    )

CREATE table
    menu (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        chef_id INT,
        Foreign Key (chef_id) REFERENCES chefs(id) ON DELETE CASCADE on UPDATE cascade
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
    Ingredients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255),
        price INT
    )

CREATE table plate_ingredients (
        id INT PRIMARY KEY AUTO_INCREMENT,
        plate_id INT,
        Foreign Key (plate_id) REFERENCES plate(id) ON DELETE CASCADE on UPDATE cascade,
        ingredient_id INT,
        Foreign Key (ingredient_id) REFERENCES ingredients(id) ON DELETE CASCADE on UPDATE cascade
    )






