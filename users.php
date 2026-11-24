<?php require 'design.php';
require 'db.php';
$select = "SELECT * FROM users";
$select_users = mysqli_query($db_connect,$select);
?>
<div class="row">
    <div class="col-lg-10" m-auto>
        <div class="card">
            <div class="card-header">
            <h2>users list</h2>
            </div>
            <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach($select_users as $key=>$user){?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a href="" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>