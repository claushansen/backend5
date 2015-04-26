<?php 
include_once('settings.php');
$page = $_GET['view'];

switch ($page) {
    case "invoice":
      include_once('classes/invoice.class.php');
	  $model = new Invoice();
	  include_once('views/invoice_view.php');
	  $view = new InvoiceView($model);
        break;
    case "user":
	echo 'This will be user details';
//    include_once('classes/user.class.php');
//	  $model = new User();
//	  include_once('views/user_view.php');
//	  $view = new UserView($model);
        break;
		
	case "product":
	echo 'This will be product details';
//      include_once('classes/product.class.php');
//	  $model = new Product();
//	  include_once('views/product_view.php');
//	  $view = new ProductView($model);
        break;
    
    default:
        echo "Welcome to our shop";
}




?>