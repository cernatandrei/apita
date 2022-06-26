<table class= "table table-bordered table-hover">
    <thead>
        <tr>
        <th>Post ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Date</th>
        <th>Image</th>
        <th>Author</th>
        <th>Comments</th>
        <th>Tags</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM posts ";
    $select_posts=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_assoc($select_posts))
        {
        $post_id= $row['post_id'];
        $post_title= $row['post_title'];
        $post_author= $row['post_author'];
        $post_category= $row['post_category_id'];
        $post_status= $row['post_status'];
        $post_image= $row['post_image'];
        $post_tags= $row['post_tags'];
        $post_date= $row['post_date'];
        $post_comment_count= $row['post_comment_count'];
        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_category}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><img src='../images/{$post_image}' width='150 px'></td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td><a href='posts.php?delete={$post_id} '><h4>Delete</h4></a>";
        echo " / <a href='posts.php?source=edit&p_id={$post_id}'><h4>Edit</h4></a></td>";
        echo "</tr>";

        }
    ?>
</tbody>
</table>
<?php
if(isset($_GET['delete']))
{
    deletepost();
}