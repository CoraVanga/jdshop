use jd

-- kịch bảng cập nhật hết tất cả sản phẩm thay đổi giá không cho thêm mới 
---
create PROCEDURE CAPNHATSANPHAMDONGLOAT
@ID_PRODUCT INT, @CHAN INT
AS
BEGIN 
	SET TRANSACTION ISOLATION LEVEL Serializable
	begin tran
	UPDATE product_detail
	SET price = price + @CHAN
	WHERE product_detail.id_product = @ID_PRODUCT
	waitfor delay '00:00:07'
	commit tran
END
---- test --  bỏ qua file query khác
	use jd
    SET IDENTITY_INSERT product_detail ON
	begin tran
	insert product_detail (id,size,price,amount,id_product) values (1000,10,500000,100,1)
	commit tran
--

DROP PROC CAPNHATSANPHAMDONGLOAT
EXEC CAPNHATSANPHAMDONGLOAT 1, 200
---

delete product_detail where id = 1000

-- select 1000
SELECT TOP 1000 [id]
      ,[size]
      ,[price]
      ,[amount]
      ,[id_product]
  FROM [JD].[dbo].[product_detail]