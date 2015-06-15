--LELIVRE DATABASE SCHEMA - COEN280 PROJECT - GROUP 8 - KARTHIK & ZHEN

START TRANSACTION;

CREATE TABLE AUTHOR
(
  A_Name varchar(50) NOT NULL,
  Birth_Date date,
  Birth_Place varchar(60),
  Biography varchar(2000),
  A_id serial NOT NULL,
  PRIMARY KEY (A_id)
);

CREATE TABLE PUBLISHING_HOUSE
(
  P_Name varchar(60) NOT NULL,
  Address varchar(60),
  PRIMARY KEY (P_Name)
);

CREATE TYPE book_type AS enum ('Hardcover', 'Paperback', 'Ebook');
CREATE TABLE BOOK
(
  ISBN character(14) NOT NULL,
  Title varchar(100) NOT NULL,
  Year integer,
  Price numeric(8,2) NOT NULL,
  Type book_type NOT NULL,
  Stock integer,
  P_House varchar(60) NOT NULL,
  Preview varchar(2000),
  PRIMARY KEY (ISBN),
  FOREIGN KEY (P_House) 
  	REFERENCES PUBLISHING_HOUSE (P_Name)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE BOOK_AUTHOR
(
  ISBN character(14) NOT NULL,
  A_id integer,
  FOREIGN KEY (A_id)
  	REFERENCES AUTHOR (A_id)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (ISBN)
  	REFERENCES BOOK (ISBN)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE CUSTOMER
(
  Username varchar(20) NOT NULL,
  Email varchar(30) NOT NULL,
  Password varchar(20) NOT NULL,
  C_Name varchar(50) NOT NULL,
  Birth_Date date,
  PRIMARY KEY (Username)
);

CREATE TABLE CART
(
  Username varchar(20),
  ISBN character(14),
  Quantity integer,
  FOREIGN KEY (ISBN)
  	REFERENCES BOOK (ISBN)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (Username)
  	REFERENCES CUSTOMER (Username)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TYPE card_type AS enum ('visa','master','discover');
CREATE TABLE CREDITCARD
(
  Holder_Name varchar(50) NOT NULL,
  Type card_type NOT NULL,
  BillingAddress varchar(60) NOT NULL,
  Username varchar(20) NOT NULL,
  Card_no character(16) NOT NULL,
  Exp_Date date NOT NULL,
  PRIMARY KEY (Card_no),
  FOREIGN KEY (Username)
  	REFERENCES CUSTOMER (Username)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE GENRE
(
  G_Name varchar(25) NOT NULL,
  PRIMARY KEY (G_Name)
);

CREATE TABLE GENRE_BOOK
(
  G_Name varchar(25),
  ISBN character(14),
  FOREIGN KEY (G_Name)
  	REFERENCES GENRE (G_Name)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (ISBN)
  	REFERENCES BOOK (ISBN)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE GENRE_CUSTOMER
(
  G_Name varchar(25),
  Username varchar(20),
  FOREIGN KEY (G_Name)
  	REFERENCES GENRE (G_Name)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (Username)
  	REFERENCES CUSTOMER (Username)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TYPE rating AS enum ('1','2','3','4','5');
CREATE TABLE REVIEW_AUTHOR
(
  Username varchar(20),
  A_id integer,
  Review varchar(400),
  Rating rating,
  Review_id serial NOT NULL,
  PRIMARY KEY (Review_id),
  FOREIGN KEY (A_id)
  	REFERENCES AUTHOR (A_id)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (Username)
  	REFERENCES CUSTOMER (Username)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE REVIEW_BOOK
(
  Username varchar(20),
  ISBN character(14),
  Review varchar(400),
  Rating rating,
  Review_id serial NOT NULL,
  PRIMARY KEY (Review_id),
  FOREIGN KEY (ISBN)
  	REFERENCES BOOK (ISBN)
  	ON UPDATE NO ACTION ON DELETE NO ACTION,
  FOREIGN KEY (Username)
  	REFERENCES CUSTOMER (Username)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE TRANSACTION
(
  Username varchar(20) NOT NULL,
  Order_id integer NOT NULL,
  ISBN character(14) NOT NULL,
  Quantity integer NOT NULL,
  Checkout_Price numeric(8,2) NOT NULL,
  Card_no character(16) NOT NULL,
  Date_time timestamp without time zone,
  Transaction_id serial NOT NULL,
  PRIMARY KEY (Transaction_id),
  FOREIGN KEY (Card_no)
  	REFERENCES CREDITCARD (Card_no)
  	ON UPDATE NO ACTION ON DELETE NO ACTION
);

COMMIT;
