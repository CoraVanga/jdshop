--procedure của jd shop
use jd
--Thêm user
create procedure pro_insert_user
@username nvarchar(100), @pass nvarchar(200),
@name nvarchar(200), @dob date, @phone nvarchar(200),
@role int, @address nvarchar(200),@email nvarchar(200), @status int
as
begin
	insert into users(username, password, name, dob, phone, role, address, email, status) values (@username, @pass, @name, @dob, @phone, @role, @address, @email, @status)
end
--test
exec pro_insert_user N'Lê','2022','tien','1917-6-4','016799',1,'te','1552087@gm',1

--thêm type
create procedure pro_insert_type
@name nvarchar(100), @gender nvarchar(20)
as
begin
insert into type(name,gender) values (@name, @gender)
end
--test
exec pro_insert_type N'dây chuyền', N'Nữ'

--thêm sale_order
create procedure pro_insert_sale_order
@total int, @id_user int
as
begin
insert into sale_order(total_price,id_user) values (@total, @id_user)
end
--test
exec pro_insert_sale_order 1000000, 2

---thêm product_detail
create procedure pro_insert_product_detail
@size float, @price int, @amount int, @id_product int
as
begin
insert into product_detail(size,price,amount,id_product) values (@size, @price, @amount, @id_product)
end
--test
exec pro_insert_product_detail 3.14, 1000000, 3, 9
--thêm product
create procedure pro_insert_product
@name nvarchar(100),@code nvarchar(100), @info nvarchar(900),@id_type int, @created_uit int, @id_discount int
as
begin
insert into product(name, code, info,id_type,created_uid,id_discount) values (@name ,@code , @info ,@id_type, 
@created_uit , @id_discount)
end
--test
exec pro_insert_product N'lắc tay', 'lt1001',N'dây chuyền cho nữ',6,4,null

--thêm order_line
create procedure pro_insert_order_line
@amount int, @size_product int, @sum_price int, @id_product int, @id_bill int
as
begin
insert into order_line(amount,size_product,sum_price,id_product,id_bill) values (@amount,@size_product,@sum_price, @id_product,@id_bill)
end
--test
exec pro_insert_order_line 10,19,90000000,8,null

--thêm image_product
create procedure pro_insert_image_product
@link nvarchar(200), @id_product int
as
begin
insert into image_product(link,id_product) values (@link,@id_product)
end
--test
exec pro_insert_image_product 'njdkas.com',8

---thêm discount_product
create procedure pro_insert_discount_product
@info nvarchar(100),@discount int, @begin_date date, @end_date date, @created_uid int
as
begin
insert into discount_product(info,discount,begin_date,end_date,created_uid) values (@info,@discount,@begin_date,@end_date,@created_uid)
end
--test
exec pro_insert_discount_product N'nhẫn vàng sale mạnh',20,'2018-6-9','2018-9-9',9

---xóa users
create procedure pro_del_users
@id_user int
as
begin
delete from sale_order where id_user=@id_user
delete from users where id=@id_user
update discount_product
set created_uid=null where created_date=@id_user
end
---test
select * from users
exec pro_del_users 3

---xóa type
create procedure pro_del_type
@id_type int
as
begin
delete from type where id=@id_type
update product
set id_type=null 
where id_type=@id_type
end
---xóa sale_order
create procedure pro_del_sale_order
@id_sale_order int
as
begin
delete from order_line where id_bill=@id_sale_order
delete from sale_order where id=@id_sale_order
end
--test
select * from sale_order where id=6
select * from order_line where id=6
exec pro_del_sale_order 6

--xóa product_detail
create procedure pro_del_product_detail
@id int
as
begin
delete from product_detail where id=@id
end
---xóa product
create procedure pro_del_product
@id int
as
begin
delete from product_detail where id_product=@id
delete from product where id=@id
delete from image_product where id_product=@id
end

---xóa order_line
create procedure pro_del_order_line
@id int
as
begin
delete from order_line where id=@id
end

---xóa image_product
create procedure pro_del_image_product
@id int
as
begin
delete from image_product where id=@id 
end

--xóa discount_product
create procedure pro_del_discount_product
@id int
as
begin
delete from discount_product where id=@id
end
 
--update users
create procedure pro_update_users
@id int, @pass nvarchar(200)
as
begin
update users
set password=@pass where id=@id
end

--update type
create procedure pro_update_type
@id int, @name nvarchar(100), @gender nvarchar(20)
as
begin
update type
set name=@name, gender=@gender where id=@id
end

---update sale_order
create procedure pro_update_sale_order
@id int, @total int, @status int
as
begin
update sale_order
set total_price=@total, status=@status where id=@id
end

---update product_detail
create procedure pro_update_product_detail
@id int, @size float, @price int, @amount int
as
begin
update product_detail
set size=@size, price=@price, amount=@amount where id=@id
end

---update product
create procedure pro_update_product
@id int, @name nvarchar(100), @status int,@code nvarchar(100), @info nvarchar(900)
as
begin
update product
set name=@name, status=@status, code=@code,info=@info where id=@id
end
---update order_line
create procedure pro_update_order_line
@id int, @amount int, @size_pro int, @sum int
as
begin
update order_line
set amount=@amount, size_product=@size_pro, sum_price=@sum where id=@id
end
---update image_product
create procedure pro_update_image_product
@id int, @link nvarchar(200)
as
begin
update image_product
set link=@link where id=@id
end
---update discount_product
create procedure pro_update_discount_product
@id int, @info nvarchar(100),@discount int, @end_date date
as
begin
update discount_product
set info=@info,discount=@discount, end_date=@end_date where id=@id
end