<?php

require_once ('history.php');
$info=allhistory();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Convertion Site</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	
</head>
<style>

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
<body>
<div>
 <fieldset>
<h1 style="color:red";>Page 3  [History]</h1><br>
<h1 style="color:red";>Conversion Site</h1><br>
<div>
<h1> &nbsp;1. <a href="index.php">Home  </a> 
 &nbsp;2. <a href="rate.php">Conversion Rate  </a>
 &nbsp;3. <a href="info.php">History</a></h1>
</div><br><br>

<h1 style="color:red";>Conversion History</h1><br>

	<center> Search here: <input type="text" class="form-control" id="search"></center>
      <table>
      <thead>
        <tr>
          <th>Sl.</th>
                  <th>Conversion type</th>
                <th>Input</th>
               
                <th>Output</th>
        </tr>
      </thead>
      <tbody id="output">
         <?php
                  foreach($info as $infos)
                  {
                    echo "<tr>";
                       echo "<td>".$infos["sl"]."</td>";
                        echo "<td>".$infos["type"]."</td>";
                      echo "<td>".$infos["input"]."</td>";
					   echo "<td>".$infos["output"]."</td>";
					  
					 
            

           
                    echo "</tr>";
                  }
                ?>
      </tbody>
    </table>
    </div>
	
	 </fieldset>
</div>

<script>
$(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'search.php',
        data:{
          name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>
  