--sudo mysql
--create user gestor@localhost identified by 'abc123.';
--create database review;
--use review;
--grant all privileges on review.* to gestor@localhost;


use review;

create table category(id int auto_increment primary key, name varchar(200));
create table product(id int auto_increment primary key, name varchar(200) not null, 
description varchar(250), picture varchar(250), idCategory int not null,
 foreign key (idCategory) references category(id));
create table user(id int auto_increment primary key, dni varchar(200) not null, 
name varchar (250) not null, address varchar (250),
login varchar (250), password varchar (250), admin boolean default 0 not null);

insert into category(id, name) values(1, 'Moda');
insert into category(id, name) values(2, 'Alimentacion');
insert into category(id, name) values(3,'Drogueria');

insert into product(name, description, idCategory) 
values('Roupa','Diferentes prendas de roupa',1);
insert into product(name, description, idCategory) 
values('Comida','Diferentes alimentos',2);
insert into product(name, description, idCategory) 
values('Perfumes','Diferentes perfumes',3);