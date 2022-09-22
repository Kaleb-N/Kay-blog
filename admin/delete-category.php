<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    // update category_id of posts that belong to this category to id of uncategorized category




    // delete category from database
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    $_SESSION['delete-category-success'] = "category deleted successfully";







/*    
    // fetch category from database
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
    // make sure we got back only one category 
    if (mysqli_num_rows($result) == 1) {
        $category_title = $category['title'];
        // delete image if available
        if ($category_title) {
            unlink($category_title);
        }
    }
    // delete user from database 
    $delete_category_query = "DELETE FROM categories WHERE id=$id";
    $delete_category_result = mysqli_query($connection, $delete_category_query);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-category'] = "Couldn't delete {$category['title']} category, try again";
    } else {
        $_SESSION['delete-category-success'] = "{$category['title']} category deleted successfully";
    }
*/
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
die();