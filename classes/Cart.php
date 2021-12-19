<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
 
?>

<?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $updateCart = $ct->updateCartQuantity($cartId, $quantity);
        }  
?>

<?php
class Cart
{
	private $db;
	private $fm;
 
    public function __construct()
    {
       $this->db   = new Database();
       $this->fm   = new Format();
	}

    public function addToCart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);  // add Format Class validation 
        $quantity =  mysqli_real_escape_string($this->db->link, $quantity); // for $quantity filed 
        $productId =  mysqli_real_escape_string($this->db->link, $id);  // for $id filed 
        $sId = session_id();  // Create session id which will save your data as your browser id. 
     
        $squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
        $result = $this->db->select($squery)->fetch_assoc();
     
        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];
     
        $query = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId ='$sId'";
    $getPro = $this->db->select($query);
    if ($getPro) {
    	$msg = "Product Already Added!";
    	return $msg;
    }else {

    $query = "INSERT INTO tbl_cart(sId, productId, productName, price, quantity, image) 
          VALUES ('$sId','$productId','$productName','$price','$quantity','$image')";  

          $inserted_row = $this->db->insert($query);
          if ($inserted_row) {
    			 header("Location:cart.php");
    		}else {
    			header("Location:404.php");
    		} 
     }

     }

     public function getCartProduct()
     {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
           $result = $this->db->select($query);
           return $result;
     }

     public function updateCartQuantity($cartId, $quantity)
     {
        $cartId =  mysqli_real_escape_string($this->db->link, $cartId ); 
      $quantity =  mysqli_real_escape_string($this->db->link, $quantity );
  
     $query = "UPDATE tbl_cart
	            SET
	            quantity = '$quantity'
	            WHERE cartId = '$cartId' ";
	            $update_row  = $this->db->update($query);
	            if ($update_row) {
	            	 header("Location:cart.php");
	            }else {
	            	$msg = "<span class='error'>Quantity Not Updated .</span> ";
	    			return $msg;
	            } 
    }

    public function delProductByCart($delId)
     {
        $delId =  mysqli_real_escape_string($this->db->link, $delId ); 
        $query = "DELETE FROM tbl_cart WHERE cartId ='$delId' ";
                 $deldata = $this->db->delete($query);
                 if ($deldata) {
                     echo "<script>window.location = 'cart.php';</script> ";
                  }else {
                     $msg = "<span class='error'>Product Not Deleted .</span> ";
                        return $msg; // return this message 
                     }
    }

    

    public function delCustomerCart()
    {
      $sId = session_id();
      $query = "DELETE FROM tbl_cart WHERE sId ='$sId'";
      $this->db->delete($query);
    }

    public function checkCartTable()
    {
      $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
      $result = $this->db->select($query);
      return $result;
    }

    public function orderProduct($cmrId)
    {
      $sId = session_id();
      $query = "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
      $getPro = $this->db->select($query);
       if ($getPro) {
       while ($result = $getPro->fetch_assoc()) {
         $productId     = $result['productId'];
         $productName   = $result['productName'];
         $quantity      = $result['quantity'];
         $price         = $result['price'];
         $image         = $result['image'];
     
          $query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity, price, image) 
              VALUES ('$cmrId','$productId','$productName','$quantity','$price','$image')";  
     
              $inserted_row = $this->db->insert($query); 
         }
       } 
     
       }

   public function getOrderProduct($cmrId)
       
     {
         $query = "SELECT * FROM tbl_order WHERE cmrId ='$cmrId' ORDER BY productId DESC ";
         $result = $this->db->select($query);
         return $result;
       
     }

        
        
   public function checkOrder($cmrId)
         
      {
         
          $query = "SELECT * FROM tbl_order WHERE cmrId ='$cmrId' ";
          $result = $this->db->select($query);
          return $result; 

      }
   


}


?>