create schema test1 collate utf8_general_ci;

use test1;

create table clients
(
  id int unsigned auto_increment
    primary key,
  name varchar(255) not null,
  email varchar(255) not null,
  password varchar(255) not null,
  constraint clients_email_unique
    unique (email)
);

create table orders
(
  id int unsigned auto_increment
    primary key,
  client_id int unsigned null,
  some_order_data text null,
  total decimal(10,2) not null,
  created_at timestamp null,
  updated_at timestamp null,
  constraint orders_client_id_foreign
    foreign key (client_id) references clients (id)
      on delete set null
);

create table products
(
  id int unsigned auto_increment
    primary key,
  name varchar(255) not null,
  price decimal(10,2) not null
);

create table order_items
(
  id int unsigned auto_increment
    primary key,
  order_id int unsigned not null,
  product_id int unsigned null,
  product_name varchar(255) not null,
  price decimal(10,2) not null,
  constraint order_items_order_id_foreign
    foreign key (order_id) references orders (id)
      on delete cascade,
  constraint order_items_product_id_foreign
    foreign key (product_id) references products (id)
      on delete set null
);