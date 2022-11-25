<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

/**
 * Template Name: Page - Full Width
 */
?>

<?php get_header() ?>
<?php if ( have_posts() ): the_post(); ?>
    <div class="content">
        <?php the_content() ?>

        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'hank' ),
            'after'  => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
    <!-- /.content -->

    <?php hank_comments_list() ?>
<?php endif ?>
<?php get_footer() ?>
