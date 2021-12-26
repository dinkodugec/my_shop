
<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
 
?>

<?php
 
class Brand
{
	
	private $db;
	private $fm;

    public	function __construct(){
       $this->db   = new Database();
       $this->fm   = new Format();
	}


public function brandInsert($brandName)
{
  	$brandName = $this->fm->validation($brandName);
    $brandName =  mysqli_real_escape_string($this->db->link, $brandName );
    if (empty($brandName)) {
    	 $msg = "Brand Field must not be empty";
    	 return $msg;
    	}else {
    		$query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName')";
    		$brandinsert = $this->db->insert($query);
    		if ($brandinsert) {
    			$msg = "<span class='success'>Brand Inserted Successfully.</span> ";
    			return $msg;
    		}else {
    			$msg = "<span class='error'>Brand Not Inserted .</span> ";
    			return $msg;
    		}
    	}


  }


       
       public function getAllBrand()
       {
 
       	$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
         $result = $this->db->select($query);
         return $result;
       }



  
     public function getUpdatetById($id)
     {
     	$query = "SELECT * FROM tbl_brand WHERE brandId ='$id' ";
         $result = $this->db->select($query);
         return $result;

     }


     public function brandUpdate($brandName, $id)
     {
     $brandName = $this->fm->validation($brandName);
     $brandName =  mysqli_real_escape_string($this->db->link, $brandName );
     $id =  mysqli_real_escape_string($this->db->link, $id );
     if (empty($brandName)) {
    	 $msg = "<span class='error'>Brand Field Must Not be empty.</span> ";
    	 return $msg;

     }else {
			$query = "UPDATE tbl_brand
            SET
            brandName = '$brandName'
            WHERE brandId = '$id' ";
            $update_row  = $this->db->update($query);
            if ($update_row) {
            	$msg = "<span class='success'>Brand Updated Successfully.</span> ";
            	return $msg;
            }else {
            	$msg = "<span class='error'>Brand Not Updated .</span> ";
    			return $msg;
            }

     }

 }



  public function delBrandById($id)
  {
		  $query = "DELETE FROM tbl_brand WHERE brandId ='$id' ";
		  $branddeldata = $this->db->delete($query);
		  if ($branddeldata) {
		  	$msg = "<span class='success'>Brand Deleted Successfully.</span> ";
		  return $msg;
		  }else {
		  	$msg = "<span class='error'>Brand Not Deleted .</span> ";
		    	 return $msg;
  			}

  	}



   public function getcopyById()
	  {
		$query = "SELECT * FROM tbl_copy  ";
		$result = $this->db->select($query);
		return $result;

	  }


  public function footerUpdate($copyRight)

    {
		$copyRight = $this->fm->validation($copyRight);
		$copyRight =  mysqli_real_escape_string($this->db->link, $copyRight );
			if (empty($copyRight)) {
			$msg = "<span class='error'>Footer Field Must Not be empty.</span> ";
			return $msg;
   
		}else {
			   $query = "UPDATE tbl_copy
			   SET
			   copyright = '$copyRight'
			   WHERE id = '1' ";
			   $update_row  = $this->db->update($query);
			   if ($update_row) {
				   $msg = "<span class='success'>Footer Updated Successfully.</span> ";
				   return $msg;
			   }else {
				   $msg = "<span class='error'>Footer Not Updated .</span> ";
				   return $msg;
			   }
   
		}
	}

	
	public function getsocialById()
	{
		$query = "SELECT * FROM tbl_social";
				 $result = $this->db->select($query);
				 return $result;
		
    }
	




}



?>