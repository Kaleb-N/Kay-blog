<?php
include 'partials/header.php';

// fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

// fetch 6 posts from posts table
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 6";
$posts = mysqli_query($connection, $query);
?>

    <!--=========== FEATURED ==========-->
    <!-- show featured post if there's any -->
<?php if (mysqli_num_rows($featured_result) == 1) : ?>    
    <section class="featured">
        <div class="container featured_container">
            <div class="post_thumbnail">
                <img src="./images/<?= $featured['thumbnail'] ?>">
            </div>
            <div class="post_info">
                <?php 
                // fetch category from categories table using category_d of post
                $category_id = $featured['category_id'];
                $category_query = "SELECT * FROM categories WHERE id=$category_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                ?>
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
                <h2 class="post_title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="post_body">
                    <?= substr($featured['body'], 0, 250) ?>...
                </p>
                <div class="post_author">
                    <?php
                    // fetch author from users table using author_id
                    $author_id = $featured['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);

                    ?>
                    <div class="post_author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="post_author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small>
                            <?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

    <!--=========== POSTS ==========-->
    <section class="posts">
        <div class="container posts_container">
            <article class="post">
                <div class="post_thumbnail">
                    <img src="./images/blog7.jpg">
                </div>
                <div class="post_info">
                    <a href="category-posts.php" class="category_button">Nature</a>
                    <h3 class="post_title">
                        <a href="post.html">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, assumenda!</a>
                    </h3>
                    <p class="post_body">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto rem officiis saepe cum sequi at porro asperiores cupiditate quas impedit.
                    </p>
                    <div class="post_author">
                        <div class="post_author-avatar">
                            <img src="./images/avatar11.jpg">
                        </div>
                        <div class="post_author-info">
                            <h5>By: Free Man</h5>
                            <small>Aug 24, 2022</small>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!--=========== CATEGORY BUTTONS ==========-->
    <section class="category_buttons">
        <div class="container category_buttons-container">
            <a href="" class="category_button">Sports</a>
            <a href="" class="category_button">Cryptocurrency</a>
            <a href="" class="category_button">Nature</a>
            <a href="" class="category_button">Entertainment</a>
            <a href="" class="category_button">Travel</a>
            <a href="" class="category_button">Technology</a>
        </div>
    </section>

    

<?php
include 'partials/footer.php';
?>