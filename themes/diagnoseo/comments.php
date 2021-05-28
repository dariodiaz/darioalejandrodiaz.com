<?php
/**
 * Comments template
 *
 * @package WordPress
 * @subpackage SEO
 */

?>

<?php
if ( comments_open() ) :
	?>
	<?php if ( $comments ) : ?>
		<section class="comments" id="comments">
			<?php /* translators: %s is replced by comment count */ ?>
			<h2 class="spec-heading"><span><?php printf( esc_html( _n( '%s comment', '%s comments', get_comments_number(), 'diagnoseo' ) ), esc_html( number_format_i18n( get_comments_number() ) ) ); ?></span></h2>
			<ul class="commentlist">
				<?php wp_list_comments( 'callback=diagnoseo_comment' ); ?>
			</ul>
			<?php paginate_comments_links(); ?>
		</section>
	<?php endif; ?>
	<section class="leave-comment">
		<h2 class="spec-heading"><span><?php esc_html_e( 'Leave a Comment', 'diagnoseo' ); ?></span></h2>
		<?php comment_form(); ?>
	</section>
<?php endif; ?>
