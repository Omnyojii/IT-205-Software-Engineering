<?php

function connectdb(){
	$mysql_server = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_db = "archivemaster";

	$connect = new mysqli($mysql_server,$mysql_user,$mysql_password,$mysql_db);

	if($connect->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
    // echo "Connected successfully";
	$connect->set_charset("utf8");

	return $connect;
}

// DATABASE INSERT DELETE UPDATE

function insert($table, $data){
	// var_dump($data);
	$connect = connectdb();
	$keys = implode(', ', array_keys($data));
	$values = implode("', '", $data);
	$sql = "INSERT INTO $table ($keys) VALUES ('$values')";
	// var_dump($sql);
	$query = mysqli_query($connect, $sql);
	if ($query) {
    	return true;
	} else {
	    return false;
	}
}


function update($table, $id, $data){
	$connect = connectdb();
	$values = "";
	$i = 0;
	foreach($data as $key => $value){
		if($i == 0){
			$values = "$key = '$value'";
		}else{
			$values .= ", $key = '$value'";
		}
		$i++;
	}
	$sql = "UPDATE $table SET $values WHERE id = '$id'";

	$query = mysqli_query($connect, $sql);

	if ($query) {
    	return true;
	} else {
	    return false;
	}

}


function getdata($table, $id){
	$connect = connectdb();
	$sql= mysqli_query($connect, "SELECT * FROM $table WHERE id = '$id'") or die(mysql_error());
	$row= mysqli_fetch_assoc($sql);
	return $row;
}

function allowUser($table,$id){
	$connect = connectdb();
	$sql = "UPDATE users SET  Perms = '1' WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Success');window.location.href='notification.php';</script>";
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
		die();
    }
    $conn->close();
}


?>