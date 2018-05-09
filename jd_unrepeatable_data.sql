use jd
-- : Xảy ra khi giao tác đầu thực hiện việc đọc hai lần trên cùng đơn vị dữ liệu, 
-- trong khi đó giao tác thứ hai thực hiện việc cập nhật dữ liệu giữa hai lần đọc
-- làm cho dữ liệu không nhất quán giữa hai lần đọc.

ALTER PROCEDURE VIEWPRODUCTDETAIL
AS
BEGIN 
	SET TRANSACTION ISOLATION LEVEL REPEATABLE READ
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
update product_detail 
set amount = 200
where id = 6

-- fix
update product_detail 
set amount = 100
where id = 6

-- select 1000
SELECT TOP 1000 [id]
      ,[size]
      ,[price]
      ,[amount]
      ,[id_product]
  FROM [JD].[dbo].[product_detail]