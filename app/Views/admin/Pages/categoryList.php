<h4><?=$title ?></h4>
<table class="table" id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($categories as $row){
          echo"<tr>";
            echo "<td>".$row['category_id']."</td>";
            echo "<td>".$row['category_name']."</td>";
            echo "<td>".$row['cate_image']."</td>";
            echo "<td><a href='".base_url()."/admin/category/update?id=".$row['category_id']."'><img src='".base_url()."/assets/admin/img/editicon.png' width='20' title='Edit'></a>
            <a href='".base_url()."/admin/category/delete/".$row['category_id']."'><img src='".base_url()."/assets/admin/img/deleteicon.png' width='20' title='Delete'></a></td>";
          echo"</tr>";
        }
      ?>
    </tbody>
  </table>