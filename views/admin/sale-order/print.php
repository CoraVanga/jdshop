<?php
    use app\models\Users;
    use app\models\SaleOrder;
    use yii\helpers\Html;
	use yii\grid\GridView;
	use yii\widgets\LinkPager;
	//use app\web\fpdf181\fpdf;
	require_once Yii::$app->basePath .'/web/tfpdf/tfpdf.php';
	//define('FPDF_FONTPATH',Yii::$app->basePath."/web/tfpdf/fonts");
	//A4 width : 219mm
	//default margin : 10mm each side
	//writable horizontal : 219-(10*2)=189mm

	//create pdf object
	$pdf = new tFPDF('P','mm','A4');
	//add new page
	$pdf->AddPage();

	$pdf->AddFont('DejaVu','','times.ttf',true);
	$pdf->AddFont('DejaVuB','','timesbd.ttf',true);
	$pdf->SetFont('DejaVuB','',14);

	//set font to arial, bold, 14pt
	//$pdf->SetFont($fontName,'','HelveticaNeue LightCond.ttf',true);

	//Cell(width , height , text , border , end line , [align] )

	$pdf->Cell(130 ,5,'Trang Sức Cao Cấp JD',0,0);
	$pdf->Cell(59 ,5,'Hóa đơn',0,1);//end of line

	//set font to arial, regular, 12pt
	$pdf->SetFont('DejaVu','',12);

	$pdf->Cell(130 ,5,'170E Phan Đăng Lưu',0,0);
	$pdf->Cell(59 ,5,'',0,1);//end of line

	$pdf->Cell(130 ,5,'Phường 3,Tỉnh Gia Lai',0,0);
	$pdf->Cell(28 ,5,'Ngày tạo: ',0,0);
	$pdf->Cell(10 ,5,date("d/m/Y", strtotime($model->created_date)),0,1);//end of line

	$pdf->Cell(130 ,5,'SĐT: 028 3995 1703',0,0);
	$pdf->Cell(28 ,5,'Đơn hàng số: ',0,0);
	$pdf->Cell(10 ,5,$model->id,0,1);//end of line

	$pdf->Cell(130 ,5,'Fax: 028 3995 1702',0,0);
	$pdf->Cell(28 ,5,'Mã khách hàng: ',0,0);
	$pdf->Cell(10 ,5,$model->user->id,0,1);//end of line

	//make a dummy empty cell as a vertical spacer
	$pdf->Cell(189 ,10,'',0,1);//end of line

	//billing address
	$pdf->Cell(100 ,5,'Hóa đơn tới',0,1);//end of line

	//add dummy cell at beginning of each line for indentation
	$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'Tên khách hàng: '.$model->user->name,0,1);

	// $pdf->Cell(10 ,5,'',0,0);
	// $pdf->Cell(90 ,5,'[Company Name]',0,1);

	$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'Địa chỉ: '.$model->user->address,0,1);

	$pdf->Cell(10 ,5,'',0,0);
	$pdf->Cell(90 ,5,'Số điện thoại: '.$model->user->phone,0,1);

	//make a dummy empty cell as a vertical spacer
	$pdf->Cell(189 ,10,'',0,1);//end of line

	//invoice contents
	$pdf->SetFont('DejaVuB','',14);

	$pdf->Cell(114 ,7,'Tên sản phẩm',1,0);
	$pdf->Cell(25 ,7,'Kích cỡ',1,0,'C');
	$pdf->Cell(25 ,7,'Số lượng',1,0,'C');
	$pdf->Cell(25 ,7,'Giá',1,1,'C');//end of line

	$pdf->SetFont('DejaVu','',10);

	//Numbers are right-aligned so we give 'R' after new line parameter
	foreach($model->orderLines as $orderline)
    {
    	if(strlen($orderline->product->name)>=55)
    	{
	    	$y = $pdf->GetY();
	    	$pdf->MultiCell(114 ,7,$orderline->product->name,1,'L',false);
	    	$x = $pdf->GetX();
	    	$pdf->setXY($x+114,$y);
			$pdf->Cell(25 ,14,$orderline->size_product,1,0,'C');
			$pdf->Cell(25 ,14,$orderline->amount,1,0,'C');
			$pdf->Cell(25 ,14,number_format($orderline->sum_price),1,1,'C');//end of line
		}
		else
		{
	    	$pdf->Cell(114 ,7,$orderline->product->name,1,0);
			$pdf->Cell(25 ,7,$orderline->size_product,1,0,'C');
			$pdf->Cell(25 ,7,$orderline->amount,1,0,'C');
			$pdf->Cell(25 ,7,number_format($orderline->sum_price),1,1,'C');//end of line
		}
    }
	// $pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
	// $pdf->Cell(25 ,5,'-',1,0);
	// $pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

	// $pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
	// $pdf->Cell(25 ,5,'-',1,0);
	// $pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

	// $pdf->Cell(130 ,5,'Something Else',1,0);
	// $pdf->Cell(25 ,5,'-',1,0);
	// $pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line

	//summary
	// $pdf->Cell(130 ,5,'',0,0);
	// $pdf->Cell(25 ,5,'Subtotal',0,0);
	// $pdf->Cell(4 ,5,'$',1,0);
	// $pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

	// $pdf->Cell(130 ,5,'',0,0);
	// $pdf->Cell(25 ,5,'Taxable',0,0);
	// $pdf->Cell(4 ,5,'$',1,0);
	// $pdf->Cell(30 ,5,'0',1,1,'R');//end of line

	// $pdf->Cell(130 ,5,'',0,0);
	// $pdf->Cell(25 ,5,'Tax Rate',0,0);
	// $pdf->Cell(4 ,5,'$',1,0);
	// $pdf->Cell(30 ,5,'10%',1,1,'R');//end of line
    //make a dummy empty cell as a vertical spacer
    $pdf->SetFont('DejaVuB','',15);
	$pdf->Cell(189 ,5,'',0,1);//end of line
	$pdf->Cell(125 ,5,'',0,0);
	$pdf->Cell(30 ,5,'Tổng cộng: ',0,0);
	$pdf->Cell(30 ,5,number_format($model->total_price).' VNĐ',0,1,'L');//end of line

	//output the result
	$pdf->Output();
?>