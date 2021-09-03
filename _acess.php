<?php
 class Access {
     public static function hasAccess($page){   
         if (isset($_SESSION['LoggedIn'])) {
             $acLevel = "LoggedIn";
         }else{
             $acLevel = "Visitor";
         }
        if(!self::setAccess($page,$acLevel)){
            die("Access to the {".ucwords($page)." Page} is denied");
            header("Location:noaccess.php");
        }else{
            return true;
        }
     }

     private static function setAccess($page,$level){
         $aclFile = file_get_contents('_acess/_acess.json');
         $aclArray = json_decode($aclFile);
         $denied = [];
         $allowed = [];
         foreach ($aclArray as $key => $value) {
             if ($key==$level) {
                 foreach ($value as $k => $v) {
                     if ($k=='denied') {
                         $denied = $v;
                     }elseif($k=='allowed'){
                         $allowed = $v;
                     }
                 }
             }
         }
         if (in_array('*',$denied)||in_array($page,$denied)) {
             $access = false;
         }elseif(in_array('*',$allowed)||in_array($page,$allowed)){
             $access = true;
         }else{
             $access = false;
         }
         return $access;
     }
 }
 
?>