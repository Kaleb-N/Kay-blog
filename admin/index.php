<?php
include 'partials/header.php';

// fetch current user's posts from database
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);
?>

<!-- This page was remained from dashboard to index -->
    <!--======= MANAGE POSTS =======-->
    <section class="dashboard">
        <?php if (isset($_SESSION['add-post-success'])) : // shows if deleted user was successful ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
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
                        <a href="index.php" class="active">
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
                            <a href="manage-categories.php">
                                <i class="fa fa-list"></i>
                                <p>Manage Categories</p>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Posts</h2>
                <?php if(mysqli_num_rows($posts) > 0) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <tbody>
                                <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                                    <!-- get category title of each post from categories table -->
                                    <?php
                                    $category_id = $post['category_id'];
                                    $category_query = "SELECT title FROM categories WHERE id=$category_id";
                                    $category_result = mysqli_query($connection, $category_query);
                                    $category = mysqli_fetch_assoc($category_result);
                                    ?>
                                    <tr>
                                        <td><?= $post['title'] ?></td>
                                        <td><?= $category['title'] ?></td>
                                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Edit</a></td>
                                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Delete</a></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </thead>
                    </table>
                <?php else : ?>
                    <div class="alert_message error">
                        <?= "No posts found" ?>
                    </div>
                <?php endif ?>
            </main>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>