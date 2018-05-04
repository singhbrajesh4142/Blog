
/* to create users table */

CREATE table users(
	id int(11) not null primary key AUTO_INCREMENT,
    user_name varchar(255) not null,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    gender varchar(10) not null,
    mobile_no varchar(10) NOT null,
    email varchar(255) not null,
    password varchar(255) not null
);

/* create a table for confession */
CREATE table confession(
	id int(11) not null primary key AUTO_INCREMENT,
    owner_id varchar(255) not null,
	create_time datetime not null,
	message text not null 
);

/* create a table for post */
CREATE TABLE post (
id int(11)not null primary key AUTO_INCREMENT,
post_create_time datetime not null,
post_owner_id varchar(255) not null,
post_owner_name varchar(255) not null,
post_msg text 
);


/* create a table for message */
create table message(
    id int(11) not null primary key AUTO_INCREMENT,
    msg_create_time datetime not null,
    msgfrom varchar(255) not null,
    msgto varchar(255) not null,
    msg text not null
);

create table profileimg(
id int(11) not null primary key AUTO_INCREMENT,
uid varchar(255) not null,
status int(1) not null default 0,
img text 
);

create table tbl_resume(
id int(11) not null primary key AUTO_INCREMENT,
user_id varchar(255) not null,
status int(1) not null default 0,
resume_file text not null
);


/* create a table for chat box */
create table chat(
id int(11) not null primary key AUTO_INCREMENT,
username varchar(255) not null,
msg text not null
);