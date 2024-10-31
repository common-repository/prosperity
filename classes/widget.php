<?php
	class Prosperity_Widget extends WP_Widget {
			
		/** constructor */
		function __construct() {
			parent::__construct( /* Base ID */'prosperity_widget', /* Name */'Prosperity Widget', array( 'description' => 'Show Prosperity Verses' ) );
		}
		
		// outputs the content of the widget
		function widget($args, $instance) {				
			extract( $args );
						
			$prosperity = new Prosperity_Verses();
			$verse = $prosperity->get_verse();
			
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;
			echo $verse;
			echo $after_widget;
		}
		
		// updates widget options in DB
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			return $instance;
		}
		
		// admin form in widget
		function form( $instance ) {
			if ( $instance ) {
				$title = esc_attr( $instance[ 'title' ] );
			}
			else {
				$title = __( 'New title', 'text_domain' );
			}
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<?php 
		}
	}	
	
?>