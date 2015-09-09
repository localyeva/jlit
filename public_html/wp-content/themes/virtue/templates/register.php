<?php $lang = $_SESSION['lang']; ?>
<div id="form-register" class="container-fluid">
			<div>
				<img class="img-responsive" style="width: 100%" src="<?php bloginfo('template_url'); ?>/assets/img/vir/bg1.png" alt="">
			</div>
			<h1 class="text-center regis">Đăng ký dự thi miễn phí</h1>
				<div class="container bg1 mar-bt-100">
					<form class="form-horizontal" role="form" id="register" action="<?php bloginfo('siteurl') ?>?json=register" method="POST">
						<div class="row mar-bt-20">
							<div class="col-md-6 col-xs-12">
	  							<div class="form-group">
									<input id="fullname" name="fullname" type="text" class="form-control" placeholder="Họ Tên" aria-describedby="basic-addon1">
								</div>
								<div class="form-group">
									<input id="dob" name="dob" type="text" class="form-control" placeholder="Ngày sinh" aria-describedby="basic-addon1">
								</div>
								<div class="form-group">
									<input id="email" name="email" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
								</div>
								<div class="form-group">
									<input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="form-group">
									<input id="id_number" name="id_number" type="text" class="form-control" placeholder="Số CMND" aria-describedby="basic-addon1">
								</div>
								<div class="form-group mar-bt-23">
									<label class="radio-inline">Giới tính:</label>
									<label class="radio-inline"><input type="radio" name="gender" checked="checked" value="Male">Nam</label>
									<label class="radio-inline"><input type="radio" name="gender" value="Female">Nữ</label>
								</div>
								<div class="form-group">
									<input id="cellphone" name="cellphone" type="text" class="form-control" placeholder="Điện thoại" aria-describedby="basic-addon1">
								</div>
							</div>
						</div>
						<div class="row mar-bt-50 mar-r-1">
							<input type="hidden" id="class" name="test_level" value="1">
							<div id="class3" class="time-class2 time-class-active">
								<h4><?php echo $lang['m_test_level_i3']; ?></h4>
								<span><?php echo $lang['m_test_level_i3']; ?></span>
							</div>
							<div id="class2" class="time-class1">
								<h4><?php echo $lang['m_test_level_i2']; ?></h4>
								<span><?php echo $lang['m_test_level_i2']; ?></span>
							</div>
							<div id="class1" class="time-class">
								<h4><?php echo $lang['m_test_level_i1']; ?></h4>
								<span><?php echo $lang['m_test_level_i1']; ?></span>
							</div>
						</div>
						<div class="row text-center mar-bt-20">
							<input type="hidden" name="location" id="room" value="1">
							<div id="room1" class="col-sm-4 add-info add-info-active">
								<img alt="" src="images/location.png">
								<strong> TP.HCM: <br> Văn Phòng VietnamWorks</strong><br>
								130 Sương Nguyệt Ánh, <br>P.Bến Thành, Q1
							</div>
							<div id="room2"class="col-sm-4 add-info add-info-mid">
								<img alt="" src="images/location.png">
								<strong> Hà Nội: <br> Văn Phòng VietnamWorks</strong><br>
								125-127 Bà Triệu, P.Nguyễn Du,<br> Quận Hai Bà Trưng
							</div>
							<div id="room3" class="col-sm-4 add-info">
								<img alt="" src="images/location.png">
								<strong> Đà Nẵng: <br> TBA</strong><br>
								XXX
							</div>
						</div>
						<div class="text-center">
							<button id="bt_submit" type="button" class="btn active regis-red"> Đăng ký  <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arr.png"></button>
						</div>
					</form>
			</div>
		</div>
<script type="text/javascript">
$('#bt_submit').on('click', function() {
	$.ajax({
		url: '<?php bloginfo('siteurl') ?>?json=register',
		type: 'post',
		data: $('#register input[type=\'text\'], #register input[type=\'hidden\'], #product input[type=\'radio\']:checked'),
		dataType: 'json',
		beforeSend: function() {
			$('#bt_submit').button('loading');
		},
		complete: function() {
			$('#bt_submit').button('reset');
		},
		success: function(json) {
			$('.show-error').remove();
			$('.form-group').removeClass('has-error');

			if (json['error']) {
				if(json['error']['er_fullname']){
					$('#fullname').after('<div class="show-error">' + json['error']['er_fullname'] + '</div>');
				}
				if(json['error']['er_email']){
					$('#email').after('<div class="show-error">' + json['error']['er_email'] + '</div>');
				}
				if(json['error']['er_dob']){
					$('#dob').after('<div class="show-error">' + json['error']['er_dob'] + '</div>');
				}
				if(json['error']['er_address']){
					$('#address').after('<div class="show-error">' + json['error']['er_address'] + '</div>');
				}
				if(json['error']['er_id_number']){
					$('#id_number').after('<div class="show-error">' + json['error']['er_id_number'] + '</div>');
				}
				if(json['error']['er_cellphone']){
					$('#cellphone').after('<div class="show-error">' + json['error']['er_cellphone'] + '</div>');
				}
			}
			if (json['success']) {
				$('#register').before('<div class="success">' + json['success'] + '</div>');
			}
		}
	});
});
</script>
