use jd
1 -- Xuất tên sản phẩm theo id sản phẩm
DROP FUNCTION showNameProductById 
GO
CREATE FUNCTION showNameProductById(@ProductID int)  
RETURNS Varchar(100)
AS   
BEGIN  
    DECLARE @ret Varchar(100);  
    SELECT @ret = name FROM Product where id = @ProductID;
     IF (@ret IS NULL)   
        SET @ret = 'NULL';  
    RETURN @ret;  
END; 

PRINT dbo.showNameProductById('10')

2 -- Tính doanh thu theo thời gian
DROP FUNCTION tinhDoanhThuTheoThoiGian 
GO
CREATE FUNCTION tinhDoanhThuTheoThoiGian(@date_from date, @date_to date)  
RETURNS int
AS   
BEGIN  
    DECLARE @ret int;  
    SELECT @ret = Sum(s.total_price) 
	FROM sale_order s
	WHERE s.created_date >= @date_from
	AND s.created_date <= @date_to;
     IF (@ret IS NULL)   
        SET @ret = 0;  
    RETURN @ret;  
END; 

PRINT dbo.tinhDoanhThuTheoThoiGian('2017-06-23','2017-06-24')

3 -- Tính doanh thu theo loại sản phẩm 
DROP FUNCTION tinhDoanhThuTheoLoaiSanPham
GO
CREATE FUNCTION tinhDoanhThuTheoLoaiSanPham(@typeId int)  
RETURNS int
AS   
BEGIN  
    DECLARE @ret int;  
    SELECT @ret = Sum(o.sum_price) 
	FROM order_line o, product p
	WHERE o.id_product = p.id
	AND p.id_type = @typeId;
     IF (@ret IS NULL)   
        SET @ret = 0;  
    RETURN @ret;  
END; 
-------------
PRINT dbo.tinhDoanhThuTheoLoaiSanPham('2')

4 -- Tính tổng doanh thu trong ngày hiện tại
DROP FUNCTION tinhDoanhThuTrongNgayHienTai
GO
CREATE FUNCTION tinhDoanhThuTrongNgayHienTai()  
RETURNS int
AS   
BEGIN  
    DECLARE @ret int;  
    SELECT @ret = Sum(s.total_price) 
	FROM sale_order s
	WHERE s.created_date = SYSDATETIME()
     IF (@ret IS NULL)   
        SET @ret = 0;  
    RETURN @ret;  
END; 
-------------
PRINT dbo.tinhDoanhThuTrongNgayHienTai()

5 -- Xuất ra sản phẩm sản phẩm bán chạy nhất
DROP FUNCTION sanPhamBanChayNhat
GO
CREATE FUNCTION sanPhamBanChayNhat()  
RETURNS varchar(100)
AS   
BEGIN 
	DECLARE @ret int;
	DECLARE @var varchar(100);
	DECLARE @name varchar(100);
	SELECT @ret =  SANPHAM.id_product
	FROM (SELECT SUM(amount) as id, id_product
			FROM order_line 
			group by id_product) AS  SANPHAM
	WHERE id = (SELECT Max(SANPHAM.id) as MA
				FROM  (SELECT SUM(amount) as id, id_product
						FROM order_line 
						group by id_product) AS  SANPHAM);
    
    SELECT @name = name FROM Product where id = @ret;
     IF (@ret IS NULL)   
        SET @ret = 'NULL';  
    RETURN 'ID - '+ CONVERT(varchar(100), @ret) +' - NAME -  '+@name;  
END; 
-------------
PRINT dbo.sanPhamBanChayNhat()