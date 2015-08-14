<?php  $lang = $_SESSION['lang'];?>
<?php $is_reg = j_is_register(); ?>
<?php $img = ($is_reg==true?'reg-bg.png':'in-reg-bg.png') ?>
<?php $e_hcm = j_get_exam(LOCATION_TPHCM); ?>
<?php $e_hn = j_get_exam(LOCATION_HANOI); ?>

<div class="box-exam-w" id="box-exam">			
	<div class="container box-exam">		
		<div class="jbox-exam-group">
			<div class="jbox-exam-arrow-group">
				<div class="jbox-exam-arrow">
					<img class="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/box-exam-arrow-new.png" alt="">
				</div>	
			</div>		
			<div class="jbox-exam-i">
				<div class="jbox-exam-free">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/vir/free-icon.png" alt="">
				</div>
			</div>
			<div class="jbox-exam-c">
				<div class="row">
					<div class="col-md-2 loc">Tp.HCM</div>
					<div class="col-md-10">						
						<div class="jbox-exam-info">
							<div class="row">
								<div class="c-l"><?php echo $lang['m_timing']; ?></div>
								<div class="c-r"><?php echo $e_hcm['post_time_exam']; ?></div>
							</div>
							<div class="row">
								<div class="c-l"><?php echo $lang['m_3_times']; ?></div>
								<div class="c-r"><?php echo $e_hcm['post_time_slot']; ?></div>
							</div>
							<div class="row">
								<div class="c-l"><?php echo $lang['m_venue']; ?></div>
								<div class="c-r"><?php echo $e_hcm['post_place_exam']; ?>
								<img id="map-icon" class="map-icon" src="http://jlit.evolable.asia/assets/images/map.png">
								</div>
							</div>				
							<div class="row address"><?php echo $e_hcm['post_address_exam']; ?></div>
						</div>						
					</div>
				</div>

				<div class="row r2">
					<div class="col-md-2 loc">Hà Nội</div>
					<div class="col-md-10">						
						<div class="jbox-exam-info">
							<div class="row">
								<div class="c-l"><?php echo $lang['m_timing']; ?></div>
								<div class="c-r"><?php echo $e_hn['post_time_exam']; ?></div>
							</div>
							<div class="row">
								<div class="c-l"><?php echo $lang['m_3_times']; ?></div>
								<div class="c-r"><?php echo $e_hn['post_time_slot']; ?></div>
							</div>
							<div class="row">
								<div class="c-l"><?php echo $lang['m_venue']; ?></div>
								<div class="c-r"><?php echo $e_hn['post_place_exam']; ?>
								<img id="map-icon" class="map-icon hide" src="http://jlit.evolable.asia/assets/images/map.png">
								</div>
							</div>				
							<div class="row address"><?php echo $e_hn['post_address_exam']; ?></div>
						</div>						
					</div>
				</div>
			</div>
			<div class="jbox-exam-b">			
				<div class="jbox-exam-button-w" id="reg-exam-button">
					<div class="jbox-exam-button">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/vir/<?php echo $img; ?>" class="" <?php echo ($is_reg == false?'style="cursor:default; opacity:1;" disabled="disabled" onclick="return false;"':''); ?>>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="go-to-top-w" id="go-to-top">
		<div class="icon" onclick="cscroll('sec-h')"></div>	
	</div>			
</div>