<?php

// TextsInFooter_Widget ===========================================================
class TextsInFooter_Widget extends WP_Widget {
	function __construct() {  
		parent::__construct(
			'texts_in_footer_widget',  // vidget id 
			'_Тексты внизу футера',    // vidget name для админки
            array( 
                'description' => 'Тексты внизу футера',   // vidget admin_description
				'classname' => 'texts_in_footer_widget',  // класс виджета если нужно (задать в _sidebar.sass)
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
        $left_string  = $instance['left_string'];
        $right_string  = $instance['right_string'];
		
		if ( ! empty( $left_string ) ) { 
			echo '<span>' . $left_string . '</span>';
		}

		if ( ! empty( $right_string ) ) { 
			echo '<span>' . $right_string . '</span>';
		}
    }
    
    // admin: array $instance - сохраненные данные из админки
	function form( $instance ) {
		$left_string = @ $instance['left_string'];
		$right_string = @ $instance['right_string'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'left_string' ); ?>"><?php _e( 'Левый текст (не более 90 символов):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'left_string' ); ?>" maxlength="90"
				name="<?php echo $this->get_field_name( 'left_string' ); ?>" type="text"
				value="<?php echo esc_attr( $left_string ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'right_string' ); ?>"><?php _e( 'Правый текст (не более 90 символов):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'right_string' ); ?>" maxlength="90"
				name="<?php echo $this->get_field_name( 'right_string' ); ?>" type="text"
				value="<?php echo esc_attr( $right_string ); ?>">
		</p>
	<?php 
	}

    // admin: сохранение настроек виджета
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['left_string'] = ( ! empty( $new_instance['left_string'] ) ) ? strip_tags( $new_instance['left_string'] ) : '';
		$instance['right_string'] = ( ! empty( $new_instance['right_string'] ) ) ? strip_tags( $new_instance['right_string'] ) : '';

		return $instance;
	}
} 

function register_texts_in_footer_widget() {
	register_widget( 'TextsInFooter_Widget' );
}
add_action( 'widgets_init', 'register_texts_in_footer_widget' );
