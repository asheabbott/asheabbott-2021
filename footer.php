		</main>

		<!-- Footer -->
		<footer class="site-footer">
			<div class="flex">
				<!-- Text -->
				<div class="text">
					<a class="email" href="mailto:ashe@asheabbott.com">ashe@asheabbott.com</a>
					<p class="copyright">&copy; <?php echo date('Y'); ?> Ashe Abbott DiBlasi</p>
				</div>

				<!-- Social -->
				<div class="social">
					<div class="flex">
						<div class="row">
							<!-- LinkedIn -->
							<a href="https://www.linkedin.com/in/asheabbott" target="blank" rel="noreferrer" aria-label="Visit Ashe's LinkedIn">
								<i class="fab fa-linkedin-in"></i>
							</a>

							<!-- GitHub -->
							<a href="https://github.com/asheabbott" target="blank" rel="noreferrer" aria-label="Visit Ashe's GitHub">
								<i class="fab fa-github"></i>
							</a>
						</div>
						<div class="row">
							<!-- Dev -->
							<a href="https://dev.to/asheabbott" target="blank" rel="noreferrer" aria-label="Visit Ashe's DEV Community page">
								<i class="fab fa-dev"></i>
							</a>

							<!-- Stack Overflow -->
							<a href="https://stackoverflow.com/users/904662/ashe-abbott" target="blank" rel="noreferrer" aria-label="Visit Ashe's Stack Overflow">
								<i class="fab fa-stack-overflow"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- Footer Buffer -->
		<div class="footer-buffer" aria-hidden="true"></div>

		<?php if (!is_admin()) { ?>
			<!-- Loading Screen -->
			<div class="loading">
				<div class="loading-icon">
					<div class="letter-a">
						<svg><use xlink:href="#loading-screen-a" /></svg>
					</div>
					<div class="letter-s">
						<svg><use xlink:href="#loading-screen-s" /></svg>
					</div>
					<div class="letter-h">
						<svg><use xlink:href="#loading-screen-h" /></svg>
					</div>
					<div class="letter-e">
						<svg><use xlink:href="#loading-screen-e" /></svg>
					</div>
				</div>
			</div>
		<?php } ?>

	<?php wp_footer(); ?> 

	</body>
</html>