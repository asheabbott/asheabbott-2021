<?php /* Template Name: Home */

get_header(); 

$hero_text = get_field('home_hero_text'); 
$video_ID = get_field('home_video_id');
$intro = get_field('home_intro'); ?>

<!-- Hero -->
<section class="hero">
  <!-- Hero Text -->
  <div class="hero-text">
    <div class="container">
      <div class="hero-text-inner animate">
        <?php if ($hero_text) { ?>
          <h1><?php echo $hero_text; ?></h1>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <?php if ($video_ID) { ?>
    <!-- Hero Video -->
    <div class="hero-reel">
      <div class="container">
        <div class="video">
          <iframe src="https://player.vimeo.com/video/<?php echo $video_ID; ?>?background=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Work Samples"></iframe>
        </div>
      </div>
    </div>
  <?php } ?>
</section>

<?php if ($intro) {
  $intro_text = $intro['intro_text'];
  $intro_buttons = $intro['intro_buttons']; 
  
  if ($intro_text) { ?>
    <!-- Intro -->
    <section class="intro">
      <div class="container">
        <?php echo $intro_text;

        if ($intro_buttons) { 
          foreach($intro_buttons as $button) {
            $button_text = $button['button']['title'];
            $button_url = $button['button']['url'];
            $button_target = $button['button']['target']; 
            
            if ($button_text && $button_url) { ?>
              <!-- Button -->
              <a class="button" href="<?php echo $button_url; ?>"  <?php if ($button_target) { echo 'target=" ' . $button_target . '"'; if ($button_target === '_blank') { echo ' rel="noreferrer"'; }} ?>><?php echo $button_text; ?></a>
            <?php }
          }
        } ?>
      </div>
    </section>
  <?php }
}

get_footer(); ?>