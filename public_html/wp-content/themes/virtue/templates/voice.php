<!-- voice -->
<?php $lang = $_SESSION['lang']; ?>
<?php $p = j_get_post(J_CATE_VOICE); ?>
			<div id="message" class="container">
				<h2 class="text-center h2-red mar-t-150 mar-bt-50"><?php echo $lang['m_voice']; ?></h2>
				<div class="row mar-bt-100">
					<div class="col-lg-4 text-center">
						<img alt="<?php echo  $p[0]['post_id']; ?>" src="<?php echo $p[0]['post_thumnail']; ?>">
					</div>
					<div class="col-lg-8 mar-t-20 text-format">
						<p><?php echo $p[0]['post_content']; ?></p>
					</div>
				</div>
				<div class="row mar-bt-100">
					<div class="col-lg-4 text-center">
						<img alt="<?php echo  $p[1]['post_id']; ?>" src="<?php echo $p[1]['post_thumnail']; ?>">
					</div>
					<div class="col-lg-8 mar-t-20 text-format">
						<p><?php echo $p[1]['post_content']; ?></p>
					</div>
				</div>
				<div class="row mar-bt-100">
					<div class="col-lg-4 text-center">
						<img alt="<?php echo  $p[2]['post_id']; ?>" src="<?php echo $p[2]['post_thumnail']; ?>">
					</div>
					<div class="col-lg-8 mar-t-20 text-format">
						<p><?php echo $p[2]['post_content']; ?></p>
					</div>
				</div>
			</div>
