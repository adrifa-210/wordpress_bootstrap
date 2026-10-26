<?php
get_header();

?>

<!-- Preloader-->
<div class="page-loader">
    <div class="loader"></div>
</div>
<!-- Preloader end-->

<!-- Header-->
<header class="header">
    <!-- Top bar-->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-left-align">
                        <li>Mon - Fri: 07:00 am - 05:00 pm</li>
                        <li><abbr title="Phone">P:</abbr> +39 02 87 21 43 19</li>
                        <li><a href="start.html" data-color="#e1be64">Demos</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="top-bar-tools">
                        <li><a class="open-offcanvas" href="#"><i class="ti-menu"></i></a></li>
                        <li><a href="sign-in.html"><i class="ti-search"></i></a></li>
                        <li><a href="sign-in.html"><i class="ti-user"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="navigation navigation-center">
        <div class="container-fluid">
            <!-- Brand-->
            <div class="inner-header"><a class="inner-brand" href="index.html"><img class="brand-dark"
                        src="assets/images/logo.png" width="74px" alt=""><img class="brand-light"
                        src="assets/images/logo-light.png" width="74px" alt=""></a></div>
            <!-- Navigation-->
            <?php get_template_part('nav'); ?>

        </div>
    </div>
</header>
<!-- Header end-->

<!-- Wrapper-->
<div class="wrapper">

    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 m-auto">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Post-->
                            <article class="post">
                                <div class="post-preview"><img src="" alt=""></div>
                                <div class="post-wrapper">
                                    <div class="post-header">
                                        <h1 class="post-title display-1"><?php the_title(); ?></h1>
                                        <ul class="post-meta">
                                            <li><?php the_time('F j, Y'); ?></li>
                                            <li>In <?php the_category(' & '); ?></li>
                                            <li><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></li>
                                        </ul>
                                    </div>
                                    <div class="post-content">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="post-footer">
                                        <div class="post-tags">
                                            <?php
                                            the_tags('', '', '');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Post end-->
                            <!-- Comments area-->
                            <div class="comments-area">
                                <h5 class="comments-title">3 Comments</h5>
                                <div class="comment-list">
                                    <!-- Comment-->
                                    <div class="comment">
                                        <div class="comment-author"><img class="avatar" src="assets/images/avatar/1.jpg"
                                                alt=""></div>
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author"><a href="#">Jason Ford</a></div>
                                                <div class="comment-meta-date"><a href="#">May 5, 2015 at 4:51
                                                        am</a></div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level
                                                    ethnic fingerstache fanny pack nostrud.</p>
                                            </div>
                                            <div class="comment-reply"><a href="#">Reply</a></div>
                                        </div>
                                        <!-- Subcomment-->
                                        <div class="children">
                                            <div class="comment">
                                                <div class="comment-author"><img class="avatar"
                                                        src="assets/images/avatar/2.jpg" alt=""></div>
                                                <div class="comment-body">
                                                    <div class="comment-meta">
                                                        <div class="comment-meta-author"><a href="#">Harry
                                                                Benson</a></div>
                                                        <div class="comment-meta-date"><a href="#">May 5, 2015 at
                                                                4:51 am</a></div>
                                                    </div>
                                                    <div class="comment-content">
                                                        <p>Meh synth Schlitz, tempor duis single-origin coffee ea
                                                            next level ethnic fingerstache fanny pack nostrud.</p>
                                                    </div>
                                                    <div class="comment-reply"><a href="#">Reply</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Comment-->
                                    <div class="comment">
                                        <div class="comment-author"><img class="avatar" src="assets/images/avatar/3.jpg"
                                                alt=""></div>
                                        <div class="comment-body">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author"><a href="#">Henry Cain</a></div>
                                                <div class="comment-meta-date"><a href="#">May 5, 2015 at 4:51
                                                        am</a></div>
                                            </div>
                                            <div class="comment-content">
                                                <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level
                                                    ethnic fingerstache fanny pack nostrud.</p>
                                            </div>
                                            <div class="comment-reply"><a href="#">Reply</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-respond">
                                    <h5 class="comment-reply-title">Leave a Reply</h5>
                                    <p class="comment-notes">Your email address will not be published. Required
                                        fields are marked</p>
                                    <form class="comment-form row">
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="text" placeholder="Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="text" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="url" placeholder="Website">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" rows="8" placeholder="Comment"></textarea>
                                        </div>
                                        <div class="form-submit col-md-12">
                                            <button class="btn btn-black" type="submit">Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Comments area end-->
                        </div>

                        <div class="col-lg-4">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <svg class="footer-circle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100"
        viewbox="0 0 100 100" preserveaspectratio="none">
        <path d="M0 100 C40 0 60 0 100 100 Z"></path>
    </svg>
    <!-- Footer-->
    <?php get_footer(); ?>