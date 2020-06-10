DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS constructors;
DROP TABLE IF EXISTS drivers;
DROP TABLE IF EXISTS standings;
DROP TABLE IF EXISTS races;
DROP TABLE IF EXISTS contact;

CREATE TABLE Users (
    id int(11) NOT NULL AUTO_INCREMENT,
    first_name  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    last_name  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    email  varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
    password varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    status ENUM('REGISTERED', 'REGISTEREDCARD', 'ATHLETE', 'ADMIN')  NOT NULL ,
    PRIMARY KEY (id),
    UNIQUE INDEX email (email) USING BTREE
);


CREATE TABLE drivers (
    id int(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    # FIXME: multiple teams?
    constructor VARCHAR(60) NOT NULL,
    nationality varchar(3),
    PRIMARY KEY (id)
);

CREATE TABLE races(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    year int(4) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE standings (
    id int(11) NOT NULL AUTO_INCREMENT,
    raceid int(11) NOT NULL,
    pos int(2) NOT NULL,
    driverid int(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (driverid) REFERENCES drivers(id) ON DELETE NO ACTION,
    FOREIGN KEY (raceid) REFERENCES races(id) ON DELETE NO ACTION
);

CREATE TABLE contact(
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    message text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    userid int(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (userid) REFERENCES Users(id) ON DELETE NO ACTION
);


CREATE TABLE photos (
    id int(11) NOT NULL AUTO_INCREMENT,
    photo_source varchar(100),
    category ENUM('WIN', 'CHAMPIONSHIP', 'HISTORIC', 'CAR'),
    PRIMARY KEY (id)
);

CREATE TABLE articles(
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    message text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    # TODO: photosource to id?
    photo_source varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    date DATE,
    PRIMARY KEY (id)
);