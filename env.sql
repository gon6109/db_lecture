DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS task;
DROP TABLE IF EXISTS status;
DROP TABLE IF EXISTS comment;

CREATE TABLE user
(
    id int auto_increment primary key,
    name varchar(50) not null,
    mail_address varchar(50) not null,
    user_type varchar(10) not null,
    password varchar(50) not null
);

INSERT INTO user(mail_address, name,user_type, password) VALUES ('admin', 'name','MANAGER', 'admin');
INSERT INTO user(mail_address, name,user_type, password) VALUES ('aaa@aaa.aaa', 'A','GUEST', 'aaa');
INSERT INTO user(mail_address, name,user_type, password) VALUES ('bbb@bbb.bbb', 'B','GUEST', 'bbb');

CREATE TABLE task
(
    id int auto_increment primary key, 
    title varchar(10) not null, 
    create_date date not null, 
    update_date date not null,
    deadline date, 
    priority int, 
    progress int, 
    user_id int, 
    status_id int,
    detail text
);

Create TABLE comment
(
    id int auto_increment primary key, 
    task_id int not null,
    comment text,
    create_date date not null
);

CREATE TABLE status
(
    id int auto_increment primary key,
    name varchar(20) not null
);

INSERT INTO status(name) VALUES ('new');
INSERT INTO status(name) VALUES ('in progress');
INSERT INTO status(name) VALUES ('resolved');
INSERT INTO status(name) VALUES ('feedback');
INSERT INTO status(name) VALUES ('close');

