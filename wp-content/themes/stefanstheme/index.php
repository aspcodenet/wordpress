<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title">Blogg</h1>
        </header><?php
        // Startar loopen för att visa inlägg
        while ( have_posts() ) :
            the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;
                    ?>
                </header><div class="entry-content">
                    <?php
                    // Visar utdrag av inlägget
                    the_excerpt();
                    ?>
                </div><footer class="entry-footer">
                    <a href="<?php the_permalink(); ?>" class="read-more">Läs mer &raquo;</a>
                </footer></article><?php
        endwhile;

        // Mall-del för paginering
        the_posts_pagination(
            array(
                'prev_text' => '« Föregående',
                'next_text' => 'Nästa »',
            )
        );

    else : ?>

        <article class="no-posts">
            <header class="entry-header">
                <h1 class="entry-title">Inga inlägg hittades.</h1>
            </header>
            <div class="entry-content">
                <p>Ursäkta, men det verkar inte finnas något innehåll att visa.</p>
            </div>
        </article>

    <?php endif; ?>

    </main></div><?php get_sidebar(); ?>
<?php get_footer(); ?>