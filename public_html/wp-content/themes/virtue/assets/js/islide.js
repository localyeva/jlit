jQuery(document).ready(function(){

    var scripts = document.getElementsByTagName("script");

    var jsFolder = "";

    for (var i= 0; i< scripts.length; i++)

    {

        if( scripts[i].src && scripts[i].src.match(/islide\.js/i))

            jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);

    }

    jQuery("#main-slide").amazingslider({

        jsfolder:jsFolder,

        width:1170,

        height:438,

        skinsfoldername:"",

        watermarkstyle:"text",

        loadimageondemand:false,

        watermarktext:"",

        isresponsive:false,

        autoplayvideo:false,

        watermarkimage:"",

        pauseonmouseover:false,

        watermarktextcss:"font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;padding:2px 4px;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;background-color:#fff;opacity:0.9;filter:alpha(opacity=90);",

        addmargin:true,

        randomplay:false,

        playvideoonclickthumb:true,

        showwatermark:false,

        watermarklinkcss:"text-decoration:none;font:12px Arial,Tahoma,Helvetica,sans-serif;color:#333;",

        slideinterval:5000,

        watermarktarget:"_blank",

        watermarkpositioncss:"display:block;position:absolute;bottom:4px;right:4px;",

        watermarklink:"",

        enabletouchswipe:true,

        transitiononfirstslide:false,

        loop:0,

        autoplay:true,

        navplayvideoimage:"play-32-32-0.png",

        navpreviewheight:60,

        timerheight:2,

        descriptioncssresponsive:"font-size:12px;",

        shownumbering:false,

        skin:"Classic",

        textautohide:true,

        addgooglefonts:false,

        navshowplaypause:true,

        navshowplayvideo:true,

        navshowplaypausestandalonemarginx:8,

        navshowplaypausestandalonemarginy:8,

        navbuttonradius:0,

        navpreviewposition:"top",

        navmarginy:16,

        showshadow:false,

        navfeaturedarrowimagewidth:16,

        navpreviewwidth:120,

        googlefonts:"",

        textpositionmarginright:24,

        bordercolor:"#ffffff",

        navthumbnavigationarrowimagewidth:32,

        navthumbtitlehovercss:"text-decoration:underline;",

        texteffectresponsivesize:600,

        arrowwidth:32,

        texteffecteasing:"easeOutCubic",

        texteffect:"slide",

        navspacing:8,

        playvideoimage:"playvideo-64-64-0.png",

        ribbonimage:"ribbon_topleft-0.png",

        navwidth:24,

        navheight:24,

        arrowimage:"arrows-32-32-0.png",

        timeropacity:0.6,

        titlecssresponsive:"font-size:12px;",

        navthumbnavigationarrowimage:"carouselarrows-32-32-0.png",

        navshowplaypausestandalone:false,

        texteffect1:"slide",

        navpreviewbordercolor:"#ffffff",

        ribbonposition:"topleft",

        navthumbdescriptioncss:"display:block;position:relative;padding:2px 4px;text-align:left;font:normal 12px Arial,Helvetica,sans-serif;color:#333;",

        navborder:4,

        navthumbtitleheight:20,

        textpositionmargintop:24,

        texteffectdelay:500,

        navswitchonmouseover:false,

        navarrowimage:"navarrows-28-28-0.png",

        arrowtop:50,

        textstyle:"static",

        playvideoimageheight:64,

        navfonthighlightcolor:"#666666",

        showbackgroundimage:false,

        navpreviewborder:4,

        navopacity:0.8,

        shadowcolor:"#aaaaaa",

        navbuttonshowbgimage:true,

        navbuttonbgimage:"navbuttonbgimage-28-28-0.png",

        navthumbnavigationarrowimageheight:32,

        textbgcss:"display:none;",

        navpreviewarrowwidth:16,

        playvideoimagewidth:64,

        navshowpreviewontouch:false,

        bottomshadowimagewidth:110,

        showtimer:true,

        navradius:0,

        navshowpreview:true,

        navpreviewarrowheight:8,

        navmarginx:16,

        navfeaturedarrowimage:"featuredarrow-16-8-0.png",

        showribbon:false,

        navstyle:"bullets",

        textpositionmarginleft:24,

        descriptioncss:"display:block; position:relative; font:12px \"Lucida Sans Unicode\",\"Lucida Grande\",sans-serif,Arial; color:#fff; margin-top:8px;",

        navplaypauseimage:"navplaypause-28-28-0.png",

        backgroundimagetop:-10,

        timercolor:"#ffffff",

        numberingformat:"%NUM/%TOTAL ",

        navfontsize:12,

        navhighlightcolor:"#333333",

        texteffectdelay1:1000,

        navimage:"bullet-24-24-0.png",

        texteffectduration1:600,

        navshowplaypausestandaloneautohide:false,

        navbuttoncolor:"#999999",

        navshowarrow:true,

        texteffectslidedirection:"left",

        navshowfeaturedarrow:false,

        lightboxbarheight:48,

        titlecss:"display:block; position:relative; font:bold 14px \"Lucida Sans Unicode\",\"Lucida Grande\",sans-serif,Arial; color:#fff;",

        ribbonimagey:0,

        ribbonimagex:0,

        texteffectslidedistance1:120,

        texteffectresponsive:true,

        navshowplaypausestandaloneposition:"bottomright",

        shadowsize:5,

        arrowhideonmouseleave:1000,

        navshowplaypausestandalonewidth:28,

        navfeaturedarrowimageheight:8,

        navshowplaypausestandaloneheight:28,

        backgroundimagewidth:120,

        navcolor:"#999999",

        navthumbtitlewidth:120,

        texteffectseparate:false,

        arrowheight:32,

        arrowmargin:8,

        texteffectduration:600,

        bottomshadowimage:"bottomshadow-110-95-0.png",

        border:0,

        timerposition:"bottom",

        navfontcolor:"#333333",

        navthumbnavigationstyle:"arrow",

        borderradius:0,

        navbuttonhighlightcolor:"#333333",

        textpositionstatic:"bottom",

        navthumbstyle:"imageonly",

        texteffecteasing1:"easeOutCubic",

        textcss:"display:block; padding:12px; text-align:left;",

        navbordercolor:"#ffffff",

        navpreviewarrowimage:"previewarrow-16-8-0.png",

        showbottomshadow:false,

        texteffectslidedistance:30,

        navdirection:"horizontal",

        textpositionmarginstatic:0,

        backgroundimage:"",

        navposition:"bottom",

        texteffectslidedirection1:"right",

        arrowstyle:"mouseover",

        textformat:"Bottom left",

        bottomshadowimagetop:95,

        textpositiondynamic:"bottomleft",

        navshowbuttons:false,

        navthumbtitlecss:"display:block;position:relative;padding:2px 4px;text-align:left;font:bold 14px Arial,Helvetica,sans-serif;color:#333;",

        textpositionmarginbottom:24,

        fade: {

            duration:1000,

            easing:"easeOutCubic",

            checked:true

        },

        transition:"fade",

        textformat: {



        }

    });

});