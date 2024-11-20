<?php 

include('config/config.php');

$sql_select_statement="select * from employee_information";
$result = $conn->query($sql_select_statement);

?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<table class="table table-bordered">
<?php
if ($result->num_rows > 0) {
  $sn=1;
  while($data = $result->fetch_assoc()) {
 ?>
 <tr>
   <td><?php echo $sn; ?> </td>
   <td><?php echo $data['employee_name']; ?> </td>
   <td><?php echo $data['employee_email']; ?> </td>
   <td><?php echo $data['employee_ic']; ?> </td>
   <td><?php echo $data['employee_contact']; ?> </td>
   <td>
   <a href="?edit_id=<?php echo $data['employee_id']; ?>" class="btn btn-primary" style="color:white">Edit</a>
   <a href="?delete_id=<?php echo $data['employee_id']; ?>" class="btn btn-primary" style="color:white">Delete</a></td>
 <tr>

 <?php
  $sn++;}} else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>
<?php  } 
 
    if(isset($_GET['delete_id'])){
        $deelte_id="delete from employee_information where employee_id=".$_GET['delete_id'];
        	if ($conn->query($deelte_id) === TRUE) {
				 echo "scuess delete value";
				}else{
					 echo "create deter error";
				}
    }

?>
</table>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
