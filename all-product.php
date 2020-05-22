	<?php
	include 'header.php';
	?>
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
						<li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
						<li class="nav-item dropdown">
							<?php $categoryi = mysqli_query($conn,"SELECT * FROM category WHERE status=1 ORDER BY id DESC") ?>
							<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">category</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<?php foreach ($categoryi as $dm) {?>
									<a class="dropdown-item" href="shop.html"><?php echo $dm['name'] ?></a>
								<?php } ?>
							</div>
						</li>
						<li class="nav-item"><a href="about.html" class="nav-link"></a></li>
						<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
						<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
						<li class="nav-item"><a href="registration.php" class="nav-link">registration</a></li>
						<li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

					</ul>
				</div>
			</div>
		</nav>
		<?php  $sql = "SELECT * FROM banner WHERE status = 1 Order By ordering ASC";
		$banner = mysqli_query($conn,$sql); ?>

		<section id="home-section" class="hero">
			<div class="home-slider owl-carousel">
				
				<?php foreach ($banner as $value) {?>
					<div class="slider-item" style="background-image: url('public/uploads/<?php echo $value['link_image'] ?>');">
						<div class="overlay"></div> 
						<div class="container">
							<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

								<div class="col-sm-12 ftco-animate text-center">
									<h1 class="mb-2"><?php echo $value['name'] ?></h1>
									<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
									<p><a href="<?php echo $value['link_href'] ?>" class="btn btn-primary">View Details</a></p>
								</div>

							</div>
						</div>
					</div>
				<?php } ?>

			</div>
		</section>
		<hr>
		<div class="container">
			<div role="tabpanel">
             <?php $cats = mysqli_query($conn,"SELECT * FROM category WHERE status = 1 ORDER BY name ASC") ?>
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach ($cats as $key => $cat) { ?>
					<li role="presentation" class="<?php echo $key ==0? 'active' : ''  ?>">
						<a href="#tab<?php echo $cat['id'] ?>" aria-controls="home" class="btn btn-default" data-toggle="tab"><?php echo $cat['name'] ?></a>
					</li>
			    <?php } ?>
			</ul>
		<br>
		<hr>
			<!-- Tab panes -->
			<div class="tab-content">
               <?php foreach ($cats as $key1 => $cat1) { 
               	   $cat_id = $cat1['id'];
               	   $catofpro = mysqli_query($conn,"SELECT * FROM product WHERE status = 1 AND category_id = $cat_id order by id DESC LIMIT 8");
               	?>
				<div role="tabpanel" class="tab-pane <?php echo $key1 ==0? 'active' : ''  ?>" id="tab<?php echo $cat1['id'] ?>">
							<div class="container">
								<div class="row">
									<?php foreach ($catofpro as $top) { ?>
										<div class="col-md-6 col-lg-3 ftco-animate">
											<div class="product">
												<a class="img-prod"><img class="img-fluid" src="public/uploads/<?php echo $top['image'] ?>" alt="Colorlib Template">
													<div class="overlay"></div>
												</a>
												<div class="text py-3 pb-4 px-3 text-center">
													<h3><a href="#"><?php echo $top['name'] ?></a></h3>
													<div class="d-flex">
														<div class="pricing">
															<p class="price"><span class="mr-2 price-dc"><?php echo $top['price'] ?></span><span class="price-sale"><?php echo $top['sale_price'] ?></span></p>
														</div>
													</div>
													<div class="bottom-area d-flex px-3">
														<div class="m-auto d-flex">
															<a href="product-detail.php?id=<?php echo $top['id'] ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center" >
																<span><i class="ion-ios-menu"></i></span>
															</a>
															<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
																<span><i class="ion-ios-cart"></i></span>
															</a>
														</div>
													</div>


												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
			    </div>
                <?php } ?>
			</div>
		</div>
		</div>
		<!-- danh mục -->
		<hr>
		<!-- sản phẩm -->
		<section class="ftco-section">
  		
<!-- 			</div> -->
	
		</section>
		
		<section class="ftco-section img" style="background-image: url(public/images/bg_3.jpg);">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
						<span class="subheading">Best Price For You</span>
						<h2 class="mb-4">Deal of the day</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
						<h3><a href="#">Spinach</a></h3>
						<span class="price">$10 <a href="#">now $5 only</a></span>
						<div id="timer" class="d-flex mt-5">
							<div class="time" id="days"></div>
							<div class="time pl-3" id="hours"></div>
							<div class="time pl-3" id="minutes"></div>
							<div class="time pl-3" id="seconds"></div>
						</div>
					</div>
				</div>   		
			</div>
		</section>

		<section class="ftco-section testimony-section">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
					<div class="col-md-7 heading-section ftco-animate text-center">
						<span class="subheading">Testimony</span>
						<h2 class="mb-4">Our satisfied customer says</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
					</div>
				</div>
				<div class="row ftco-animate">
					<div class="col-md-12">
						<div class="carousel-testimony owl-carousel">
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									<div class="user-img mb-5" style="background-image: url(public/images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Garreth Smith</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									<div class="user-img mb-5" style="background-image: url(public/images/person_2.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Garreth Smith</p>
										<span class="position">Interface Designer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									<div class="user-img mb-5" style="background-image: url(public/images/person_3.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Garreth Smith</p>
										<span class="position">UI Designer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									<div class="user-img mb-5" style="background-image: url(public/images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Garreth Smith</p>
										<span class="position">Web Developer</span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="testimony-wrap p-4 pb-5">
									<div class="user-img mb-5" style="background-image: url(public/images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
									</div>
									<div class="text text-center">
										<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
										<p class="name">Garreth Smith</p>
										<span class="position">System Analyst</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<hr>

		<section class="ftco-section ftco-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm ftco-animate">
						<a href="#" class="partner"><img src="public/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
					</div>
					<div class="col-sm ftco-animate">
						<a href="#" class="partner"><img src="public/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
					</div>
					<div class="col-sm ftco-animate">
						<a href="#" class="partner"><img src="public/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
					</div>
					<div class="col-sm ftco-animate">
						<a href="#" class="partner"><img src="public/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
					</div>
					<div class="col-sm ftco-animate">
						<a href="#" class="partner"><img src="public/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
					</div>
				</div>
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
		<?php include 'footer.php'; ?>


		<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
		<div class="modal fade" id="modal-id">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<iframe src="">
							<textarea name="content" id="<?php echo $top['name'] ?>" class="form-control" rows="3" ></textarea>
						</iframe>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
