<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/user/act_update" method="post">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $user['name'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="fullname">Fullname:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" value="<?= $user['fullname'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $user['email'] ?>">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $user['password'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?= $user['phone'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter phone" name="address" value="<?= $user['address'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="Role">Role:</label>
      <input type="text" class="form-control" id="role" placeholder="Enter Role" name="role" value="<?= $user['role'] ?>">
    </div>
    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
