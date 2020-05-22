<?php 
session_start();
include 'header.php'; ?>
<?php 	$carts=!empty($_SESSION['cart'] ) ? $_SESSION['cart'] : []; ?>

<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text">+ 1235 2355 98</span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text">youremail@email.com</span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">Vegefoods</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="shop.html">Shop</a>
							<a class="dropdown-item" href="wishlist.html">Wishlist</a>
							<a class="dropdown-item" href="product-single.html">Single Product</a>
							<a class="dropdown-item" href="cart.html">Cart</a>
							<a class="dropdown-item" href="checkout.html">Checkout</a>
						</div>
					</li>
					<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
					<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
					<li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->

	<div class="hero-wrap hero-bread" style="background-image: url('public/uploads/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
					<h1 class="mb-0 bread">My Wishlist</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
			<div class="container">
				<?php if (count($carts)>0): ?>
					

		<form action="cart.php" method="get" accept-charset="utf-8">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="cart-list">
							<table class="table">
								<thead class="thead-primary">
									<tr class="text-center">
										<th>&nbsp;</th>
										<th>Product List</th>
										<th>name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($carts as $cat) { 
										$tt = $cat['quantity'] * $cat['price'];
										?>
										<tr class="text-center">
											<td class="product-remove"><a href="cart.php?id=<?php echo $cat['id']?>&action=delete"><span class="ion-ios-close"></span></a></td>

											<td class="image-prod"><div class="img" style="background-image:url(public/uploads/<?php echo $cat['image'] ?>);"></div></td>

											<td class="product-name">
												<a href="product-detail.php?id=<?php echo $cat['id'] ?>"><h2><?php echo $cat['name'] ?></h2></a>
											</td>

											<td class="price"><?php echo $cat['price'] ?></td>

											<td class="quantity">
												<input type="hidden" name="ids[]" value="<?php echo $cat['id'] ?>" min="1" max="100">
												<div class="input-group mb-3">
													<input type="button" class="minus" value="-">
													<input type="text" name="quantity[]" class="quantity form-control input-number" value="<?php echo $cat['quantity'] ?>" min="1" max="100">
													<input type="button" class="plus" value="+">
												</div>
											</td>
											<td class="total"><?php echo number_format($tt)  ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<input type="hidden" name="action" value="update">
							<button type="submit" class="btn btn-primary btn-sm pull-right">cập nhật giỏ hàng</button>
							<a class="btn btn-danger pull-right" href="cart.php?action=clear" onclick="return confirm('bạn có chắc không?')">xóa hết</a>
							<br>
							<hr>
						</div>
					</div>
				</div>
		</form>	
		<?php else: ?>
            <div class="alert alert-danger">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<strong>note ! </strong> bạn chưa có sản phẩm, vui lòng thêm sản phẩm vào giỏ hàng ...  <a href="index.php">tiếp tục mua hàng </a>
            </div>
		<?php endif; ?>
			</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<input type="text" class="form-control" placeholder="Enter email address">
							<input type="submit" value="Subscribe" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php include 'footer.php' ?>    
</body>
</html>
<script type="text/javascript">
	$('.plus').click(function(Event){
		var _qtt = $(this).parent().find('input.quantity').val();
		var _newqtt =  parseInt(_qtt )  + 1;
		$(this).parent().find('input.quantity').val(_newqtt);
	});

	$('.minus').click(function(Event){
		var _qtt = $(this).parent().find('input.quantity').val();
		var _newqtt = _newqtt >1 ?  parseInt(_qtt )- 1 : 1 ;
		$(this).parent().find('input.quantity').val(_newqtt);
	});
</script>