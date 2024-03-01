<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <?= $this->Html->charset('utf-8') ?>
    <?= $this->Html->meta('viewport', 'width=device-width, initial-scale=1') ?>
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="<?php echo $this->request->webroot;?>projectfiles/images/favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <script src="https://kit.fontawesome.com/4dbd72e60b.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/css/tiny-slider.css">
	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/css/aos.css">
	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/css/glightbox.min.css">
	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/css/style.css">

	<link rel="stylesheet" href="<?php echo $this->request->webroot?>projectfiles/css/flatpickr.min.css">

  <?= $this->Html->css('style.css') ?>

	<title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
<style>
.icon{
  color:white;
  font-size:20px;
}
</style>


</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="index.html" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="/blogproject/Homepage/">Home</a></li>
                <!-----------------------------
								<li class="has-children">
									<a href="category.html">Pages</a>
									<ul class="dropdown">
										<li><a href="search-result.html">Search Result</a></li>
										<li><a href="blog.html">Blog</a></li>
										<li><a href="single.html">Blog Single</a></li>
										<li><a href="category.html">Category</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="#">Menu One</a></li>
										<li><a href="#">Menu Two</a></li>
										<li class="has-children">
											<a href="#">Dropdown</a>
											<ul class="dropdown">
												<li><a href="#">Sub Menu One</a></li>
												<li><a href="#">Sub Menu Two</a></li>
												<li><a href="#">Sub Menu Three</a></li>
											</ul>
										</li>
									</ul>
								</li>
                ----------------->

								<li><a href="category.html">Business</a></li>
								<li><a href="category.html">Politics</a></li>
                <li><a href="category.html">Others</a></li>
							</ul>
						</div>
						<div class="col-2 text-end">
              <!-----------------
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="#" class="search-form d-none d-lg-inline-block">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span> --------------->
                <?php $session=$this->request->getSession();
                ?>
                <?php if(empty($session->read('user'))){?>
                <a href="/blogproject/users/login" > <i class="fa-solid fa-right-to-bracket icon"> </i></a>
              <?php }else{ ?>
              <a href="/blogproject/Homepage/upload"><i class="fa-solid fa-arrow-up-from-bracket icon" style="margin-right:25px;"></i></a>
               <a href="/blogproject/Homepage/profile" ><i class="fa-regular fa-user icon"></i></a>
               <a href="/blogproject/Users/signout" ><i class="fa-solid fa-right-from-bracket icon" style="margin-left:25px;"></i></a>
              <?php } ?>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</nav>
  <?php echo $this->Flash->render();?>
