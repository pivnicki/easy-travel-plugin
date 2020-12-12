<?php

 



function easyit_travel_shortcode($atts, $content = NULL){

	// global $post;

	// $atts=shortcode_atts(array(

	// 	'title'=>'Travel List',

	// 	'count'=>10,

	// 	'category'=>'all'

	// ),$atts);



	// if($atts['category']=='all'){

	// 	$terms='';

	// }else{

	// 	$terms=array(

	// 		array(

	// 			'taxonomy'=>'category',

	// 			'fiels'	  =>'slug',

	// 			'terms'	  =>$atts['category']	

	// 		)

	// 	);

	// }

 

  $start_input = sanitize_text_field($_GET['start_input']);

  $end_input = sanitize_text_field($_GET['end_input']);



$args = array(

'posts_per_page' => 5,

'post_type' => 'travels',  

		);

$start_arr=[];

$end_arr=[];



	 $search_query = new WP_Query( $args );

	 //echo $search_query->request;

		 if ( $search_query->have_posts() ):

			 while ( $search_query->have_posts() ) {

				 $search_query->the_post(); 



			$start_arr[]=get_post_meta( get_the_ID(), 'start_input', TRUE ) ;

			$end_arr[]=get_post_meta( get_the_ID(), 'end_input', TRUE ) ;

			

				 }

			 wp_reset_postdata();

			 ?>

				  

			<?php endif;  

			

  ob_start(); 

?>

 

	<div class="wrap">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<form method="get" id="advanced-searchform"

				  action="<?php echo esc_url( home_url( '/easyit_travel_list' ) ); ?>">



					<!-- <input type="hidden" name="search" value="advanced"> -->

					<input type="hidden" name="travel_search" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

					<div style="display: flex; width: 75%; float: left;">

					<div class="form-group">

					<label for="">Polazim iz</label> 

					<select name="start_input" id="start_input" class="chosen-select"  tabindex="4">

						<?php foreach($start_arr as $start_input) {?>

					<option 

					value="<?php echo esc_attr($start_input); ?>"> 

					<?php echo esc_attr($start_input); ?>	

					<?php }?> 

					</option>

					</select>

					</div>

					<div class="form-group">

						<label for="">Idem u</label>

						<select name="end_input" id="end_input" >

						<?php foreach($end_arr as $end_input) {?>

					<option 

					value="<?php echo esc_attr($end_input); ?>"> 

					<?php echo esc_attr($end_input); ?>	

					<?php }?> 

					</option>

					</select>

					</div>

					</div>

					<div class="form-group">

						<input id="pretraga" type="submit" value="Pretraga">

					</div>

				</form> 

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .wrap -->

	<?php

	wp_reset_postdata(); 

	$content=ob_get_clean();

	

	return $content;

	

}





add_shortcode('travels','easyit_travel_shortcode');  



 

 