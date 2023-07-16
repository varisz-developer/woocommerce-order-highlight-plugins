<?php
/*
  Plugin Name: Woocommerce Order Highlight
  Plugin URI: https://varisz.com
  Description: order be hightlight when you click view order
  Author: varis 
  Author URI: https://varisz.com
  Text Domain: Woocommerce-order-highlight
  Version: 1.0
 */


require_once("class/class-woocommerce-order-highlight.php");

$WoocommerceOrderHighlight = new Woocommerce_order_highlight( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . plugin_basename( __FILE__ ) );

register_activation_hook( __FILE__, array($WoocommerceOrderHighlight, 'activation' ) );
register_deactivation_hook( __FILE__, array($WoocommerceOrderHighlight, 'deactivation' ) );
