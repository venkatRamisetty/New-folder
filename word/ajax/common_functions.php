<?php
session_start();



include("../config.php");


function getlanguages_by_templateid($id){
    global $ms;
    $sql="SELECT lng.Language as 'languages'
    FROM template_details td
    LEFT JOIN template_language lng on td.language_id=lng.id
    WHERE templates_id=$id;";
    $r = mysqli_query($ms, $sql); 
    return  mysqli_fetch_all($r);
   

}

?>