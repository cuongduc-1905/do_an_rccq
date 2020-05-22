	<?php 
	session_start();
	include 'config/connect.php';
	$id = !empty($_GET['id'])?($_GET['id']):0;
	$action = !empty($_GET['action'])?($_GET['action']):'add';
	$quantity = !empty($_GET['quantity'])?($_GET['quantity']): 1;

	// echo $quantity;die;
	  //truy vấn
	$query = mysqli_query($conn,"SELECT * FROM product WHERE id = $id");
	$pro = mysqli_fetch_assoc($query); 
	$carts=!empty($_SESSION['cart']) ? $_SESSION['cart'] : [];
	if ($action == 'add' && $pro) {
		if (isset($carts[$id])) {
			$carts[$id]['quantity'] += $quantity;
		}else{
			$cart =[
				'id' => $pro['id'],
				'name' => $pro['name'],
				'image' => $pro['image'],
				'price' => $pro['sale_price']>0 ? $pro['sale_price'] : $pro['price'],
				'quantity' => $quantity
			];
			$carts[$id]=$cart; 
		}
			$_SESSION['cart']=$carts;
	echo '<pre>';
	print_r($_SESSION['cart']);
	//xóa
	
	}

	if ($action == 'delete') {
		if (isset($_SESSION['cart'][$id])) {
		      unset($_SESSION['cart'][$id]);
		}
	}
	//cập nhật số lượng
    if ($action == 'update') {
    	$qtt = $_GET['quantity'];
    	$ids = $_GET['ids'];
    	for($i=0 ; $i < count($ids) ;  $i++){
    		$id = $ids[$i];
    		$quantity = $qtt[$i]>0 ?  $qtt[$i] : 1;
    		$_SESSION['cart'][$id]['quantity']=$quantity;
    	}
    	echo "<pre>";
    	print_r($qtt);
    	print_r($ids);

    }
    echo '<pre>';
	print_r($_SESSION['cart']);
	//xóa hết
	if ($action == 'clear'){
       unset($_SESSION['cart']);
	}

	// chuyển hướng về danh sách giỏ hàng
	header('location: cat-list.php');
	?>