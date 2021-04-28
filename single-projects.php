<?php get_header();

while (have_posts()) {
	the_post(); ?>

	<!-- Project Header -->
	<header class="page-header project-header">
		<div class="container">
			<h1 class="animate">Project: <span><?php the_title(); ?></span></h1>
		</div>
	</header>

	<?php $project_video = get_field('project_video');
	
	if ($project_video) { ?>
		<!-- Website Demo Section -->
		<section class="website-demo">
			<div class="container">
				<div class="video">
					<iframe src="https://player.vimeo.com/video/<?php echo $project_video; ?>?background=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Website demo of <?php echo get_the_title(); ?>"></iframe>
				</div>
			</div>
		</section>
	<?php } ?>

	<!-- Details Section -->
	<section class="details-section">
		<div class="container">
			<div class="flex">
				<?php $project_buttons = get_field('project_buttons');
				
				if (!empty(get_the_content()) || $project_buttons) { ?>
					<!-- Summary -->
					<div class="summary">
						<div class="summary-inner <?php if (!$project_buttons) { echo 'no-buttons'; } ?>">
							<?php the_content();
							
							if ($project_buttons) { ?>
								<!-- Buttons -->
								<div class="buttons">
									<?php foreach ($project_buttons as $project_button) {
										$button_text = $project_button['button']['title'];
										$button_url = $project_button['button']['url'];
										$button_target = $project_button['button']['target'];

										if ($button_text && $button_url) { ?>
											<!-- Button -->
											<a class="button" href="<?php echo $button_url; ?>" <?php if ($button_target) { echo 'target=" ' . $button_target . '"'; if ($button_target === '_blank') { echo ' rel="noreferrer"'; }} ?>><?php echo $button_text; ?></a>
										<?php }
									} ?>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<!-- Details -->
				<div class="details">
					<?php $project_tech_summary = get_field('project_tech_summary');
					$project_contributions = get_field('project_contributions');
					$project_awards = get_field('project_awards');
					$project_agency = get_field('project_agency');

					if ($project_tech_summary) { ?>
						<!-- Tech Summary -->
						<div class="tech-summary">
							<h2>Technical</h2>
							<p><?php echo get_field('project_tech_summary'); ?></p>
						</div>
					<?php }
					
					if ($project_contributions) { ?>
						<!-- Contributions -->
						<div class="contributions">
							<h2>Contributions</h2>
							<ul>
								<?php foreach ($project_contributions as $contribution) {
									echo '<li>' . $contribution . '</li>';
								} ?>
							</ul>
						</div>
					<?php }
					
					if ($project_awards) { ?>
						<!-- Awards -->
						<div class="awards">
							<h2>Awards</h2>
							<ul>
								<?php foreach ($project_awards as $project_award) {
									foreach ($project_award as $award) {
										echo '<li>' . $award . '</li>';
									}
								} ?>
							</ul>
						</div>
					<?php }
					
					if ($project_agency != 'no') { ?>
						<!-- Agency -->
						<div class="agency">
							<h2>Agency</h2>
							<p><?php echo $project_agency; ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>

	<?php $project_screenshots = get_field('project_screenshots');
		
	if ($project_screenshots) { ?>
		<!-- Sample Section -->
		<section class="sample-section">
			<div class="container">
				<div class="flex">
					<?php foreach ($project_screenshots as $project_screenshot) {
						foreach ($project_screenshot as $screenshot) { ?>
							<!-- Screenshot -->
							<div class="screenshot">
								<picture>
									<source media="(min-width: 425px) and (max-width: 767px)" srcset="<?php echo $screenshot['sizes']['1334w']; ?>">
									<source media="(min-width: 768px) and (max-width: 991px)" srcset="<?php echo $screenshot['sizes']['1722w']; ?>">
									<source media="(min-width: 992px)" srcset="<?php echo $screenshot['sizes']['1334w']; ?>">
									<img src="<?php echo $screenshot['sizes']['730w']; ?>" width="<?php echo $screenshot['width']; ?>" height="<?php echo $screenshot['height']; ?>" alt="<?php echo $screenshot['alt']; ?>">
								</picture>
							</div>
						<?php }			
					} ?>
				</div>
			</div>
		</section>
	<?php } ?>

	<!-- Project Navigation Section -->
	<section class="project-nav-section">
		<div class="container">
			<!-- Heading -->
			<h2>Projects</h2>
		</div>

		<!-- Project Navigation -->
		<div class="project-nav">
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
						$thumbnail = get_the_post_thumbnail_url(get_the_ID(),'395w');
						$thumbnail_tablet = get_the_post_thumbnail_url(get_the_ID(),'572w'); ?>

						<!-- Project -->
						<div class="project">
							<div class="project-inner mobile-desktop">
								<a href="<?php echo $permalink; ?>" style="background-image: url('<?php echo $thumbnail; ?>');" aria-label="Navigate to <?php echo get_the_title(); ?> project"></a>
							</div>
							<div class="project-inner tablet">
								<a href="<?php echo $permalink; ?>" style="background-image: url('<?php echo $thumbnail_tablet; ?>');" aria-label="Navigate to <?php echo get_the_title(); ?> project"></a>
							</div>
						</div>
					<?php }
				}
				
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

<?php }

get_footer(); ?>