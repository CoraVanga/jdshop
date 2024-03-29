USE [master]
GO
/****** Object:  Database [JD]    Script Date: 5/28/2018 1:54:50 PM ******/
CREATE DATABASE [JD]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'JD', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\JD.mdf' , SIZE = 3136KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'JD_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\JD_log.ldf' , SIZE = 832KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [JD] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [JD].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [JD] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [JD] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [JD] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [JD] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [JD] SET ARITHABORT OFF 
GO
ALTER DATABASE [JD] SET AUTO_CLOSE ON 
GO
ALTER DATABASE [JD] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [JD] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [JD] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [JD] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [JD] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [JD] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [JD] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [JD] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [JD] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [JD] SET  ENABLE_BROKER 
GO
ALTER DATABASE [JD] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [JD] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [JD] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [JD] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [JD] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [JD] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [JD] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [JD] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [JD] SET  MULTI_USER 
GO
ALTER DATABASE [JD] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [JD] SET DB_CHAINING OFF 
GO
ALTER DATABASE [JD] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [JD] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [JD]
GO
/****** Object:  Table [dbo].[discount_product]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[discount_product](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[info] [nvarchar](100) NULL,
	[discount] [int] NULL,
	[created_date] [datetime] NULL,
	[begin_date] [date] NULL,
	[end_date] [date] NULL,
	[created_uid] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[image_product]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[image_product](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[link] [nvarchar](200) NULL,
	[id_product] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[order_line]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[order_line](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[amount] [int] NULL,
	[size_product] [int] NULL,
	[sum_price] [int] NULL,
	[id_product] [int] NULL,
	[id_bill] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[product]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NULL,
	[created_date] [datetime] NULL,
	[status] [int] NULL,
	[code] [nvarchar](100) NULL,
	[info] [nvarchar](900) NULL,
	[id_type] [int] NULL,
	[created_uid] [int] NULL,
	[id_discount] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[product_detail]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product_detail](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[size] [float] NULL,
	[price] [int] NULL,
	[amount] [int] NULL,
	[id_product] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[sale_order]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sale_order](
	[total_price] [int] NULL,
	[id] [int] IDENTITY(1,1) NOT NULL,
	[status] [int] NULL,
	[created_date] [datetime] NULL,
	[id_user] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[type]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[type](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](100) NULL,
	[gender] [nvarchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[users]    Script Date: 5/28/2018 1:54:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](100) NULL,
	[password] [nvarchar](200) NULL,
	[auth_key] [nvarchar](200) NULL,
	[name] [nvarchar](200) NULL,
	[dob] [date] NULL,
	[phone] [nvarchar](200) NULL,
	[role] [int] NULL,
	[address] [nvarchar](200) NULL,
	[email] [nvarchar](200) NULL,
	[status] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET IDENTITY_INSERT [dbo].[image_product] ON 

INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (1, N'[JDSHOP]1.png', 1)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (2, N'[JDSHOP]2.png', 1)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (3, N'[JDSHOP]3.png', 1)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (4, N'[JDSHOP]4.png', 2)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (5, N'[JDSHOP]5.png', 3)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (6, N'[JDSHOP]6.jpg', 4)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (7, N'[JDSHOP]7.jpg', 4)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (8, N'[JDSHOP]8.jpg', 5)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (9, N'[JDSHOP]9.png', 6)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (10, N'[JDSHOP]10.png', 6)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (11, N'[JDSHOP]11.png', 7)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (12, N'[JDSHOP]12.png', 7)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (13, N'[JDSHOP]13.png', 7)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (14, N'[JDSHOP]14.png', 8)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (15, N'[JDSHOP]15.png', 9)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (16, N'[JDSHOP]16.png', 9)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (17, N'[JDSHOP]17.png', 9)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (18, N'[JDSHOP]18.png', 10)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (19, N'[JDSHOP]19.jpg', 11)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (20, N'[JDSHOP]20.jpg', 11)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (21, N'[JDSHOP]21.jpg', 13)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (22, N'[JDSHOP]22.jpg', 13)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (23, N'[JDSHOP]23.jpg', 13)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (24, N'[JDSHOP]24.png', 14)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (25, N'[JDSHOP]25.png', 15)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (26, N'[JDSHOP]26.png', 16)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (27, N'[JDSHOP]27.png', 16)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (28, N'[JDSHOP]28.png', 12)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (29, N'[JDSHOP]29.png', 17)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (30, N'[JDSHOP]30.png', 18)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (31, N'[JDSHOP]31.jpg', 19)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (32, N'[JDSHOP]32.png', 20)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (33, N'[JDSHOP]33.png', 20)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (34, N'[JDSHOP]34.png', 20)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (35, N'[JDSHOP]35.png', 21)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (36, N'[JDSHOP]36.png', 21)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (37, N'[JDSHOP]37.png', 21)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (38, N'[JDSHOP]38.png', 22)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (39, N'[JDSHOP]39.png', 23)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (40, N'[JDSHOP]40.png', 23)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (41, N'[JDSHOP]41.png', 23)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (42, N'[JDSHOP]42.png', 23)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (43, N'[JDSHOP]43.jpg', 25)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (44, N'[JDSHOP]44.png', 26)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (45, N'[JDSHOP]45.png', 27)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (46, N'[JDSHOP]46.jpg', 28)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (47, N'[JDSHOP]47.png', 29)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (48, N'[JDSHOP]48.jpg', 30)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (49, N'[JDSHOP]49.jpg', 31)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (50, N'[JDSHOP]50.jpg', 31)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (51, N'[JDSHOP]51.jpg', 31)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (52, N'[JDSHOP]52.jpg', 31)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (53, N'[JDSHOP]53.jpg', 32)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (54, N'[JDSHOP]54.jpg', 32)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (55, N'[JDSHOP]55.jpg', 32)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (56, N'[JDSHOP]56.png', 33)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (57, N'[JDSHOP]57.png', 33)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (58, N'[JDSHOP]58.png', 34)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (59, N'[JDSHOP]59.png', 34)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (60, N'[JDSHOP]60.png', 35)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (61, N'[JDSHOP]61.png', 36)
INSERT [dbo].[image_product] ([id], [link], [id_product]) VALUES (62, N'[JDSHOP]62.png', 36)
SET IDENTITY_INSERT [dbo].[image_product] OFF
SET IDENTITY_INSERT [dbo].[order_line] ON 

INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (1, 2, NULL, 11686000, 14, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (2, 1, 10, 20170000, 3, 2)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (3, 2, NULL, 12016000, 11, 3)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (4, 1, NULL, 6008000, 11, 4)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (5, 1, 16, 15388000, 19, 5)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (6, 2, 8, 7758000, 8, 6)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (7, 1, 9, 36526000, 2, 7)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (8, 1, 9, 9530000, 4, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (9, 1, 50, 16312000, 27, 9)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (10, 1, 10, 20170000, 3, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (11, 1, 16, 15388000, 19, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (12, 1, 42, 150832000, 29, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (13, 2, 15, 114312000, 22, 13)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (14, 1, 9, 9530000, 4, 14)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (15, 1, NULL, 1990000, 24, 15)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (16, 2, 42, 301664000, 29, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (17, 1, NULL, 492000, 17, 17)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (18, 1, NULL, 13760000, 30, 18)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (19, 1, NULL, 436000, 34, 19)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (20, 1, 10, 680000, 6, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (21, 1, NULL, 13760000, 30, 21)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (22, 1, NULL, 13760000, 30, 22)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (23, 2, 10, 1360000, 6, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (24, 2, NULL, 10284000, 32, 24)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (25, 2, NULL, 9516000, 33, 25)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (26, 2, NULL, 3980000, 24, 26)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (27, 2, NULL, 984000, 17, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (28, 1, 19, 2890000, 20, 28)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (29, 1, 19, 2890000, 20, 29)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (30, 2, NULL, 113304000, 16, 30)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (31, 1, NULL, 20927000, 13, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (32, 1, NULL, 4758000, 33, 32)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (33, 1, NULL, 33128000, 31, 33)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (34, 2, NULL, 9180000, 23, 34)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (35, 2, 10, 932000, 5, 35)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (36, 2, 10, 11630000, 1, 36)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (37, 2, 15, 114312000, 22, 37)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (38, 2, 40, 1298000, 35, 38)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (39, 1, NULL, 5142000, 32, 39)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (40, 1, 19, 2890000, 20, 40)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (41, 1, 50, 1661000, 21, 41)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (42, 1, NULL, 56652000, 16, 42)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (43, 2, 50, 32624000, 27, 43)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (44, 1, NULL, 507000, 36, 44)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (45, 2, NULL, 27520000, 30, 45)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (46, 1, NULL, 492000, 17, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (47, 1, NULL, 13760000, 30, 47)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (48, 2, 16, 30776000, 19, 48)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (49, 1, NULL, 20927000, 13, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (50, 1, 16, 15388000, 19, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (51, 1, NULL, 1990000, 24, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (52, 1, 50, 16312000, 27, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (53, 2, NULL, 984000, 17, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (54, 1, 9, 36526000, 2, 14)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (55, 2, NULL, 950000, 18, 30)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (56, 1, NULL, 56652000, 16, 34)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (57, 1, 16, 520000, 25, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (58, 1, 49, 17058000, 26, 36)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (59, 2, 15, 114312000, 22, 45)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (60, 2, NULL, 3980000, 24, 30)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (61, 2, 15, 114312000, 22, 32)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (62, 1, 50, 16312000, 27, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (63, 2, NULL, 9180000, 23, 26)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (64, 1, NULL, 4590000, 23, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (65, 1, 40, 649000, 35, 34)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (66, 2, NULL, 11686000, 14, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (67, 1, 8, 3879000, 8, 19)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (68, 1, 10, 466000, 5, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (69, 2, NULL, 15198000, 15, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (70, 2, NULL, 13736000, 28, 17)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (71, 1, 49, 17058000, 26, 28)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (72, 1, NULL, 4590000, 23, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (73, 2, 10, 11630000, 1, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (74, 1, NULL, 57381000, 10, 39)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (75, 1, NULL, 5142000, 32, 14)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (76, 1, 49, 17058000, 26, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (77, 2, 50, 3322000, 21, 37)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (78, 1, 40, 649000, 35, 2)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (79, 1, NULL, 20927000, 13, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (80, 1, NULL, 4590000, 23, 22)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (81, 2, 19, 5780000, 20, 2)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (82, 2, 9, 73052000, 2, 17)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (83, 2, NULL, 113304000, 16, 45)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (84, 1, NULL, 4590000, 23, 35)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (85, 1, NULL, 4758000, 33, 26)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (86, 2, NULL, 27520000, 30, 42)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (87, 1, NULL, 5142000, 32, 6)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (88, 2, NULL, 950000, 18, 21)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (89, 2, 50, 32624000, 27, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (90, 2, 10, 40340000, 3, 44)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (91, 2, 8, 7758000, 8, 30)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (92, 2, 10, 11630000, 1, 24)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (93, 1, NULL, 5843000, 14, 13)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (94, 1, 42, 150832000, 29, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (95, 2, NULL, 113304000, 16, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (96, 2, NULL, 27520000, 30, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (97, 1, NULL, 6868000, 28, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (98, 2, NULL, 12060000, 12, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (99, 2, NULL, 12060000, 12, 32)
GO
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (100, 2, NULL, 12060000, 12, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (101, 1, 10, 720000, 7, 45)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (102, 1, 10, 5815000, 1, 9)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (103, 1, NULL, 5142000, 32, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (104, 2, NULL, 3980000, 24, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (105, 2, 40, 1298000, 35, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (106, 2, 10, 1360000, 6, 25)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (107, 1, NULL, 4758000, 33, 42)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (108, 1, NULL, 13760000, 30, 3)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (109, 1, 40, 649000, 35, 41)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (110, 2, 15, 114312000, 22, 19)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (111, 1, NULL, 13760000, 30, 48)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (112, 2, 19, 5780000, 20, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (113, 2, 16, 1040000, 25, 19)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (114, 1, 10, 5815000, 1, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (115, 2, 16, 1040000, 25, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (116, 2, NULL, 114762000, 10, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (117, 1, 50, 16312000, 27, 9)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (118, 2, NULL, 12016000, 11, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (119, 2, NULL, 113304000, 16, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (120, 1, NULL, 436000, 34, 47)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (121, 1, NULL, 507000, 36, 43)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (122, 2, NULL, 950000, 18, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (123, 2, 50, 32624000, 27, 19)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (124, 1, 17, 26573000, 9, 39)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (125, 2, NULL, 3980000, 24, 9)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (126, 2, 17, 53146000, 9, 38)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (127, 1, NULL, 4590000, 23, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (128, 1, 50, 16312000, 27, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (129, 1, 49, 17058000, 26, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (130, 2, 50, 3322000, 21, 13)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (131, 1, NULL, 507000, 36, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (132, 2, 9, 73052000, 2, 32)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (133, 1, NULL, 57381000, 10, 47)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (134, 2, 16, 1040000, 25, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (135, 2, 9, 73052000, 2, 44)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (136, 1, NULL, 492000, 17, 18)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (137, 1, 50, 1661000, 21, 48)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (138, 2, 42, 301664000, 29, 32)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (139, 2, NULL, 15198000, 15, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (140, 2, NULL, 984000, 17, 28)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (141, 2, NULL, 984000, 17, 14)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (142, 2, 50, 3322000, 21, 4)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (143, 1, 15, 57156000, 22, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (144, 1, 9, 9530000, 4, 18)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (145, 1, 9, 36526000, 2, 7)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (146, 1, 9, 9530000, 4, 18)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (147, 1, NULL, 56652000, 16, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (148, 1, 50, 16312000, 27, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (149, 2, 10, 932000, 5, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (150, 1, 50, 16312000, 27, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (151, 2, 9, 19060000, 4, 13)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (152, 2, NULL, 114762000, 10, 6)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (153, 1, 16, 520000, 25, 8)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (154, 1, 50, 1661000, 21, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (155, 1, 8, 3879000, 8, 33)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (156, 1, 8, 3879000, 8, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (157, 2, NULL, 41854000, 13, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (158, 2, NULL, 12016000, 11, 15)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (159, 2, NULL, 3980000, 24, 35)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (160, 1, NULL, 5142000, 32, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (161, 2, NULL, 950000, 18, 5)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (162, 1, 16, 520000, 25, 49)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (163, 2, 50, 32624000, 27, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (164, 2, NULL, 984000, 17, 10)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (165, 2, NULL, 1014000, 36, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (166, 1, NULL, 56652000, 16, 21)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (167, 2, NULL, 9180000, 23, 33)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (168, 1, 42, 150832000, 29, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (169, 2, 15, 114312000, 22, 7)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (170, 2, 9, 19060000, 4, 41)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (171, 2, NULL, 15198000, 15, 44)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (172, 2, NULL, 13736000, 28, 2)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (173, 1, 50, 1661000, 21, 35)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (174, 1, NULL, 6008000, 11, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (175, 2, 9, 73052000, 2, 32)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (176, 2, NULL, 113304000, 16, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (177, 1, NULL, 56652000, 16, 42)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (178, 1, 9, 9530000, 4, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (179, 2, 10, 932000, 5, 16)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (180, 1, 40, 649000, 35, 41)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (181, 1, 15, 57156000, 22, 46)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (182, 2, NULL, 13736000, 28, 1)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (183, 1, 10, 720000, 7, 31)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (184, 1, 10, 20170000, 3, 36)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (185, 1, 50, 16312000, 27, 27)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (186, 1, NULL, 5843000, 14, 33)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (187, 1, 9, 9530000, 4, 12)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (188, 1, NULL, 507000, 36, 28)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (189, 2, 8, 7758000, 8, 18)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (190, 1, NULL, 4590000, 23, 36)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (191, 2, 15, 114312000, 22, 11)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (192, 1, NULL, 13760000, 30, 4)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (193, 2, 40, 1298000, 35, 33)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (194, 1, NULL, 436000, 34, 9)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (195, 1, 42, 150832000, 29, 36)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (196, 2, 16, 30776000, 19, 14)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (197, 2, NULL, 12016000, 11, 20)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (198, 1, NULL, 7599000, 15, 23)
INSERT [dbo].[order_line] ([id], [amount], [size_product], [sum_price], [id_product], [id_bill]) VALUES (199, 2, 10, 11630000, 1, 5)
GO
SET IDENTITY_INSERT [dbo].[order_line] OFF
SET IDENTITY_INSERT [dbo].[product] ON 

INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (1, N'NHẪN PNJ VÀNG TRẮNG 14K ĐÍNH NGỌC TRAI FRESHWATER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GNDRWB81716.602', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (2, N'NHẪN PNJ PHƯỢNG HOÀNG VÀNG TRẮNG 14K ĐÍNH ĐÁ RUBY', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'NTRWA81098.301', NULL, 6, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (3, N'NHẪN PNJ PHƯỢNG HOÀNG VÀNG 18K ĐÍNH ĐÁ RUBY', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'NDRYB81098.600', NULL, 6, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (4, N'NHẪN PNJ VÀNG TRẮNG 14K ĐÍNH ĐÁ SAPPHIRE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GNDRWA69857.600', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (5, N'NHẪN BẠC PNJSILVER ĐÍNH ĐÁ MÀU XANH', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SND2KN08343.400', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (6, N'NHẪN BẠC DIY PNJSILVER ENAMEL HÌNH BÔNG HOA', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N' SNNIKK14460.000', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (7, N'NHẪN BẠC DIY PNJSILVER ENAMEL', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SNNIKK14459.000', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (8, N'NHẪN PNJ VÀNG 14K ĐÍNH NGỌC TRAI FRESHWATER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GNHRYB89607.601', NULL, 1, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (9, N'NHẪN NAM PNJ VÀNG TRẮNG 14K ĐÍNH ĐÁ SAPHIRE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GNTRWA17581.600', NULL, 6, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (10, N'BÔNG TAI PNJ PHƯỢNG HOÀNG VÀNG TRẮNG 14K ĐÍNH ĐÁ RUBY', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRWA81097.300', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (11, N'BÔNG TAI PNJ VÀNG 18K ĐÍNH ĐÁ CITRINE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRCB87733.600', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (12, N'BÔNG TAI PNJ VÀNG 18K ĐÍNH ĐÁ CITRINE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRYA72642.600', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (13, N'BÔNG TAI KIM CƯƠNG PNJ VÀNG TRẮNG 14K', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRWA57853.5A0', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (14, N'BÔNG TAI PNJ VÀNG 14K ĐÍNH NGỌC TRAI FRESHWATER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRYB89604.601', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (15, N'BÔNG TAI PNJ VÀNG TRẮNG 14K ĐÍNH ĐÁ TOPAZ', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'MS: GBDRWB87739.600', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (16, N'ÔNG TAI KIM CƯƠNG PNJ VÀNG TRẮNG 14K', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GBDRWA88371.5A0', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (17, N'BÔNG TAI BẠC HÌNH TRÁI TIM PNJSILVER FRIENDZONE BREAKER ĐÍNH NGỌC TRAI', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SBD2KN14382.200', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (18, N'BÔNG TAI BẠC HÌNH TAM GIÁC PNJSILVER FRIENDZONE BREAKER ĐÍNH NGỌC TRAI', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SBD2KN14410.200', NULL, 2, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (19, N'LẮC TAY PNJ VÀNG TRẮNG 14K ĐÍNH ĐÁ SAPHIRE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GLDRWB81514.604', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (20, N'LẮC TAY BẠC Ý PNJSILVER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SLNIKK14531.000', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (21, N'VÒNG TAY BẠC DIY PNJSILVER ENAMEL HÌNH BÔNG HOA', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SVNIKK14461.000', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (22, N'LẮC TAY PNJ PHƯỢNG HOÀNG VÀNG TRẮNG 14K ĐÍNH ĐÁ RUBY', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GLTRWA81099.301', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (23, N'KIỀNG BẠC Ý PNJSILVER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SHNIKK14496.000', NULL, 5, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (24, N'LẮC TAY BẠC Ý PNJSILVER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SLNIKK14520.000', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (25, N'LẮC TAY BẠC PNJSILVER ĐÍNH ĐÁ', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SLNIKK14456.000', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (26, N'VÒNG TAY PNJ HOA HỒNG VÀNG TRẮNG 14K ĐÍNH NGỌC TRAI FRESHWATER', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GVDRWB89466.601', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (27, N'VÒNG TAY PNJ VÀNG TRẮNG 14K ĐÍNH NGỌC TRAI AKOYA', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GVDRWB87737.600', NULL, 4, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (28, N'MẶT DÂY CHUYỀN PNJ VÀNG 18K ĐÍNH ĐÁ CITRINE', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GMDRCB87732.600', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (29, N'DÂY CỔ PNJ PHƯỢNG HOÀNG VÀNG 18K ĐÍNH ĐÁ RUBY', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GCDRYB81096.601', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (30, N'MẶT DÂY CHUYỀN PNJ VÀNG TRẮNG 14K ĐÍNH NGỌC TRAI AKOYA', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GMDRWB85765.601', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (31, N'MẶT DÂY CHUYỀN KIM CƯƠNG PNJ VÀNG TRẮNG 14K', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GMDRWA70133.5A1', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (32, N'MẶT DÂY CHUYỀN PNJ VÀNG TRẮNG 14K ĐÍNH ĐÁ TOPAZ', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GMDRWB87738.600', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (33, N'MẶT DÂY CHUYỀN KIM CƯƠNG PNJ FIRST DIAMOND VÀNG 14K', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'GMDRHA87585.5A0', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (34, N'MẶT DÂY CHUYỀN BẠC HÌNH TRÁI TIM PNJSILVER FRIENDZONE BREAKER ĐÍNH NGỌC TRAI', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SMD2KN14381.200', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (35, N'DÂY CỔ BẠC HÌNH TAM GIÁC PNJSILVER FRIENDZONE BREAKER ĐÍNH NGỌC TRAI', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'SCH2KK14409.200', NULL, 3, 21, NULL)
INSERT [dbo].[product] ([id], [name], [created_date], [status], [code], [info], [id_type], [created_uid], [id_discount]) VALUES (36, N'MẶT DÂY CHUYỀN BẠC PNJSILVER FRIENDZONE BREAKER ĐÍNH NGỌC TRAI', CAST(N'2018-04-01 00:00:00.000' AS DateTime), 1, N'MS: SMD2KN14406.200', NULL, 3, 21, NULL)
SET IDENTITY_INSERT [dbo].[product] OFF
SET IDENTITY_INSERT [dbo].[product_detail] ON 

INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (1, 10, 5815000, 100, 1)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (2, 10.5, 5942000, 100, 1)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (3, 11, 5959000, 100, 1)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (4, 12, 5980000, 100, 1)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (5, 13, 6029000, 100, 1)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (6, 9, 36526000, 100, 2)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (7, 10, 20170000, 100, 3)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (8, 12, 19770000, 100, 3)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (9, 13, 20195000, 100, 3)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (10, 14, 20037000, 100, 3)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (11, 9, 9530000, 100, 4)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (12, 10, 9645000, 100, 4)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (13, 11, 9799000, 100, 4)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (14, 12, 9894000, 100, 4)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (15, 10, 466000, 100, 5)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (16, 10, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (17, 11, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (18, 12, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (19, 13, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (20, 14, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (21, 20, 680000, 100, 6)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (22, 10, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (23, 11, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (24, 12, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (25, 13, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (26, 13.5, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (27, 14, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (28, 15, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (29, 16, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (30, 20, 720000, 100, 7)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (31, 8, 3879000, 100, 8)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (32, 10, 3831000, 100, 8)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (33, 11, 3967000, 100, 8)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (34, 12, 3986000, 100, 8)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (35, 13, 3995000, 100, 8)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (36, 17, 26573000, 100, 9)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (37, NULL, 57381000, 100, 10)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (38, NULL, 6008000, 100, 11)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (39, NULL, 6030000, 100, 12)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (40, NULL, 20927000, 100, 13)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (41, NULL, 5843000, 100, 14)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (42, NULL, 7599000, 100, 15)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (43, NULL, 56652000, 100, 16)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (44, NULL, 492000, 100, 17)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (45, NULL, 475000, 100, 18)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (46, 16, 15388000, 100, 19)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (47, 19, 2890000, 100, 20)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (48, 50, 1661000, 100, 21)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (49, 52, 1661000, 100, 21)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (50, 53, 1661000, 100, 21)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (51, 54, 1661000, 100, 21)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (52, 55, 1661000, 100, 21)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (53, 15, 57156000, 100, 22)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (54, NULL, 4590000, 100, 23)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (55, NULL, 1990000, 100, 24)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (56, 16, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (57, 17, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (58, 18, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (59, 19, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (60, 23, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (61, 24, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (62, 45, 520000, 100, 25)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (63, 49, 17058000, 100, 26)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (64, 51, 17430000, 100, 26)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (65, 52, 17273000, 100, 26)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (66, 53, 17515000, 100, 26)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (67, 54, 19693000, 100, 26)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (68, 50, 16312000, 100, 27)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (69, 51, 16110000, 100, 27)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (70, 52, 16155000, 100, 27)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (71, 53, 16443000, 100, 27)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (72, 54, 16799000, 100, 27)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (73, NULL, 6868000, 100, 28)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (74, 42, 150832000, 100, 29)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (75, 43, 150414000, 100, 29)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (76, 45, 148592000, 100, 29)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (77, NULL, 13760000, 100, 30)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (78, NULL, 33128000, 100, 31)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (79, NULL, 5142000, 100, 32)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (80, NULL, 4758000, 100, 33)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (81, NULL, 436000, 100, 34)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (82, 40, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (83, 41, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (84, 42, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (85, 43, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (86, 44, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (87, 45, 649000, 100, 35)
INSERT [dbo].[product_detail] ([id], [size], [price], [amount], [id_product]) VALUES (88, NULL, 507000, 100, 36)
SET IDENTITY_INSERT [dbo].[product_detail] OFF
SET IDENTITY_INSERT [dbo].[sale_order] ON 

INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (115647000, 1, 4, CAST(N'2017-06-23 00:00:00.000' AS DateTime), 6)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (40335000, 2, 4, CAST(N'2017-06-24 00:00:00.000' AS DateTime), 7)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (25776000, 3, 4, CAST(N'2017-04-28 00:00:00.000' AS DateTime), 7)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (23090000, 4, 4, CAST(N'2017-07-11 00:00:00.000' AS DateTime), 15)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (27968000, 5, 4, CAST(N'2017-03-10 00:00:00.000' AS DateTime), 3)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (127662000, 6, 4, CAST(N'2017-03-17 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (187364000, 7, 4, CAST(N'2017-12-19 00:00:00.000' AS DateTime), 7)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (38757000, 8, 4, CAST(N'2017-09-22 00:00:00.000' AS DateTime), 7)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (42855000, 9, 4, CAST(N'2017-08-13 00:00:00.000' AS DateTime), 17)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (66176000, 10, 4, CAST(N'2017-07-24 00:00:00.000' AS DateTime), 20)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (261262000, 11, 4, CAST(N'2017-06-07 00:00:00.000' AS DateTime), 5)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (292254000, 12, 4, CAST(N'2017-03-14 00:00:00.000' AS DateTime), 8)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (142537000, 13, 4, CAST(N'2017-11-20 00:00:00.000' AS DateTime), 18)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (82958000, 14, 4, CAST(N'2017-09-14 00:00:00.000' AS DateTime), 5)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (14006000, 15, 4, CAST(N'2017-04-18 00:00:00.000' AS DateTime), 19)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (486884000, 16, 4, CAST(N'2017-02-24 00:00:00.000' AS DateTime), 3)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (87280000, 17, 4, CAST(N'2017-11-16 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (41070000, 18, 4, CAST(N'2017-02-27 00:00:00.000' AS DateTime), 20)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (152291000, 19, 4, CAST(N'2017-10-28 00:00:00.000' AS DateTime), 9)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (304818000, 20, 4, CAST(N'2017-07-29 00:00:00.000' AS DateTime), 15)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (71362000, 21, 4, CAST(N'2017-01-15 00:00:00.000' AS DateTime), 3)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (18350000, 22, 4, CAST(N'2017-10-17 00:00:00.000' AS DateTime), 18)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (80483000, 23, 4, CAST(N'2017-02-16 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (21914000, 24, 4, CAST(N'2017-11-30 00:00:00.000' AS DateTime), 15)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (10876000, 25, 4, CAST(N'2017-11-15 00:00:00.000' AS DateTime), 19)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (17918000, 26, 4, CAST(N'2017-03-30 00:00:00.000' AS DateTime), 13)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (86034000, 27, 4, CAST(N'2017-11-01 00:00:00.000' AS DateTime), 19)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (21439000, 28, 4, CAST(N'2017-07-22 00:00:00.000' AS DateTime), 5)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (2890000, 29, 4, CAST(N'2017-03-17 00:00:00.000' AS DateTime), 21)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (125992000, 30, 4, CAST(N'2017-10-02 00:00:00.000' AS DateTime), 11)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (128202000, 31, 4, CAST(N'2017-04-30 00:00:00.000' AS DateTime), 18)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (578898000, 32, 4, CAST(N'2017-01-15 00:00:00.000' AS DateTime), 15)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (53328000, 33, 4, CAST(N'2017-06-15 00:00:00.000' AS DateTime), 11)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (66481000, 34, 4, CAST(N'2017-05-10 00:00:00.000' AS DateTime), 20)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (11163000, 35, 4, CAST(N'2017-06-06 00:00:00.000' AS DateTime), 9)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (204280000, 36, 4, CAST(N'2017-06-26 00:00:00.000' AS DateTime), 4)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (117634000, 37, 4, CAST(N'2017-05-11 00:00:00.000' AS DateTime), 12)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (54444000, 38, 4, CAST(N'2017-12-08 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (89096000, 39, 4, CAST(N'2017-09-23 00:00:00.000' AS DateTime), 8)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (2890000, 40, 4, CAST(N'2017-07-11 00:00:00.000' AS DateTime), 6)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (22019000, 41, 4, CAST(N'2017-01-01 00:00:00.000' AS DateTime), 10)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (145582000, 42, 4, CAST(N'2017-02-22 00:00:00.000' AS DateTime), 3)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (33131000, 43, 4, CAST(N'2017-11-22 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (129097000, 44, 4, CAST(N'2017-07-24 00:00:00.000' AS DateTime), 12)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (255856000, 45, 4, CAST(N'2017-11-09 00:00:00.000' AS DateTime), 7)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (206518000, 46, 4, CAST(N'2017-04-19 00:00:00.000' AS DateTime), 18)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (71577000, 47, 4, CAST(N'2017-12-29 00:00:00.000' AS DateTime), 2)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (46197000, 48, 4, CAST(N'2017-07-19 00:00:00.000' AS DateTime), 18)
INSERT [dbo].[sale_order] ([total_price], [id], [status], [created_date], [id_user]) VALUES (46865000, 49, 4, CAST(N'2017-08-08 00:00:00.000' AS DateTime), 19)
SET IDENTITY_INSERT [dbo].[sale_order] OFF
SET IDENTITY_INSERT [dbo].[type] ON 

INSERT [dbo].[type] ([id], [name], [gender]) VALUES (1, N'Nhẫn', N'Nữ')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (2, N'Bông tai', N'Nữ')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (3, N'Dây chuyền', N'Nữ')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (4, N'Lắc tay', N'Nữ')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (5, N'Lắc chân', N'Nữ')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (6, N'Nhẫn', N'Nam')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (7, N'Bông tai', N'Nam')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (8, N'Dây chuyền', N'Nam')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (9, N'Bông tai', N'Trẻ em')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (10, N'Dây chuyền', N'Trẻ em')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (11, N'Lắc tay', N'Trẻ em')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (12, N'Lắc chân', N'Trẻ em')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (13, N'Trang sức cưới truyền thống', N'')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (14, N'Trang sức cưới hiện đại', N'')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (15, N'Quà tặng cầu hôn', N'')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (16, N'Quà tặng sinh nhật', N'')
INSERT [dbo].[type] ([id], [name], [gender]) VALUES (17, N'Quà tặng kỉ niệm', N'')
SET IDENTITY_INSERT [dbo].[type] OFF
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (2, N'NguyenTien', N'23467323', N'', N'Nguyễn Thị Cẩm Tiên', CAST(N'2001-03-27' AS Date), N'1283742934', 1, N'72/23/Hòa  Bình', N'tiennnt228@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (3, N'NguyenTu', N'144668235', N'', N'Nguyễn Đình Tú', CAST(N'1894-12-01' AS Date), N'1248250252', 3, N'68 điện bien phủ', N'tu67234@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (4, N'TranLoan22', N'583435457', N'', N'Trần Thị Loan', CAST(N'1895-12-01' AS Date), N'1639814263', 2, N'chư sê, gia lai', N'234bajdvf@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (5, N'DinhTien', N'zgb4235', N'', N'Lê Đình Tiến', CAST(N'1887-08-03' AS Date), N'1638762949', 1, N'buôn mê thuột', N'15502880@gm.uit.edu.vn', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (6, N'LamLam123', N'sh64735vd', N'', N'Thái Bảo Duy Lâm', CAST(N'1893-09-25' AS Date), N'1673945034', 4, N'đắk nông', N'lamlam259@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (7, N'KietLe', N'sfhh56789', N'', N'Lê Viết Kiệt', CAST(N'1954-04-30' AS Date), N'1282349595', 4, N'đồng nai', N'kietleeeee@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (8, N'LoanLeNguyen', N'zxcv356', N'', N'Nguyễn Thị Loan Lê', CAST(N'1888-12-17' AS Date), N'1249395345', 2, N'Biên hòa', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (9, N'Tinhtran1209', N'agfjhgkrwey2435', N'', N'Trần Tinh', CAST(N'2000-01-13' AS Date), N'9583453455', 4, N'THủ dầu một', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (10, N'sauToan1997', N'zvxcvcnx 112', N'', N'Phạm Đình Toàn', CAST(N'1997-05-18' AS Date), N'9038325855', 3, N'6/34/12, long phước', N'ewr56ght@gm.vn', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (11, N'888TuLe', N'1230987352', N'', N'Lê Tú Thảo', CAST(N'1996-10-26' AS Date), N'9048475345', 2, N'Thủ  đức', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (12, N'DatHoang10', N'4236!325!', N'', N'Hoàng Bảo Đạt', CAST(N'1992-10-16' AS Date), N'8347593345', 4, N'cà mau', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (13, N'Tuan78chusu', N'fdhgfj@@@', N'', N'Phan Việt Tuấn', CAST(N'1997-02-18' AS Date), N'123679878', 3, N'Kiên giang', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (14, N'Chinsnnuocmam', N'fdhtu*24235', N'', N'Hoàng Mẫn', CAST(N'1995-06-24' AS Date), N'2534634533', 4, N'Tiền Giang', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (15, N'cakhothom', N'jksncmdsn', N'', N'Bành Thị Thơm', CAST(N'1997-07-17' AS Date), N'1912482054', 2, N'Mỹ Tho, Tiền Giang', N'thombanhthi@gmail.com', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (16, N'thiettinhle', N'ag3326hdbv', N'', N'Lê Thiết Tính', CAST(N'1998-08-18' AS Date), N'12432543764', 1, N'Long An', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (17, N'cacom76dung', N'dsfafsdv', N'', N'Mã Văn Dũng', CAST(N'1999-08-18' AS Date), N'16836554893', 3, N'Chư Bứ', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (18, N'beheokute', N'cca23456', N'', N'Phaạm Thị Heo', CAST(N'2011-10-20' AS Date), N'16425992363', 4, N'Pleiku', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (19, N'HoanThIenIn', N'2456hoan', N'', N'Mai Đào Thơm', CAST(N'1998-04-18' AS Date), N'90724583458', 2, N'Quận 1', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (20, N'NLhangHHH', N'NLhangHHH', N'', N'Mai Bảo Thắng', CAST(N'1997-01-28' AS Date), N'24543364436', 2, N'quận 2', N'', 1)
INSERT [dbo].[users] ([id], [username], [password], [auth_key], [name], [dob], [phone], [role], [address], [email], [status]) VALUES (21, N'admin', N'admin', N'', N'Phạm Thành Nghĩa', CAST(N'2000-09-19' AS Date), N'36347456345', 1, N'quận 7', N'nghia@gmail.com', 1)
SET IDENTITY_INSERT [dbo].[users] OFF
ALTER TABLE [dbo].[discount_product]  WITH CHECK ADD FOREIGN KEY([created_uid])
REFERENCES [dbo].[users] ([id])
GO
ALTER TABLE [dbo].[image_product]  WITH CHECK ADD FOREIGN KEY([id_product])
REFERENCES [dbo].[product] ([id])
GO
ALTER TABLE [dbo].[order_line]  WITH CHECK ADD FOREIGN KEY([id_bill])
REFERENCES [dbo].[sale_order] ([id])
GO
ALTER TABLE [dbo].[order_line]  WITH CHECK ADD FOREIGN KEY([id_product])
REFERENCES [dbo].[product] ([id])
GO
ALTER TABLE [dbo].[product]  WITH CHECK ADD FOREIGN KEY([created_uid])
REFERENCES [dbo].[users] ([id])
GO
ALTER TABLE [dbo].[product]  WITH CHECK ADD FOREIGN KEY([id_discount])
REFERENCES [dbo].[discount_product] ([id])
GO
ALTER TABLE [dbo].[product]  WITH CHECK ADD FOREIGN KEY([id_type])
REFERENCES [dbo].[type] ([id])
GO
ALTER TABLE [dbo].[product_detail]  WITH CHECK ADD FOREIGN KEY([id_product])
REFERENCES [dbo].[product] ([id])
GO
ALTER TABLE [dbo].[sale_order]  WITH CHECK ADD FOREIGN KEY([id_user])
REFERENCES [dbo].[users] ([id])
GO
USE [master]
GO
ALTER DATABASE [JD] SET  READ_WRITE 
GO
