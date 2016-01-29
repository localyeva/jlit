<!-- voice -->
<?php $lang = $_SESSION['lang'];
$limit = 100; ?>
<?php $p = j_get_post(J_CATE_VOICE); ?>
<div id="message" class="container">
    <h2 class="text-center h2-red mar-t-150 mar-bt-50"><?php echo $lang['m_voice']; ?></h2>
    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[0]['post_id']; ?>" src="<?php echo $p[0]['post_thumnail']; ?>" class="img-responsive">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
            <?php echo mb_strlen($p[0]['post_content']) > $limit ? wp_trim_words($p[0]['post_content'], $limit, '...') : $p[0]['post_content']; ?>
            </p>
            <?php if (mb_strlen($p[0]['post_content']) > $limit): ?>
                <p><a id="voice1" href="#voice_content1">Xem thêm</a></p>
<?php endif ?>
        </div>
    </div>
    <div style="display: none">
        <div id="voice_content1" class="voice1 nano">
            <div class="modal-content overthrow nano-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><img alt="<?php echo $p[0]['post_id']; ?>" src="<?php echo $p[0]['post_thumnail']; ?>"></h4>
                </div>
                <div class="modal-body text-format">
                  <?php $lang = $_REQUEST['lang']; if ($lang == 'ja')://japanese  ?>
                    <?php _e("<!--:ja-->" . $p[0]['post_content'] . "<!--:-->");    ?>
                  <?php else: ?>
                    <?php _e("<!--:vi-->" . $p[0]['post_content'] . "<!--:-->");    ?>
                  <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[1]['post_id']; ?>" src="<?php echo $p[1]['post_thumnail']; ?>" class="img-responsive">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
            <?php echo mb_strlen($p[1]['post_content']) > $limit ? wp_trim_words($p[1]['post_content'], $limit, '...') : $p[1]['post_content']; ?>
            </p>
            <?php if (mb_strlen($p[1]['post_content']) > $limit): ?>
                <p><a id="voice2" href="#voice_content2">Xem thêm</a></p>
<?php endif ?>
        </div>
    </div>
    <div style="display: none">
        <div id="voice_content2" class="voice2 nano">
            <div class="modal-content overthrow nano-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><img alt="<?php echo $p[1]['post_id']; ?>" src="<?php echo $p[1]['post_thumnail']; ?>"></h4>
                </div>
                <div class="modal-body text-format">
                  <?php $lang = $_REQUEST['lang']; if ($lang == 'ja')://japanese  ?>
                    <?php _e("<!--:ja-->" . $p[1]['post_content'] . "<!--:-->");?>
                  <?php else: ?>
                    <?php _e("<!--:vi-->" . $p[1]['post_content'] . "<!--:-->");    ?>
                  <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mar-bt-100">
        <div class="col-lg-4 text-center">
            <img alt="<?php echo $p[2]['post_id']; ?>" src="<?php echo $p[2]['post_thumnail']; ?>" class="img-responsive">
        </div>
        <div class="col-lg-8 mar-t-20 text-format">
            <p>
            <?php echo mb_strlen($p[2]['post_content']) > $limit ? wp_trim_words($p[2]['post_content'], $limit, '...') : $p[2]['post_content']; ?>
            </p>
            <?php if (mb_strlen($p[2]['post_content']) > $limit): ?>
                <p><a id="voice3" href="#voice_content3">Xem thêm</a></p>
<?php endif ?>
        </div>
    </div>
    <div style="display: none">
        <div id="voice_content3" class="voice3 nano">
            <div class="modal-content overthrow nano-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><img alt="<?php echo $p[2]['post_id']; ?>" src="<?php echo $p[2]['post_thumnail']; ?>" class="img-responsive"></h4>
                </div>
                <div class="modal-body text-format">
                  <?php $lang = $_REQUEST['lang']; if ($lang == 'ja')://japanese  ?>
                    <?php _e("<!--:ja-->" . $p[2]['post_content'] . "<!--:-->");    ?>
                  <?php else: ?>
                    <?php _e("<!--:vi-->" . $p[2]['post_content'] . "<!--:-->");    ?>
                  <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
