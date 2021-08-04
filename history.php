<?php
$var;
  require_once 'db_connect2.php';


function allhistory()
  {
   

   

    $query="SELECT * FROM history";
    $product=get($query);
    return $product;


  }


  ?>