<div style="height:300px;background-color:black">
	<h2 style="padding-top: 150px;" class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">Your cart</h2>
</div>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		
	<?php $session = session();
		//var_dump(isset($_SESSION['customerID']));
		if(isset($_SESSION['customerID'])){
			$kq = 1;
		}else{
			$kq = 0;
		}
	?>
	<!-- Shoping Cart -->
	
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-20 m-r--38 m-lr-0-xl">
                        <form action="updateCart/" method="post">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
                                    <th class="column-6">Delete</th>
								</tr>
                                <?php 
                                    $total = 0;
                                    if(isset($productCart)){
                                    foreach($productCart as $row){  ?>	
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="assets/user/images/products/<?php echo $row['img'] ?>" alt="IMG"></div>
									</td>
									<td class="column-2"><?php echo $row['name'] ?></td>
									<td class="column-3">$<?php echo $row['price'] ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i></div>
											<input type="number" min="1" max="<?php echo $row['quantity']?>" name='quantity[<?php echo $row['product_id']?>]' value='<?php echo $_SESSION['cart'][$row['product_id']]?>' class="mtext-104 cl3 txt-center num-product">
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i></div>
										</div>
									</td>
									<td class="column-5">$<?php echo $_SESSION['cart'][$row['product_id']]*$row['price'] ?></td>
                                    <td class="column-6"><a style="margin-right: 15px;" class="flex-c-m stext-101 cl2 size-100 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" href="<?php base_url()?>deleteCart/<?php echo $row['product_id']?>">Delete</a></td>
								</tr>
                                <?php 
					                $total+=$_SESSION['cart'][$row['product_id']]*$row['price']; } } ?>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<a href='<?php base_url()?>deleteCart/0' class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Clear Cart</a>
							</div>
                            <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Update Cart</button>
						</div>
                        </form>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									$<?php echo $total ?>
								</span>
							</div>
						</div>
						<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  data-toggle="modal" data-target="#makeSureToBuy">
							Proceed to checkout
            			</button>
					</div>
				</div>
			</div>
		</div>

		<div style="padding-top: 200px;" class="modal fade" id="makeSureToBuy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<?php if(isset($_SESSION['customerID'])){ ?>
							Are you sure you want to purchase these products ?
						<?php }else{ ?>
							You need to login to make a purchase.
						<?php } ?>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<?php if(isset($_SESSION['customerID'])){ ?>
						<a class="flex-c-m stext-101 cl0 size-107 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  href="checkout">Absolutely!</a>
					<?php }else{ ?>
						<a class="flex-c-m stext-101 cl0 size-107 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  href="login">Go to login</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
		


		