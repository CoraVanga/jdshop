 <?php 
use app\models\Product;
use yii\widgets\LinkPager;
   $product = new Product();
 ?>



 <?php
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>