<?php
if (isset($_POST['create_post']))
{
    $post_title=$_POST ['post_title'];
    $post_category=$_POST ['post_category_id'];
    $post_author=$_POST ['post_author'];
    $post_status=$_POST ['post_status'];
    $post_image=$_FILES ['post_image'] ['name'];
    $post_image_temp=$_FILES ['post_image'] ['tmp_name'];
    $post_tags=$_POST ['post_tags'];
    $post_content=$_POST ['post_content'];
    $post_date=date('d-m-y');
    $post_comment_count=4;
move_uploaded_file($post_image_temp, "../images/$post_image");

$query= "INSERT INTO posts(post_category_id, post_title, post_author, post_status, post_image, post_tags, post_content, post_date, post_comment_count) ";
$query.="VALUES ({$post_category}, '{$post_title}', '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now(), '{$post_comment_count}') ";
$create_post_query=mysqli_query($connection, $query);
query_check($create_post_query);
}

?>
<form action='' class='col-xs-6' method='post' enctype='multipart/form-data'>
<div class="form-group">
    <label for='title'> Post Title </label>
    <input type="text" class="form-control" name="post_title">
</div>
<div class="form-group">
    <label for='post_category'> Post Category </label>
    <input type="text" class="form-control" name="post_category_id">
</div>
<div class="form-group">
    <label for='author'> Post Author </label>
    <input type="text" class="form-control" name="post_author">
</div>
<div class="form-group">
    <label for='status'> Post Status </label>
    <input type="text" class="form-control" name="post_status">
</div>
<div class="form-group">
    <label for='image'> Post Image </label>
    <input type="file" name="post_image">
</div>
<div class="form-group">
    <label for='tags'> Post Tags </label>
    <input type="text" class="form-control" name="post_tags">
</div>
<div class="form-group">
    <label for='content'> Post Content </label>
    <input type="text" class="form-control" name="post_content">
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>
</form>
