<div class="single-comment">
    <figure class="author-img">
        <?php echo get_avatar( get_comment_author_email()); ?>
        <p class="author-name"><?php comment_author_link(); ?> on <span><?php echo get_comment_date('d/m/y') ?></span> <span><?php echo get_comment_time() ?></span></p>
    </figure>
    <p class="comment-text">
        <?php comment_text(); ?>
        <?php 
            $args = [
                'depth' => 1,
                'max_depth' => 3,
            ];
            comment_reply_link( $args );
            ?>
    </p>
</div>