<table class="table" id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>User ID</th>
        <th>Note</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody <?php if($orderdetails[0]['status']==2){ ?>
            style="background-color:#ADFF2F;"
            <?php }else if($orderdetails[0]['status']==3){?>
              style="background-color:#FFA500;"
              <?php } ?> >
      <?php
        echo "<td>".$orderdetails[0]['order_id']."</td>";
        echo "<td>".$orderdetails[0]['date']."</td>";
        echo "<td>".$orderdetails[0]['user_id']."</td>";
        echo "<td>".$orderdetails[0]['note']."</td>";
        if($orderdetails[0]['status']==1){
          echo "<td>Đang chờ xử lý.</td>";
        }else if($orderdetails[0]['status']==2){
          echo "<td>Đã thanh toán xong.</td>";
        }else{
          echo "<td>Đã hủy đơn.</td>";
        }
      ?>
    </tbody>
  </table>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Product ID</th>
        <th>Product name</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($orderdetails as $row){
          echo"<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$row['product_id']."</td>";
            echo "<td>".$row['name']."</td>";  
            echo "<td>".$row['quantity']."</td>";      
          echo"</tr>";
        }
      ?>
    </tbody>
  </table>
  <a class="btn btn-primary" href="<?php echo base_url()?>/admin/order/list" >Back to list</a>