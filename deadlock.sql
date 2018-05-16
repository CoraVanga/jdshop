-- Cycle deadlock
-- kịch bản
-- -----------
xoá chi tiết hoá đơn [order_line]
cập nhật hoá đơn [sale_order] 
-----------
xoá hoá đơn [sale_order] 
xoá chi tiết [order_line]

USE JD

create PROCEDURE XOACHITIETHOADON 
@ID_ORDER_LINE INT
AS
BEGIN
	DECLARE @ID_SALE_ORDER INT
	DECLARE @PRICE INT
	SET @PRICE = 0
	SET TRANSACTION ISOLATION LEVEL Serializable
	BEGIN TRAN t1
		SELECT @ID_SALE_ORDER =  [order_line].[id_bill] FROM [order_line] WHERE [order_line].[id] = @ID_ORDER_LINE
		DELETE FROM [order_line] WHERE  [order_line].[id] = @ID_ORDER_LINE   
		
		SELECT @PRICE = SUM([order_line].[sum_price]) FROM [order_line] WHERE [order_line].[id_bill] = @ID_SALE_ORDER 
		PRINT @ID_SALE_ORDER
		PRINT @PRICE
		IF @PRICE = 0
			BEGIN
				--DELETE FROM [sale_order]
				--WHERE [sale_order].[id] = @ID_SALE_ORDER
				PRINT @PRICE
			END
		ELSE
			BEGIN
				UPDATE [sale_order]
				SET [sale_order].[total_price] = @PRICE
				WHERE [sale_order].[id] = @ID_SALE_ORDER
				PRINT @PRICE
			END
	COMMIT TRAN t1
END

DROP PROC XOACHITIETHOADON

EXEC XOACHITIETHOADON 8

SELECT TOP 1000 [total_price]
      ,[id]
      ,[bill_code]
      ,[status]
      ,[created_date]
      ,[id_user]
  FROM [JD].[dbo].[sale_order]


SELECT TOP 1000 [id]
      ,[amount]
      ,[size_product]
      ,[sum_price]
      ,[code_color]
      ,[id_product]
      ,[id_bill]
  FROM [JD].[dbo].[order_line]


  SELECT SUM([order_line].[sum_price]) FROM [order_line] WHERE [order_line].[id_bill] = 4