use jd
set dateformat dmy
--drop trigger auto_create_sale_order
--drop trigger auto_create_order_line

go
create trigger auto_create_sale_order
on sale_order
for insert
as
begin
	declare @id int
	select @id = id from inserted
	update sale_order
	set total_price=0,status=4
	where id = @id
end

go
create trigger auto_create_order_line
on order_line
for insert
as
begin
	declare @size int, @price int, @id_product int, @id_bill int, @amount int, @id int
	select @id_product = id_product, @id_bill=id_bill, @amount = amount, @id = id
	from inserted

	select top 1 @size = size, @price=price
	from product_detail
	where id_product = @id_product

	update order_line
	set sum_price = @price*@amount, size_product = @size
	where id = @id

	update sale_order
	set total_price = total_price + @price*@amount
	where id = @id_bill
end


