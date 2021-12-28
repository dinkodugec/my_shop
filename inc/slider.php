<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">

			<?php 
              $getAcer = $pd->latestFromAcer();
              if ($getAcer) {
              	while ($result = $getAcer->fetch_assoc()) {
              	 
            ?> 
			
				 <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			   
			   <?php 	} } ?> 
			 <!--  End If condition and While loop  -->
				
			   <?php 
                 $getZara = $pd->latestFromZara();
                 if ($getZara) {
                	while ($result = $getZara->fetch_assoc()) {
              	 
               ?> 
			
				 <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Zara</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			   
			   <?php 	} } ?>



			</div>
			<div class="section group">


			<?php 
                 $getPolo = $pd->latestFromPolo();
                 if ($getPolo) {
                	while ($result = $getPolo->fetch_assoc()) {
              	 
               ?> 
			
				 <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Polo</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			   
			   <?php 	} } ?>	
			   
			   
			   <?php 
                 $getSamsung = $pd->latestFromSamsung();
                 if ($getSamsung) {
                	while ($result = $getSamsung->fetch_assoc()) {
              	 
               ?> 
			
				 <div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $result['productId']; ?>"> <img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Samsung</h2>
						<p><?php echo $result['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>		
			   
			   <?php 	} } ?>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<<?php 
                       $brand =  new Brand();
                       $getIm = $brand->getAllimage();   /*  <!-- slike se nalaze u shop/images/nazivslike.jpg --> */
                       if ($getIm) {                                  /*  <!--      i moramo ih prebaciti u file upload u admin --> */
                       while ($result = $getIm->fetch_assoc() ) {       /*  <!--  i unda u bazi imamo image u koji stavljamo putanju slike --> */
                       ?>
					    <li><img src="admin/<?php echo $result['image']; ?>" alt=""/></li>
					   <?php  }  } ?>	
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

 