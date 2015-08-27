<!-- voice -->
<?php $lang = $_SESSION['lang']; ?>
<?php $p = j_get_post(J_CATE_VOICE); ?>
<div class="container pad-lr0 aw-w voice" id="sec-v">
	<div class="col-md-12 v-title">
		<?php echo $lang['m_voice']; ?>
	</div>
	<div class="col-md-12 v-content-w">
		<div class="v-mem-w">
			<div class="v-mem l">
				<div class="col-md-4 thum-w ">
					<div class="thum post-detail-voice" style="background:url(<?php echo $p[0]['post_thumnail']; ?>);" alt="<?php echo  $p[0]['post_id']; ?>"></div>
				</div>
				<div class="col-md-4 thum-w ">
					<div class="thum post-detail-voice" style="background:url(<?php echo $p[1]['post_thumnail']; ?>);" alt="<?php echo  $p[1]['post_id']; ?>"></div>
				</div>
				<div class="col-md-4 thum-w ">
					<div class="thum post-detail-voice" style="background:url(<?php echo $p[2]['post_thumnail']; ?>);" alt="<?php echo  $p[2]['post_id']; ?>"></div>
				</div>
			</div>	
		</div>
	</div>
</div>		
<!-- end voice -->
