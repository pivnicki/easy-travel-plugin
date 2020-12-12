<?php



/* Template Name: EasyIT Travel Page*/ 



?>



<?php get_header(); ?>



<div id="primary" class="content-area">

	<?php



	the_content(); 

	$start_input =  sanitize_text_field($_GET['start_input'] ) ;

	$end_input =   sanitize_text_field($_GET['end_input']) ;  

	?>

	<section class="elementor-element elementor-element-6a5a2ab elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="6a5a2ab" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
		<div class="elementor-container elementor-column-gap-default">
			<div class="elementor-row">
				<div class="elementor-element elementor-element-38070f3 elementor-column elementor-col-100 elementor-top-column" data-id="38070f3" data-element_type="column">
					<div class="elementor-column-wrap  elementor-element-populated">
						<div class="elementor-widget-wrap">
							<div class="elementor-element elementor-element-b37817a elementor-widget elementor-widget-menu-anchor" data-id="b37817a" data-element_type="widget" data-widget_type="menu-anchor.default">
								<div class="elementor-widget-container">
									<div id="trazi" class="elementor-menu-anchor"></div>
								</div>
							</div>
							<div class="elementor-element elementor-element-98c3a0c elementor-widget elementor-widget-shortcode" data-id="98c3a0c" data-element_type="widget" data-widget_type="shortcode.default">
								<div class="elementor-widget-container">



									<div class="elementor-shortcode">


                                            <?php  echo do_shortcode('[travels]'); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<div class="search-result"> 
		<table>
		<?php



			$args = array(

				'posts_per_page' => 5,

				'post_type' => 'travels', 

				'meta_query' => array(

					'relation' => 'AND',

					array(

						'key' => 'start_input',

						'value' => $start_input,

						'compare' => '='

					),

					array(

						'key' => 'end_input',

						'value' => $end_input,

						'compare' => '='

					))

				); ?>
				<h1 class="naslov-pretraga" style="padding-top: 2%;">Prikazani rezultati za željenu pretragu </h1>
				<div id="head_table"><p>Od</p><p>Do</p><p>Datum</p><p>Vreme</p><p>Korisnik</p><p></p></div>

				<?php

				$search_query = new WP_Query( $args );

	            //echo $search_query->request;


				if ( $search_query->have_posts() ): 

					while ( $search_query->have_posts() ) {   $search_query->the_post(); 

						echo $search_query->the_title();
						$start_input = get_post_meta( get_the_ID(), 'start_input', true ); 
						$end_input = get_post_meta( get_the_ID(), 'end_input', true ); 
						$datepicker = get_post_meta( get_the_ID(), 'datum', true );
						$today = date('d-m-Y');  // 01-12-2013

                       $date = DateTime::createFromFormat('d/m/Y', $datepicker);
						$novi = $date->format('d-m-Y');
						$todaytimestamp = strtotime($today);
						$starttimestamp = strtotime($novi);



						echo $timestamp = strtotime($datepicker);

						$vreme = get_post_meta( get_the_ID(), 'vreme', true );
						$newDate = date("d-m-Y", strtotime($datepicker));
						$current_user = get_the_author_meta( 'user_nicename' );


					
					    if($starttimestamp > $todaytimestamp){
							echo '<div id="table_row"><a href="' . get_the_permalink() . '"><p>'.$start_input.'</p><p>'.$end_input.'</p><p>'.$datepicker.'</p><p>'.$vreme.'</p></a><p id="korisnik"><a href="http://www.justtraveltogether.com/korisnici/'.$current_user.'/profile/">'.$current_user.'</a></p><p><a class="poruka" href="http://www.justtraveltogether.com/korisnici/prevozi/messages/compose/?r='.$current_user.'&start='.$start_input.'&end='.$end_input.'">Pošalji poruku</a></p></div>';
					    }else{
					    	//echo "nema";
					    }
						



					} 

					wp_reset_postdata();

					else: ?>

						<p>Nema rezultata</p>

					<?php endif; ?>
				</table>



			</div> 






			<!-- <p class="postmetadata">Filed in: <?php //the_category(); ?> | Tagged: <?php// the_tags(); ?> | <a href="<?php //comments_link(); ?>" title="Leave a comment">Comments</a></p> -->





		</div><!-- .content-area -->



		<?php get_sidebar(); ?>

		<?php get_footer(); ?>