use jd
-- : Xảy ra khi giao tác đầu thực hiện việc đọc hai lần trên cùng đơn vị dữ liệu, 
-- trong khi đó giao tác thứ hai thực hiện việc cập nhật dữ liệu giữa hai lần đọc
-- làm cho dữ liệu không nhất quán giữa hai lần đọc.

DROP PROCEDURE VIEWPRODUCTDETAIL
GO
CREATE PROCEDURE VIEWPRODUCTDETAIL
AS
BEGIN 
	SET TRANSACTION ISOLATION LEVEL REPEATABLE READ
	begin tran
	select * from product_detail WHERE product_detail.id = 6 
	waitfor delay '00:00:10'
	select * from product_detail WHERE product_detail.id = 6 
	commit tran
END
------------------------------------------------------------

DROP PROCEDURE VIEWPRODUCTDETAIL_error
GO
CREATE PROCEDURE VIEWPRODUCTDETAIL_error
AS
BEGIN 
	--SET TRANSACTION ISOLATION LEVEL REPEATABLE READ
	begin tran
	select * from product_detail WHERE product_detail.id = 6 
	waitfor delay '00:00:10'
	select * from product_detail WHERE product_detail.id = 6 
	commit tran
END

-- BUILD
EXEC VIEWPRODUCTDETAIL

--- TEST BỎ FILE KHÁC 
USE JD

DROP PROCEDURE update_product_detail
GO
CREATE PROCEDURE update_product_detail
AS
BEGIN 
	begin tran
		update product_detail 
		set amount = 200
		where id = 6
	commit tran
END


update product_detail 
set amount = 200
where id = 6

-- fix update database
update product_detail 
set amount = 100
where id = 6

-- select 
SELECT [id]
      ,[size]
      ,[price]
      ,[amount]
      ,[id_product]
  FROM [JD].[dbo].[product_detail]
  WHERE [id] = 6
-----------------------------------

-- Run - Correct
EXEC VIEWPRODUCTDETAIL 
EXEC update_product_detail -- cho update sau
-- Run - Error
EXEC VIEWPRODUCTDETAIL_error 
EXEC update_product_detail