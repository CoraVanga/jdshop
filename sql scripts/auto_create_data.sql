use jd
set dateformat dmy
--drop auto_create_sale_order

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
