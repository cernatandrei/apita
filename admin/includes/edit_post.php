<?php
if (isset($_GET['p_id']))
{
    $post_id=$_GET['p_id'];
}
?>
<?php
if (isset($_POST['update_post']))
{
    var_dump($_POST, $_FILES);
    $post_title= $_POST['post_title'];
    $post_author= $_POST['post_author'];
    $post_category= $_POST['post_category'];
    $post_status= $_POST['post_status'];
    $post_image=$_FILES ['post_image'] ['name'];
    $post_image_temp=$_FILES ['post_image'] ['tmp_name'];
    $post_tags= $_POST['post_tags'];
    $post_content=$_POST['post_content'];
move_uploaded_file($post_image_temp, "../images/$post_image");
$query = "UPDATE posts SET ";
$query.= "post_title='{$post_title}', ";
$query.= "post_category_id='{$post_category}', ";
$query.= "post_date=now(), ";
$query.= "post_author='{$post_author}', ";
$query.= "post_status='{$post_status}', ";
$query.= "post_tags='{$post_tags}', ";
$query.= "post_content='{$post_content}', ";
$query.= "post_image='{$post_image}' ";
$query.= "WHERE post_id={$post_id} ";
echo $query;
$update= mysqli_query ($connection, $query);

}
?>

<?php
$query = "SELECT * FROM posts ";
$select_posts=mysqli_query($connection, $query);
while ($row=mysqli_fetch_assoc($select_posts))
{
$p_id= $row['post_id'];
$post_title= $row['post_title'];
$post_author= $row['post_author'];
$post_category= $row['post_category_id'];
$post_status= $row['post_status'];
$post_image= $row['post_image'];
$post_tags= $row['post_tags'];
$post_date= $row['post_date'];
$post_comment_count= $row['post_comment_count'];
$post_content=$row['post_content'];
}
?>



<form action='' class='col-xs-6' method='post' enctype='multipart/form-data'>
<div class="form-group">
    <label for='title'> Post Title </label>
    <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
</div>
<div class="form-group">
    <select name="post_category" id="">
        <?php
        $query = "SELECT * FROM categories ";
        $s_c=mysqli_query($connection,$query);
        while ($row=mysqli_fetch_assoc($s_c))
            {
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label for='author'> Post Author </label>
    <input type="text" value="<?php echo $post_author; ?> " class="form-control" name="post_author">
</div>
<div class="form-group">
    <label for='status'> Post Status </label>
    <input value="<?php echo $post_status; ?> " type="text" class="form-control" name="post_status">
</div>
<div class="form-group">
    <img width = "150 px" src="../images/<?php echo $post_image; ?>><br>
</div>
<div class="form-group">
    <label for='image'> Post Image </label>
    <input type="file" name="post_image">
</div>
<div class="form-group">
    <label for='tags'> Post Tags </label>
    <input value="<?php echo $post_tags; ?> " type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
    <label for='content'> Post Content </label>
    <input value="<?php echo $post_content; ?> " type="text" class="form-control" name="post_content">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</div>
</form>










