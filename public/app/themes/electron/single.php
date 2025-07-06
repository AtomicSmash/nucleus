<?php
/**
 * The template for displaying all single posts
 *
 * @package Electron
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="site-content">
            <div class="content-area">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post single-post'); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            
                            <div class="entry-meta">
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

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'electron'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>

                        <footer class="entry-footer">
                            <?php if (has_tag()) : ?>
                                <div class="tags-links">
                                    <?php the_tags(esc_html__('Tags: ', 'electron'), ', '); ?>
                                </div>
                            <?php endif; ?>

                            <div class="post-navigation">
                                <?php
                                the_post_navigation(array(
                                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'electron') . '</span> <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'electron') . '</span> <span class="nav-title">%title</span>',
                                ));
                                ?>
                            </div>
                        </footer>
                    </article>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?> 
