<?php
include 'partials/header.php';
?>

<!-- This page was remained from dashboard to index -->
    <!--======= MANAGE POSTS =======-->
    <section class="dashboard">
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
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td>Nature</td>
                                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                                <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td>Entertainment</td>
                                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                                <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td>Sports</td>
                                <td><a href="edit-post.php" class="btn sm">Edit</a></td>
                                <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </main>
        </div>
    </section>

<?php
include '../partials/footer.php';
?>