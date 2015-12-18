<?php $lang = $_SESSION['lang']; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-arrow-circle-up"></i>
        </span>
    </div>

    <div>
        <div id="header">
            <nav class="navbar navbar-default navbar-static-top" id="mNavbar">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-toggle collapsed" id="showLeft">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a href="<?php echo home_url(); ?>/">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/m-jlit-logo.png" class="pos-logo img-responsive" />
                        </a>
                    </div>
                    <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="navbar">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo home_url(); ?>"> <?php echo $lang['m_home_page']; ?></a>
                            </li>
                            <li>
                                <a href="#form-register"> <?php echo $lang['m_register']; ?></a>
                            </li>
                            <li>
                                <a href="#what-jlit"> <?php echo $lang['m_what_is_jlit']; ?> </a>
                            </li>
                            <li>
                                <a href="#content"> <?php echo $lang['m_policy_scope']; ?> </a>
                            </li>
                            <!-- <li class="dropdown">
                               <a ><?php //echo $lang['m_awards'];      ?> </a>
                             </li>
                             <li class="dropdown">
                               <a > <?php //echo $lang['m_jlit_news'];      ?> </a>
                             </li>
                            -->
                            <li>
                                <a href="#message"> <?php echo $lang['m_voice']; ?></a>
                            </li>
                        </ul>
                        <div id="language-flag-mobile">
                            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
                        </div>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>

            <div class="container">
                <div class="row mar-bt-20 mar-t-20 md">
                    <div class="col-sm-8"><a href="<?php echo home_url(); ?>/">
                            <?php
                            global $virtue;
                            if (!empty($virtue['x1_virtue_logo_upload']['url'])) {
                                ?> <div id="thelogo"><img src="<?php echo esc_url($virtue['x1_virtue_logo_upload']['url']); ?>" alt="<?php bloginfo('name'); ?>" class="kad-standard-logo flogo-m jlit-logo img-responsive" />
                                <?php if (!empty($virtue['x2_virtue_logo_upload']['url'])) { ?> 
                                        <?php } ?>
                                </div> <?php
                            } else {
                                bloginfo('name');
                            }
                            ?>
                        </a></div>
                    <div class="col-sm-2 col-md-2"><a href="#"><img class="img-responsive pad-l-40" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/vnw.png"></a></div>
                    <div class="col-sm-2 col-md-2"><a href="#"><img class="img-responsive pad-l-50" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/vir/evo.png"></a></div>
                </div>                
            </div>
            <div id="note" class="container-fluid">
                <nav class="navbar navbar-default navbar-static hei-menu" id="myNavbar" >
                    <div class="container">
                        <!--div class="navbar-header">
                            <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <p class="navbar-brand" data-target=".bs-example-js-navbar-collapse">Menu</p>
                        </div-->
                        <div id="side-nav" class="navbar-collapse bs-example-js-navbar-collapse dis-hide collapse" aria-expanded="false">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="<?php echo home_url(); ?>"> <?php echo $lang['m_home_page']; ?></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#form-register"> <?php echo $lang['m_register']; ?> </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#what-jlit"> <?php echo $lang['m_what_is_jlit']; ?> </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#content"> <?php echo $lang['m_policy_scope']; ?> </a>
                                </li>
                                <!-- <li class="dropdown">
                                   <a ><?php //echo $lang['m_awards'];      ?> </a>
                                 </li>
                                 <li class="dropdown">
                                   <a > <?php //echo $lang['m_jlit_news'];      ?> </a>
                                 </li>
                                -->
                                <li>
                                    <a href="#message"> <?php echo $lang['m_voice']; ?></a>
                                </li>
                            </ul>
                            
                        </div>
                        <div id="language-flag">
                            <?php echo qtranxf_generateLanguageSelectCode('image'); ?>
                        </div>
                    </div>
                    
                    
                </nav>	
            </div>
            <div>
                
            </div>
            
        </div>
