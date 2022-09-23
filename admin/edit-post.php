<?php
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// fetch post data from database if id is set
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>

    <!--======= EDIT POST =======-->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Post</h2>
            <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title" value="<?= $post['title'] ?>" id="" placeholder="Title">
                <select name="category">
                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea rows="10" name="body" placeholder="Description"><?= $post['body'] ?></textarea>
                <div class="form_control inline">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>
                    <label for="is_featured">Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Change Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Update Post</button>
            </form>
        </div>
    </section>

    
    
    
    
<?php
include '../partials/footer.php';
?>