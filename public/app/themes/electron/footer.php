    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="site-info">
                <p>
                    <?php
                    printf(
                        esc_html__('© %1$s %2$s. All rights reserved.', 'electron'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                </p>
                <p>
                    <?php
                    printf(
                        esc_html__('Proudly powered by %s', 'electron'),
                        '<a href="https://wordpress.org/">WordPress</a>'
                    );
                    ?>
                    <?php
                    printf(
                        esc_html__('and %s', 'electron'),
                        '<a href="#">Electron Theme</a>'
                    );
                    ?>
                </p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 
