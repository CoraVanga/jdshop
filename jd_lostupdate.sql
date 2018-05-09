use jd
alter procedure lost_update1
@id int, @amount int
as
begin
	--set transaction isolation level read committed
	begin tran
		update product_detail
		set amount = amount - @amount
		where id = @id
		waitfor delay '00:00:05'
	commit tran
end

alter procedure lost_update2
@id int, @amount int
as
begin
set transaction isolation level read uncommitted
	begin tran
		update product_detail
		set amount = amount - @amount
		where id = @id
	commit tran
end

select * from product_detail where id =1
update product_detail set amount = 100 where id =1 waitfor delay '00:00:10'

exec lost_update1 1, 1 --TRAN 1
exec lost_update2 1, 2 --TRAN 2