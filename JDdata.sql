use JD
set dateformat dmy
--dữ liệu user
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('NguyenTien','23467323','','Nguyễn Thị Cẩm Tiên','27/3/2001','1283742934',1,'72/23/Hòa  Bình','tiennnt228@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('NguyenTu','144668235','','Nguyễn Đình Tú','1/12/1894','1248250252',3,'68 điện bien phủ','tu67234@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('TranLoan22','583435457','','Trần Thị Loan','1/12/1895','1639814263',2,'chư sê, gia lai','234bajdvf@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('DinhTien','zgb4235','','Lê Đình Tiến','3/8/1887','1638762949',1,'buôn mê thuột','15502880@gm.uit.edu.vn',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('LamLam123','sh64735vd','','Thái Bảo Duy Lâm','25/9/1893','1673945034',4,'đắk nông','lamlam259@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('KietLe','sfhh56789','','Lê Viết Kiệt','30/4/1954','1282349595',4,'đồng nai','kietleeeee@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('LoanLeNguyen','zxcv356','','Nguyễn Thị Loan Lê','17/12/1888','1249395345',2,'Biên hòa','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('Tinhtran1209','agfjhgkrwey2435','','Trần Tinh','13/1/2000','9583453455',4,'THủ dầu một','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('sauToan1997','zvxcvcnx 112','','Phạm Đình Toàn','18/5/1997','9038325855',3,'6/34/12, long phước','ewr56ght@gm.vn',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('888TuLe','1230987352','','Lê Tú Thảo','26/10/1996','9048475345',2,'Thủ  đức','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('DatHoang10','4236!325!','','Hoàng Bảo Đạt','16/10/1992','8347593345',4,'cà mau','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('Tuan78chusu','fdhgfj@@@','','Phan Việt Tuấn','18/2/1997','123679878',3,'Kiên giang','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('Chinsnnuocmam','fdhtu*24235','','Hoàng Mẫn','24/6/1995','2534634533',4,'Tiền Giang','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('cakhothom','jksncmdsn','','Bành Thị Thơm','17/7/1997','1912482054',2,'Mỹ Tho, Tiền Giang','thombanhthi@gmail.com',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('thiettinhle','ag3326hdbv','','Lê Thiết Tính','18/8/1998','12432543764',1,'Long An','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('cacom76dung','dsfafsdv','','Mã Văn Dũng','18/8/1999','16836554893',3,'Chư Bứ','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('beheokute','cca23456','','Phaạm Thị Heo','20/10/2011','16425992363',4,'Pleiku','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('HoanThIenIn','2456hoan','','Mai Đào Thơm','18/4/1998','90724583458',2,'Quận 1','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('NLhangHHH','NLhangHHH','','Mai Bảo Thắng','28/1/1997','24543364436',2,'quận 2','',1)
INSERT INTO users(username,password,auth_key,name,dob,phone,role,address,email,status) values('admin','admin','','Phạm Thành Nghĩa','19/9/2000','36347456345',1,'quận 7','nghia@gmail.com',1)

---dữ liệu sale_order
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD1',1,'43188',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD2',1,'43147',13)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD3',1,'43125',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD4',1,'43126',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD5',1,'43144',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD6',1,'43108',12)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD7',1,'43122',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD8',1,'43144',4)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD9',1,'43188',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD10',1,'43126',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD11',1,'43185',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD12',1,'43170',20)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD13',1,'43113',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD14',1,'43185',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD15',1,'43153',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD16',1,'43147',5)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD17',1,'43144',8)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD18',1,'43169',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD19',1,'43178',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD20',1,'43119',5)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD21',1,'43131',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD22',1,'43108',10)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD23',1,'43152',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD24',1,'43142',12)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD25',1,'43103',8)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD26',1,'43149',14)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD27',1,'43111',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD28',1,'43147',14)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD29',1,'43108',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD30',1,'43136',6)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD31',1,'43167',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD32',1,'43101',14)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD33',1,'43167',6)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD34',1,'43166',23)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD35',1,'43134',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD36',1,'43133',14)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD37',1,'43177',8)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD38',1,'43158',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD39',1,'43124',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD40',1,'43131',20)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD41',1,'43113',6)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD42',1,'43159',13)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD43',1,'43120',5)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD44',1,'43168',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD45',1,'43182',10)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD46',1,'43113',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD47',1,'43112',23)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD48',1,'43153',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD49',1,'43106',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD50',1,'43136',4)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD51',1,'43187',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD52',1,'43174',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD53',1,'43181',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD54',1,'43130',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD55',1,'43131',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD56',1,'43171',23)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD57',1,'43117',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD58',1,'43171',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD59',1,'43157',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD60',1,'43122',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD61',1,'43116',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD62',1,'43132',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD63',1,'43182',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD64',1,'43181',5)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD65',1,'43151',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD66',1,'43172',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD67',1,'43169',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD68',1,'43132',20)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD69',1,'43153',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD70',1,'43134',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD71',1,'43167',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD72',1,'43153',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD73',1,'43189',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD74',1,'43179',4)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD75',1,'43124',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD76',1,'43180',10)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD77',1,'43103',18)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD78',1,'43135',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD79',1,'43147',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD80',1,'43185',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD81',1,'43158',14)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD82',1,'43131',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD83',1,'43155',6)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD84',1,'43134',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD85',1,'43158',23)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD86',1,'43177',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD87',1,'43179',12)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD88',1,'43153',5)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD89',1,'43113',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD90',1,'43170',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD91',1,'43153',4)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD92',1,'43114',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD93',1,'43124',11)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD94',1,'43101',12)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD95',1,'43164',19)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD96',1,'43158',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD97',1,'43132',23)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD98',1,'43142',20)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD99',1,'43156',22)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD100',1,'43189',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD101',1,'43107',16)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD102',1,'43105',8)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD103',1,'43153',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD104',1,'43159',17)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD105',1,'43168',7)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD106',1,'43103',9)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD107',1,'43122',15)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD108',1,'43144',21)
INSERT INTO sale_order(total_price,bill_code,status,created_date,id_user) values(0,'HD109',1,'43102',13)