<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Electron
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="site-content">
            <div class="content-area">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'electron'); ?></h1>
                    </header>

                    <div class="page-content">
                        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'electron'); ?></p>

                        <?php get_search_form(); ?>

                        <div class="widget-area">
                            <div class="widget">
                                <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'electron'); ?></h2>
                                <ul>
                                    <?php
                                    wp_list_categories(array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    ));
                                    ?>
                                </ul>
                            </div>

                            <div class="widget">
                                <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'electron'); ?></h2>
                                <ul>
                                    <?php
                                    wp_get_archives(array(
                                        'type'  => 'postbypost',
                                        'limit' => 10,
                                    ));
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> 
