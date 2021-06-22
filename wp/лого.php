сделать ссылкой не только лого, но и текст рядом (здесь это имя сайта get_bloginfo('name'))
<?php 
    if(has_custom_logo()) { 
        $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); 

        echo '<a class="home-link" href="' . get_home_url() . '">' . 
        '<div class="logo"> <img src="' . $custom_logo__url[0] . '" alt="logo">' .
        '<span class="logo-name">' . get_bloginfo('name') . '</span> </div></a>';
    }
    else { 
        echo '<a class="home-link" href="' . get_home_url() . '">' . 
        '<div class="logo"> <span class="logo-name">' . get_bloginfo('name') . '</span> </div></a>';
    }
?>

тоже самое (здесь только лого), но если это не главная страница, то ссылка на главную
если же это уже главная, то ссылки на главную нет, т.к. мы уже и так на ней
<?php 
    if( is_front_page() ){

        if(has_custom_logo()) { 
            $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); 
            echo '<div class="logo"> <img src="' . $custom_logo__url[0] . '" alt="logo"> </div>';
        }
        else { 
            echo '<div class="logo"> <span class="logo-name">' . get_bloginfo('name') . '</span> </div>';
        }

    }

    else {

        if(has_custom_logo()) { 
            $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); 

            echo '<a class="home-link" href="' . get_home_url() . '">' . 
            '<div class="logo"> <img src="' . $custom_logo__url[0] . '" alt="logo">' .
            '</div></a>';
        }
        else { 
            echo '<a class="home-link" href="' . get_home_url() . '">' . 
            '<div class="logo"> <span class="logo-name">' . get_bloginfo('name') . '</span> </div></a>';
        }

    }                
?>





<?php 
if( is_front_page() ){
    if(has_custom_logo()) { 
        $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); 
        
        echo 
        '<img src="' . $custom_logo__url[0] . '" alt="logo">
        <div class="logo-text-wrapp">' . 
        '<span>' . get_bloginfo('name') . '</span>
        <h3>' . get_bloginfo('description') . '</h3>
        </div>';
    }
    else { 
        echo
        '<div class="logo-text-wrapp">' . 
        '<span>' . get_bloginfo('name') . '</span>
        <h3>' . get_bloginfo('description') . '</h3>
        </div>';
    }
}

else {
    if(has_custom_logo()) { 
        $custom_logo__url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); 

        echo 
        '<a href="' . get_home_url() . '"> 
        <img src="' . $custom_logo__url[0] . '" alt="logo">
        </a>' .
        '<div class="logo-text-wrapp">' . 
        '<span>' . get_bloginfo('name') . '</span>
        <h3>' . get_bloginfo('description') . '</h3>
        </div>';
    }
    else { 
        echo
        '<div class="logo-text-wrapp">' . 
        '<span>' . get_bloginfo('name') . '</span>
        <h3>' . get_bloginfo('description') . '</h3>
        </div>';
    }
}                
?>





