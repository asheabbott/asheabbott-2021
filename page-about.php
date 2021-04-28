<?php /* Template Name: About */

get_header();

while (have_posts()) {
	the_post(); ?>

  <!-- Page Header -->
	<header class="page-header">
		<div class="container">
			<h1 class="animate"><?php the_title(); ?></h1>
		</div>
	</header>

  <!-- Bio Section -->
  <section class="bio-content animate">
    <div class="container">
      <div class="flex">
        <?php $headshot = get_field('about_headshot');
        $resume_button = get_field('about_resume');
        
        if ($headshot) { ?>
          <!-- Headshot -->
          <div class="headshot">
            <picture>
              <source media="(min-width: 425px)" srcset="<?php echo $headshot['sizes']['572w']; ?>">
              <img src="<?php echo $headshot['sizes']['730w']; ?>" width="<?php echo $headshot['width']; ?>" height="<?php echo $headshot['height']; ?>" alt="Photo of Ashe Abbott DiBlasi">
            </picture>
          </div>
        <?php }?>

        <!-- Bio -->
        <div class="bio">
          <?php the_content();

          if ($resume_button) {
            $button_text = $resume_button['title'];
            $button_url = $resume_button['url'];
            $button_target = $resume_button['target'];

            if ($button_text && $button_url) { ?>
              <!-- Resume Button -->
              <a class="button" href="<?php echo $button_url; ?>"  <?php if ($button_target) { echo 'target=" ' . $button_target . '"'; if ($button_target === '_blank') { echo ' rel="noreferrer"'; }} ?>><?php echo $button_text; ?></a>
            <?php }
          } ?>
        </div>
      </div>
    </div>
  </section>

  <?php $skill_set = get_field('about_skill_set');
  
  if ($skill_set) { ?>
    <!-- Skills Section -->
    <section class="skill-set">
      <div class="container">
        <!-- Heading -->
        <h2>Skill Set</h2>

        <!-- Skills -->
        <div class="skills">
          <?php if ($skill_set['skill_level']) { ?>
            <!-- Skill Level Headers -->
            <div class="skill-headers flex">
              <?php foreach ($skill_set['skill_level'] as $skill_level) { 
                $skill_level_heading = $skill_level['skill_level_heading'];
                $skill_level_description = $skill_level['skill_level_description'];
                $skill_groups = $skill_level['skill_group']; ?>

                <div class="skill-level">
                  <?php if ($skill_level_heading || $skill_level_description) { ?>
                    <header class="skill-level-header">
                      <?php if ($skill_level_heading) { ?>
                        <h3><?php echo $skill_level_heading; ?></h3>
                      <?php }

                      if ($skill_level_description) { ?>
                        <p class="description"><?php echo $skill_level_description; ?></p>
                      <?php } ?>
                    </header>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>

            <!-- Skill Levels -->
            <div class="skill-levels flex">
              <?php foreach ($skill_set['skill_level'] as $skill_level) { 
                $skill_level_heading = $skill_level['skill_level_heading'];
                $skill_level_description = $skill_level['skill_level_description'];
                $skill_groups = $skill_level['skill_group']; ?>

                <!-- Skill Level -->
                <div class="skill-level">
                  <?php if ($skill_level_heading || $skill_level_description) { ?>
                    <!-- Skill Level Header -->
                    <header class="skill-level-header">
                      <?php if ($skill_level_heading) { ?>
                        <h3><?php echo $skill_level_heading; ?></h3>
                      <?php }

                      if ($skill_level_description) { ?>
                        <!-- Skill Level Description -->
                        <p class="description"><?php echo $skill_level_description; ?></p>
                      <?php } ?>
                    </header>
                  <?php }
                  
                  if ($skill_groups) { ?>
                    <!-- Skill Groups -->
                    <div class="skill-groups">
                      <?php foreach ($skill_groups as $skill_group) {
                        $skill_group_heading = $skill_group['skill_group_heading'];
                        $skills_array = $skill_group['skills']; ?>
                        
                        <!-- Skill Group -->
                        <div class="skill-group">
                          <?php if ($skill_group_heading) { ?>
                            <!-- Skill Group Heading -->
                            <h4><?php echo $skill_group_heading; ?></h4>
                          <?php } 
                          
                          if ($skills_array) { ?>
                            <!-- Skills -->
                            <ul>
                              <?php foreach ($skills_array as $skills) {
                                foreach ($skills as $skill) { ?>
                                  <li><?php echo $skill; ?></li>
                                <?php }
                              } ?>
                            </ul>
                          <?php } ?>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>
<?php }

get_footer(); ?>