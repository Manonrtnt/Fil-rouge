-- restart database --
DROP DATABASE IF EXISTS fil_rouge;
CREATE DATABASE fil_rouge CHARACTER SET utf8 COLLATE utf8_general_ci;

use fil_rouge;

create table right_user (
	id_right int auto_increment primary key not null, 
    name_right varchar(15)
);

create table users (
	id_user int auto_increment primary key not null, 
    name_user varchar(30),
    first_name_user varchar(30),
    login_user varchar(30),
    email_user varchar(50),
    password_user varchar(100),
    
    id_right int not null,
    constraint fk_right_user foreign key(id_right) references right_user(id_right)
);

create table alert_threshold (
	id_threshold int auto_increment primary key not null, 
    date_threshold datetime, 
    minimum_threshold tinyint,
    maximum_threshold tinyint,
    
    id_user int not null, 
    constraint fk_user_threshold foreign key(id_user) references users(id_user)
);

create table sensor (
	id_sensor int auto_increment primary key not null,
    name_sensor varchar(20),
	function_sensor varchar(30)
);

create table record_data (
	id_record int auto_increment primary key not null,
    date_record date,
    time_record time,
    data_record tinyint,

    id_sensor int not null, 
    constraint fk_sensor_data foreign key(id_sensor) references sensor(id_sensor)
);

create table to_compare (
	id_threshold int not null, 
    id_record int not null, 
    
    constraint fk_threshold_compare foreign key(id_threshold) references alert_threshold(id_threshold),
    constraint fk_record_data_compare foreign key(id_record) references record_data(id_record)
);