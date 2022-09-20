<?php
include 'partials/header.php';

// fetch users from database but not current user
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);
?>

    <!--======= MANAGE USERS =======-->
    <section class="dashboard">
        <?php if (isset($_SESSION['add-user-success'])) : // shows if add user was successful ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['edit-user-success'])) : // shows if edited user was successful ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['edit-user'])) : // shows if edited user was NOT successful ?>
            <div class="alert_message error container">
                <p>
                    <?= $_SESSION['edit-user'];
                        unset($_SESSION['edit-user']);
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['delete-user'])) : // shows if deleted user was NOT successful ?>
            <div class="alert_message error container">
                <p>
                    <?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                    ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['delete-user-success'])) : // shows if deleted user was successful ?>
            <div class="alert_message success container">
                <p>
                    <?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
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
                            <a href="manage-users.php" class="active">
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
                <h2>Manage Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Admin</th>
                        </tr>
                        <tbody>
                            <?php while($user = mysqli_fetch_assoc($users)) : ?>
                                <tr>
                                    <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                                    <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                                    <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </thead>
                </table>
            </main>
        </div>
    </section>



<?php
include '../partials/footer.php';
?>