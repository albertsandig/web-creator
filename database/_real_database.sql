
/*--------------------- USER TYPE---------------------*/
CREATE TABLE user_type(
	type_no	       int(11) NOT NULL AUTO_INCREMENT,
	name 		   varchar(40) NOT NULL UNIQUE, 
	PRIMARY KEY (type_no)
); 

INSERT INTO user_type VALUES 
(1,'SYSADMIN'),
(2,'SUPERUSER'),
(3,'USER');

ALTER TABLE user_type ADD FULLTEXT (name);

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
    ip_address      varchar(100),
    login_attempt   int DEFAULT 0,
	verify		    boolean DEFAULT FALSE,
    is_active		boolean DEFAULT TRUE,
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (type_no) REFERENCES user_type(type_no),
	PRIMARY KEY (user_no)
);

ALTER TABLE user_info ADD FULLTEXT (email,firstname, lastname);

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
/*--------------------- MODULE ---------------------*/
CREATE TABLE modules(
	module_no	        int(11) NOT NULL AUTO_INCREMENT,
    module_serial_no 	int(11) NOT NULL UNIQUE, 
	name 		        varchar(200),
    created_by          int(11) NOT NULL,
    FOREIGN KEY (created_by) REFERENCES user_info(user_no),
	PRIMARY KEY (module_no)
); 

ALTER TABLE modules ADD FULLTEXT (name);












/*------------------- Category ---------------------*/  
CREATE TABLE category (
    category_no     int NOT NULL AUTO_INCREMENT,
	name		    varchar(200),
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    /* CREDENTIALS */
	user_no			int NOT NULL,
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
	PRIMARY KEY (category_no)
);

INSERT INTO category(
    category_no,
    name,
    user_no
) VALUES 
(1, 'UNCATEGORIZED',1),
(2, 'PRODUCT',1);
/*------------------- Post Status ---------------------*/  
CREATE TABLE status (
    status_no       int NOT NULL AUTO_INCREMENT,
	name		    varchar(200),
	PRIMARY KEY (status_no)
);

INSERT INTO status(
    status_no,
    name
) VALUES 
(1,'Published'),
(2,'Draft'),
(3,'Deleted');

/*--------------------- POST ---------------------*/   
CREATE TABLE post (
    post_no         int NOT NULL AUTO_INCREMENT,
	title		    varchar(200),
    thumbnail		varchar(200),
	content 		longtext,
    status_no       int NOT NULL DEFAULT 2,
	user_no			int NOT NULL,
	category_no		int NOT NULL,
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (status_no) REFERENCES status(status_no),
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
    FOREIGN KEY (category_no) REFERENCES category(category_no),
	PRIMARY KEY (post_no)
);

/*--------------------- MAPS -----------------------*/
CREATE TABLE coordinates (
    post_no         int NOT NULL UNIQUE,
    latitude        float,
    longitude       float,
    FOREIGN KEY (post_no) REFERENCES post(post_no)
);

/*------------------- PRODUCT AVAILABILITY ---------------------*/  
CREATE TABLE product_availability (
    availability_no     int NOT NULL AUTO_INCREMENT,
	name		        varchar(200),
    create_date         timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date         timestamp DEFAULT CURRENT_TIMESTAMP,
    /* CREDENTIALS */
	user_no			int NOT NULL,
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
	PRIMARY KEY (availability_no)
);

INSERT INTO product_availability(
    availability_no,
    name,
    user_no
) VALUES 
(1, 'Available',1),
(2, 'Unvailable',1);

/*------------------- PRODUCT CATEGORY ---------------------*/  
CREATE TABLE product_category (
    p_category_no     int NOT NULL AUTO_INCREMENT,
	name		    varchar(200),
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    /* CREDENTIALS */
	user_no			int NOT NULL,
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
	PRIMARY KEY (p_category_no)
);

INSERT INTO product_category(
    p_category_no,
    name,
    user_no
) VALUES 
(1, 'UNCATEGORIZED',1);

/*------------------- PRODUCT BRAND ---------------------*/  
CREATE TABLE product_brand (
    brand_no        int NOT NULL AUTO_INCREMENT,
	name		    varchar(200),
    create_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date     timestamp DEFAULT CURRENT_TIMESTAMP,
    /* CREDENTIALS */
	user_no			int NOT NULL,
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
	PRIMARY KEY (brand_no)
);

INSERT INTO product_brand(
    brand_no,
    name,
    user_no
) VALUES 
(1, 'BRANDED',1);

/*--------------------- PRODUCT ---------------------*/   
CREATE TABLE product (
    product_no          int NOT NULL AUTO_INCREMENT,
    is_new              boolean DEFAULT TRUE,
    thumbnail	        varchar(200),
	images              longtext, -- json_array data
    name   		        varchar(200),
    discount       	    varchar(200),
    old_price   	    double(20,2),
    price   	        double(20,2),
    currency   	        varchar(2),
	description         longtext,
    detailed_desc       longtext,
    status_no           int NOT NULL DEFAULT 2,
	user_no		        int NOT NULL,
	category_no	        int NOT NULL,
    p_category_no   	int NOT NULL,
    brand_no           	int NOT NULL,
    availability_no   	int NOT NULL DEFAULT 1,
    create_date         timestamp DEFAULT CURRENT_TIMESTAMP,
    update_date         timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (status_no) REFERENCES status(status_no),
	FOREIGN KEY (user_no) REFERENCES user_info(user_no),
    FOREIGN KEY (category_no) REFERENCES category(category_no),
    FOREIGN KEY (p_category_no) REFERENCES product_category(p_category_no),
    FOREIGN KEY (brand_no) REFERENCES product_brand(brand_no),
    FOREIGN KEY (availability_no) REFERENCES product_availability(availability_no),
	PRIMARY KEY (product_no)
);

