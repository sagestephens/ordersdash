<?php
      
   

    include_once'connectdb.php';
    session_start();

    
    if($_SESSION['useremail']==""){
        header('location:index.php');
    }

    

    require __DIR__ . '/vendor/autoload.php';

    use Automattic\WooCommerce\Client;
    use Automattic\WooCommerce\HttpClient\HttpClientException;

    $woocommerce = new Client(
        'https://nordikbeauty.com', 
        'ck_baa9b968cb6a88c8638d228bdbb751fef1146409', 
        'cs_eabcf391463a9e00bbe190b87169781d2119b48c',
        [
            'wp_api' => true,
            'version' => 'wc/v3',
            'timeout' => 600
           
        ]
    );
    

    try {
        $results = $woocommerce->get('orders');
        $products = $woocommerce->get('products');
        $customers = $woocommerce->get('customers');
        $result = count($results);
        $customer = count($customers);
        $product = count($products);
        //you can set any date which you want
                 $query = ['date_min' => '2017-10-01', 'date_max' => '2022-02-30'];
         /* $sales = $woocommerce->get('reports/sales', $query);
        $sale = $sales[0]["total_sales"];  */

        $lastRequest = $woocommerce->http->getRequest();
        $lastRequest->getUrl(); // Requested URL (string).
        $lastRequest->getMethod(); // Request method (string).
        $lastRequest->getParameters(); // Request parameters (array).
        $lastRequest->getHeaders(); // Request headers (array).
        $lastRequest->getBody(); // Request body (JSON).
        
        // Last response data.

        $lastResponse = $woocommerce->http->getResponse();
        $lastResponse->getCode(); // Response code (int).
        $lastResponse->getHeaders(); // Response headers (array).
        $lastResponse->getBody(); // Response body (JSON).
    
        }

        
      
        catch(HttpClientException $e) {
        $e->getMessage(); // Error message.
        $e->getRequest(); // Last request data.
        $e->getResponse(); // Last response data.
        }
    
        $results = $woocommerce->get('orders');

        include_once 'header.php';
  

?>

<style>
    #large{
    font-size: 50px;
}

.placeholder{
    
    margin-left: 10px;
    width: 23.5%;
    padding: 10px 15px;
    border: 1px solid #0000;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    text-align: center;

}
</style>
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
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1">
                    <h1 class="page-header">Dashboard</h1>
                    <div class="row placeholders">
                               <div class="col-xs-6 col-sm-3 placeholder">
                                   <p id="large">
                                       <?php echo $result?>
                                   </p>
                                   <hr>
                                   <span class="text-muted">Total Orders</span>
                               </div>
                               <div class="col-xs-6 col-sm-3 placeholder">
                                   <p id="large">
                                       <?php echo $customer?>
                                   </p>
                                   <hr>
                                   <span class="text-muted">Customers</span>
                               </div>
                               <div class="col-xs-6 col-sm-3 placeholder">
                                   <p id="large">
                                       <?php echo $product?>
                                   </p>
                                   <hr>
                                   <span class="text-muted">All Products</span>
                               </div>
                               <div class="col-xs-6 col-sm-3 placeholder">
                                   
                               </div>
                     </div>
             </div>
             <div class="container">
                             <h2 class="sub-header">Orders List</h2>
                               <div class='table-responsive'>
                                   <table id='myTable' class='table table-striped table-bordered'>
                                       <thead>
                                           <tr>
                                               <th>Order #</th>
                                               <th>Customer</th>
                                               <th>Address</th>
                                               <th>Contact</th>
                                               <th>Order Date</th>
                                               <th>Status</th>
                                               <th>Actions</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
               foreach($results as $details){
               echo "<tr>
                        <td>" . $details["id"]."</td>
                         <td>" . $details["billing"]["first_name"].$details["billing"]["last_name"]."</td>
                         <td>" . $details["shipping"]["address_1"]."</td>
                         <td>" . $details["billing"]["phone"]."</td>
                         <td>" . $details["date_created"]."</td>
                         <td>" . $details["status"]."</td>
                         <td><a class='open-AddBookDialog btn btn-primary' data-target='#myModal' data-id=".$details['id']." data-toggle='modal'>Update</a>
                         <a class='open-deleteDialog btn btn-danger' data-target='#myModal1' data-id=".$details['id']." data-toggle='modal'>Delete</a></td></tr>";
               }
               ?>
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
<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Order Status</h4>
    </div>
    <div class="modal-body">
        <p>Order ID:</p>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="bookId" id="bookId" value="">

                <p for="sel1">Select list (select one):</p>
                <select class="form-control" id="status" name="ostatus">
                    <option>Pending Payment</option>
                    <option>processing</option>
                    <option>On Hold</option>
                    <option>completed</option>
                    <option>Cancelled</option>
                    <option>Refunded</option>
                    <option>Failed</option>
                </select>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-block" name="btn-update">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="myModal1" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirm Order Deletion</h4>
    </div>
    <div class="modal-body">
        <p>Really you want to delete order?</p>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="cId" id="cId" value="">
            </div>

            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="btn-delete">Delete</button>
           </div>
        </form>
    </div>
</div>
</div>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <div class="modal-dialog">


  <script>
            $(document).on("click", ".open-AddBookDialog", function() {
                var myBookId = $(this).data('id');
                $(".modal-body #bookId").val(myBookId);
            });
        </script>


        <script>
            $(document).on("click", ".open-deleteDialog", function() {
                var myBook = $(this).data('id');
                $(".modal-body #cId").val(myBook);
            });
        </script>
<?php
    include_once'footer.php';
?>
