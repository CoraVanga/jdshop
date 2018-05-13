alter trigger trg_set_product_status_createdate on product
for insert
as
begin
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
insert into product(name) values ('test')

select * from product where name='test'
use JD
alter trigger trg_set_saleorder on sale_order
for insert
as
begin
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

---
alter trigger trg_set_saleorder on sale_order
instead of delete
as
begin
	declare @id int
	select @id= id from deleted
	delete from order_line where order_line.id_bill=@id
	delete from sale_order where id = @id
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

