<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<?php if(isset($_SESSION['customerID'])){ ?>
					<li class="p-b-13">
						<a href="customerInfor" class="stext-102 cl2 hov-cl1 trans-04">
							<span>Hallo</span><span style="font-size: large;">
							<?php $session = session(); echo $session->get('fullname');?></span>
						</a>
					</li>
					<li class="p-b-13">
						<a href="logout" class="stext-102 cl2 hov-cl1 trans-04">
							Logout
						</a>
					</li>
					<?php }else{ ?>
					<li class="p-b-13">
						<a href="login" class="stext-102 cl2 hov-cl1 trans-04">
							Login here
						</a>
					</li>
					<?php } ?>
					<hr>
					<?php if(isset($_SESSION['customerID'])){ ?>
					<li class="p-b-13">
						<a href="customerInfor" class="stext-102 cl2 hov-cl1 trans-04">
							My Information
						</a>
					</li>
					<?php } ?>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<img style="width: 100%;" src="assets/user/images/sidebar.jpg" alt="">
				</div>

				<div class="sidebar-gallery w-full">
					

					<p class="stext-108 cl6 p-t-27">
					Life isn’t about finding yourself. Life is about creating yourself.
					</p>
					<span class="mtext-101 cl5">
						― George Bernard Shaw
					</span>
				</div>
			</div>
		</div>
	</aside>
