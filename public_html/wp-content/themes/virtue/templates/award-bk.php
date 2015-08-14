<?php $lang = $_SESSION['lang']; ?>
<?php $p = j_get_post(J_CATE_AWARD); ?>
<div class="container pad-lr0 aw-w" id="sec-a">
	<div class="col-md-12 aw-title">
		<?php echo $lang['m_awards']; ?>
	</div>
	<div class="col-md-12 aw-slide pad-lr0">
		<img class="img-item" src="<?php echo $p[0]['post_thumnail']; ?>" alt="" />
	</div>
	<div class="col-md-12 pad-lr0 aw-des-w">
		<div class="container pad-lr0">
			<div class="col-md-2 aw-des-title"><?php echo $p[0]['post_title']; ?></div>
			<div class="col-md-12 aw-des-content">
				<?php echo $p[0]['post_content']; ?>
			</div>					
		</div>
	</div>
</div>