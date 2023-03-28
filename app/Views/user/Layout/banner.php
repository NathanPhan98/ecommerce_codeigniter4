<div class="sec-banner bg0 p-t-95 p-b-55">
		<div class="container">
			<div class="row">
				<?php 
					$stt =1 ;
					foreach($cateHP as $row) {
						
						if($stt==1||$stt==2){?>
				<div class="col-md-6 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="assets/user/images/cateimages/<?php echo $row['cate_image'] ?>" alt="IMG-BANNER">
						<a href="product" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $row['category_name']; ?>
								</span>
								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div> <?php } else { ?>
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img height="340" src="assets/user/images/cateimages/<?php echo $row['cate_image'] ?>" alt="IMG-BANNER">
						<a href="product" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $row['category_name']; ?>
								</span>
								<span class="block1-info stext-102 trans-04">
									Discover together.
								</span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php } $stt++; }?>

				
			</div>
		</div>
	</div>