/*--------------------- PAGE TYPE -----------------------*/
CREATE TABLE page_type (
    page_type_no    int NOT NULL AUTO_INCREMENT,
    name            varchar(200),
    PRIMARY KEY (page_type_no)
);

INSERT INTO page_type VALUES
(1, 'ARTICLES'),
(2, 'PRODUCT'),
(3, 'SINGLE'),
(4, 'TREEVIEW'),
(5, 'URL');

/*--------------------- PAGES -----------------------*/
CREATE TABLE page (
    page_no         int NOT NULL AUTO_INCREMENT,
    name            varchar(200) NOT NULL,
    url             varchar(200) NOT NULL UNIQUE,
    page_type_no    int NOT NULL,
    category_no     int DEFAULT NULL,
    p_category_no   int DEFAULT NULL,
    post_no         int DEFAULT NULL,
    order_by        varchar(4), -- ASC or DESC
    FOREIGN KEY (page_type_no) REFERENCES page_type(page_type_no),
    FOREIGN KEY (category_no) REFERENCES category(category_no),
    FOREIGN KEY (p_category_no) REFERENCES product_category(p_category_no),
    FOREIGN KEY (post_no) REFERENCES post(post_no),
    PRIMARY KEY (page_no)
);

/*--------------------- TREEVIEW -----------------------*/
CREATE TABLE page_tree_view(
    page_no_tree_view       int NOT NULL,
    page_no_under           int NOT NULL,
    FOREIGN KEY (page_no_tree_view) REFERENCES page(page_no),
    FOREIGN KEY (page_no_under) REFERENCES page(page_no),
    PRIMARY KEY (page_no_tree_view,page_no_under)
);

/*--------------------- CONFIGURATION -----------------------*/

CREATE TABLE web_configuration(
    web_configuration_no    int NOT NULL AUTO_INCREMENT,
    show_header             boolean DEFAULT true, 
    header_left             varchar(200), -- header
    header_right            varchar(200), -- header
    logo                    varchar(300), -- sub header
    bg_image                varchar(300), -- body
    default_text_color      varchar(100), -- body
    default_btn_color       varchar(100), -- body
    h_menu_bg_color         varchar(100), -- menu
    h_tag_color             varchar(100), -- header tag text 
    a_tag_color             varchar(100), -- a tag text
    a_tag_focus_color       varchar(100), -- a tag text
    a_tag_active_color      varchar(100), -- a tag text
    h_category_bg_color     varchar(100), -- category
    category_bg_color       varchar(100), -- category
    carousel                longtext, -- json--
    n_img_collection        longtext, -- json max (3)
    footer_text             varchar(200), -- footer--
    fb_link                 text,
    g_link                  text,
    twit_link               text,
    insta_link              text,
    pin_link                text,           
    page_treeview_1no       int,          -- footer
    page_treeview_2no       int,          -- footer
    FOREIGN KEY (page_treeview_1no) REFERENCES page_tree_view(page_no_tree_view),
    FOREIGN KEY (page_treeview_2no) REFERENCES page_tree_view(page_no_tree_view),
    PRIMARY KEY (web_configuration_no)
);

INSERT INTO `web_configuration` (
    `web_configuration_no`, 
    `show_header`, 
    `header_left`, 
    `header_right`, 
    `logo`, 
    `bg_image`, 
    `default_text_color`, 
    `default_btn_color`, 
    `h_menu_bg_color`, 
    `h_tag_color`, 
    `a_tag_color`, 
    `a_tag_focus_color`, 
    `a_tag_active_color`, 
    `h_category_bg_color`, 
    `category_bg_color`, 
    `carousel`, 
    `n_img_collection`, 
    `footer_text`, 
    `fb_link`, 
    `g_link`, 
    `twit_link`, 
    `insta_link`, 
    `pin_link`, 
    `page_treeview_1no`, 
    `page_treeview_2no`
) VALUES (
    '1', 
    '1', 
    'Welcome to E-shop!', 
    'Call us 223-9483 or (063) 09359430897', 
    'https://m5.paperblog.com/i/19/191593/tender-fried-chicken-and-halo-halo-sa-buko-ti-L-KNM4go.jpeg', 
    'https://c.wallhere.com/photos/ff/ca/landscape_lake_mountains_forest-92094.jpg!d', 
    '#333', 
    '#F8694A', 
    '#F8694A', 
    '#30323a54', 
    '#ffffff', 
    '#F8694A', 
    '#F8694A', 
    '#F8694A', 
    '#ffffff', 
    '[]', 
    '[]', 
    'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna', 
    NULL, 
    NULL, 
    NULL, 
    NULL, 
    NULL, 
    NULL, 
    NULL
);