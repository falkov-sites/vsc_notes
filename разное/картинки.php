<?php
    // получить первую картинку-вложение прикрепленную к записи
    // https://wp-kama.ru/function/get_attached_media

    $media = get_attached_media( 'image' );
    $media = array_shift( $media );
    $image_url = $media->guid;
?>

<a href="<?php the_permalink(); ?>">
    <img src="<?php echo $image_url ?>" />
</a>


<!-- картинка с наложеныым градиентом -->
<section 
    style="background: linear-gradient(0deg, rgba(64, 48, 61, 0.35), rgba(64, 48, 61, 0.35)),
        url(<?php echo get_the_post_thumbnail_url();?>) no-repeat top center;" >
</section>

// адаптивная верстка картинок:
// картинки помещаем внутрь контейнера, контейнеру задаем - position: relative
// картинке задаем - position: absolute, width, height, top, left, object-fit: cover; object-position: center top;
// html ---
<div class=” image-container”>
    <img src="img/asdf.jpg" alt="">
</div>	


// sass ---
.image-container
    position: relative
    width: 300px
    height: 200px
 
    img
        position: absolute

        width: 100%
        height: 100%
        left: 0px
        top: 0px

        object-fit: cover
        object-position: center top
// ---------------------------------------------
    // внутри svg можно использовать несколько use
    // напр. на mobile показывать иконку меню, а когда меню открыто - показвать крестик
    // для этого управляем классами use
    <svg class="menu-icon" width="32" height="32">
        <use class="menu__icon-menu" href="images/sprite.svg#menu"></use>
        <use class="menu__icon-cross" href="images/sprite.svg#cross"></use>
    </svg>

    //
    <style>
    .social__link
        display: block
    
    
    </style>
    
