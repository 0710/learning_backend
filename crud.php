<?php
$dbhost = "localhost";
$dbuser = "test_app_user";
$dbpass = "test_app_secret";
$dbname = "test_app";
  // 1. Creating db connection
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Testing if connection was successfull
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
//delete
	$idDelete = 4;
	
	// 2. Perform database query
	$query  = "DELETE FROM subjects WHERE id = {$idDelete} LIMIT 1";

	$delResult = mysqli_query($connection, $query);

	if ($delResult && mysqli_affected_row($connection) == 1) {
		
		echo "Was Success!";
	} else {
		
		die("Was unsucessfull " . mysqli_error($connection));
	}

//insert
$menu_name1= "Fifty Shillings";
$position1 = 6;
$visible1 = 1;

// 2. Perform database query
$query  = "INSERT INTO subjects (  menu_name, position, visible) VALUES ('{$menu_name1}', {$position1}, {$visible1})";

$insertResult = mysqli_query($connection, $query);

if ($insertResult) {
        echo "Success!";
} else 
        die(" failed. " . mysqli_error($connection));

//update
 
$idUpdate=1;
$menu_name2 ="changed";
$position2 =7;
$visible2 =1;

//perform db query
$query="UPDATE subjects SET menu_name ='{$menu_name2}', position={$position2}, visible={$visible2} WHERE id ={$idUpdate} ";
$resultUpdate=mysqli_query($connection, $query);
if ($resultUpdate){

  assert(mysqli_affected_assoc($connection)== 1);
    echo "success";
}else{

 die("failed" . mysql_error(Connection));

}

  mysqli_close($connection);
?>
