<!DOCTYPE html>
<html>
<head>
	<title>Convertion Site</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
.box select {
 
    /* background-color: #000000; */
    color: #050000;
    padding: 20px;
    /* border-bottom: 1px solid #5e5e5e !important; */
    font-size: 17px;
    /* box-shadow: 0 5px 25px rgb(0 0 0 / 20%); */
    -webkit-appearance: button;
    /* outline: none; */
    width: 10%;
    /* border: none; */
    font-weight: 600;
    padding-left: 0px;
}

.box::before {
  content: "\f13a";
  position: absolute;
  right: 0;
   width: 60px;
  height: 18%;
  text-align: center;
  font-size: 25px;
  line-height: 31px;
  color: rgba(255, 255, 255, 0.5); 
   background-color: rgba(255, 255, 255, 0.1); 
}



</style>
<body>
<div>
 <fieldset>
<h1 style="color:red";>Page 1  [Home]</h1><br>
<h1 style="color:red";>Conversion Site</h1><br>
<div>
<h1> &nbsp;1. <a href="index.php">Home  </a> 
 &nbsp;2. <a href="rate.php">Conversion Rate  </a>
 &nbsp;3. <a href="info.php">History</a></h1>
</div><br><br>

<h1 style="color:red";>Converter</h1><br>

	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
		
		<div class="box" >
			
			<select name="drop" id="drop" class="form-control">
				
				<option value="feet to inch">feet to inch</option>
				<option value="inch to feet">inch to feet</option>

			</select><br><br>
			Value: <input type="number" id="fname" name="fname" onkeyup="myFunction()"><br><br>
Result: <input type="text" name="result" id="result" >
		</div><br><br>
		
		<input type="button" name="save" class="btn btn-primary" value="Store" id="butsave">
	</form>
	 </fieldset>
</div>

<script>
function myFunction() {
var s = document.getElementById("drop");
var x = document.getElementById("fname");
 var y = document.getElementById("result");
  if (s.value == "feet to inch") {
     var h=(12*x.value);
 
  y.value = h;
  }
  else{ y.value = (x.value/12)}
  
}
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var drop = $('#drop').val();
		var fname = $('#fname').val();
		var result = $('#result').val();
		
		if(drop!="" && fname!="" && result!=""){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					drop: drop,
					fname: fname,
					result: result				
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html('Data added successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>
  