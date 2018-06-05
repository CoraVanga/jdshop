use jd
SELECT count(*) FROM sys.triggers
--1 Khi thêm sản phẩm vào, tự động thêm ngày tạo và status
drop trigger trg_set_product_status_createdate
go
create trigger trg_set_product_status_createdate on product
for insert
as
begin
	print N'Tạo status và ngày tạo cho sản phẩm'
	declare @id int
	select @id = id from inserted
	update product
	set status=1
	where @id=product.id
	declare @createdate datetime
	select @createdate=created_date from inserted
	update product
	set created_date=GETDATE()
	where @id=product.id
end
--test
insert into product(name) values(N'test')
select top 1 * from product order by id desc

--2 Khi thêm hóa đơn mới, tự động thêm ngày tạo
drop trigger trg_set_saleorder
go 
create trigger trg_set_saleorder on sale_order
for insert
as
begin
	print N'Thêm ngày tạo khi tạo hóa đơn mới'
	declare @create_date datetime
	declare @idso int
	select @idso= id from inserted
	select @create_date=created_date from inserted
	update sale_order
	set created_date=GETDATE(), total_price = 0
	where @idso=sale_order.id
end
--test
insert into sale_order(total_price,id_user,status) values (10000,2,1)
select top 1 * from sale_order order by id desc

---3 Khi xóa hóa đơn, xóa chi tiết hóa đơn
drop trigger trg_set_saleorder_del
go 
create trigger trg_set_saleorder_del on sale_order
instead of delete
as
begin
	print N'Khi xóa hóa đơn, xóa chi tiết hóa đơn'
	declare @id int
	declare cs cursor for select id from deleted
	open cs
	fetch next from cs into @id
	while(@@FETCH_STATUS=0)
	begin
		delete from order_line where order_line.id_bill=@id
		delete from sale_order where id = @id
		fetch next from cs into @id
	end
	close cs
	deallocate cs
end	 
--test
set IDENTITY_INSERT sale_order on
insert into sale_order(id,total_price,id_user,status) values (1000,10000,2,1)
select * from sale_order where id = 1000
insert into order_line values(2,1,1,1,1000)
insert into order_line values(4,1,1,1,1000)
delete from sale_order where id = 1000

---4 Khi thêm chi tiết hóa đơn, cập nhật lại giá tiền trên hóa đơn
drop trigger trg_set_orderline
go
create trigger trg_set_orderline on order_line
for insert
as
begin
	print N'Cập nhật hóa đơn khi thêm chi tiết hóa đơn'
	declare @id int, @iid int, @amount int, @size int
	declare @price int, @id_product int, @id_discount int, @precent int

	select @id=id_bill,@iid = id, @amount = amount, @id_product = id_product, @size=size_product 
	from inserted

	select @price = price
	from product_detail
	where id_product = @id_product and size = @size

	select @id_discount = id_discount 
	from product 
	where id = @id_product
	
	if(@id_discount is not null)
	begin
		select @precent = discount 
		from discount_product
		where id = @id_discount
	end
	else
	begin
		set @precent = 0
	end
	update order_line
	set sum_price=@price*@amount*(1- @precent/100)
	where id = @iid

	update sale_order
	set total_price=total_price+@price*@amount*(1- @precent/100)
	where @id=sale_order.id
end
--test
select * from order_line
set IDENTITY_INSERT sale_order on
insert into sale_order(id,total_price,id_user,status) values (1000,10000,2,1)
insert into order_line values(1,10,20170000,3,1000)
insert into order_line values(1,16,15388000,19,1000)
select * from sale_order where id = 1000
select * from order_line order by id desc

--5 Khi xóa chi tiết hóa đơn, cập nhật lại giá tiền trên hóa đơn
drop trigger trg_set_orderlinedel
go
create trigger trg_set_orderlinedel on order_line
for delete
as
begin
	print N'Cập nhật giá tiền trên hóa đơn khi xóa chi tiết hóa đơn'
	declare @id int
	declare @price int
	select @id=id_bill from deleted
	select @price =sum_price from deleted
	update sale_order
	set total_price=total_price-@price
	where @id=sale_order.id
end
insert into order_line(sum_price,id_bill) values (10,4)
delete from order_line where id_bill=2

--6 Khi cập nhật chi tiết hóa đơn, cập nhật giá tiền trong hóa đơn
drop trigger trg_set_orderlineupdate
go
create trigger trg_set_orderlineupdate on order_line
for update
as
begin
	If(UPDATE (amount))
	print N'Cập nhật giá tiền của hóa đơn khi cập nhật chi tiết hóa đơn'
	begin
		declare @soluong int
		declare @sumprice int
		declare @id int
		declare @idbill int
		declare @size int
		declare @price int
		select @soluong=amount from inserted
		select @idbill=id_bill from inserted
		select @size=size_product from inserted
		select @id=id_product from inserted
		select @price=price from product_detail where @id=product_detail.id_product and @size=product_detail.size
		update order_line
		set sum_price=@soluong*@price
		select @sumprice=SUM(sum_price) from order_line where @idbill=order_line.id_bill
		update sale_order
		set total_price=@sumprice where id=@idbill
	end
end


