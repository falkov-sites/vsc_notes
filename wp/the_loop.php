<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 5,
	'category'    => 0,
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_type'   => 'post',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );

foreach( $posts as $post ){
    setup_postdata($post);
    
    // вывод записей
}

wp_reset_postdata(); // сброс
?>


<!-- ========== the loop : begin ========== --> 
<?php
$query = new WP_Query( array(
    'post_type' => array('event') 
) );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
		<!-- ----- posts : begin ----- -->
		
        <!-- ----- posts : end ----- -->
        <?php 
    }
} else { /* нет постов */ }
wp_reset_postdata();
?>
<!-- ========== the loop : end ========== --> 





<!-- ========== the loop : begin ========== --> 
<?php
$query = new WP_Query( [
    'posts_per_page' => 1,
    'category_name' => 'investigation',
] );

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <!-- ----- posts : begin ----- -->
        <section class="investigation" 
            style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.55), rgba(64, 48, 61, 0.85)), 
            url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat top center">
            
            <div class="main-container">
                <h2 class="investigation-title"><?php the_title(); ?></h2>
                <a class="investigation-link main-button" href="<?php echo get_the_permalink(); ?>">Читать статью</a>
            </div>
        </section>
        <!-- ----- posts : end ----- -->
        <?php 
    }
} else { /* нет постов */ }
wp_reset_postdata();
?>
<!-- ========== the loop : end ========== --> 


<!-- ========== the loop : begin ========== --> 
<?php
// global $post;

$myposts = get_posts([ 
    'numberposts' => 1, 
    'category' => '-18, -19, -21', // исключить
    'category_name' => 'javascript, css, html, web-design', 
    'offset' => 1, 
]); 


if( $myposts ) { 
    foreach( $myposts as $post ) { 
        setup_postdata( $post ); 
        ?>

        <!-- ----- posts : begin ----- -->
        <?php
            if ( has_post_thumbnail() ) {
            ?>
                <img class="post-thumb" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            <?php
            }
            else {
            ?>
                <img class="post-thumb" src="<?php echo get_template_directory_uri()?>/assets/images/default.svg" alt="<?php the_title(); ?>" />
            <?php
            }
        ?>

        <?php $author_id = get_the_author_meta('ID'); ?>

        <a class="author" href="<?php echo get_author_posts_url( $author_id ); ?>" >
            <img class="avatar" src="<?php echo get_avatar_url( $author_id ); ?>" alt="<?php the_author(); ?>" />

            <div class="author-bio">
                <span class="author-name"><?php the_author(); ?></span>
                <span class="author-rank">
                <?php 
                    $curr_role = get_the_author_meta( 'roles', $author_id)[0];
                    $roles = wp_roles()->roles;

                    foreach($roles as $role => $value) {
                        if($curr_role == $role) {
                            echo $value['name'];
                            break;
                        }
                    }
                ?>
                </span>
            </div>
        </a>

        <div class="post-text">
            <?php the_category(); ?>
            <h2 class="post-title"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2>
            <a class="main-button" href="<?php echo get_the_permalink(); ?>">Читать далее</a>
        </div>
        <!-- ----- posts : end ----- -->

    <?php 
    }
} else { /* нет постов */ }
wp_reset_postdata();
?>
<!-- ========== the loop : end ========== --> 
