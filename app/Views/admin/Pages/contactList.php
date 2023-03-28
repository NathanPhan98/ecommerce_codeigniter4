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
        foreach($contact as $row){
          echo"<tr>";
            echo "<td>".$row['idCT']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['msg']."</td>";
            echo "<td>
            <a href='".base_url()."/admin/contact/delete/".$row['idCT']."'><img src='".base_url()."/assets/admin/img/deleteicon.png' width='20' title='Delete'></a></td>";
          echo"</tr>";
        }
      ?>
    </tbody>
  </table>