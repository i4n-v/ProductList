DROP DATABASE IF EXISTS PRODUCT_LIST;
CREATE DATABASE PRODUCT_LIST;
USE PRODUCT_LIST;

CREATE TABLE USERS(
  USER_ID INT NOT NULL AUTO_INCREMENT,
  USER_NAME VARCHAR(45) NOT NULL,
  USER_EMAIL VARCHAR(45) NOT NULL UNIQUE,
  USER_PASSWORD VARCHAR(255) NOT NULL,
  CONSTRAINT USER_PK PRIMARY KEY (USER_ID)
);

CREATE TABLE PRODUCTS(
  PROD_ID INT NOT NULL AUTO_INCREMENT,
  PROD_DESC VARCHAR(255) NOT NULL,
  PROD_QUANTITY INT NOT NULL,
  PROD_VALUE DOUBLE NOT NULL,
  PROD_USER_ID INT NOT NULL,
  CONSTRAINT PROD_PK PRIMARY KEY (PROD_ID),
  CONSTRAINT PROD_USER_FK FOREIGN KEY (PROD_USER_ID) REFERENCES USERS (USER_ID)
);