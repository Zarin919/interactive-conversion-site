<?php

// Create connection
$conn = mysqli_connect("localhost", "root", "", "converter");
$sql = "SELECT * FROM history WHERE type LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		
                 echo "	<tr>
		          <td>".$row['sl']."</td>
		          <td>".$row['type']."</td>
		          <td>".$row['input']."</td>
		          <td>".$row['output']."</td>
		        </tr>";
                  }
             
	}

else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>