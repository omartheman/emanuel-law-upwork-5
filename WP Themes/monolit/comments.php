<?php
/* banner-php */

if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>
<div class="comments-holder">
    <h3><?php
		printf( _nx( 'Comment <span>( %1$s )</span>', 'Comments <span>( %1$s )</span>', get_comments_number(), 'comments_title', 'monolit' ),
			number_format_i18n( get_comments_number() ), get_the_title() );
	?></h3>
	<?php 
	$args = array(
		'walker'            => null,
		'max_depth'         => '',
		'style'             => 'li',
		'callback'          => 'monolit_comments',
		'end-callback'      => null,
		'type'              => 'all',
		'reply_text'        => esc_html__('Reply','monolit'),
		'page'              => '',
		'per_page'          => '',
		'avatar_size'       => 50,
		'reverse_top_level' => null,
		'reverse_children'  => '',
		'format'            => 'html5', //or xhtml if no HTML5 theme support
		'short_ping'        => false, // @since 3.6,
	    'echo'     			=> true, // boolean, default is true
	);
	?>

    <ul class="commentlist clearafix">
        <?php wp_list_comments($args);?>
    </ul>
    <?php
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<div class="content-nav">
		<ul class="pager">
			<li class="previous"><?php previous_comments_link( wp_kses(__( '<i class="fa fa-long-arrow-left"></i>', 'monolit' ), array('i'=>array('class'=>array())) ) ); ?></li>
			<?php echo wp_kses(__('<li><span>/</span></li>','monolit'), array('li'=>array('class'=>array()),'span'=>array('class'=>array())) ) ;?>
			<li class="next"><?php next_comments_link( wp_kses(__( '<i class="fa fa-long-arrow-right"></i>', 'monolit' ), array('i'=>array('class'=>array())) ) ); ?></li>
		</ul>
	</div>
	<?php endif; // Check for comment navigation ?>

  	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'monolit' ); ?></p>
	<?php endif; ?>
</div>
<?php endif; ?>


<?php if(comments_open( )) : ?>
<div class="comment-form-holder">
        <!-- <div class="comment-reply-form"> -->

        	<?php
        		$commenter = wp_get_current_commenter();
        		$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );

				$comment_args = array(
				'title_reply'=> esc_html__('Leave A Comment','monolit'),
				'fields' => apply_filters( 'comment_form_default_fields', 
				array(
						'author' => '<div class="clearfix"></div><div class="comment-form-author control-group"><div class="controls"><input type="text" id="author" name="author"  placeholder="'.esc_html__('Name','monolit').'" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' size="40"></div><label class="control-label" for="author">'.esc_html__('Name ','monolit').'</label></div>',
						'email' =>'<div class="clearfix"></div><div class="comment-form-email control-group"><div class="controls"><input id="email" name="email" type="text"  placeholder="'.esc_html__('E-mail','monolit').'" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" ' . $aria_req . ' size="40"></div><label class="control-label" for="email">'.esc_html__('Email ','monolit').'</label></div>',
						//'url' =>'<div class="clearfix"></div><div class="comment-form-url control-group"><div class="controls"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'"  placeholder="'.esc_html__('Website','monolit').'" size="40"></div><label class="control-label" for="url">'.esc_html__('Website (optional) ','monolit').'</label></div>',
						) 
					),
				//'comment_field' => '<div class="clearfix"></div><div class="comment-form-comment control-group"><div class="controls"><textarea  placeholder="'.esc_html__('Your comment here...','monolit').'"  id="comment" cols="50" rows="8" name="comment"  '.$aria_req.'></textarea></div></div><div class="clearfix"></div>',
				'id_form'=>'commentform',
				'id_submit' => 'submit',
				'class_submit'=>'transition button',
				'label_submit' => esc_html__('Post Comment','monolit'),
				'must_log_in'=> '<p class="not-empty">' .  sprintf( wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.' ,'monolit'),array('a'=>array('href'=>array(),'title'=>array(),'target'=>array())) ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'logged_in_as' => '<p class="not-empty">' . sprintf( wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','monolit' ),array('a'=>array('href'=>array(),'title'=>array(),'target'=>array())) ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'comment_notes_before' => '<p class="text-center">'.esc_html__('Your email is safe with us.','monolit').'</p>',
				'comment_notes_after' => '',
				);
			?>
			<?php comment_form($comment_args); ?>
        <!-- </div> -->
</div>
<?php endif;?>