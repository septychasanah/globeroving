        <footer>
			<div class="instagram">
				<?php
					$footerinsta = get_theme_mod('footer_insta_setting');
				if ($footerinsta == '0') {
					echo "";
				} else {
					echo do_shortcode($footerinsta);
				} ?>
			</div>
			<div class="container">				      
				<div class="footer text-center">
					<ul class="social-media">
						<?php
							$socialmedia = get_theme_mod('footer_soc_setting');
						if ($socialmedia == '0') {
							echo "";
						} else {
							$secone = new WP_Query('page_id='.$socialmedia.'');
							while ($secone->have_posts()) : $secone->the_post(); ?>
							<?php the_content(); ?>
							<?php endwhile;
							wp_reset_postdata(); ?>
						<?php } ?>                    
					</ul>
					<div class="copyright">
						<p>&copy; 2018 &nbsp;.&nbsp; <a href="<?php echo site_url(); ?>">Septy Chasanah</a> 
							&nbsp;.&nbsp; <a href="https://globeroving.com/privacy-policy/ ">Privacy</a>
							&nbsp;.&nbsp; <a href="https://globeroving.com/contact/">Contact</a></p>
						<p>Designed & developed by <a href="http://senucha.com">&nbsp;Septy Chasanah</a></p>
					</div>
				</div>
			</div>
        </footer>

        <!-- Javascript & Plugins -->
        <?php wp_footer(); ?>
    </body>

</html>