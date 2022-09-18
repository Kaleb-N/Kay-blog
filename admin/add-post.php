<?php
include 'partials/header.php';
?>

    <!--======= ADD POST =======-->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Post</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" id="" placeholder="Title">
                <select name="" id="">
                    <option value="1">Sports</option>
                    <option value="1">Cryptocurrency</option>
                    <option value="1">Nature</option>
                    <option value="1">Travel</option>
                    <option value="1">Technology</option>
                </select>
                <textarea rows="10" placeholder="Description"></textarea>
                <div class="form_control inline">
                    <input type="checkbox" name="" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="" id="thumbnail">
                </div>
                <button type="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>




<?php
include '../partials/footer.php';
?>