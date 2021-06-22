-----------------------------------------------------------------------------------------
разная информация об авторе 

<?php $author_id = get_the_author_meta('ID'); ?>

<a class="author" href="<?php echo get_author_posts_url( $author_id ); ?>" >
    <img
        class="avatar"
        src="<?php echo get_avatar_url( $author_id ); ?>"
        alt="<?php the_author(); ?>"
    />

    <div class="author-bio">
        <span class="author-name"><?php the_author(); ?></span>
        <span class="author-rank">Разработчик</span>
    </div>
</a>

-----------------------------------------------------------------------------------------
автор, лайки, комменты
<div class="author-info">
    <span class="author-name">
        <strong><?php the_author(); ?></strong>
    </span>

    <span class="date">
        <?php the_time('j F'); ?>
    </span>

    <div class="comments">
        <svg class="icon" width="14" height="14" fill="#FFFFFF" xmlns:xlink="http://www.w3.org/1999/xlink">
            <use xlink:href="<?php echo get_template_directory_uri();?>/assets/images/sprite.svg#comments"></use>
        </svg>
        <span class="comments-number"><?php comments_number( '0', '1', '%' ); ?></span>
    </div>

    <div class="likes">
        <svg class="icon" width="14" height="14" fill="#FFFFFF" xmlns:xlink="http://www.w3.org/1999/xlink">
            <use xlink:href="<?php echo get_template_directory_uri();?>/assets/images/sprite.svg#heart"></use>
        </svg>
        <span class="likes-number"><?php comments_number( '0', '1', '%' ); ?></span>
    </div>
</div>