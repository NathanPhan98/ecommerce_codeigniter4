<h4><?=$title ?></h4>
<a href="admin/product/add" style="margin:1%" class="btn btn-primary" >+ Product</a>
<table class="table" id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Image</th>
        <th>Details</th>
        <th>Category</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody id="searchRS">
      <?php
        foreach($products as $row){
          echo"<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td>".$row['quantity']."</td>";
            echo "<td>".$row['img']."</td>";
            echo "<td>".$row['detail']."</td>";
            echo "<td>".$row['category_name']."</td>";
            echo "<td><a href='".base_url()."/admin/product/update?id=".$row['product_id']."'><img src='".base_url()."/assets/admin/img/editicon.png' width='20' title='Edit'></a>
            <a href='".base_url()."/admin/product/delete/".$row['product_id']."'><img src='".base_url()."/assets/admin/img/deleteicon.png' width='20' title='Delete'></a></td>";
          echo"</tr>";}?>
    </tbody>
  </table>
