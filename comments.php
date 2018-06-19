<div class="row">
    <div class="large-12 columns">
        <?php
        /*Preventing direct access to comments.php
        ===========================================*/?>
        <?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
        <?php endif; ?>

        <?php
        /*This line of code prevents users from viewing
        * comments.php by accident. This page is meant
        * to be included in a post page, not separately.
        * You could consider this a security measure.
        * Inside the statement, you could insert any message
        * you'd want to be displayed to the person viewing
        * the comments.php file, preferably a die statement.
        ======================================================*/ ?>

        <?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
            <?php die('You can not access this page directly!'); ?>
        <?php endif; ?>

        <?php
        /* Is a password required?
        ===========================*/?>
        <?php if(!empty($post->post_password)) : ?>
            <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php
        /* Displaying The Comments
        ===========================*/?>
            <?php
            /* Template Tag                     |   Description
            -----------------------------------------------------------------------
            |   <?php comment_ID(); ?>          |   the ID of a comment
            -----------------------------------------------------------------------
            |   <?php comment_author(); ?>      |   the author of a comment
            -----------------------------------------------------------------------
            |   <?php comment_author_link(); ?> |   the author of a comment,
            |                                   |   wrapped with a link to his
            |                                   |   website if he specified one
            -----------------------------------------------------------------------
            |   <?php comment_type(); ?>        |   the type of comment; pingback,
            |                                   |   trackback or a comment
            -----------------------------------------------------------------------
            |   <?php comment_text(); ?>        |   the actual comment
            -----------------------------------------------------------------------
            |   <?php comment_date(); ?>        |   the date it was posted
            -----------------------------------------------------------------------
            |   <?php comment_time(); ?>        |   the time it was posted
            ========================================================================*/?>
        <section id="comments">
            <?php // Are there comments ?>
            <?php if($comments) : ?>
                <h3><?php comments_number('No Comments for', 'One Comment to', '% Comments' ); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
                <ol class="commentlist">
                    <?php foreach($comments as $comment) : ?>
                        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                            <article id="comment-<?php comment_ID(); ?>">
                                <header class="comment-author">
                                    <?php echo get_avatar($comment,$size='48'); ?>
                                    <div class="author-meta">
                                        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                                        <time datetime="<?php echo comment_date('c') ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()) ?></a></time>
                                        <?php edit_comment_link(__('(Edit)'), '', '') ?>
                                    </div>
                                </header>

                                <?php if ($comment->comment_approved == '0') : ?>
                                    <div class="notice">
                                        <p class="bottom"><?php _e('Your comment is awaiting moderation.') ?></p>
                                    </div>
                                <?php endif; ?>

                                <section class="comment">
                                    <?php comment_text() ?>
                                    <?php comment_reply_link() ?>
                                </section>

                            </article>
                        </li>
                    <?php endforeach; ?>
                </ol>
            <?php else : ?>
                <p>No comments yet</p>
            <?php endif; ?>
        </section>

        <?php
        /* The Comment Form
        ====================*/?>
        <?php if(comments_open()) : ?>
            <?php if(get_option('comment_registration') && !$user_ID) : ?>
                <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p><?php else : ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                    <?php if($user_ID) : ?>
                        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
                    <?php else : ?>
                        <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
                            <label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label></p>
                        <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
                            <label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label></p>
                        <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
                            <label for="url"><small>Website</small></label></p>
                    <?php endif; ?>
                    <p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
                    <p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
                    <?php do_action('comment_form', $post->ID); ?>
                </form>
            <?php endif; ?>
        <?php else : ?>
            <p>The comments are closed.</p>
        <?php endif; ?>
    </div>
</div>