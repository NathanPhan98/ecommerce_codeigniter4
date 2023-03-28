<h4><?=$title ?></h4>
<table class="table" id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Customer</th>
        <th>Status</th>
        <th>Order Detail</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($orders as $row){ ?>
          <tr <?php if($row['status']==2){ ?>
            style="background-color:#ADFF2F;"
            <?php }else if($row['status']==3){?>
              style="background-color:#FFA500;"
              <?php } ?> >
            <td><?php echo $row['order_id'] ?></td>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['fullname']?></td>
            <?php
            if($row['status']==1){?>
              <td>Processing.</td>
            <?php }else if($row['status']==2){?>
              <td>Finished.</td>
            <?php }else{?>
              <td>Cancelled.</td>
              <?php } ?>
            <td><a href="<?php base_url()?>admin/order/listDetailOrder/?id=<?php echo $row['order_id']?>">Detail</a></td><td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#doneOrder<?php echo $row['order_id']?>">
            Finished</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancelOrder<?php echo $row['order_id']?>">
            Cancelled</button>
            </td>
            <td><a href='<?php base_url() ?>/admin/order/delete/<?php echo $row['order_id']?>'><img src='/assets/admin/img/deleteicon.png' width='20' title='Delete'></a></td>
          </tr>
           <?php }?>
    </tbody>
  </table>
  <?php foreach($orders as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="doneOrder<?php echo $row['order_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form action="<?php echo base_url();?>/admin/order/act_update/done" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php if($row['status']==1){ ?>
                      Do you want to finish bill <span style="color:red"><?php echo $row['order_id']?></span> ? <br>
                      (warning: After this action, it will not be changed)
                      <input type="hidden" name="orderId" value="<?php echo $row['order_id']?>">
                      <?php }else{ echo "You can only change the status once."; } ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if($row['status']==1){ ?>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <?php } ?>
                  </div>
                  </form>
                </div>
              </div>
            </div>
<!-- Modal Đã hủy -->
            <div class="modal fade" id="cancelOrder<?php echo $row['order_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form action="<?php echo base_url();?>/admin/order/act_update/cancel" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <?php if($row['status']==1){ ?>
                      Do you want to cancel bill <span style="color:red"><?php echo $row['order_id']?></span>? <br>
                      (warning: After this action, it will not be changed)
                      <input type="hidden" name="orderId" value="<?php echo $row['order_id']?>">
                      <?php }else{ echo "You can only change the status once."; } ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if($row['status']==1){ ?>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <?php } ?>
                  </div>
                  </form>
                </div>
              </div>
            </div>
<?php } ?>

<!-- <a href='".//base_url()."/admin/order/update/?id=".$row['order_id']."'>Cập nhật trạng thái</a> -->