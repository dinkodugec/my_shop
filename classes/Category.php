<?php 
include '../lib/Session.php';
Session::checkLogin();
 include_once '../lib/Database.php';
 include_once '../helpers/Format.php';

?>

<?php


class Category
{

    private $db; 
    private $fm;  

    public function  __construct()
    {
      $this->db = new Database();
      $this->fm = new Format();
    }

    public function catInsert($catName)
    {
          $catName = $this->fm->validation($catName);
          $catName = mysqli_real_escape_string($this->db-link, $catName);
          if(empty($catName)){
            $msg = "Category can not be empty ;
            return $msg;
        }else{
            $query="INSERT INTO tbl_category(catName) VALUES ($catName)";
            $catinsert = $this->db->insert($query);
            if($catinsert){
                $msg="<span class= 'succces'>Caegory inserted Successufully. </span>"
                return $msg;
             }else{
                 $msg="<span class ='error'>Caegory Not inserted Successufully. </span>"
                 return $msg;
             }



    }
    
     Public function getAllCat()
     {

             $query="SELECT * FROM tbl_category ORDER BY catID DESC";
             $result = $this->db->select($query);
             return $result; 
          
     }


     Public function getByID($id)
     {

        $query="SELECT * FROM tbl_category WHERE catId="$id";
        $result = $this->db->select($query);
        return $result;


     }

          ?>