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
    <?php 
    if (!empty($_POST["_name"])&&!empty($_POST["_email"])&&!empty($_POST["_password"])
              &&!empty($_POST["_address"])&&!empty($_POST["_phone"])) {
      $name=$_POST["_name"];
      $email=$_POST["_email"];
      $password=$_POST["_password"];
      $address=$_POST["_address"];
      $phone=$_POST["_phone"];

      $name_regex='/[a-zA-Z]/';
      $email_regex='/^([a-zA-Z]{4,12})@([a-z]{4,10})\.([a-z]{2,6})$/';
      $password_regex='/[a-zA-Z]/';
      $address_regex='/[a-zA-Z]/';
      $phone_regex='/^[0-9]{10}$/';

      if(preg_match($name_regex, $name)&&preg_match($email_regex, $email)
                &&preg_match($password_regex , $password)&&preg_match($phone_regex, $phone)){
        if (mysqli_query($conn, "INSERT INTO customer(name,email,password,address,phone) VALUES ('$name','$email','$password','$address','$phone' )" )) {
          header('location: registration-success.php?complete=true');
        }else{
          header('location: registration-success.php?complete=false');
        }
      }else{ ?>
        <div class="alert container-fluid">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <strong>Nhập sai</strong> Alert body ...
        </div>
        <?php 
        }
      }
     
     ?>
    <div class="container">
      <form action="" method="POST" role="form">
        <legend>đăng ký</legend>
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" id="" name="_name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" id="" name="_email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text" class="form-control" id="" name="_password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" class="form-control" id="" name="_address" name placeholder="Address" required>
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" class="form-control" id="" name="_phone" placeholder="Phone" required>
        </div>
      
        
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    
    <hr>
    
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
