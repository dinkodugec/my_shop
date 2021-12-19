<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
 
<?php
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Cart.php');
?>
 
 <div class="grid_10">
  <div class="box round first grid">
      <h2>Customer Order</h2> 
           <div class="block">        
        
        
 <table class="data display datatable" id="example">
  <thead>
   <tr>
	 <th>ID</th>
	 <th>Order Date</th>
	 <th>Product</th>
	 <th>quantity</th>
	 <th>Price</th>
     <th>Cust Id</th>
	 <th>Address</th>
	 <th>Action</th>
		 </tr>
   </thead>

	 <tbody>
 <?php
	 $ct = new Cart();  // Create Cart class object 
	 $fm = new Format(); // Create Format class object 
	 $getOrder = $ct->getAllOrderProduct();// create method in Cart.php Class
	 if ($getOrder) {
	 while ($result = $getOrder->fetch_assoc()) {
						 
  ?>
 
	 <tr class="odd gradeX">
	     <td><?php echo $result['id']; ?></td>
	     <td><?php echo  $fm->formatDate($result['date']);  ?></td>
	     <td><?php echo $result['productName']; ?></td>
	     <td><?php echo $result['quantity']; ?></td>
	     <td><?php echo $result['price']; ?></td>
         <td><?php echo $result['cmrId']; ?></td>
	     <td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>"> View Address</a></td> 
	     <td><a href=" ">Shifted</a> </td> 
     </tr>
						  
      <?php } }  ?> <!-- end if condition and while loop -->
	

      </tbody>
	 </table>
           
    
    </div> 
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
 
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>