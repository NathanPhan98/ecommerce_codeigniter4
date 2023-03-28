<h4><?=$title ?></h4>
<table class="table" id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>FullName</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Role</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach($users as $user){
          echo"<tr>";
            echo "<td>".$user['user_id']."</td>";
            echo "<td>".$user['name']."</td>";
            echo "<td>".$user['fullname']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "<td>".$user['password']."</td>";
            echo "<td>".$user['phone']."</td>";
            echo "<td>".$user['address']."</td>";
            echo "<td>".$user['role']."</td>";
            echo "<td><a href='".base_url()."/admin/user/update?id=".$user['user_id']."'><img src='".base_url()."/assets/admin/img/editicon.png' width='20' title='Edit'></a>
              <a href='".base_url()."/admin/user/delete/".$user['user_id']."'><img src='".base_url()."/assets/admin/img/deleteicon.png' width='20' title='Delete'></a>
            </td>";
          echo"</tr>";
        }
      ?>
    </tbody>
  </table>