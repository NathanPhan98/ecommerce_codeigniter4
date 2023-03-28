
<div style="height:300px;background-color:black">
	<h2 style="padding-top: 150px;" class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">Product Detail</h2>
</div>
<!-- breadcrumb -->
<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $productDetail[0]['category_name'] ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				<?php echo $productDetail[0]['name'] ?>
			</span>
		</div>
	</div>
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="assets/user/images/products/<?php echo $productDetail[0]['img']?>">
									<div class="wrap-pic-w pos-relative">
										<img src="assets/user/images/products/<?php echo $productDetail[0]['img']?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="assets/user/images/products/<?php echo $productDetail[0]['img']?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14"><?php echo $productDetail[0]['name'] ?></h4>
						<span style="font-weight: bold;font-size:50px" class="mtext-106 cl2">
						$<?php echo $productDetail[0]['price'] ?>
						</span>
						<p class="stext-102 cl3 p-t-23">Category : <?php echo $productDetail[0]['category_name'] ?></p>
						<p class="stext-102 cl3 p-t-23">Quantity : <?php echo $productDetail[0]['quantity'] ?></p>
						<?php foreach($AverageReviews as $Arv){ 
							if($Arv['pdID']==$productDetail[0]['product_id']){
								$averageRv = floor($Arv['starNum']/$Arv['product_id']);}}?>
								<span class="fs-18 cl11">
								<?php if(isset($averageRv)){
								for($i = 0; $i < $averageRv; $i++){?>
									<i class="zmdi zmdi-star"></i>
								<?php }  for($i = 0; $i < 5-$averageRv; $i++) {?>
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
									<?php }} else { echo "<p>Not yet rated</p>"; } ?>
								</span>
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<form action="addOneToCart" method="post">
									<?php $session = session();
									if(!isset($_SESSION['cart'][$productDetail[0]['product_id']])|| $_SESSION['cart'][$productDetail[0]['product_id']] < $productDetail[0]['quantity'] and $productDetail[0]['quantity'] > 0){ ?>
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>
										<input class="mtext-104 cl3 txt-center num-product" type="number" min="1" max="<?php echo $productDetail[0]['quantity']?>" name="quantity" value="<?php echo isset($_SESSION['cart'][$productDetail[0]['product_id']])==true?  $_SESSION['cart'][$productDetail[0]['product_id']]: 1; ?>">
										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>																																
									<input type="hidden" name="productID" value="<?php echo $productDetail[0]['product_id']?>">	
									<button class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" type="submit" class="site-btn btn-line btn-update">Add to Cart</button>
									<?php }else $flag = true; ?>
									</form>
								</div>
							</div>	
						</div>
						<?php 
						 	if(isset($flag) && $flag){ ?><h4 style="color:brown">Sorry, the product is temporarily out of stock.</h4><?php } ?>
					</div>
				</div>
			</div>
			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (<?php echo count($reviews) ?>)</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $productDetail[0]['detail'] ?>
								</p>
							</div>
						</div>
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<?php
										$flag = true;
											foreach($reviews as $row){
										?>
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<?php if($row['avatar']==null){ ?>
												<img src="assets/user/images/userAvatar/NonAvatar.jpg" alt="avt">
												<?php }else { ?>
													<img src="assets/user/images/userAvatar/<?php echo $row['avatar']?>" alt="AVATAR">
												<?php } ?>
											</div>
											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20"><?php echo $row['fullname'] ?></span>
													<h7 >(<?php echo $row['email'] ?>)</h7>
													<span class="fs-18 cl11"><?php 
														for($i = 0; $i < $row['starNum']; $i++){?>
															<i class="zmdi zmdi-star"></i><?php } ?>
													</span>
												</div>
												<p class="stext-102 cl6"><?php echo $row['review_content'] ?></p>
												<?php if(isset($_SESSION['customerID'])){
														if($row['user_id'] == $_SESSION['customerID']){ $flag = false;?>
													<button data-toggle="modal" data-target="#editReview<?php echo $row['rv_id']?>" style="margin-top:10px ;" class="flex-c-m stext-101 cl0 size-91 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" >Edit your review</button>
													<?php }}?>
											</div>
										</div>
										<?php } ?>
										<!-- Add review -->
										<?php
											if(!isset($_SESSION['customerID'])){
											$flag = false; ?>
											<h5 class="mtext-108 cl2 p-b-7" style="text-align: center;color:dimgrey">
												<a style="color:dimgrey" href="login">Login Here if you wanna rate this product</a></h5>
											<?php } if($flag){?>
										<form class="w-full" action="act_AddReview" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">Add a review</h5>
											<p class="stext-102 cl6">Your email address will not be published. Required fields are marked *</p>
											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">Your Rating</span>
												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="starNum">
												</span>
											</div>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>
											</div>
											<input type="hidden" name="user_id" value="<?php echo $_SESSION['customerID'] ?>">
											<input type="hidden" name="product_id" value="<?php echo $productDetail[0]['product_id'] ?>">
											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">Submit</button>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Code: <?php echo $productDetail[0]['product_id']?>
			</span>

			<span class="stext-107 cl6 p-lr-25">
				Categories: <?php echo $productDetail[0]['category_name'] ?>
			</span>
		</div>
		
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php foreach($relatedProduct as $row){ if($row['product_id']!=$productDetail[0]['product_id']){?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="assets/user/images/products/<?php echo $row['img'] ?>" alt="IMG-PRODUCT">
								<a href="productdetail/<?php echo $row['product_id']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View</a>
							</div>
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row['name'] ?></a>
									<span style="font-weight: bold;font-size:large" class="stext-105 cl3">$ <?php echo $row['price'] ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>
			</div>
		</div>
	</section>
<?php foreach($reviews as $row){ ?>
	<div style="padding-top: 60px;" class="modal fade" id="editReview<?php echo $row['rv_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<form action="act_updateReview" method="POST">
				<div class="modal-content">			
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit your Review</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<div class="col-12 p-b-5">
						<span class="stext-102 cl3 m-r-16">
							Do you want to rate again?
							</span>
							<span class="wrap-rating fs-18 cl11 pointer">
								<i class="item-rating pointer zmdi zmdi-star-outline"></i>
								<i class="item-rating pointer zmdi zmdi-star-outline"></i>
								<i class="item-rating pointer zmdi zmdi-star-outline"></i>
								<i class="item-rating pointer zmdi zmdi-star-outline"></i>
								<i class="item-rating pointer zmdi zmdi-star-outline"></i>
								<input class="dis-none" type="number" name="starNum">
							</span>
							<label class="stext-102 cl3" for="review">Your review</label>
							<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"><?php echo $row['review_content'] ?></textarea>
						</div>
					</div>
					<div class="modal-footer">
					<input type="hidden" name="product_id" value="<?php echo $productDetail[0]['product_id']?>">
					<input type="hidden" name="rv_id" value="<?php echo $row['rv_id'] ?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button class="flex-c-m stext-101 cl0 size-101 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Accept</button>
					</div>
				</div>
			</form>	
			</div>
		</div>
		<?php  } ?>