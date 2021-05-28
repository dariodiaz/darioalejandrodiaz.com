<?php
/**
 * Comments
 *
 * @package WordPress
 * @subpackage SEO
 */

?>
<?php
/**
 * Customizes comment list markup
 *
 * @param object  $comment Comment object.
 * @param array   $args Arguments customizing the output.
 * @param integer $depth Comment nesting depth.
 */
function diagnoseo_comment( $comment, $args, $depth ) {
	?>
	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent', $comment->comment_ID ); ?> id="comment-<?php echo esc_attr( $comment->comment_ID ); ?>">
	<div id="div-comment-<?php echo esc_attr( $comment->comment_ID ); ?>">
		<div class="comment-author vcard">
			<?php
			if ( 0 !== absint( $args['avatar_size'] ) ) {
				echo get_avatar( $comment, $args['avatar_size'] );
			}
			?>
			<cite class="fn"><?php echo get_comment_author_link( $comment->comment_ID ); ?></cite>
			<p class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo esc_html( get_comment_date() ); ?> <?php esc_html_e( 'at', 'diagnoseo' ); ?> <?php echo esc_html( get_comment_time() ); ?></a>
			<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'before'    => '<span class="sep">|</span>',
					)
				)
			);
			?>
			</p>
		</div>
		<?php if ( ! $comment->comment_approved ) : ?>
			<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'diagnoseo' ); ?></p>
		<?php endif; ?>
		<div class="comment-body"><?php comment_text(); ?></div>
	</div>
	<?php
}

/**
 * Reorders fields in the comment form
 *
 * @param array $fields Form fields.
 */
function diagnoseo_comment_fields_custom_order( $fields ) {
	$cookies_opt_in_enabled = ! empty( $fields['cookies'] );
	$comment_field          = $fields['comment'];
	$author_field           = $fields['author'];
	$email_field            = $fields['email'];
	$url_field              = array_key_exists( 'url', $fields ) ? $fields['url'] : '';
	if ( $cookies_opt_in_enabled ) {
		$cookie_field  = $fields['cookies'];
	}
	if ( $cookies_opt_in_enabled ) {
		unset( $fields['cookies'] );
	}
	unset( $fields['comment'] );
	unset( $fields['author'] );
	unset( $fields['email'] );
	unset( $fields['url'] );
	$fields['author']  = $author_field;
	$fields['email']   = $email_field;
	$fields['url']     = $url_field;
	$fields['comment'] = $comment_field;

	if ( $cookies_opt_in_enabled ) {
		$fields['cookies'] = $cookie_field;
	}
	return $fields;
}
add_filter( 'comment_form_fields', 'diagnoseo_comment_fields_custom_order' );

/**
 * Custom markup of the submit button
 *
 * @param object $submit_field Submit field object supplied by WP.
 */
function diagnoseo_submit_button( $submit_field ) {
	$new_submit = str_replace(
		'<input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />',
		'<button name="submit" type="submit" id="submit" class="button submit" value="Post Comment">' . __( 'Post comment', 'diagnoseo' ) . '</button>',
		$submit_field
	);

	return $new_submit;
}
add_filter( 'comment_form_submit_field', 'diagnoseo_submit_button' );
