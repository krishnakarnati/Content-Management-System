<?php 



if(isset($_GET['edit']))
{
$edit_id=$_GET['edit'];
$query="select * from users where user_id={$edit_id}";
$get_user_data=mysqli_query($conn,$query);
confirmQuery($get_user_data);
while($row=mysqli_fetch_assoc($get_user_data))
{   $user_id=$row['user_id'];
    $username=$row['username'];
    $user_email=$row['user_email'];
    $user_password=$row['user_password'];
    $user_role=$row['user_role'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_image=$row['user_image'];



}

}
if(isset($_POST['edit_user']))
{   
    //$post_title=$_POST['user_id'];
    $username=$_POST['Username'];
    $user_email=$_POST['User_email'];
    $user_password=$_POST['user_password'];
    $user_role=$_POST['user_role'];
   echo $user_image=$_FILES['image']['name'];
   echo $user_image_temp=$_FILES['image']['tmp_name'];
    $dummy=$_FILES['image'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    
   // $post_date=date('d-m-y');
  //  mysqli_real_escape_string($conn,$post_content);
   // $post_comment_count=4;
    
   
 
   move_uploaded_file($user_image_temp,"../images/$user_image");
    $query="update users set user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',username='{$username}',user_role='{$user_role}',user_image='{$user_image}',user_email='{$user_email}',user_password='{$user_password}' 
    where user_id=$user_id";
    $update_users_to_db=mysqli_query($conn,$query);
    confirmQuery($update_users_to_db);
        
}



?>
   
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="Username" value=<?php echo $username?>>
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="User_email" value=<?php echo $user_email?>>
    </div>
    <div class="form-group">
       <select name="user_role" id="">
       <option value="<?php echo $user_role ?> "><?php echo $user_role ?></option>
<?php 
       
if($user_role == 'subscriber')
{
   echo " <option value='admin'>admin</option>";

}
else
{
    echo "<option value='subscriber'>Subscriber</option>";
}
?>
</select>
    </div>
    <div class="form-group">
        <label for="title">password</label>
        <input type="password" class="form-control" name="user_password" value=<?php echo $user_password?>>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <img width=100 src="../images/<?php  echo $user_image ?>" alt="image">
        <input type="file"  name="image">
    </div>
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value=<?php echo $user_firstname?>>
    </div>

    <div class="form-group">
        <label for="Post_category_Id">Last Name</label>
       <input type="text" class="form-control" name="user_lastname" value=<?php echo $user_lastname?>>
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update user">
    </div>




</form>