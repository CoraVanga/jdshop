use jd
alter procedure dirty_read
@id int, @amount int
as
begin
	--set transaction isolation level repeatable read
	begin tran t1
		update product_detail
		set amount = @amount
		where id = @id
		waitfor delay '00:00:10'
	commit tran t1
end

ALTER procedure dirty_read_select
@id int
as
begin
	set transaction isolation level repeatable read
	begin tran t1
	select * from product_detail where id = @id
	commit tran t1
end


exec dirty_read 1, 1--TRAN 1
exec dirty_read_select 1--TRAN 2