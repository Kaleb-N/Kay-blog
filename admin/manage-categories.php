<?php
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>

    <!--======= MANAGE CATEGORIES =======-->
    <section class="dashboard">
        <?php if (isset($_SESSION['add-category-success'])) : // shows if add category was successful ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-category-success'];
                        unset($_SESSION['add-category-success']);
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['add-category'])) : // shows if add category was successful ?>
            <div class="alert_message error container">
                <p>
                    <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <div class="container dashboard_container">
            <button id="show_sidebar-btn" class="sidebar_toggle"><i class="fa fa-angle-right"></i></button>
            <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="fa fa-angle-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="add-post.php">
                            <i class="fa fa-pen"></i>
                            <p>Add Post</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-stamp"></i>
                            <p>Manage Posts</p>
                        </a>
                    </li>

                    <!-- Check if current logged user is an admin -->
                    <?php if(isset($_SESSION['user_is_admin'])): ?>
                        <li>
                            <a href="add-user.php">
                                <i class="fa fa-user"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li>
                            <a href="manage-users.php">
                                <i class="fa fa-users"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li>
                            <a href="add-category.php">
                                <i class="fa fa-edit"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li>
                            <a href="manage-categories.php" class="active">
                                <i class="fa fa-list"></i>
                                <p>Manage Categories</p>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Categories</h2>
                <?php if(mysqli_num_rows($categories) > 0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <tbody>
                                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                                    <tr>
                                        <td><?= $category['title'] ?></td>
                                        <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" class="btn sm">Edit</a></td>
                                        <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>" class="btn sm danger">Delete</a></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </thead>
                    </table>
                <?php else : ?>
                    <div class="alert_message error">
                        <?= "No categories found" ?>
                    </div>
                <?php endif ?>
            </main>
        </div>
    </section>




<?php
include '../partials/footer.php';
?>