<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="/admin/user/act_update_admin" method="post">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $user['name'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="fullname">Fullname:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" value="<?php echo $user['fullname'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $user['email'] ?>">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $user['password'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" value="<?php echo $user['phone'] ?>">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter phone" name="address" value="<?php echo $user['address'] ?>">
    </div>
    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
