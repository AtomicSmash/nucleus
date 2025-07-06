<?php
/**
 * The template for displaying search results pages
 *
 * @package Electron
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="site-content">
            <div class="content-area">
                <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            printf(
                                esc_html__('Search Results for: %s', 'electron'),
                                '<span>' . get_search_query() . '</span>'
                            );
                            ?>
                        </h1>
                    </header>

                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post search-result'); ?>>
                            <header class="entry-header">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="post-meta">
                                    <span class="posted-on">
                                        <?php echo esc_html__('Posted on', 'electron'); ?> 
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </span>
                                    
                                    <span class="byline">
                                        <?php echo esc_html__('by', 'electron'); ?> 
                                        <span class="author vcard">
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php echo esc_html(get_the_author()); ?>
                                            </a>
                                        </span>
                                    </span>
                                    
                                    <?php if (has_category()) : ?>
                                        <span class="cat-links">
                                            <?php echo esc_html__('in', 'electron'); ?> 
                                            <?php the_category(', '); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="post-content">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <div class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php echo esc_html__('Read More', 'electron'); ?> →
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    <?php
                    // Pagination
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('← Previous', 'electron'),
                        'next_text' => __('Next →', 'electron'),
                    ));
                    ?>

                <?php else : ?>
                    <article class="no-posts">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php esc_html_e('Nothing Found', 'electron'); ?></h1>
                        </header>

                        <div class="entry-content">
                            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'electron'); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </article>
                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> 
