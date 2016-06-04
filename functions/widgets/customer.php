<?php
/**
 * widget: customer
 *
 * @author Javis <javismay@gmail.com>
 * @license MIT
 */

add_action( 'widgets_init', create_function('', 'return register_widget("lo_customer");'));

class lo_customer extends WP_Widget {
	function lo_customer() {
		$widget_ops = array( 'classname' => 'lo_customer', 'description' => '自定义侧栏' );
		$this->__construct( 'lo_customer', '自定义侧栏', $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_name', $instance['title']);
		$content = apply_filters('widget_name', $instance['content']);
		echo $before_widget;
		echo $before_title.$title.$after_title;
		echo $content;
		echo $after_widget;
	}
	function form($instance) {

?>
		<p>
			<label>
				标题：
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
			</label>
		</p>
		<p>
			<label>
				内容：
				<textarea class="widefat" rows="10" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" type="text" value="<?php echo $instance['content']; ?>" ></textarea>
			</label>
		</p>
<?php
	}
}


?>
