<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>King panel</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h2>Kings dela panel</h2>
	<div class="control">
		<form action="" method="POST">
			<input type="submit" name="read" value="Read all King's dela">
		</form>		
		<form action="" method="POST">
			<input type="text" name="searchTxt" placeholder="seach in King's dela">
			<input type="submit" name="search" value="Search">
		</form>
	</div>

	<?php 

  if(isset($_POST['read'])){
   $str = htmlentities(file_get_contents("dela.w"));
   echo "<div class='res'>";
   foreach (explode("\n", $str) as $value) {
    echo "<p>$value</p><br>";
   }
   echo "</div>";
  }

 
  if(isset($_POST['search']) && isset($_POST['searchTxt'])){
   $search = $_POST['searchTxt'];
   $blacklist = array(
       '&' => '',
       ';' => '',
       'ls' => '',
       'pwd' => '',
       'cat' => '',
       'wget' => '',
       'ns' => '',
       '|' => ''
       );
   $search = str_replace(array_keys($blacklist), $blacklist, $search);
   echo "<div class='res'>";
   $cmd = shell_exec('cat dela.w | grep '.$search);
   echo "<p>$cmd</p>";
   echo "</div>";
  }


 ?>

</body>
</html>
