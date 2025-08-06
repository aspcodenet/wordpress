<?php get_header(); ?>

<main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="entry-meta">
                <span class="posted-on">Publicerad: <?php echo get_the_date(); ?></span>
                <span class="byline">av <?php the_author(); ?></span>
            </div>
        </header>

        <div class="entry-content">
            <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Fortsätt läsa<span class="screen-reader-text"> "%s"</span>', 'textdomain' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Sidor:', 'textdomain' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>

        <footer class="entry-footer">
            <?php the_tags( '<div class="tags-links">' . esc_html__( 'Taggar:', 'textdomain' ) . ' ', ', ', '</div>' ); ?>
        </footer>
    </article>

    <?php
    // Om kommentarer är aktiverade och det finns kommentarer.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

    endwhile; // Slutar loopen
    ?>

</main><?php get_footer(); ?>