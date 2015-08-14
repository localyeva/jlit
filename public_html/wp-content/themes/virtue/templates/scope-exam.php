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
