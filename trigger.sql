--Khi thêm sản phẩm vào, tự động thêm ngày tạo và status
alter trigger trg_set_product_status_createdate on product
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

--Khi thêm hóa đơn mới, tự động thêm ngày tạo
alter trigger trg_set_saleorder on sale_order
for insert
as
begin
	print N'Thêm ngày tạo khi tạo hóa đơn mới'
	declare @create_date datetime
	declare @idso int
	select @idso= id from inserted
	select @create_date=created_date from inserted
	update sale_order
	set created_date=GETDATE()
	where @idso=sale_order.id
end
insert into sale_order(total_price) values (10000)
select * from sale_order 

---Khi xóa hóa đơn, xóa chi tiết hóa đơn
alter trigger trg_set_saleorder_del on sale_order
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
insert into sale_order(total_price) values (1120000)
insert into sale_order(total_price) values (110000)
delete from sale_order where id=1
select * from sale_order
select * from order_line 
insert into order_line(code_color,id_bill) values (1,3)
insert into order_line(code_color,id_bill) values (3,2)
insert into order_line(code_color,id_bill) values (2,1)
delete from order_line where id_bill=2

---Khi thêm chi tiết hóa đơn, cập nhật lại giá tiền trên hóa đơn
alter trigger trg_set_orderline on order_line
for insert
as
begin
	print N'Cập nhật hóa đơn khi thêm chi tiết hóa đơn'
	declare @id int
	declare @price int
	select @id=id_bill from inserted
	select @price =sum_price from inserted
	update sale_order
	set total_price=total_price+@price
	where @id=sale_order.id
end
insert into order_line(sum_price,id_bill) values (10000000,2)
insert into order_line(sum_price,id_bill) values (20000000,4)
insert into order_line(sum_price,id_bill) values (20000000,4)
insert into order_line(sum_price,id_bill) values (20,4)
--Khi xóa chi tiết hóa đơn, cập nhật lại giá tiền trên hóa đơn
alter trigger trg_set_orderlinedel on order_line
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

--Khi cập nhật chi tiết hóa đơn, cập nhật giá tiền trong hóa đơn
alter trigger trg_set_orderlineupdate on order_line
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
insert into order_line(sum_price,size_product,id_bill,id_product, amount) values (100,10,19,1,1)
insert into order_line(sum_price,size_product,id_bill) values (1000,8,1)
select * from sale_order
select * from order_line 
update order_line
set amount = 2
where id=29
delete from sale_order
delete from order_line
insert into sale_order(status, total_price) values (1,0)

