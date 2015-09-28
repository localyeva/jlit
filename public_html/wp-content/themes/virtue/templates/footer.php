
<?php $lang = $_SESSION['lang']; ?>
<footer id="footer" class="container-fluid" >
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 pad-t-70 padd-cent">
							<img class="img-responsive" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/vnw.png">
						</div>
						<div class="col-sm-4 txt-cent">
							<img class="img-responsive"  alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/evo.png">
							<p>Email: jlit@evolable.asia</p>
						</div>
						<div class="col-sm-4 text-right">
							<div class="facebook">
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=124639054226284";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-page fb-like-box" data-href="https://www.facebook.com/pages/Japanese-Literacy-and-It-Test/380773005413487" data-width="450" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/Japanese-Literacy-and-It-Test/380773005413487"><a href="https://www.facebook.com/pages/Japanese-Literacy-and-It-Test/380773005413487">Japanese Literacy and It Test</a></blockquote></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-botton text-center"> © 2014 <?php echo $lang['m_copyright']; ?> </div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>

