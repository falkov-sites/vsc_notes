<?php

// Workhours_Widget ===========================================================
class Workhours_Widget extends WP_Widget {
	function __construct() {  
		parent::__construct(
			'workhours_widget',  // vidget id 
			'_График работы',    // vidget name для админки
            array( 
                'description' => 'График работы',  	// vidget admin_description
				'classname' => 'workhours_widget',  // класс виджета если нужно (задать в _sidebar.sass)
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
		$title = $instance['title'];
        $string_1  = $instance['string_1'];
        $string_2  = $instance['string_2'];

		// echo $args['before_widget'];
		
		echo '<img src="' . get_template_directory_uri() . '/assets/img/icons/clock-i.svg" alt="clock image" />';
	
		// if ( ! empty( $title ) ) { echo $args['before_title'] . $title . $args['after_title']; }
		if ( ! empty( $title ) ) { echo $title . '<br>'; }

		if ( ! empty( $string_1 ) ) { 
			echo '<span>' . $string_1 . '</span>';
		}

		if ( ! empty( $string_2 ) ) { 
			echo '<span>' . $string_2 . '</span>';
		}

        // echo '</div>';
		// echo $args['after_widget'];
    }
    
    // admin: array $instance - сохраненные данные из админки
	function form( $instance ) {
		$title     = @ $instance['title'];
		$string_1  = @ $instance['string_1'];
		$string_2  = @ $instance['string_2'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок (не более 20 символов):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" maxlength="20"
				name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'string_1' ); ?>"><?php _e( 'Строка 1 (не более 25 символов):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'string_1' ); ?>" maxlength="25"
				name="<?php echo $this->get_field_name( 'string_1' ); ?>" type="text"
				value="<?php echo esc_attr( $string_1 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'string_2' ); ?>"><?php _e( 'Строка 2 (не более 25 символов):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'string_2' ); ?>" maxlength="25"
				name="<?php echo $this->get_field_name( 'string_2' ); ?>" type="text"
				value="<?php echo esc_attr( $string_2 ); ?>">
		</p>
	<?php 
	}

    // admin: сохранение настроек виджета
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']    = ( ! empty( $new_instance['title'] ) )    ? strip_tags( $new_instance['title'] ) : '';
		$instance['string_1'] = ( ! empty( $new_instance['string_1'] ) ) ? strip_tags( $new_instance['string_1'] ) : '';
		$instance['string_2'] = ( ! empty( $new_instance['string_2'] ) ) ? strip_tags( $new_instance['string_2'] ) : '';

		return $instance;
	}
} 

function register_workhours_widget() {
	register_widget( 'Workhours_Widget' );
}
add_action( 'widgets_init', 'register_workhours_widget' );
