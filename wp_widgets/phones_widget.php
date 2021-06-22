<?php

// Phones_Widget ===========================================================
class Phones_Widget extends WP_Widget {
	function __construct() {  
		parent::__construct(
			'phones_widget',  // vidget id 
			'_Наши телефоны', // vidget name для админки
            array( 
                'description' => 'Наши телефоны',  	// vidget admin_description
				'classname'   => 'phones_widget',  // класс виджета если нужно (задать в _sidebar.sass)
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
		// $title = $instance['title'];
        $phone_1  = $instance['phone_1'];
        $phone_2  = $instance['phone_2'];

		// echo $args['before_widget'];
		
		echo '<img src="' . get_template_directory_uri() . '/assets/img/icons/phone-i.svg" alt="phone image" />';
	
		if ( ! empty( $phone_1 ) ) { 
			echo '<a href="tel:+' . preg_replace("/[^,.0-9]/", "", $phone_1) . '">' . $phone_1 . '</a>';
		}

		if ( ! empty( $phone_2 ) ) { 
			echo '<a href="tel:+' . preg_replace("/[^,.0-9]/", "", $phone_2) . '">' . $phone_2 . '</a>';
		}

        // echo '</div>';
		// echo $args['after_widget'];
    }
    
    // admin: array $instance - сохраненные данные из админки
	function form( $instance ) {
		// $title     = @ $instance['title'];
		$phone_1 = @ $instance['phone_1'];
		$phone_2 = @ $instance['phone_2'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'phone_1' ); ?>"><?php _e( 'Телефон 1:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone_1' ); ?>" maxlength="20"
				name="<?php echo $this->get_field_name( 'phone_1' ); ?>" type="tel"
				value="<?php echo esc_attr( $phone_1 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone_2' ); ?>"><?php _e( 'Телефон 2:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'phone_2' ); ?>" maxlength="20"
				name="<?php echo $this->get_field_name( 'phone_2' ); ?>" type="tel"
				value="<?php echo esc_attr( $phone_2 ); ?>">
		</p>
	<?php 
	}

    // admin: сохранение настроек виджета
	function update( $new_instance, $old_instance ) {
		$instance = array();

		// $instance['title']    = ( ! empty( $new_instance['title'] ) )    ? strip_tags( $new_instance['title'] ) : '';
		$instance['phone_1'] = ( ! empty( $new_instance['phone_1'] ) ) ? strip_tags( $new_instance['phone_1'] ) : '';
		$instance['phone_2'] = ( ! empty( $new_instance['phone_2'] ) ) ? strip_tags( $new_instance['phone_2'] ) : '';

		return $instance;
	}
} 

function register_phones_widget() {
	register_widget( 'Phones_Widget' );
}
add_action( 'widgets_init', 'register_phones_widget' );
