<?php 

class Format
{

    public function validation($data){
        $data=trim($data);
        $data= stripcslashes($data); // miče backslash
        $data=htmlspecialchars($data); //convert predefined charachters to html entries
        return $data;

    }
    
}


?>