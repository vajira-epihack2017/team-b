<?php

//To start the session and if not login to the system, redirect to the index page 
include("../ssi/session_handling.php");

$se=$_GET['id'];
require_once("../common/dbconnection_inc.php");
$sql="SELECT * FROM user u, login l,user_role ur WHERE
u.user_role_id=ur.user_role_id AND u.user_id=l.user_id AND
(u.fname LIKE '%$se%' OR u.lname LIKE '%$se%') ORDER BY u.user_id DESC";

$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==0){
		echo "<p align='center' style='color:red'> No Records Found</p>";
	}else{
?>

<table width="100%" border="1" cellspacing="0" class="table table-hover">
        <tr style="background-color:#CCC;">
          <th width="10%" scope="col">User ID</th>
          <th width="13%" scope="col">User Name</th>
          <th width="14%" scope="col">First Name</th>
          <th width="16%" scope="col">Last Name</th>
          <th width="15%" scope="col">Email</th>
          <th width="12%" scope="col">User Role</th>
          <th width="20%" scope="col">&nbsp;</th>
        </tr>
        <?php while($row=mysqli_fetch_array($result)){
			?>
        <tr>
          <td> <?php echo $row['user_id']; ?> &nbsp; </td>
          <td> <?php echo $row['username']; ?> &nbsp;</td>
          <td> <?php echo $row['fname']; ?> &nbsp;</td>
          <td> <?php echo $row['lname']; ?> &nbsp;</td>
          <td> <?php echo $row['email']; ?> &nbsp;</td>
          <td> <?php echo $row['user_role_name']; ?> &nbsp;</td>
          <td> 
          <a href="edituser.php?user_id= <?php echo $row['user_id']; ?>" rel="facebox">
          <button class="btn btn-primary" type="button"> <i class="glyphicon glyphicon-edit icon-write"></i> Edit </button></a> &nbsp;
          
          <a href="deleteuser.php?user_id= <?php echo $row['user_id']; ?>" onClick="return del('a User?')">
          <button class="btn btn-danger" type="button"> <i class="glyphicon glyphicon-trash icon-write"></i> Delete </button></a> &nbsp;
          </td>
        </tr>
        <?php } ?>
      </table>  <?php } ?>