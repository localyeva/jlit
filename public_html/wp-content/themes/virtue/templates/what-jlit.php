<?php $lang = $_SESSION['lang']; ?>

<div class="container content" id="what-jlit">
    <div  class="row mar-t-150">
        <?php $p = j_get_post(J_CATE_WHAT_JLIT); ?>
        <div class="col-sm-5 padd-t-30">
            <img class="img-responsive" alt="" src="<?php echo $p[0]['post_thumnail']; ?>">
        </div>
        <div class="col-sm-7 question-right">
            <h2 class="h2-red"><?php echo $lang['m_what_is_jlit']; ?></h2>
            <p><?php echo $p[0]['post_content']; ?><p>
        </div>
    </div>
</div>
<?php $lang = $_SESSION['lang']; ?>
<?php
$policy = j_get_post(J_CATE_POLICY_EXAM);
$scope = j_get_post(J_CATE_SCOPE_EXAM);
?>
<div id="content" ></div>
<div class="mar-t-150 text-center">
    <h2 class="h2-red"><?php echo $lang['m_policy_scope']; ?></h2>
</div>
<div  class="container mar-t-50 bag-gray">
    <div class="">
        <div class="row learn-content">
            <div class="col-sm-6 right center">
                <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/8.png">
                <p>Kiến thức ngôn ngữ</p>
            </div>
            <div class="col-sm-6 center">
                <img class="img1" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/9.png">
                <p>Nghe hiểu</p>
            </div>
        </div>
    </div>
</div>
<div class="container content">
    <div class="row no-mar mar-t-10" >
        <div class="col-lg-4 none-padd">
            <div class="title-red">
                <span><span class="tit_head"><?php echo $scope[0]['post_title']; ?></span> - Cao cấp</span>
            </div>
            <div class="body-red">
                <p><?php echo $scope[0]['post_content']; ?></p>
            </div>
        </div>
        <div class="col-lg-4 none-padd">
            <div class="title-red">
                <span><span class="tit_head"><?php echo $scope[1]['post_title']; ?></span> - Trung cấp</span>
            </div>
            <div class="body-red">
                <p><?php echo $scope[1]['post_content']; ?></p>
            </div>
        </div>
        <div class="col-lg-4 none-padd">
            <div class="title-red">
                <span><span class="tit_head"><?php echo $scope[2]['post_title']; ?></span> - Sơ cấp</span>
            </div>
            <div class="body-red">
                <p><?php echo $scope[2]['post_content']; ?></p>
            </div>
        </div>
    </div>



    <div class="row mar-t-50">
        <div class="col-lg-4">            
            <div class="intro-title"><a id="inline1" href="#target"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arrow2.png">  <?php echo $p[1]['post_title']; ?></a></div>
            <a id="inline1" href="#target">
                <div class="bo-intro">
                    <img class="img-responsive" alt="" src="<?php echo $p[1]['post_thumnail']; ?>" alt="<?php echo $p[1]['post_id']; ?>">
                </div>
            </a>
        </div>
        <div style="display: none">
            <div class="modal-dialog" role="document" id="target">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?php echo $p[1]['post_title']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $p[1]['post_content']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" data-toggle="modal" data-target="#scop">
            <div class="intro-title"><a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arrow2.png"> <?php echo $p[2]['post_title']; ?></a></div>
            <div class="bo-intro">
                <img class="img-responsive" alt="" src="<?php echo $p[2]['post_thumnail']; ?>" alt="<?php echo $p[2]['post_id']; ?>">
            </div>
        </div>
        <div class="modal fade" id="scop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $p[2]['post_title']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $p[2]['post_content']; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" data-toggle="modal" data-target="#mess">
            <div class="intro-title"><a href="#"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arrow2.png"> <?php echo $p[3]['post_title']; ?></a></div>
            <div class="bo-intro">
                <img class="img-responsive" alt="" src="<?php echo $p[3]['post_thumnail']; ?>" alt="<?php echo $p[3]['post_id']; ?>">
            </div>
        </div>
        <div class="modal fade" id="mess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $p[3]['post_title']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <?php echo $p[3]['post_content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

