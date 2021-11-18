
<?php include 'inc/header.php' ;?>

<?php
  if(!isset($_GET['proid']) || $_GET['proid'] == NULL ) {
      echo "<script>window.location = '404.php'; </script> "; // added the 404.php page 
   }else{ 
$id = $_GET['proid'];
 }
 ?>

 <div class="main">
 <div class="content">
    	<div class="section group">
	 <div class="cont-desc span_1_of_2">	
     <?php 
 	 $getPd = $pd->getSingleProduct($id); 
              if ($getPd) {
        while ($result = $getPd->fetch_assoc()) { 
	 ?> 
 
  <div class="grid images_3_of_2">
	 <img src="admin/<?php echo $result['image']; ?>" alt="" /> // show Product Image 
	 </div>
	 <div class="desc span_3_of_2">
	 <h2><?php echo $result['productName'];?> </h2> // show Product Image 
	 <p><?php echo $fm->textShorten($result['body'], 200);?></p>	 // show Product body
	 <div class="price">
	 <p>Price: <span>$<?php echo $result['price'];?></span></p> // show Product price
	 <p>Category: <span><?php echo $result['catName'];?></span></p> // show Product catName
	 <p>Brand:<span><?php echo $result['brandName'];?></span></p> // show Product brandName
	   </div>
	 <div class="add-cart">
	 <form action=" " method="post">
	 <input type="number" class="buyfield" name="quantity" value="1"/>
	 <input type="submit" class="buysubmit" name="submit" value="Add to Cart"/>
		 </form>				
				</div>
         
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $result['body'];?>  // Show product details body 
	    </div>
		<?php } } ?>  // End if condition and While loop.		
	</div>
	</div>
  
<?php include 'inc/footer.php' ;?>
