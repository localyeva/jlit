<!-- voice -->
<?php $lang = $_SESSION['lang']; $limit = 100;?>
<?php $p = j_get_post(J_CATE_VOICE); ?>
<div id="message" class="container">
    <h2 class="text-center h2-red mar-t-150 mar-bt-50"><?php echo $lang['m_voice']; ?></h2>
    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[0]['post_id']; ?>" src="<?php echo $p[0]['post_thumnail']; ?>">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
                <?php echo mb_strlen($p[0]['post_content'])>$limit?wp_trim_words($p[0]['post_content'], $limit, '...'):$p[0]['post_content'];?>        
            </p>
            <?php if(mb_strlen($p[0]['post_content'])>$limit):?>
            <p><a id="voice1" href="#voice_content1">Xem thêm</a></p>
            <?php endif?>
        </div>
    </div>
    <div style="display:none">
        <div class="row" id='voice_content1'>
            <div class="col-lg-4 text-center">
                <img alt="<?php echo $p[0]['post_id']; ?>" src="<?php echo $p[0]['post_thumnail']; ?>">
            </div>
            <div class="col-lg-8 text-format">
                <p><?php echo $p[0]['post_content']; ?></p>
            </div>
        </div>
    </div>
    
    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[1]['post_id']; ?>" src="<?php echo $p[1]['post_thumnail']; ?>">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
                <?php echo mb_strlen($p[1]['post_content'])>$limit?wp_trim_words($p[1]['post_content'], $limit, '...'):$p[1]['post_content'];?>        
            </p>
            <?php if(mb_strlen($p[1]['post_content'])>$limit):?>
            <p><a id="voice2" href="#voice_content2">Xem thêm</a></p>
            <?php endif?>
        </div>
    </div>
    <div style="display:none">
        <div class="row" id='voice_content2'>
            <div class="col-lg-4 text-center">
                <img alt="<?php echo $p[1]['post_id']; ?>" src="<?php echo $p[1]['post_thumnail']; ?>">
            </div>
            <div class="col-lg-8 text-format">
                <p><?php echo $p[1]['post_content']; ?></p>
            </div>
        </div>
    </div>
    
    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[2]['post_id']; ?>" src="<?php echo $p[2]['post_thumnail']; ?>">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
                <?php echo mb_strlen($p[2]['post_content'])>$limit?wp_trim_words($p[2]['post_content'], $limit, '...'):$p[2]['post_content'];?>        
            </p>
            <?php if(mb_strlen($p[2]['post_content'])>$limit):?>
            <p><a id="voice3" href="#voice_content3">Xem thêm</a></p>
            <?php endif?>
        </div>
    </div>
    <div style="display:none">
        <div class="row" id='voice_content3'>
            <div class="col-lg-4 text-center">
                <img alt="<?php echo $p[2]['post_id']; ?>" src="<?php echo $p[2]['post_thumnail']; ?>">
            </div>
            <div class="col-lg-8 text-format">
                <p><?php echo $p[2]['post_content']; ?></p>
            </div>
        </div>
    </div>
</div>
