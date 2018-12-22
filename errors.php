<?php 
    $errori = "";
    if (count($errors) > 0){
        
        foreach ($errors as $error){
            $errori .= $error . "<br />";
        } 

        echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert" >
              <strong >Errori: </strong ><br />' . $errori . '
              <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close" >
              <span aria-hidden = "true" > &times; </span >
              </button >
              </div >'; 

    } 
?>