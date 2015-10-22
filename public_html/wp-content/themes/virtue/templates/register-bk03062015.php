<?php $lang = $_SESSION['lang']; ?>
<?php session_start(); ?>
<div class="container npad-l0" id="bm">	
	<div class="col-md-12 main-title" id="register-section">			
		<?php echo $lang['m_register']; ?>
	</div>
	<?php if(isset($_SESSION['register']) != 1) { ?>
	<div class="container npad-l0 npad-r0">		
		<section id="main">				
			<section role="content" id="content">
				<section class="form col-md-10">
					<form role="form" class="form-horizontal" id="register" action="<?php bloginfo('siteurl') ?>?json=register" method="POST" >						
						<div class="form-group">
							<label for="id_number" class="col-md-3 control-label"><?php echo $lang['m_id_number']; ?></label>
							<div class="col-md-9">
								<input type="text" name="id_number" class="form-control required" placeholder="ID number">
							</div>
						</div>						
						<div class="form-group">
							<label for="fullname" class="col-md-3 control-label"><?php echo $lang['m_full_name']; ?></label>
							<div class="col-md-9">
								<input type="text" name="fullname" class="form-control required" placeholder="<?php echo $lang['m_full_name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="dob" class="col-md-3 control-label"><?php echo $lang['m_date_of_birth']; ?></label>
							<div class="col-md-8">
								<input type="text"  id="dob" name="dob" class="form-control required">
							</div>
							<div class="col-md-3">
							</div>
						</div>
						<div class="form-group">
							<label for="gender" class="col-md-3 control-label"><?php echo $lang['m_gender']; ?></label>
							<div class="col-md-9">
								<label class="radio-inline">
									<input name="gender" checked value="Male" type="radio"><?php echo $lang['m_male']; ?>
								</label>
								<label class="radio-inline">
									<input name="gender"  value="Female" type="radio"><?php echo $lang['m_female']; ?>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-3 control-label"><?php echo $lang['m_email']; ?></label>
							<div class="col-md-9">
								<input type="text" name="email" class="form-control required email" placeholder="<?php echo $lang['m_email']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="cellphone" class="col-md-3 control-label"><?php echo $lang['m_cell_phone']; ?></label>
							<div class="col-md-9">
								<input type="text"  name="cellphone" class="form-control required NumbersOnly" placeholder="Dien thoai">
							</div>
						</div>
						<div class="form-group">
							<label for="address" class="col-md-3 control-label"><?php echo $lang['m_user_address']; ?></label>
							<div class="col-md-9">
								<input type="text" name="address" class="form-control required" placeholder="Dia chi">
							</div>
						</div>
						<div class="form-group">
							<label for="location" class="col-md-3 control-label"><?php echo $lang['m_location']; ?></label>
							<div class="col-md-9">
								<label class="radio-inline">
									<input id="loc-hcm" name="location" checked value="<?php echo HCMLOCATION ?>" type="radio"><?php echo $lang['m_tphcm']; ?>
								</label>
								<label class="radio-inline">
									<input id="loc-hn" name="location"  value="<?php echo HANOILOCATION ?>" type="radio"><?php echo $lang['m_hanoi']; ?>
								</label>
							</div>
						</div>		


						
						<div class="form-group">
                                                        <label for="level_test" class="col-md-3 control-label"><?php echo $lang['m_test_level']; ?></label>
                                                        <div class="form-group">
                                                                <div class="col-md-8">
                                                                        <label class="radio-inline">
                                                                                <input name="test_level" checked value="<?php echo TEST_LEVEL_I1; ?>" type="radio"><?php echo $lang['m_test_level_i1']; ?>
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                                <input name="test_level"  value="<?php echo TEST_LEVEL_I2; ?>" type="radio"><?php echo $lang['m_test_level_i2']; ?>
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                                <input name="test_level"  value="<?php echo TEST_LEVEL_I3; ?>" type="radio"><?php echo $lang['m_test_level_i3']; ?>
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>	
						<div class="form-group">
							<label for="dob" class="col-md-3 control-label">&nbsp;</label>
							<div class="col-md-8">
								<?php echo $lang['m_register_sucess_comment']; ?>
							</div>
							<div class="col-md-3">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-9 col-md-3 ">								
								<button type="submit" class="btn btn-default pull-right" id="register-button"><?php echo $lang['m_register']; ?></button>								
							</div>
						</div>
					</form>
				</section>
			</section>
		</section>	
	</div>

	<?php }else{ ?>
	<div class="container npad-l0 npad-r0">
		<b>
		<?php echo $lang['m_thank_you']; ?><br/>
		<?php echo $lang['m_contact_later']; ?>		
		</b>
		<?php if($_SESSION['new_member'] == 1){ ?>
			<div class="news-member" style="">Bạn đã được cấp một tài khoản trên trang tuyển dụng vietnamworks.com dựa trên thông tin đăng ký dự thi
			<br />Bạn vui lòng kiểm tra email để kích hoạt và sử sụng tài khoản trên vietnamworks.com.

			</div>
		<?php } ?>
		<br /><br /><br /><a href="/"><input type="button" value="<?php echo $lang['m_home_page']; ?>" style="padding:3px;"/></a><br /><br /><br />
		
	</div>
		<?php unset($_SESSION['register']); ?>
	<?php } ?>		
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#loc-hn').click(function(){
			$('#hn').fadeIn(2000);
			$('#hcm').fadeOut(1);
		});

		$('#loc-hcm').click(function(){
			$('#hcm').fadeIn(2000);
			$('#hn').fadeOut(1);
		});

	});
</script>
<script type="text/javascript">
	$('#register-button').on('click', function() {
	  ga('send', 'event', 'button', 'click', 'nav-buttons');
	});
</script>
