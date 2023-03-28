<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/category/act_update" method="post">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="cate_name" value="<?= $categories['category_name'] ?>">
    </div>
    <input type="hidden" name="category_id" value="<?= $categories['category_id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>