--Xảy ra khi một giao tác thực hiện đọc trên một đơn vị dữ liệu mà đơn vị dữ
--liệu này đang bị cập nhật bởi một giao tác khác nhưng việc cập nhật chưa
--được xác nhận
--kịch bản: T1 cập nhật số lượng sản phẩm trong kho nhưng chưa commit thì T2 xem số lượng sản phẩm trong kho
use jd

drop procedure dirty_read_update
go
create procedure dirty_read_update
@id int, @amount int
as
begin
	--set transaction isolation level repeatable read
	begin tran t1
		update product_detail
		set amount = @amount
		where id = @id
		waitfor delay '00:00:10'
	rollback tran t1
end

---------------------------

drop procedure dirty_read_select_error
go
create procedure dirty_read_select_error
@id int
as
begin
	set transaction isolation level Read Uncommitted --error
	begin tran t2
	select * from product_detail where id = @id
	commit tran t2
end

drop procedure dirty_read_select
go
create procedure dirty_read_select
@id int
as
begin
	begin tran t2
	select * from product_detail where id = @id
	commit tran t2
end
-- Dữ liệu test --
SET IDENTITY_INSERT product on
--SET IDENTITY_INSERT product off
INSERT INTO [product] ([id],[name],[status])
VALUES (1000,N'Test product',1)
-----------------
SET IDENTITY_INSERT product_detail on
-----------------------------------
INSERT INTO product_detail([id],[id_product],[amount])
VALUES (1000,1000,1000)
-------------------------------------------------------------------------------
update product_detail
set amount = 1000
where id=1000

--Xem dữ liệu
select * from product_detail where id = 1000

exec dirty_read_update 1000, 100--TRAN 1
exec dirty_read_select 1000--TRAN 2
----
exec dirty_read_update 1000, 100--TRAN 1
exec dirty_read_select_error 1000--TRAN 2