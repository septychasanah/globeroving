<div id="comments" class="comments-area">		<?php if ( have_comments() ) : ?>		<h5 class="title-sm" id="comments">			comments &nbsp;<span>(<?php comments_number('', '1', '%'); ?>)</span>		</h5>				<ol class="comment-list">			<?php wp_list_comments('callback=theme_comment_list'); ?>		</ol>	<?php endif; ?>		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>	<?php endif; ?>	<?php 		$comment_args = array(			'comment_notes_before' => '',			'title_reply' => 'Post A Comment',			'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title title-sm">',			'title_reply_after'  => '</h5>',			'cancel_reply_link' => __( 'Cancel Reply' ),			'class_submit' => 'btn btn-primary',			'label_submit' => __( 'Post Comment' ),			'fields' => apply_filters( 'comment_form_default_fields', array(				'author' => '<input id="author" name="author" type="text" placeholder="Name" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '">',				'email' => '<input id="email" name="email" type="text" placeholder="Email" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) . '">',				'url' => '<input id="url" name="url" type="text" placeholder="Website" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '">' 						)),			'comment_field' => '<textarea id="comment" name="comment" rows="5" placeholder="Your Message" class="form-control" aria-required="true"></textarea>',		);		comment_form($comment_args); 	?></div>