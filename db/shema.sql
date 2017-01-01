CREATE TABLE users
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	login_name VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	UNIQUE (email),
	full_name VARCHAR(128),
	created TIMESTAMP,
	user_level INT NOT NULL
);

CREATE TABLE products
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	code VARCHAR(128),
	UNIQUE (code),
	title VARCHAR(256) NOT NULL,
	details VARCHAR(1024),
	
	image1 BLOB,
	image2 BLOB,
	image3 BLOB,
	image4 BLOB,

	minimum_bid INT DEFAULT 0,
	minimum_increment INT DEFAULT 0,
	
	highest_bid INT DEFAULT 0,
	highest_bidder_id INT,
	winner_id INT,

	start_date TIMESTAMP NOT NULL,
	end_date TIMESTAMP NOT NULL,

	created_by INT,
	create_time TIMESTAMP
);

CREATE TABLE categories
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(64) NOT NULL,
	UNIQUE (name)
);

CREATE TABLE product_categories
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	product_id INT NOT NULL,
	category_id INT NOT NULL,
	UNIQUE(product_id, category_id)
);

CREATE TABLE bids
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	product_id INT NOT NULL,
	user_id INT NOT NULL,
	bid_time TIMESTAMP NOT NULL,
	bid_amount INT
);

CREATE TABLE bookmarks
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	product_id INT NOT NULL,
	user_id INT NOT NULL
);