
<div class="container mt-3">
  <h2><?= $title;?></h2>
  <form action="<?php echo base_url();?>/admin/product/act_update" method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3"><label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?= $productz[0]['name'] ?>" placeholder="Enter name" name="name" >
    </div>
    <div class="mb-3 mt-3"><label for="price">Price:</label>
      <input type="text" class="form-control" id="price" value="<?= $productz[0]['price'] ?>" placeholder="Enter price" name="price" >
    </div>
    <div class="mb-3 mt-3"><label for="quantity">Quantity:</label>
      <input type="text" class="form-control" id="quantity" value="<?= $productz[0]['quantity'] ?>" placeholder="Enter quantity" name="quantity" >
    </div>
    <div class="mb-3"><label for="img">Image:</label>
      <input type="file" name="img">
      <input type="hidden" name="oldImg" value="<?= $productz[0]['img'] ?>">
    </div>
    <div class="mb-3 mt-3"><label for="detail">detail:</label>
      <input type="text" class="form-control" id="detail" value="<?= $productz[0]['detail'] ?>" placeholder="Enter detail" name="detail" >
    </div>
    <div class="mb-3 mt-3"><label for="category_id">category_id:</label>
      <select name="category_id"  id="category_id" value="<?= $productz[0]['category_id'] ?>" placeholder="Choose category ID" class="form-control">
      <option value="<?php echo $productz[0]['category_id'] ?>">
           <?php echo $productz[0]['category_name'] ?>
      </option>
      <?php foreach($categoryz as $cate){
          if($cate['category_id'] != $productz[0]['category_id']){ ?>
      <option value="<?php echo $cate['category_id'] ?>">
           <?php echo $cate['category_name'] ?>
      </option>
      <?php }} ?>
      </select>
    </div>
    <input type="hidden" name="product_id" value="<?= $productz[0]['product_id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>