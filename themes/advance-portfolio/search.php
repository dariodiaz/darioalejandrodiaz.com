<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package advance-portfolio
 */

get_header(); ?>

<main id="maincontent" role="main" class="our-services">
    <div class="innerlightbox">
        <div class="container">
            <?php
            $advance_portfolio_left_right = get_theme_mod( 'advance_portfolio_layout_options','Right Sidebar');
            if($advance_portfolio_left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8 noresult-content my-3'); ?>>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?> 
                    </div>
                </div>
            <?php }else if($advance_portfolio_left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8 noresult-content my-3'); ?>>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else if($advance_portfolio_left_right == 'One Column'){ ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('noresult-content my-3'); ?>>
                    <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content',get_post_format() ); 
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?> 
                </div>
            <?php }else if($advance_portfolio_left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 col-md-6 noresult-content my-3'); ?>>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($advance_portfolio_left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-3 col-md-3 noresult-content my-3'); ?>>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($advance_portfolio_left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9 row noresult-content my-3'); ?>>
                        <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/grid-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else {?>
                <div class="row">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8 noresult-content my-3'); ?>>
                       <h1 class="entry-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','advance-portfolio'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content',get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'advance_portfolio_blog_post_pagination',true) != '') { ?>
                            <div class="navigation">
                                <?php
                                    // Previous/next page navigation.
                                    the_posts_pagination( array(
                                        'prev_text'          => __( 'Previous page', 'advance-portfolio' ),
                                        'next_text'          => __( 'Next page', 'advance-portfolio' ),
                                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'advance-portfolio' ) . ' </span>',
                                    ) );
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }?>
            <div class="clearfix"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>