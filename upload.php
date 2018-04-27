<?php 
	if($_FILES['file']['error'] > 0) { header('Location: index.php?e=1'); }
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' ); 	
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ; 
	
	if (in_array($extUpload, $extsAllowed) ) { 
        $time = $_POST['duration']; 
        $bdd = mysqli_connect("", "", "", "");
        $name = time().".".$extUpload;
        if(file_exists("img/".$name)){ $name = time()."_".rand(1111111,9999999).".".$extUpload; } 
        $expire = time()+$time;
        mysqli_query($bdd, "INSERT INTO images VALUES(NULL, '".$name."', '".$extUpload."', ".$expire.")"); 
        $result = move_uploaded_file($_FILES['file']['tmp_name'], "img/".$name); 
        
        if($result){
            header('Location: view.php?i='.mysqli_insert_id($bdd));
        }else{
            header('Location: index.php?e=2');
        }
		
	}
?>