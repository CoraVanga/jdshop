USE [master]
GO
/****** Object:  Database [JD]    Script Date: 5/7/2018 6:43:50 PM ******/
CREATE DATABASE [JD]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'JD', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\JD.mdf' , SIZE = 3136KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'JD_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\JD_log.ldf' , SIZE = 784KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
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
/****** Object:  Table [dbo].[discount_product]    Script Date: 5/7/2018 6:43:50 PM ******/
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
/****** Object:  Table [dbo].[image_product]    Script Date: 5/7/2018 6:43:50 PM ******/
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
/****** Object:  Table [dbo].[order_line]    Script Date: 5/7/2018 6:43:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[order_line](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[amount] [int] NULL,
	[size_product] [int] NULL,
	[sum_price] [int] NULL,
	[code_color] [int] NULL,
	[id_product] [int] NULL,
	[id_bill] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[product]    Script Date: 5/7/2018 6:43:50 PM ******/
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
/****** Object:  Table [dbo].[product_detail]    Script Date: 5/7/2018 6:43:50 PM ******/
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
/****** Object:  Table [dbo].[sale_order]    Script Date: 5/7/2018 6:43:50 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sale_order](
	[total_price] [int] NULL,
	[id] [int] IDENTITY(1,1) NOT NULL,
	[bill_code] [nvarchar](20) NULL,
	[status] [int] NULL,
	[created_date] [datetime] NULL,
	[id_user] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[type]    Script Date: 5/7/2018 6:43:50 PM ******/
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
/****** Object:  Table [dbo].[users]    Script Date: 5/7/2018 6:43:50 PM ******/
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
