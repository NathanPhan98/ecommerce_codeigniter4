<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/user/act_add" method="post">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="fullname">Fullname:</label>
      <input type="text" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" >
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" >
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter phone" name="address">
    </div>
    <div class="mb-3 mt-3">
      <label for="Role">Role:</label>
      <input type="text" class="form-control" id="role" placeholder="Enter Role" name="role" value="2">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
