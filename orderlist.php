<?php



    include_once'connectdb.php';
    session_start();

    if($_SESSION['useremail']==""){
        header('location:index.php');
    }

    include_once 'header.php';

   $data = file_get_contents('api.php');
    $data = json_decode($data,true);

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="box-body">
                    <div style="overflow-x:auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Waybill Number</th>
                                <th>Brand</th>
                                <th>Addresss</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
					    <?php foreach ( $data as $row ) : ?>
					    <tr>
						<td>
							<?= $row['number']; ?> 
							<?= $row['shipping']['first_name']; ?> 
							<?= $row['shipping']['last_name']; ?>
                            <?= $row['shipping']['address_1' AND'address_2']; ?>	
						</td>
						<td><?= $row['date_created']; ?></td>
						<td><?= $row['status']; ?></td>
						<td><?= $row['total']; ?></td>
                    </tr>

                    <?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
                </table>
            </div>
          </div>
          <!-- /.col-md-6 -->
        <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<?php
    include_once'footer.php';
?>