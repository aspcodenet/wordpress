<footer >
            <div >
                Vår coola sajt
                <span> | </span>
                <?php
                /* translators: %1$s: current year, %2$s: site title */
                printf( esc_html__( '&copy; %1$s %2$s', 'your-theme-text-domain' ), date_i18n('Y'), get_bloginfo('name') );
                ?>
            </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>