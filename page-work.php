<?php /* Template Name: Work */

get_header();

while (have_posts()) {
	the_post(); ?>

  <!-- Page Header -->
  <header class="page-header">
		<div class="container">
			<h1 class="animate"><?php the_title(); ?></h1>
		</div>
	</header>

  <!-- Intro -->
	<section class="content animate">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>

  <!-- Portfolio -->
  <section class="portfolio">
    <div class="container">
      <div class="flex">
        <?php $args = array(
          'post_type' => 'projects',
          'post_status' => 'publish',
          'posts_per_page' => -1
        );

        $the_query = new WP_Query($args);
        
        if ($the_query->have_posts()) {
          while ($the_query->have_posts()) {
            $the_query->the_post();

            $permalink = get_the_permalink();
            $thumbnail_mobile = get_the_post_thumbnail_url(get_the_ID(),'730w');
            $thumbnail_desktop = get_the_post_thumbnail_url(get_the_ID(),'1334w'); ?>

            <!-- Project -->
            <div class="project">
              <!-- Name -->
              <div class="name">
                <h2><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h2>
              </div>

              <div class="flex">
                <?php if ($thumbnail_mobile && $thumbnail_desktop) { ?>
                  <!-- Thumbnail -->
                  <div class="thumbnail">
                    <div class="thumbnail-inner mobile">
                      <a href="<?php echo $permalink; ?>" style="background-image: url('<?php echo $thumbnail_mobile; ?>');" aria-label="Navigate to <?php echo get_the_title(); ?> project"></a>
                    </div>
                    <div class="thumbnail-inner desktop">
                      <a href="<?php echo $permalink; ?>" style="background-image: url('<?php echo $thumbnail_desktop; ?>');" aria-label="Navigate to <?php echo get_the_title(); ?> project"></a>
                    </div>
                  </div>
                <?php } ?>

                <!-- Overview -->
                <div class="overview">
                  <div class="overview-inner">
                    <?php if (get_field('project_tech_summary')) { ?>
                      <!-- Tech Summary -->
                      <div class="tech-summary">
                        <h3><?php echo get_field('project_tech_summary'); ?></h3>
                      </div>
                    <?php } 
                    
                    if (get_field('project_contributions')) { ?>
                      <!-- Contributions -->
                      <div class="contributions">
                        <p><b>My Contributions:</b> <?php the_field('project_contributions'); ?></p>
                      </div>
                    <?php } ?>

                    <!-- Button -->
                    <a class="button" href="<?php echo $permalink; ?>">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        }

        wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  <!-- Awards -->
  <section class="awards">  
    <div class="container">
      <!-- Award Grid -->
      <div class="award-logos">
        <?php $awards = get_field('awards');

        if ($awards) {
          foreach ($awards as $award) {
            $award_logo = $award['award_logo']; ?>

            <!-- Award Logo -->
            <div class="award-logo">
              <img src="<?php echo $award_logo['url']; ?>" width="<?php echo $award_logo['width']; ?>" height="<?php echo $award_logo['height']; ?>" alt="<?php echo $award_logo['alt']; ?>">
            </div>
          <?php }
        } ?>
      </div>
    </div>
  </section>
<?php }

get_footer(); ?>