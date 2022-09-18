<?php
include 'partials/header.php';
?>

    <!--======= ADD USER =======-->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add User</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="<?= ROOT_URL ?>add-user-logic.php" enctype="multipart/form-data" method="POST">                
                <input type="text" name="firstname" id="" placeholder="First Name">
                <input type="text" name="lastname" id="" placeholder="Last Name">
                <input type="text" name="username" id="" placeholder="Username">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="confirmpassword" id="" placeholder="Confirm Password">
                <select name="userrole" id="">
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form_control">
                    <label for="avatar">User Avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Add User</button>
            </form>
        </div>
    </section>



<?php
include '../partials/footer.php';
?>