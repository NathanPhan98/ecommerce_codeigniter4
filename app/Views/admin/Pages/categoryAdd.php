<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/category/act_add" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="category_name" placeholder="Enter name" name="cate_name">
    </div>
    <div class="mb-3">
      <label for="img">Image:</label>
      <input type="file" placeholder="Enter img" name="img" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>