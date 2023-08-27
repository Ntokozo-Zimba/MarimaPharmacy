<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Helphealth_Medical
 */

get_header();

$helphealth_medical_blog_layout = get_theme_mod( 'helphealth_medical_layout', 'no-sidebar' );
if( $helphealth_medical_blog_layout == 'left-sidebar' || $helphealth_medical_blog_layout == 'right-sidebar' ) :
	$content_class = 'col-sm-7 col-md-9 col-lg-9';
	$aside_class = 'col-sm-5 col-md-3 col-lg-3';
else :
	$content_class = 'col-md-12';
endif;

?>
	<!-- Start Page Banner -->
	<?php do_action('helphealth_medical_page_header'); ?>
	<!-- End Page Banner -->
	<!-- Start Site Content -->
	<div class="site-content pt-60 pb-75">	
		<div class="container">
			<div class="row">	

				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<!-- Start Content Area -->
					<div id="primary"  class="content-area"> 
						<?php if ( have_posts() ) : ?>
						
						<?php $blog_style = get_theme_mod( 'helphealth_medical_post_style', 'masonry' ); ?>
						<div class="row <?php if( $blog_style == 'equal-height') : ?>flex-row <?php else : ?>grip-wrap<?php endif; ?>">

							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
							
								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );
								
							endwhile;
							?>

						</div>	
						<!-- Start Pagination row -->
							<?php helphealth_medical_posts_pagination(); ?>
						<!-- End Pagination row -->
						<?php else : ?>
							<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
					</div>
					<!-- End Content Area -->
				</div>

				<!--Start Sidebar -->
				<?php if($helphealth_medical_blog_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->
			</div>
		</div>
	</div>
	<!-- End Site Content -->
<?php get_footer(); ?>