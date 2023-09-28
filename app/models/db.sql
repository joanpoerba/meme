-- Active: 1650355398407@@127.0.0.1@3306@meme
USE meme;
SHOW TABLES;
DROP TABLE usersData;
CREATE TABLE user(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(12) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL UNIQUE,
  accountDescription TEXT,
  pronunciation VARCHAR(10),
  photoProfil BLOB
);
CREATE TABLE post(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  userId INT NOT NULL,
  image BLOB,
  postDescription TEXT,
  dateTime DATETIME,
  CONSTRAINT fk_user FOREIGN KEY (userId) REFERENCES user(id)
);
ALTER TABLE post MODIFY dateTime DATETIME DEFAULT NOW();
ALTER TABLE post MODIFY username VARCHAR(255) NOT NULL AFTER id;
ALTER TABLE post DROP COLUMN userId;
ALTER TABLE post DROP CONSTRAINT fk_user;
ALTER TABLE post ADD CONSTRAINT fk_user FOREIGN KEY (userId) REFERENCES user(id);
ALTER TABLE post ADD userId INT NOT NULL AFTER id;
SELECT * FROM user;
DESC user;
CREATE TABLE post(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  userId INT NOT NULL,
  image BLOB,
  postDescription TEXT,
  dateTime DATETIME DEFAULT NOW(),
  CONSTRAINT fk_user FOREIGN KEY (userId) REFERENCES user(id)
);
DROP TABLE user;
SELECT post.id, post.userId, post.image, post.postDescription, post.dateTime FROM post WHERE post.userId = 8;
DELETE FROM user WHERE username = 'bob';
SELECT * FROM user;
UPDATE user SET pronunciation = 'he/him' WHERE id = 1;
SELECT post.id, post.userId, post.image, post.postDescription, post.dateTime FROM post WHERE post.id = 1 ORDER BY post.dateTime DESC;