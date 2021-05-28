<?php
/**
 * Single post template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$this_post_id = get_the_id();
		?>
<main class="main">
	<article class="post single">
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-image"><?php the_post_thumbnail(); ?></div>
		<?php endif; ?>
		<div class="post-content">
			<h1 class="post-title"><?php the_title(); ?> <?php edit_post_link( esc_html__( 'Edit this entry', 'diagnoseo' ), '', '' ); ?></h1>
			<p class="post-meta">
				<?php if ( 0 !== count( get_the_category() ) ) : ?>
				<span class="meta meta-category"><?php the_category( ', ' ); ?></span> <i class="meta-sep">/</i>
				<?php endif; ?>
				<span class="meta meta-date"><?php the_time( get_option( 'date_format' ) ); ?></span> <i class="meta-sep">/</i>
				<span class="meta meta-author"><?php the_author(); ?></span>
				<?php if ( comments_open() ) : ?>
				<i class="meta-sep">/</i> <span class="meta meta-comments"><?php comments_popup_link( '0', '1', '%', 'icon-comment comment-link' ); ?></span>
				<?php endif; ?>
			</p>
			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before'         => '<p class="pages"><strong>' . esc_html__( 'Pages', 'diagnoseo' ) . ':</strong> ',
					'after'          => '</p>',
					'next_or_number' => 'number',
					'aria_current'   => 'page',
				)
			);
			if ( has_tag() ) : ?>
			<p class="tags icon-tag"><?php the_tags( '' ); ?></p>
			<?php endif;?>

			<div class="post-author">
				<?php $author_id = get_the_author_meta( 'ID' ); ?>
				<span class="img-border"><?php echo get_avatar( $author_id ); ?></span>
				<div class="post-author-info">
					<h4 class="post-author-name">
						<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
						<?php the_author(); ?>
						</a>
					</h4>
					<p class="post-author-description"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
				</div>
			</div>
		</div>
	</article>



	<nav class="post-nav">
		<?php
		$prev_post = get_adjacent_post( false, '', true );
		$next_post = get_adjacent_post( false, '', false );

		if ( ! empty( $prev_post ) ) :
			$prev_id = $prev_post->ID;
			?>
			<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="post-nav-link prev">
				<i class="icon-arrow_back"></i>
				<span class="post-nav-link-content">
					<span class="info" data-label="<?php esc_attr_e( 'Previous post', 'diagnoseo' ); ?>"></span>
					<?php echo esc_html( $prev_post->post_title ); ?>
				</span>
			</a>
			<?php
		endif;

		if ( ! empty( $next_post ) ) :
			$next_id = $next_post->ID;
			?>
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="post-nav-link next">
				<i class="icon-arrow_forward"></i>
				<span class="post-nav-link-content">
					<span class="info" data-label="<?php esc_attr_e( 'Next post', 'diagnoseo' ); ?>"></span>
					<?php echo esc_html( $next_post->post_title ); ?>
				</span>
			</a>
		<?php endif; ?>
	</nav>

	<?php
	diagnoseo_related_posts( $post );
	diagnoseo_latest_posts( $post );

	comments_template();
	?>
	<div class="meta">
		<meta itemprop="datePublished" content="<?php the_time( 'Y-m-d' ); ?>" />
		<meta itemprop="dateModified" content="<?php the_modified_time( 'c' ); ?>" />
		<meta itemscope itemprop="mainEntityOfPage" content="" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" />
		<meta itemprop="headline" content="<?php the_title(); ?>" />
		<span itemprop="author" itemscope itemtype="http://schema.org/Person">
		<meta itemprop="name" content="<?php the_author(); ?>" />
		</span>
		<span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<?php
			if ( has_custom_logo() ) :
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				if ( ! empty( $logo ) ) :
				?>
				<meta itemprop="url" content="<?php echo esc_url( $logo[0] ); ?>" />
				<?php
				endif;
			endif;
			?>
			</span>
			<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>" />
		</span>
		<?php
		$diagnoseo_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$img                = wp_get_attachment_image_src( $diagnoseo_thumbnail_id, 'post-thumbnail' );
		if ( is_array( $img ) && count( $img ) ) {
			$src    = $img[0];
			$width  = $img[1];
			$height = $img[2];
		}

		if ( ! empty( $diagnoseo_thumbnail_id ) && is_array( $img ) && count( $img ) ) :
			?>
		<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="<?php echo esc_url( $src ); ?>" />
			<meta itemprop="width" content="<?php echo esc_attr( $width ); ?>" />
			<meta itemprop="height" content="<?php echo esc_attr( $height ); ?>" />
		</span>
			<?php
		endif;
		?>
	</div>
</main>
		<?php
	endwhile;
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
