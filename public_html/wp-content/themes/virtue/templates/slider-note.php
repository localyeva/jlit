<?php
    $lang = $_REQUEST['lang'];
    if ($lang == 'ja'):
        //japanese
    ?>
<div class="container-fluid" id="note">
    <div>
        <img src="<?php echo get_virtue_child_notification_jp_pc(); ?>" alt="" style="width: 100%" class="img-responsive">
    </div>
</div>
<div class="container-fluid" id="mnote">
    <div>
        <img src="<?php echo get_virtue_child_notification_jp_sp(); ?>" alt="" style="width: 100%" class="img-responsive">
    </div>
</div>
<?php   
//vietnamese
else:
    ?>
<div class="container-fluid" id="note">
    <div>
        <img src="<?php echo get_virtue_child_notification_vn_pc(); ?>" alt="" style="width: 100%" class="img-responsive">
    </div>
</div>
<div class="container-fluid" id="mnote">
    <div>
        <img src="<?php echo get_virtue_child_notification_vn_sp(); ?>" alt="" style="width: 100%" class="img-responsive">
    </div>
</div>
    
    <?php
endif;
?>