# create users table and insert data
CREATE TABLE users (username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255));

INSERT INTO users (username, password)
    VALUES ("Amelia-Earhart", "Youaom139&yu7");

INSERT INTO users (username, password)
    VALUES ("Otto", "StarWars2*"); 

# create ratings table and insert data
CREATE TABLE ratings (id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    song VARCHAR(255),
    rating INTEGER);

INSERT INTO ratings (username, song, rating)
    VALUES ("Amelia-Earhart", "Freeway", 3);

INSERT INTO ratings (username, song, rating)
    VALUES ("Amelia-Earhart", "Days of Wine and Roses", 4); 

INSERT INTO ratings (username, song, rating)
    VALUES ("Otto", "Days of Wine and Roses", 5);

INSERT INTO ratings (username, song, rating)
    VALUES ("Amelia-Earhart", "These Walls", 4); 

# create artists table
CREATE TABLE artists (song VARCHAR(255) PRIMARY KEY,
    artist VARCHAR(255));

INSERT INTO artists (song,artist)
    VALUES ("Freeway", "Aimee Mann");

INSERT INTO artists (song,artist)
    VALUES ("Days of Wine and Roses", "Bill Evans"); 

INSERT INTO artists (song,artist)
    VALUES ("These Walls", "Kendrick Lamar");

