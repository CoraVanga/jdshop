CREATE DATABASE JD
USE JD

CREATE TABLE users
(
  id INT IDENTITY(1,1),
  username INT ,
  password INT ,
  name INT ,
  dob INT ,
  phone INT ,
  role INT ,
  addpress INT ,
  email INT ,
  status INT ,
  PRIMARY KEY (id)
);

CREATE TABLE type
(
  id INT IDENTITY(1,1),
  name NVARCHAR(100) ,
  PRIMARY KEY (id)
);

CREATE TABLE product
(
  id INT IDENTITY(1,1),
  name INT ,
  price INT ,
  created_date INT ,
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
  link INT ,
  id_product INT ,
  PRIMARY KEY (id),
  FOREIGN KEY (id_product) REFERENCES product(id)
);

CREATE TABLE discount_product
(
  id INT IDENTITY(1,1),
  info INT ,
  type INT ,
  discount INT ,
  status INT ,
  created_date INT ,
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
  created_date DATE ,
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

