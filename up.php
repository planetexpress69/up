<?php
header("content-type: application/json; charset=utf-8");

$caption = $_POST['caption'];

if (empty($caption)) {
    $answer = array (
    	"answer" => "bailing", 
    	"verbose" => "Param 'caption' missing!"
    );
	
	die (json_encode($answer));   
}

$filename 		= $caption;
$target_path 	= "uploads/";
$target_path 	= $target_path .$filename.".png";

if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    $answer = array (
    	"answer" => "success", 
    	"verbose" => "Uploaded " . $filename . " successfully." 
    );
	
	die (json_encode($answer));

}
else  {
    
    $answer = array (
    	"answer" => "failure", 
    	"verbose" => "Uploading " . $filename . " did fail."
    );
	
	die (json_encode($answer));

}

?>