<?php

class Woocommerce_order_highlight {


    public function __construct( $plugin_file )
    {
        add_action( "manage_shop_order_posts_custom_column", array( $this, 'wco_order_column_cb_data' ) , 10, 2 );
        add_action( 'woocommerce_order_actions', array( $this, 'wco_add_order_action' ) );    
        add_action( 'woocommerce_new_order', 'wco_create_highlight_for_order',  1, 1  );
    }

    function wco_order_column_cb_data( $colname, $cptid ) {

        if ( $colname == 'order_number') {
            $order = wc_get_order( $cptid );
            $highlight = $order->get_meta( '_highlight_list_order' );
            if(isset($highlight) && $highlight == '1'){
                echo "<script>document.getElementById('post-$cptid').style.backgroundColor = 'silver';</script>";
            }//End if
        }//End if
    }
    
    function wco_add_order_action( $actions ) {
        global $theorder;
        $order = wc_get_order( $theorder->ID);
        $highlight = $order->get_meta( '_highlight_list_order' );
        if(!empty($highlight)){
            if($highlight == '0'){
                $order->update_meta_data( '_highlight_list_order', '1' );
                $order->save();
            }//End if
        }else{
            $order->update_meta_data( '_highlight_list_order', '1' );
            $order->save();
            
        }//End if
    }
    
    function wco_create_highlight_for_order($order_id) {
        $order = new WC_Order( $order_id );
        $order->update_meta_data( '_highlight_list_order', '0' );
        $order->save();
    }
  
    
}

