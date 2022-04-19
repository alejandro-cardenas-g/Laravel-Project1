CREATE DATABASE IF NOT EXISTS laravelp1;

USE laravelp1;

CREATE TABLE IF NOT EXISTS users(

    id                  int(255)    AUTO_INCREMENT NOT NULL,
    role                VARCHAR(20),
    name                VARCHAR(100),
    surname             VARCHAR(200),
    nick                VARCHAR(100),
    email               VARCHAR(255),
    password            VARCHAR(200),
    image               VARCHAR(255),
    created_at          DATETIME,
    updated_at          DATETIME,
    remember_token      VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY(id)

)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS images(

    id                  int(255) AUTO_INCREMENT NOT NULL,
    user_id             int(255) NOT NULL,
    img_path            VARCHAR(255),
    description         TEXT,
    created_at          DATETIME,
    updated_at          DATETIME,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)

)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comments(

    id                  int(255) AUTO_INCREMENT NOT NULL,
    user_id             int(255) NOT NULL,
    image_id            int(255),
    content             TEXT,
    created_at          DATETIME,
    updated_at          DATETIME,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comments(

    id                  int(255) AUTO_INCREMENT NOT NULL,
    user_id             int(255) NOT NULL,
    image_id            int(255),
    content             TEXT,
    created_at          DATETIME,
    updated_at          DATETIME,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS likes(

    id                  int(255) AUTO_INCREMENT NOT NULL,
    user_id             int(255) NOT NULL,
    image_id            int(255),
    created_at          DATETIME,
    updated_at          DATETIME,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE=InnoDB;


INSERT INTO users VALUES (NULL, 'USER','ALEJANDRO','CARDENAS','CARDENAS','alejocardenass07@gmail.com','password', NULL, CURTIME(),CURTIME(), NULL );
INSERT INTO users VALUES (NULL, 'USER','ANDRES','BONILLA','BONI','bonilla@gmail.com','password', NULL, CURTIME(),CURTIME(), NULL );
INSERT INTO users VALUES (NULL, 'USER','ANGIE','VARGAS','ANGIE','angie@gmail.com','password', NULL, CURTIME(),CURTIME(), NULL );



INSERT INTO images VALUES(NULL,1,'test.jpg','Descripción de prueba 1', CURTIME(),CURTIME());
INSERT INTO images VALUES(NULL,1,'test2.jpg','Descripción de prueba 2', CURTIME(),CURTIME());
INSERT INTO images VALUES(NULL,1,'test3.jpg','Descripción de prueba 3', CURTIME(),CURTIME());
INSERT INTO images VALUES(NULL,3,'familia.jpg','Descripción de familia', CURTIME(),CURTIME());



INSERT INTO comments VALUES (NULL,1,4,'Buenas foto de familia', CURTIME(),CURTIME());
INSERT INTO comments VALUES (NULL,2,1,'Buenas foto', CURTIME(),CURTIME());
INSERT INTO comments VALUES (NULL,2,3,'Buenas foto X2', CURTIME(),CURTIME());



INSERT INTO likes VALUES(NULL, 1,1, CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL, 1,4, CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL, 3,1, CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL, 3,2, CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL, 2,3, CURTIME(),CURTIME());