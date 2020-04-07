<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package naya_lite
 */

get_header(); ?>

    <section class="block">
        <div class="container">
            <!--add right sidebar-->
            <?php
            $position = sampression_sidebar_position();

            if ($position === 'left') {

                echo '<div class="left-sidebar-wrp four columns ">';

                get_sidebar();

                echo '</div>';
            }
            ?>
            <!--#add right sidebar-->
            <div class="<?php sampression_content_class() ?>">
                <div id="primary-content">
                    <?php
                    if (have_posts()) : ?>

                        <header class="page-header">
                            <?php
                            the_archive_title('<h1 class="page-title">', '</h1>');

                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </header><!-- .page-header -->

                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        endwhile;

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>
                </div>
                <!-- #primary-content-->
            </div>
            <?php
            $position = sampression_sidebar_position();

            if ($position === 'right') {

                echo '<div class="left-sidebar-wrp four offset-by-one columns ">';

                get_sidebar();

                echo '</div>';

            }
            ?>

        </div><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
