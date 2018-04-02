/*--------------------- USER TYPE---------------------*/
CREATE TABLE user_type(
	type_no	int(11) NOT NULL AUTO_INCREMENT,
	name 		varchar(40) NOT NULL UNIQUE,
	PRIMARY KEY (type_no)
); 

INSERT INTO user_type VALUES 
(1,'SUPERUSER'),
(2,'USER');

/*--------------------- USER INFO---------------------*/
CREATE TABLE user_info (
	/* CREDENTIALS */
	user_no			int NOT NULL AUTO_INCREMENT,
	email 			varchar(40) NOT NULL UNIQUE,
	password 		varchar(40) NOT NULL ,
	type_no 			int(11) NOT NULL,
	/* USER INFORMATION*/
	firstname		varchar(100),
	lastname		varchar(100),
	birthday		date,
	gender		    varchar(10),
	address		    varchar(100),
	mobile_number    varchar(20),
	img_source	    text,
	is_online	    boolean DEFAULT FALSE,
    login_attempt   int DEFAULT 0,
	verify		    boolean DEFAULT FALSE,
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (type_no) REFERENCES user_type(type_no),
	PRIMARY KEY (user_no)
);

INSERT INTO user_info (
    /* CREDENTIALS */
    email 			,
    password 	    ,	
    type_no 		,
    /* USER INFORM */
    firstname		,
    lastname		,
    birthday		,
    gender		    ,
    address		    ,
    mobile_number   
) VALUES(
    'albert.sandig1@gmail.com',
    md5('Machinedoll123'),
    1,
    'ALBERT',
    'SANDIG',
    '1995-11-15',
    'MALE',
    'Prk. 8 Canaway, I.C',
    '09359430897'
);
    
    
    