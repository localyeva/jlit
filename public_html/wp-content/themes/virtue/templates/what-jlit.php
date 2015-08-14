<style rel="stylesheet" type="text/css">
	/*what's jlit*/
.wj-w{
    margin-bottom: 60px;
}
.wj-def-w{
    /*border:#ccc solid 1px;
    border-radius: 10px;*/
    max-width: 1042px;
    min-height: 313px;
}

.wj-def-w .wj-def{
    padding: 56px 20px 20px 57px;
}

.wj-def-w .wj-def-icon{
    margin-top: -30px;
}

.wj-sub-w{
    margin-top:57px;
}
.wj-sub{
    /*display: table;*/
}

.wj-sub .i-mid{
    /*display: table-cell;*/
}

.wj-sub .i-mid img{
    border:#ccc solid 2px;    
}

.wj-sub .i-mid img:hover{
    border-color: #6db33f;
    box-shadow: 0 0 3px #6db33f;
    text-decoration: none;    
}


.wj-sub .i-des{
    background-color:#f8e2e5;
    min-height: 90px;
    max-width: 372px;
    margin: 0 auto;
    margin-top: 20px;
    margin-left: 0px;  
}

.wj-sub .i-des-c{
    background-color:#f8e2e5;
    min-height: 90px;
    max-width: 372px;
    margin: 0 auto;
    margin-top: 20px;    
}

.wj-sub .i-des-r{
    background-color:#f8e2e5;
    min-height: 90px;
    max-width: 372px;
    margin: 0 auto;
    margin-top: 20px;
    margin-right: 3px;    
}

.i-des-content-w{
    width:100%;    
    display:table;
}

.i-des-content-w .i-des-content{    
    display:table-cell;
    text-align: center;
    vertical-align: middle;   
    height: 90px; 
    font-size: 25px;

    color: rgba(0,0,0,0.6);
    text-shadow: 2px 8px 6px rgba(0,0,0,0.2), 0px -5px 35px rgba(255,255,255,0.3);
}

/*.news-title, .main-title{
    font-weight: normal;
    font-size: 30px;
    color: #224a7b;
    padding-top:40px;
    padding-bottom: 25px;
    padding-left: 0px !important;
}*/


/*end what's jlit*/
</style>
<?php $lang = $_SESSION['lang']; ?>
<?php $p = j_get_post(J_CATE_WHAT_JLIT); ?>
<?php //print_r( $p);?>
<!-- what's JLIT -->
<div class="container  pad-lr0 wj-w" id="sec-w">
	<div class="col-md-12 main-title">
		<?php echo $lang['m_what_is_jlit']; ?>
	</div>
	<div class="col-md-12 pad-lr0">
		<div class="wj-def-w container pad-lr0">
			<div class="col-md-8 wj-def">
				<?php  echo $p[0]['post_content']; ?>
			</div>
			<div class="col-md-4 wj-def-icon">
				<img src="<?php  echo $p[0]['post_thumnail']; ?>">
			</div>
		</div>
	</div>
    
<!-- start exam scope -->

	<?php $lang = $_SESSION['lang']; ?>
    <?php 	
        $policy = j_get_post(J_CATE_POLICY_EXAM); 
        $scope = j_get_post(J_CATE_SCOPE_EXAM); 
    ?>
    <style type="text/css">
        .es-des-content-center{
            width: 50%;
            margin:0 auto;
        }
    </style>
    <!-- exam scope -->
    <div class="container  pad-lr0 wj-w es-w" id="sec-s">
        <div class="col-md-12 main-title es-title">
            <?php echo $lang['m_policy_scope']; ?>
        </div>
        <div class="col-md-12 pad-lr0">
            <div class="es-def-w container pad-lr0">
                <div class="col-md-2 es-des"><?php echo $lang['m_policy']; ?></div>
                <div class="col-md-12">
                        <?php echo $policy[0]['post_content']; ?>	
                </div>					
            </div>
        </div>
        <div class="col-md-12 pad-lr0 es-scope-w ">
            <div class="col-md-2 es-des-scope"><?php echo $lang['m_scope']; ?></div>		
            <div class="col-md-10 container pad-lr0 wj-sub-w es-scope-cell-w es-scope-cell-w-f">
                <div class="row">				
                    <div class="col-md-4 es-scope-cell pad-lr0">
                        <div class="es-scope-cell-content">
                            <div class="title"><?php echo $scope[0]['post_title']; ?></div>
                            <div class="content"><?php echo $scope[0]['post_content']; ?></div>
                        </div>
                    </div>
                    <div class="col-md-4 es-scope-cell pad-lr0">
                        <div class="es-scope-cell-content">
                            <div class="title"><?php echo $scope[1]['post_title']; ?></div>
                            <div class="content"><?php echo $scope[1]['post_content']; ?></div>
                        </div>
                    </div>
                    <div class="col-md-4 es-scope-cell pad-lr0">
                        <div class="es-scope-cell-content">
                            <div class="title"><?php echo $scope[2]['post_title']; ?></div>
                            <div class="content"><?php echo $scope[2]['post_content']; ?></div>
                        </div>
                    </div>				
                </div>
                
            </div>
                    
        </div>	
    </div>
    <?php $que = j_get_post_example_exam(); ?>
    <div class="container aq-w">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/vir/ques-button.png" class="post-detail-link" alt="<?php  echo $que['post_id']; ?>">
    </div>
<!-- end exam scope -->

    
    
	<div class="col-md-12 pad-lr0 ">
		<div class="container pad-lr0 wj-sub-w">
			<div class="col-md-3 wj-sub wj-sub-fix">
				<div class="i-mid">
					<img src="<?php  echo $p[1]['post_thumnail']; ?>" class="post-detail-link" alt="<?php  echo $p[1]['post_id']; ?>">
				</div>						
				<div class="i-des">
					<div class="i-des-content-w">
						<div class="i-des-content"><?php  echo $p[1]['post_title']; ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 wj-sub wj-sub-m a-c">
				<div class="i-mid">
					<img src="<?php  echo $p[2]['post_thumnail']; ?>" class="post-detail-link" alt="<?php  echo $p[2]['post_id']; ?>">
				</div>						
				<div class="i-des-c">
					<div class="i-des-content-w">
						<div class="i-des-content"><?php  echo $p[2]['post_title']; ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 wj-sub a-r">
				<div class="i-mid">
					<img src="<?php  echo $p[3]['post_thumnail']; ?>" class="post-detail-link" alt="<?php  echo $p[3]['post_id']; ?>">
				</div>						
				<div class="i-des-r">
					<div class="i-des-content-w">
						<div class="i-des-content"><?php  echo $p[3]['post_title']; ?></div>
					</div>
				</div>
			</div>
            
			<div class="col-md-3 wj-sub a-r">
				<div class="i-mid">
					<img src="<?php  echo $p[4]['post_thumnail']; ?>" class="post-detail-link" alt="<?php  echo $p[4]['post_id']; ?>">
				</div>						
				<div class="i-des-r">
					<div class="i-des-content-w">
						<div class="i-des-content"><?php  echo $p[4]['post_title']; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end what's JLIT -->