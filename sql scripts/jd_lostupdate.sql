--Tình trạng này xảy ra khi có nhiều hơn một giao tác cùng thực hiện cập nhật trên 1 đơn vị dữ liệu. 
--Khi đó, tác dụng của giao tác cập nhật thực hiện sau sẽ đè lên tác dụng của thao tác cập nhật trước

--Kịch bản: 
use jd

drop procedure lost_update_update_1
go
create procedure lost_update_update_1
@id int
as
begin
	set transaction isolation level SERIALIZABLE 
	begin tran
		declare @amount int
		Select @amount = amount
		from product_detail where id = @id
		set @amount = @amount -1
		waitfor delay '00:00:10'
		update product_detail
		set amount = @amount
		where id = @id

	commit tran
end

drop procedure lost_update_update_1_error
go
create procedure lost_update_update_1_error
@id int
as
begin
	--set transaction isolation level SERIALIZABLE 
	begin tran
		declare @amount int
		Select @amount = amount
		from product_detail where id = @id
		set @amount = @amount -1
		waitfor delay '00:00:10'
		update product_detail
		set amount = @amount
		where id = @id

	commit tran
end

drop procedure lost_update_update_2
go
create procedure lost_update_update_2
@id int
as
begin
set transaction isolation level read committed
	begin tran
		declare @amount int
		Select @amount = amount
		from product_detail where id = @id
		set @amount = @amount -1
		update product_detail
		set amount = @amount
		where id = @id
	commit tran
end

-- Dữ liệu test --
SET IDENTITY_INSERT product_detail off
SET IDENTITY_INSERT product on
--SET IDENTITY_INSERT product off
INSERT INTO [product] ([id],[name],[status])
VALUES (1000,N'Test product',1)
-----------------
SET IDENTITY_INSERT product off
SET IDENTITY_INSERT product_detail on
--SET IDENTITY_INSERT product_detail off
-----------------------------------
INSERT INTO product_detail([id],[id_product],[amount])
VALUES (1000,1000,1000)
-------------------------------------------------------------------------------
update product_detail
set amount = 1000
where id=1000

--Xem dữ liệu
select * from product_detail where id = 1000

exec lost_update_update_1 1000 --TRAN 1
exec lost_update_update_2 1000 --TRAN 2
---
exec lost_update_update_1_error 1000 --TRAN 1
exec lost_update_update_2 1000 --TRAN 2
