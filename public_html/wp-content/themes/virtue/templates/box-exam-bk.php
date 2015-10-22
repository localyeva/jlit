<style type="text/css">
	.jbox-exam-group{width:100%;}
	.jbox-exam-i{float:left; width:30%; min-width: 300px;}
	.jbox-exam-c{float:left; width:40%; min-width: 440px;}
	@media screen and (max-width:1170px){
		/*align center*/
		/*.jbox-exam-i{width:30%; min-width: 300px; background-color: #f00; float:none;}
		.jbox-exam-c{width:40%; min-width: 440px; background-color: yellow; float:none;}*/
	}

	.jbox-exam-arrow-group{
		width:100%;
		margin-top: -20px;
	}
	.jbox-exam-arrow{
		/*background: url(<?php echo bloginfo('template_url'); ?>/assets/img/box-exam-arrow-new.png) no-repeat;		*/
		/*width:525px;
		height: 68px;*/
		margin-left: auto;
		margin-right: auto;	
		width:50%;	
	}

	.jbox-exam-arrow img{
		width:100%;
		max-width: 525px;
	}


	.jbox-exam-info .c-l{
		float:left;
		min-width: 80px;
	}
	.jbox-exam-info .c-r{
		float:left;
		font-weight: bold;
		font-size: 16px;		
	}

	.jbox-exam-info .row{
		padding-top: 10px;
	}

	.jbox-exam-free{
		/*background: url(<?php echo bloginfo('template_url'); ?>/assets/img/free-icon.png) no-repeat;		*/
		/*width:253px;
		height: 180px;*/
		/*margin-top: -28px;
    	margin-left: 50px;*/
    	width:100%;
	}
	.jbox-exam-free img{
		max-width:100%;
	}

	.jbox-exam-content{
		width:100%;
	}

	.jbox-exam-button-w{
		margin: 10px auto;	
		width:50%;
	}

	.jbox-exam-button{
		padding:8px;		
		min-width: 200px;
		min-height: 87px;
		float:left;
		background-color: #fff;
		-moz-box-shadow: 0 0 5px 5px #a7a7a7;
		-webkit-box-shadow: 0 0 5px 5px#a7a7a7;
		box-shadow: 0 0 5px 5px #a7a7a7;		
	}

	.jbox-exam-button .content{
		font-size: 20px;
		padding:20px;
		background-color: #f00;		
		width:100%;
		height: 70px;		
		display:table;
	}

	.jbox-exam-button .content .text{		
	}

	.middle{
		display:table-cell;
		vertical-align:middle;
		text-align: center;
		/*min-height:100px*/
	}

	/*button*/
	.awesome, .awesome:visited {
    background: url("alert-overlay.png") repeat-x scroll 0 0 #222;
    border-bottom: 1px solid rgba(0, 0, 0, 0.25);
    color: #fff;
    cursor: pointer;
    display: inline-block;
    padding: 5px 10px 6px;
    position: relative;
    text-decoration: none;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
}
.awesome:hover {
    background-color: #111;
    color: #fff;
}
.awesome:active {
    top: 1px;
}

.awesome, .awesome:visited, .medium.awesome, .medium.awesome:visited {        
    line-height: 1;
    text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
}

.large.awesome, .large.awesome:visited {    
    padding: 8px 14px 9px;
}

.red.awesome, .red.awesome:visited {
    background-color: #e33100;
}
.red.awesome:hover {
    background-color: #872300;
}
/*end button*/
</style>
<div class="container box-exam">
	<div class="jbox-exam-group">
		<div class="jbox-exam-arrow-group">
			<div class="jbox-exam-arrow">
				<img class="" src="<?php echo bloginfo('template_url'); ?>/assets/img/box-exam-arrow-new.png" alt="">
			</div>	
		</div>		
		<div class="jbox-exam-i">
			<div class="jbox-exam-free">
				<img src="<?php echo bloginfo('template_url'); ?>/assets/img/free-icon.png" alt="">
			</div>
		</div>
		<div class="jbox-exam-c">
			<div class="jbox-exam-info">
				<div class="row">
					<div class="c-l">Thoi gian</div>
					<div class="c-r">Ngay 18-19/10 2014</div>
				</div>
				<div class="row">
					<div class="c-l">3 ca</div>
					<div class="c-r">8:30 sang, 10:30 sang, 2:30 chieu</div>
				</div>
				<div class="row">
					<div class="c-l">Dia diem</div>
					<div class="c-r">Vietnamworks Office</div>
				</div>				
				<div class="row address">130 Suong Nguyet Anh, Ben Thanh, Quan 1, Tp.HCM</div>
			</div>
		</div>
		<div class="jbox-exam-i">			
			<div class="jbox-exam-content">
				<div class="jbox-exam-button-w">
					<div class="jbox-exam-button">
						<div class="content large red awesome">
							<div class="text middle">Dang Ky</div>
						</div>
					</div>					
				</div>				
			</div>
		</div>
	</div>
</div>