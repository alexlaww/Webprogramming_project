<?php

$localhost="localhost";
$username="root";
$pass="";
$database="employee";

$conn = new mysqli($localhost,$username,$pass,$database);

if($conn ->connect_error){
	
	echo "connection failed";
	
}
else{
	echo "connection sucessfuk";
}

/*$sql_statement="create table employee_information(
				employee_id int(100) NOT NULL AUTO_INCREMENT,
				employee_name text NOT NULL,
				employee_email text NOT NULL,
				employee_ic text NOT NULL,
				employee_contact text NOT NULL,
				PRIMARY KEY(employee_id)
			    );";
				
if ($conn->query($sql_statement) === TRUE) {
 echo "scuess create table";	
}else{
	 echo "create table error";
}
*/	
#
/*$sql_insert_statement ="insert into 
	employee_information(employee_name,employee_email,employee_ic,employee_contact)
	values('alex','alex@hotmail.com','123123-12-1234','012-999999999')";
			

if ($conn->query($sql_insert_statement) === TRUE) {
 echo "scuess insert table";
}else{
	 echo "create insert error";
}*/	

?>