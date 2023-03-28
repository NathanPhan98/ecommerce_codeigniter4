<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/product/act_add" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" >
    </div>
    <div class="mb-3 mt-3">
      <label for="quantity">Quantity:</label>
      <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" >
    </div>
    <div class="mb-3">
      <label for="img">Image:</label>
      <input type="file" placeholder="Enter img" name="img" >
    </div>
    <div class="mb-3 mt-3">
      <label for="detail">Detail:</label>
      <textarea class="form-control" id="detail"  name="detail"></textarea>
    </div>
    <div class="mb-3 mt-3">
      <label for="category_id">Category:</label>
      <select name="category_id"  id="category_id" placeholder="Choose category ID" class="form-control">
      <?php foreach($categoryz as $cate) { ?>
      <option value="<?php echo $cate['category_id'] ?>">
           <?php echo $cate['category_name'] ?>
      </option>
      <?php } ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>