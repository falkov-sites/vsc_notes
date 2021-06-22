<?php

// Social_Widget ==============================================================
class Social_Widget extends WP_Widget {
	function __construct() {  
		parent::__construct(
			'social_widget',  // vidget id 
			'_Наши соцсети',   // vidget name
            array( 
                'description' => 'Наши соцсети',  	// vidget admin_description
				'classname' => 'widget-social',		// класс виджета (задать в _sidebar.sass)
            )
		);

		// скрипты/стили виджета, если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_this_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_this_widget_style' ) );
		}
	}

	//  frontend: array $args - аргументы виджета,  array $instance - сохраненные данные из админки
	function widget( $args, $instance ) {
        $vcontacte_address = $instance['vcontacte_address'];
        $facebook_address  = $instance['facebook_address'];
		$instagram_address = $instance['instagram_address'];

        // echo $args['before_widget'];
        
        if ( ! empty( $vcontacte_address ) ) { 
			echo '<a href="' . $vcontacte_address . '">' . 
            '<img src="' . get_template_directory_uri() . '/assets/img/icons/vk-i.svg" alt="vcontacte" />' . 
			'</a>';
		}

		if ( ! empty( $facebook_address ) ) { 
            echo '<a href="' . $facebook_address . '">' . 
            '<img src="' . get_template_directory_uri() . '/assets/img/icons/facebook-i.svg" alt="facebook" />' . 
			'</a>';
		}

		if ( ! empty( $instagram_address ) ) { 
            echo '<a href="' . $instagram_address . '">' . 
            '<img src="' . get_template_directory_uri() . '/assets/img/icons/instagram-i.svg" alt="instagram" />' . 
			'</a>';
		}

        // echo '</div>';
		// echo $args['after_widget'];
    }
    
    // admin: array $instance - сохраненные данные из админки
	function form( $instance ) {
        $vcontacte_address = @ $instance['vcontacte_address'];
		$facebook_address  = @ $instance['facebook_address'];
		$instagram_address = @ $instance['instagram_address'];
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'vcontacte_address' ); ?>"><?php _e( 'vcontacte:' ); ?></label>
			<input 
				class="widefat" 
				id=   "<?php echo $this->get_field_id( 'vcontacte_address' ); ?>"
				name= "<?php echo $this->get_field_name( 'vcontacte_address' ); ?>" 
				type="text"
				value="<?php echo esc_attr( $vcontacte_address ); ?>"
			>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook_address' ); ?>"><?php _e( 'facebook:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_address' ); ?>"
				name="<?php echo $this->get_field_name( 'facebook_address' ); ?>" 
				type="text"
				value="<?php echo esc_attr( $facebook_address ); ?>"
			>
        </p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'instagram_address' ); ?>"><?php _e( 'instagram:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_address' ); ?>"
				name="<?php echo $this->get_field_name( 'instagram_address' ); ?>" type="text"
				value="<?php echo esc_attr( $instagram_address ); ?>">
		</p>
	<?php 
	}

    // admin: сохранение настроек виджета
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['vcontacte_address']  = ( ! empty( $new_instance['vcontacte_address'] ) )  ? strip_tags( $new_instance['vcontacte_address'] ) : '';
		$instance['facebook_address']   = ( ! empty( $new_instance['facebook_address'] ) )   ? strip_tags( $new_instance['facebook_address'] ) : '';
		$instance['instagram_address']  = ( ! empty( $new_instance['instagram_address'] ) )  ? strip_tags( $new_instance['instagram_address'] ) : '';

		return $instance;
	}
} 

function register_social_widget() {
	register_widget( 'Social_Widget' );
}
add_action( 'widgets_init', 'register_social_widget' );
