CREATE DATABASE JD
USE JD
drop database jd


CREATE TABLE users
(
  id INT IDENTITY(1,1),
  username nvarchar(100) ,
  password nvarchar(200) ,
  auth_key nvarchar(200),
  name nvarchar(200) ,
  dob date ,
  phone nvarchar(200) ,
  role INT ,
  address nvarchar(200) ,
  email nvarchar(200) ,
  status INT ,
  PRIMARY KEY (id)
);

--- EXEC sp_RENAME 'users.addpress' , 'address', 'COLUMN'  -- sửa tên addpress -> address

CREATE TABLE type
(
  id INT IDENTITY(1,1),
  name NVARCHAR(100) ,
  PRIMARY KEY (id)
);

CREATE TABLE product
(
  id INT IDENTITY(1,1),
  name varchar(100) ,
  price INT ,
  created_date datetime ,
  status INT ,
  code NVARCHAR(100) ,
  size INT ,
  amount INT ,
  info NVARCHAR(900) ,
  id_type INT ,
  created_uid INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_type) REFERENCES type(id),
  FOREIGN KEY (created_uid) REFERENCES users(id)
);

CREATE TABLE image_product
(
  id INT IDENTITY(1,1),
  link NVARCHAR(200) ,
  id_product INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_product) REFERENCES product(id)
);

CREATE TABLE discount_product
(
  id INT IDENTITY(1,1),
  info NVARCHAR(100) ,
  type INT ,
  discount INT ,
  status INT ,
  created_date datetime ,
  begin_date DATE ,
  end_date DATE ,
  created_uid INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (created_uid) REFERENCES users(id)
);

CREATE TABLE sale_order
(
  total_price INT ,
  id INT IDENTITY(1,1),
  bill_code NVARCHAR(20) ,
  status INT ,
  created_date datetime ,
  id_user INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_user) REFERENCES users(id)
);

CREATE TABLE order_line
(
  id INT IDENTITY(1,1),
  amount INT ,
  size_product INT ,
  sum_price INT ,
  code_color INT ,
  id_product INT ,
  id_bill INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_product) REFERENCES product(id),
  FOREIGN KEY (id_bill) REFERENCES sale_order(id)
);

CREATE TABLE discount_detail
(
  id INT IDENTITY(1,1),
  id_discount INT ,
  id_product INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_discount) REFERENCES discount_product(id),
  FOREIGN KEY (id_product) REFERENCES product(id)
);

