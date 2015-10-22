<style type="text/css">
	.a-top40{
		margin-top: 40px;
	}
	.npad-l0{
		padding-left: 0px;
	}
	.npad-r0{
		padding-right: 0px;
	}

	.news-title{
		font-weight: normal;
		font-size: 30px;
		color: #224a7b;
		padding-top:80px;
		padding-bottom: 30px;
		padding-left: 0px !important;
	}

	.news-item{		
		/*max-width: 371px;*/
		padding-left: 0px;		
		padding-right: 0px;
		text-align: center;
	}
	.news-item-s{		
		/*max-width: 371px;*/
		padding-left: 0px;
		padding-right: 0px;
		text-align: center;
	}
	.news-img{
		max-width: 100%;
	}
	.news-img:hover{
		border-color: #686868;
    	box-shadow: 0px 0px 5px #686868;
    	text-decoration: none;
	}

	.news-des{
		position: absolute;
		width:100%;
		height: 75px;
		margin-top: -75px;
		padding: 10px 20px 10px 20px;		
		z-index: 2;
		color:#000;
	}

	.news-des-bg{
		background-color:#fff;
		opacity: 0.5;
		width:100%;
		height: 75px;
		margin-top: -75px;
		padding: 10px 20px 10px 20px;
		z-index: 1;
	}

	.sub-news{
		margin-top: 50px;
		margin-bottom: 50px;
	}

	.sub-news-icon-w{
		max-width:109px;
		max-height: 109px;
		float:left;
	}
	.sub-news-icon{
		max-width: 100%;		
	}
	

	.sub-news-item{		
	}
	.sub-news-des-w{
		float:left;
		margin-left: 10px;
		max-width: 78%;
	}
	.sub-news-des-title{
		font-weight: bold;
		font-size: 16px;
	}
	.sub-news-des-c{
		margin-top: 10px;
		min-height: 75px;
		max-height: 75px;
	}

	.sub-news-des-more{
		margin-top: 10px;
		color:#224a7b;
		font-size: 10px;
	}

	.sub-news-des-more:hover{
		font-weight: bold;
		cursor: pointer;		
	}

	.sub-news-item-all{		
		color:#cb5d6a;
	}

	.sub-news-item-all:hover{
		font-weight: bold;
		cursor: pointer;
	}

	@media screen and (max-width: 992px){
		.news-item-s{
			margin-left: 0px !important;
			margin-top: 20px;
		}
	}

	@media screen and (max-width: 567px){		
		.sub-news-item{			
			margin-top: 10px;			
		}

		.sub-news-icon-w{
			padding-top: 10px !important;
		}

		.sub-news-des-w{		
			padding-top: 10px !important;	
			margin-left: 0px;
			max-width: 100%;			
		}

		.sub-news-des-c{			
			min-height: 50px;
			max-height: 50px;
		}

	}

	.load-more{
		margin-bottom: 30px;
	}
	/*paging*/		
	.paging {
		clear: both;
	    float: left;
	    left: 10%;
	    margin-top: 0;
	    position: relative;
	}
	.paging ul {
		list-style: none;
		padding: 0;
		margin: 0;
		position: relative;
		left: -50%;
	}
	.paging ul li {
		float: left;
	}
	.paging ul li:nth-child(n+2) {
		margin-left: -1px;
	}
	.paging ul li a {
		position: relative;
		display: block;
		text-decoration: none;
		color: #555;
		border: 1px solid #777;
		padding: 0 5px;
		min-width: 30px;
		line-height: 150%;
		text-align: center;
		background: #eee;
		z-index: 1;
		transition: all 250ms;
	}
	.paging ul li a:hover,
	.paging ul li a:focus {
		z-index: 2;
		color: #000;
		border-color: #444;
		background-color: #ddd;
		box-shadow: 0 0 3px rgba(0,0,0,0.5);
	}

	.paging ul li:first-child a {
		/*border-radius: 5px 0 0 5px;*/
	}

	.paging ul li:last-child a {
		/*border-radius: 0 5px 5px 0;*/
	}
	.paging ul li a.active{
		font-weight: bold;
		color: #fff;
		background-color: #606060;		
	}

	.mb-gototop-w{
		width:100%;
	}
	.mb-gototop{			
		width:40px;
		height: 40px;
		background:url(<?php bloginfo('template_url'); ?>/assets/img/vir/go-to-top-40.png);
		position: fixed;
		z-index: 9999;
		left:0px;
		top: 0px;
		opacity: 0.5;
	}
	.mb-gototop:hover{
		opacity: 1;
	}

	.show-mb{display: none;}
	.news-des-center{
		margin:0 auto;
		max-width: 370px;
		text-align: justify;
	}
</style>
<?php  
	$lang = $_SESSION['lang'];
	$news = j_get_news();	
	$sub_news = j_get_news(false);	
	$upload_dir = wp_upload_dir();
?>
<div class="mb-gototop show-mb hide" link="sec-h" onclick="cscroll($(this).attr('link'));" id="mb-gototop"></div>
<div class="container npad-l0 b-r" id="sec-n">
	<div class="col-md-12 news-title">
		<?php echo $lang['m_jlit_news']; ?>
	</div>	
	<div class="container npad-l0 npad-r0 main-new">
		<div class="col-md-4 col-sm-4 news-item ">
			<img class="news-img post-detail-link" src="<?php echo  $news[0]['post_thumnail']; ?>" alt="<?php echo  $news[0]['post_id']; ?>">
			<div class="news-des">
				<div class="news-des-center"><?php echo  $news[0]['post_des']; ?></div>
			</div>
			<div class="news-des-bg"></div>
		</div>
		<!--<div class="col-md-4 col-sm-4 news-item-s ">
			<img class="news-img post-detail-link" src="<?php //echo  $news[1]['post_thumnail']; ?>" alt="<?php //echo  $news[1]['post_id']; ?>">
			<div class="news-des">				
				<div class="news-des-center"><?php //echo  $news[1]['post_des']; ?></div>
			</div>
			<div class="news-des-bg"></div>
		</div> -->
		<div class="col-md-4 col-sm-4 news-item-s ">
			<img class="news-img post-detail-link" src="<?php echo  $news[2]['post_thumnail']; ?>" alt="<?php echo  $news[2]['post_id']; ?>">
			<div class="news-des">
				<div class="news-des-center"><?php echo  $news[2]['post_des']; ?></div>
			</div>
			<div class="news-des-bg"></div>
		</div>
	</div>
	<div class="container npad-l0 npad-r0 sub-news">		
		<?php $snc = 0; ?>
		<?php foreach($sub_news as $sn){ ?>			
			<?php $snc++; ?>
			<div class="col-md-6 sub-news-item npad-l0 <?php echo ($snc > 2?'a-top40':''); ?> npad-r0">
				<div class="sub-news-icon-w">
					<img class="sub-news-icon" src="<?php echo $sn['post_thumnail'] ?>">
				</div>
				<div class="sub-news-des-w">
					<div class="sub-news-des-title post-detail-link" alt="<?php echo $sn['post_id']; ?>"><?php echo $sn['post_title'] ?></div>
					<div class="sub-news-des-c"><?php echo $sn['post_des'] ?></div>
					<div class="sub-news-des-more post-detail-link" alt="<?php echo $sn['post_id']; ?>">READ MORE...</div>
				</div>
			</div>			
		<?php } ?>
		<?php $snc = 0; ?>		
	</div>	
</div>