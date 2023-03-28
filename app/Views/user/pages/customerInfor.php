<div style="height:300px;background-color:black">
	<h2 style="padding-top: 150px;" class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">Your Account Information</h2>
</div>

	<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
				<span class="mtext-110 cl2">Name</span>
				<div class="bor8 m-b-20 how-pos4-parent">
					<input name="name" placeholder="Your Name" value="<?= $user['name']?>" readonly class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text">
				</div>
				<span class="mtext-110 cl2">Fullname</span>
				<div class="bor8 m-b-20 how-pos4-parent">
					<input name="fullname" placeholder="Your Full Name" value="<?= $user['fullname'] ?>" readonly class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text">
				</div>
				<span class="mtext-110 cl2">Address</span>
				<div class="bor8 m-b-20 how-pos4-parent">
					<input name="address" placeholder="Your Address" value="<?= $user['address'] ?>" readonly class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text">
				</div>
				<span class="mtext-110 cl2">Password</span>
				<div class="bor8 m-b-20 how-pos4-parent">
					<input name="password" value="<?= $user['password'] ?>" readonly class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password">
				</div>
				<span class="mtext-110 cl2">Phone number</span>
				<div class="bor8 m-b-20 how-pos4-parent">
					<input name="phone" placeholder="Your Phone Number" value="<?= $user['phone'] ?>" readonly class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" >
				</div>
			</div>
			<div style="align-items: center;" class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
				<span class="mtext-110 cl2">Avatar</span>
				<?php if($user['avatar']==null){ ?>
				<img style="width: 200px;margin-bottom:20px" src="assets/user/images/userAvatar/NonAvatar.jpg" alt="avt">
				<?php }else { ?>
				<img style="width: 200px;margin-bottom:20px" src="assets/user/images/userAvatar/<?php echo $user['avatar']?>" alt="avt">
				<?php } ?>
				<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  data-toggle="modal" data-target="#editAccount">
					Edit Account
        		</button><br>
				<button type="button" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"  data-toggle="modal" data-target="#paymentHistory">
					Payment History
        		</button>
			</div>
		</div>	
	</div>
</section>	

<div style="padding-top: 60px;" class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<form action="act_updateCustomer" method="POST" enctype="multipart/form-data">
				<div class="modal-content">			
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Account Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<span class="mtext-110 cl2">Name</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input name="name" placeholder="Your Name" maxlength="10" onkeypress="return isNumberKey(event)" value="<?= $user['name'] ?>"  class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" >
						</div>
						<span class="mtext-110 cl2">Avatar</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input type="file" name="avatar">
							<input type="hidden" name="oldAvatar" value="<?= $user['avatar'] ?>">
						</div>
						<span class="mtext-110 cl2">Fullname</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input name="fullname" placeholder="Your Full Name" maxlength="25" onkeypress="return isNumberKey(event)" value="<?= $user['fullname'] ?>" required class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" >
						</div>
						<span class="mtext-110 cl2">Address</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input name="address" placeholder="Your Address" maxlength="100" onkeypress="return isNumberKey(event)" value="<?= $user['address'] ?>" required class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" >
						</div>
						<span class="mtext-110 cl2">Password</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input name="password" value="<?= $user['password'] ?>" maxlength="25" onkeypress="return isNumberKey(event)" required class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password">
						</div>
						<span class="mtext-110 cl2">Phone number</span>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input name="phone" placeholder="Your Phone Number" maxlength="10" onkeypress="return isNumberKey(event)" value="<?= $user['phone'] ?>" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" >
						</div>
						<input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button class="flex-c-m stext-101 cl0 size-101 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Accept</button>
					</div>
				</div>
			</form>	
			</div>
		</div>


		<div style="padding-top: 60px;" class="modal fade" id="paymentHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<form action="act_updateCustomer" method="POST">
				<div class="modal-content">			
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Your Payment History In This Website</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
					<table class="table" id="example" class="display" style="width:100%">
						<thead>
						<tr>
							<th>Order</th>
							<th>Date</th>
							<th>Product name</th>
							<th>Quantity</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php
							foreach($orderdetail as $row){
								?>
								<tr>
								<td><?php echo $row['order_id'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['quantity'] ?></td>
								<?php
								if($row['status']==1){?>
								  <td>Processing</td>
								<?php }else if($row['status']==2){?>
								  <td>Finished.</td>
								<?php }else{?>
								  <td>Cancelled.</td>
								  <?php } ?>	
								</tr>
							<?php } ?>
						</tbody>
					</table>			
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</form>	
			</div>
		</div>