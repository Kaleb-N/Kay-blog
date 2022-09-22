<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    
    // fetch category from database
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location: ' . ROOT_URL . 'admin/manage-categories.php');
    die();
}
?>

    <!--======= EDIT CATEGORY =======-->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Edit Category</h2>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" value="<?= $category['title'] ?>" placeholder="title">
                <textarea rows="4" placeholder="Description"><?= $category['description'] ?></textarea>
                <button type="submit" class="btn">Update Category</button>
            </form>
        </div>
    </section>




<?php
include '../partials/footer.php';
?>