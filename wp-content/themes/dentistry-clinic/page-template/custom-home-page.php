<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <?php
        for ( $i = 1; $i <= 4; $i++ ) {
          $dentistry_clinic_mod =  get_theme_mod( 'dental_insight_post_setting' . $i );
          if ( 'page-none-selected' != $dentistry_clinic_mod ) {
            $dental_insight_slide_post[] = $dentistry_clinic_mod;
          }
        }
         if( !empty($dental_insight_slide_post) ) :
        $dental_insight_args = array(
          'post_type' =>array('post'),
          'post__in' => $dental_insight_slide_post
        );
        $dentistry_clinic_query = new WP_Query( $dental_insight_args );
        if ( $dentistry_clinic_query->have_posts() ) :
          $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $dentistry_clinic_query->have_posts() ) : $dentistry_clinic_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="carousel-caption slider-inner">
            <h2 class="slid-head aaa"><?php the_title();?></h2>
            <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'30') );?></p>
            <div class="home-btn my-4">
              <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('Make an Appointment','dentistry-clinic'); ?></a>
            </div>
          </div>
        </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon px-3 py-2" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon px-3 py-2" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
        </a>
    </div>
    <div class="clearfix"></div>
  </section>
  <?php if( get_theme_mod('dental_insight_category_setting') != '' || get_theme_mod('dental_insight_services_section_title') != ''){ ?>
    <section id="services-box" class="py-5">
      <div class="container">
        <h3 class="text-center mb-5"><?php echo esc_html( get_theme_mod( 'dental_insight_services_section_title','') ); ?></h3>
        <div class="row">
          <?php
            $services_category=  get_theme_mod('dental_insight_category_setting');if($services_category){
            $page_query = new WP_Query(array( 'category_name' => esc_html($services_category ,'dentistry-clinic')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="box mb-5 text-center p-3">
                    <?php if(has_post_thumbnail()) { ?>
                      <div class="img-box mb-3">
                        <?php the_post_thumbnail(); ?>
                      </div>
                    <?php }?>
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                    <div class="box-button my-4">
                      <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','dentistry-clinic');?></a>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php }?>
</main>

<?php get_footer(); ?>
