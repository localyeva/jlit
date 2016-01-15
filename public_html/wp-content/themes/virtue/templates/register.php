<?php $lang = $_SESSION['lang']; ?>
<div id="form-register" class="container-fluid">
    <div>
        <img class="img-responsive" style="width: 100%" src="<?php bloginfo('template_url'); ?>/assets/img/vir/bg1.png" alt="">
    </div>
    <h1 class="text-center regis"><?php echo $lang['m_h1_free_register']; ?></h1>
    <div class="container bg1 mar-bt-100">
        <form class="form-horizontal" role="form" id="confirm" action="<?php bloginfo('siteurl') ?>?json=confirm" method="POST">
            <div class="row mar-bt-20">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <input id="fullname" name="fullname" type="text" class="form-control" placeholder="<?php echo $lang['m_placeholder_fullname']; ?>" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <input id="email" name="email" type="text" class="form-control" placeholder="<?php echo $lang['m_placeholder_email']; ?>" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <input id="id_number" name="id_number" type="text" class="form-control" placeholder="<?php echo $lang['m_placeholder_id_number']; ?>" aria-describedby="basic-addon1">
                    </div>                    
                    <div class="form-group">
                        <input id="cellphone" name="cellphone" type="text" class="form-control" placeholder="<?php echo $lang['m_placeholder_cellphone']; ?>" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
            <!--div class="row mar-bt-50 mar-r-1">                
                <div id="class3" class="time-class2">
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
                <input type="hidden" id="class" name="test_level" value="-1">
            </div-->
            <label><?php echo $lang['m_choose_level']; ?></label>
            <div class="row text-center mar-bt-20" style="padding-bottom: 15px">                
                <div id="class3" class="col-sm-4 add-info">
                    <h4><?php echo $lang['m_test_level_i3']; ?></h4>
                </div>
                <div id="class2"class="col-sm-4 add-info add-info-mid">
                    <h4><?php echo $lang['m_test_level_i2']; ?></h4>
                </div>
                <div id="class1" class="col-sm-4 add-info">
                    <h4><?php echo $lang['m_test_level_i1']; ?></h4>
                </div>
                <input type="hidden" id="class" name="test_level" value="-1">
            </div>
            <label><?php echo $lang['m_choose_location']; ?></label>
            <div class="row text-center mar-bt-20">                
                <div id="room1" class="col-sm-4 add-info">
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/location.png">
                    <?php echo $lang['m_tphcm']; ?>
                </div>
                <div id="room2"class="col-sm-4 add-info add-info-mid">
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/location.png">
                    <?php echo $lang['m_hanoi']; ?>
                </div>
                <div id="room3" class="col-sm-4 add-info">
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/location.png">
                    <?php echo $lang['m_dn']; ?>
                </div>
                <input type="hidden" name="location" id="room" value="-1">
            </div>            
        </form>   
        <div class="row text-center row-regis-red">
                <button id="bt_submit" type="button" class="btn active regis-red"> <?php echo $lang['m_register_form']; ?> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arr.png"></button>
            </div>
    </div>

    <div style="display:none">
        <div class="container-fluid" id="register">
            <h1 class="text-center regis" style="color: #000"><?php echo $lang['m_h1_free_register']; ?></h1>            
            <div class="container">
                <form role="form" id="frmregister" action="<?php bloginfo('siteurl') ?>?json=register" method="POST">                    
                    <table class="table table-responsive confirm">
                        <tr>
                            <th><?php echo $lang['m_placeholder_fullname']; ?></th>
                            <td id="cfullname"></td>
                        </tr>                        
                        <tr>
                            <th><?php echo $lang['m_placeholder_email']; ?></th>
                            <td id="cemail"></td>
                        </tr>                        
                        <tr>
                            <th><?php echo $lang['m_placeholder_id_number']; ?></th>
                            <td id="cid_number"></td>
                        </tr>                        
                        <tr>
                            <th><?php echo $lang['m_placeholder_cellphone']; ?></th>
                            <td id="ccellphone"></td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['m_label_level_and_time']; ?></th>
                            <td id="">
                                <div id="cclass3" style="display:none">
                                    <span><?php echo $lang['m_test_level_i3']; ?></span>
                                </div>
                                <div id="cclass2" style="display:none">
                                    <span><?php echo $lang['m_test_level_i2']; ?></span>
                                </div>
                                <div id="cclass1" style="display:none">
                                    <span><?php echo $lang['m_test_level_i1']; ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $lang['m_label_location']; ?></th>
                            <td id="">
                                <div id="croom1" style="display:none">
                                    <?php echo $lang['m_tphcm']; ?>
                                </div>
                                <div id="croom2" style="display:none">
                                    <?php echo $lang['m_hanoi']; ?>
                                </div>
                                <div id="croom3" style="display:none">
                                    <?php echo $lang['m_dn']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>                    
                </form>       
                <div class="row text-center row-regis-red">
                <button id="bt_register" type="button" class="btn active regis-red"> <?php echo $lang['m_confirm_form']; ?> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/arr.png"></button>
            </div>
            </div>
        </div>
    </div>
    <div style="display:none">
        <div class="container-fluid" id="alert" style="width: 200px; text-align: center">
            <h4 id='msg'></h4>      
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#dob').datetimepicker({
        timepicker:false,
        format:'d-m-Y'
    });
    var success = false;
    $('#bt_submit').on('click', function () {
        $.ajax({
            url: '<?php bloginfo('siteurl') ?>?json=confirm',
            type: 'post',
            data: $('#confirm input[type=\'text\'], #confirm input[type=\'hidden\'], #confirm input[type=\'radio\']:checked'),
            dataType: 'json',
            beforeSend: function () {
                $('#bt_submit').button('loading');
            },
            complete: function () {
                $('#bt_submit').button('reset');
            },
            success: function (json) {
                $('.show-error').remove();
                $('.success').remove();

                if (json['error']) {
                    if (json['error']['er_fullname']) {
                        $('#fullname').after('<div class="show-error">' + json['error']['er_fullname'] + '</div>');
                    }
                    if (json['error']['er_email']) {
                        $('#email').after('<div class="show-error">' + json['error']['er_email'] + '</div>');
                    }
                    if (json['error']['er_id_number']) {
                        $('#id_number').after('<div class="show-error">' + json['error']['er_id_number'] + '</div>');
                    }
                    if (json['error']['er_cellphone']) {
                        $('#cellphone').after('<div class="show-error">' + json['error']['er_cellphone'] + '</div>');
                    }
                    if (json['error']['er_test_level']) {
                        $('#class').after('<div class="show-error">' + json['error']['er_test_level'] + '</div>');
                    }
                    if (json['error']['er_location']) {
                        $('#room').after('<div class="show-error">' + json['error']['er_location'] + '</div>');
                    }
                }
                if (json['success']) {
                    //$('#register').before('<div class="success">' + json['success'] + '</div>');
                    $('#cfullname').html($('#fullname').val());
                    $('#cemail').html($('#email').val());
                    $('#cid_number').html($('#id_number').val());
                    $('#ccellphone').html($('#cellphone').val());
                    $('#cclass1,#cclass2,#cclass3').hide();
                    $('#cclass' + $('#class').val()).show();
                    $('#croom1,#croom2,#croom3').hide();
                    $('#croom' + $('#room').val()).show();                   
                    $.fancybox({
                        href: '#register'
                    });
                }
            }
        });
    });
    $('#bt_register').on('click', function () {
        $.ajax({
            url: '<?php bloginfo('siteurl') ?>?json=register',
            type: 'post',
            data: $('#confirm input[type=\'text\'], #confirm input[type=\'hidden\'], #confirm input[type=\'radio\']:checked'),
            dataType: 'json',
            beforeSend: function () {
                $('#bt_register').button('loading');
            },
            complete: function () {
                $('#bt_register').button('reset');
                $('#bt_submit').button('reset');
            },
            success: function (json) {
                $('.show-error').remove();
                $('.success').remove();

                if (json['error']) {
                    if (json['error']['er_fullname']) {
                        $('#fullname').after('<div class="show-error">' + json['error']['er_fullname'] + '</div>');
                    }
                    if (json['error']['er_email']) {
                        $('#email').after('<div class="show-error">' + json['error']['er_email'] + '</div>');
                    }
                    if (json['error']['er_id_number']) {
                        $('#id_number').after('<div class="show-error">' + json['error']['er_id_number'] + '</div>');
                    }
                    if (json['error']['er_cellphone']) {
                        $('#cellphone').after('<div class="show-error">' + json['error']['er_cellphone'] + '</div>');
                    }
                    if (json['error']['er_test_level']) {
                        $('#class').after('<div class="show-error">' + json['error']['er_test_level'] + '</div>');
                    }
                    if (json['error']['er_location']) {
                        $('#room').after('<div class="show-error">' + json['error']['er_location'] + '</div>');
                    }
                }
                if (json['success']) {
                    //$.fancybox.close();                    
                    //$('#confirm').before('<div class="success">' + json['success'] + '</div>');
                    //alert(json['success']);
                    success = true;
                    $('#msg').html(json['success']);
                    $.fancybox({
                        href: '#alert',
                        afterClose:function () {
                            $.fancybox.close();
                            $('#fullname').val('');
                            $('#email').val('');
                            $('#id_number').val('');
                            $('#cellphone').val('');
                            $('#class1,#class2,#class3').removeClass('add-info-active');                                
                            $('#room1,#room2,#room3').removeClass('add-info-active');
                            $('#class').val('-1');
                            $('#room').val('-1');
                        }
                    });                    
                }
            }
        });
    });
</script>
