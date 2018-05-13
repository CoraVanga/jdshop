alter trigger trg_set_product_status on product
for insert
as
begin
	declare @id int
	select @id = id from inserted
	update product
	set status=1
	where @id=product.id
end 
insert into product(name) values ('test')

select * from product where name='test'