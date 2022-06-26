<?php
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit']))
    {
        $cat_title= $_POST['cat_title'];
        if ($cat_title== "" || empty($cat_title))
        {echo "This field is Required"; } 
         else {
                $query= "INSERT INTO categories(cat_title) 
                 VALUE('$cat_title') ";
                $create_category_query= mysqli_query($connection, $query);
                 if (!$create_category_query) {
                    die("QUERY FAILED".mysqli_error($create_category_query));
                 }
               }
    }
}

function findallcat()
{
    global $connection;
    global $cat_id;
    global $cat_title;
    $query = "SELECT * FROM categories";
    $select_categories=mysqli_query($connection, $query);

                while ($row=mysqli_fetch_assoc($select_categories))
                {
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<tr>";
                echo "<td>{$cat_id}</td>";
                echo "<td>{$cat_title}</td>";
                echo "<td><a href='categories.php?delete={$cat_id}'><h4>Delete</h4><a></td>";
                echo "<td><a href='categories.php?edit={$cat_id}'><h4>Edit</h4><a></td>";
                echo "</tr>";
            } 
}


function deletecat()
{
    global $connection;
    if (isset ($_GET['delete']))
    {
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id} ";
        $delete_query=mysqli_query($connection, $query);
        header("Location: ../admin/categories.php");
    }
}

function query_check($result)
{
    global $connection;
    if (!$result)
        {
        die("QUERY FAILED". mysqli_error($connection));
        }

}

function deletepost()
{
    global $connection;
    if (isset ($_GET['delete']))
    {
        $post_id=$_GET['delete'];
        $query="DELETE FROM posts WHERE post_id={$post_id} ";
        $delete_query=mysqli_query($connection, $query);
        header("Location: ../admin/posts.php");
    }
}












?>