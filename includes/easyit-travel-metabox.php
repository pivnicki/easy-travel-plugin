<?php
/**
* Plugin Name: Metabox test
*
*/

add_action( 'add_meta_boxes', 'easyit_travel_meta_box' );

function easyit_travel_meta_box($post){
    add_meta_box('so_meta_box',
     'Travel Form',
      'form_meta_boxes',
       'travels',
        'normal' , 
        'high');
}

add_action('save_post', 'easyit_travel_save_metabox');

function easyit_travel_save_metabox(){ 
    global $post;
    // verify nonce
   if ( !wp_verify_nonce( $_POST['search_nonce'], basename(__FILE__) ) ) {
      return $post->ID;
   }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return $post->ID;
   }

   if ( 'travels' === $_POST['post_type'] ) {
      if ( !current_user_can( 'edit_page', $post_id ) ) {
         return $post_id;
      } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
         return $post->ID;
      }
   }
    
    if(isset($_POST["start_input"])){
         //UPDATE: 
        $start_input = $_POST['start_input'];
        //END OF UPDATE

        update_post_meta($post->ID, 'start_input', $start_input);
        //print_r($_POST);
    }

    if(isset($_POST["end_input"])){
         //UPDATE: 
        $end_input = $_POST['end_input'];
        //END OF UPDATE

        update_post_meta($post->ID, 'end_input', $end_input);
        //print_r($_POST);
    }

    if(isset($_POST["datepicker"])){
         //UPDATE: 
        $datepicker = $_POST['datepicker'];
        //END OF UPDATE

        update_post_meta($post->ID, 'datepicker', $datepicker);
        //print_r($_POST);
    }
}

function form_meta_boxes($post){
    $start_input = get_post_meta($post->ID, 'start_input', true); //true ensures you get just one value instead of an array
    ?>  
    <input type="hidden" name="search_nonce"
     value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
 
    <label>Starting point :  </label>
	<input type="text" value="<?php echo $start_input; ?>"
     name="start_input"/>
     
    <?php
    $end_input = get_post_meta($post->ID, 'end_input', true); //true ensures you get just one value instead of an array
    ?>   
    <label>Ending point :  </label>
    <input type="text" value="<?php echo $end_input; ?>" name="end_input"/> 

    <?php $datepicker = get_post_meta($post->ID, 'datepicker', true);?>

     Date: <input type="date" id="datepicker" class="MyDate" value="<?php echo $datepicker; ?>" name="datepicker">
 
<?php }

