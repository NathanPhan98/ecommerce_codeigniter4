<div style="height:300px;background-color:black">
	<h2 style="padding-top: 150px;" class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">List of Products</h2>
</div>
<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					<?php foreach($cateHP as $row) {?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $row['category_id']; ?>">
						<?php echo $row['category_name']; ?>
					</button>
					<?php } ?>
				</div>
			</div>
			<div class="row isotope-grid">
				<?php foreach ($products as $row){?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $row['category_id']; ?>">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="assets/user/images/products/<?php echo $row['img'] ?>" alt="IMG-PRODUCT">
							<a href="productdetail/<?php echo $row['product_id']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick view
							</a>
						</div>
						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $row['name'] ?></a>
								<?php foreach($AverageReviews as $Arv){ 
									if($Arv['pdID']==$row['product_id']){
									$averageRv = floor($Arv['starNum']/$Arv['product_id']);?>
										<span class="fs-18 cl11">
											<?php for($i = 0; $i < $averageRv; $i++){?>
												<i class="zmdi zmdi-star"></i>
											<?php } for($i = 0; $i < 5-$averageRv; $i++) {?>
												<i class="item-rating pointer zmdi zmdi-star-outline"></i>
											<?php }}} ?>
										</span>
								<span style="font-weight: bold;font-size:20px" class="stext-105 cl3">
								$<?php echo $row['price'] ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="site-pagination">
				<div>
					<?php 
						echo $pager->links('products','paging');
					?>
				</div>
			</div>
			
		</div>
	</div>