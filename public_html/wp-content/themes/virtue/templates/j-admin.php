<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/ex.css" />
<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/show.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jqxcore.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxcore.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxdata.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxbuttons.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxscrollbar.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxmenu.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxgrid.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxgrid.sort.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxgrid.pager.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxgrid.selection.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxgrid.edit.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxdropdownlist.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/js/jqxlistbox.js"></script>
<style type="text/css">
	.fl{float:left;}
	.fl-s{float:left; margin-left: 20px;}
	.title{font-size: 18px; margin-top: 20px; font-weight: bold; border-bottom: #000 solid 2px; padding-bottom: 5px;}
	.c-b{clear:both;}
	.records{margin-top: 30px;}
	.button-group{margin-top: 50px;}
	input[type="button"]:hover{cursor: pointer;}	
</style>
<?php $lock = (j_is_register()==true?'Lock Register':'Unlock register'); ?>

<section>
	<div class="container">
		<div class="title">JLIT Management</div>
		<form action="" class="button-group">
			<div class="fl">
				<input type="button" id="lock-button" value="<?php echo $lock; ?>"/>
			</div>
			<div class="fl-s">
				<input type="button" value="Export to CSV" id="excel-button"/>
			</div>						
		</form>
		<div class="c-b"></div>
		<div class="records c-b " id="records"></div>
	</div>
	
</section>

<script type="text/javascript">	
	$(document).ready(function(){		
		var urlGet = "<?php bloginfo('siteurl'); ?>?json=get_jlit";
	    var source =
	    {
	        datatype: "json",
	        datafields: [                
	        	{ name: 'id_number', type: 'string' },
	            { name: 'fullname', type: 'string' },
	            { name: 'dob', type: 'string' },
	            { name: 'gender', type: 'string' },
	            { name: 'email', type: 'string' },
	            { name: 'cellphone', type: 'string' },
	            { name: 'location', type: 'string' },
	            { name: 'register_date', type: 'string' },
	            { name: 'test_level', type: 'string' },
	        ],

	        url: urlGet
	    };
	    var dataAdapter = new $.jqx.dataAdapter(source, {
	        downloadComplete: function (data, status, xhr) { },
	        loadComplete: function (data) { },
	        loadError: function (xhr, status, error) { }
	    });

	    function getData(){
	        $("#records").jqxGrid(
	        {
	            width: 1270,
	            source: dataAdapter,
	            pageable: true,
	            autoheight: true,
	            sortable: true,
	            altrows: true,
	            selectionmode: 'multiplecellsadvanced',
	            columns: [                                        
	            	{ text: 'ID number', datafield: 'id_number', cellsalign: 'left', align: 'center', width: 150 },
	                { text: 'Full name', datafield: 'fullname', cellsalign: 'left', align: 'center', width: 250 },
	                { text: 'Dob', datafield: 'dob', align: 'center', cellsalign: 'center', width: 120 },
	                { text: 'Gender', datafield: 'gender', align: 'center', cellsalign: 'center', width: 80 },
	                { text: 'Email', datafield: 'email', cellsalign: 'left' ,width: 210, align:'center' },
	                { text: 'Cell phone', datafield: 'cellphone', align:'center',cellsalign: 'center', width: 140 },                    
	                { text: 'Test level', datafield: 'test_level', align:'center',cellsalign: 'center', width: 80 },                    
	                { text: 'Location', datafield: 'location', align:'center',cellsalign: 'center', width: 120 },                    
	                { text: 'Register date', datafield: 'register_date', align:'center',cellsalign: 'center', width: 120 }
	            ]
	        });
	    }
	    getData();
		
	    $('#lock-button').click(function(){
	    	$.ajax({
	    		type:"post",
	    		dataType:"json",
	    		url: "<?php bloginfo('siteurl') ?>?json=lock"
	    	}).done(function(r){
	    		$('#lock-button').val(r);
	    	});
	    });

	    $('#excel-button').click(function(){
	    	location.href = "<?php echo bloginfo('siteurl') ?>?json=excel";
	    });



	});

	        
    
</script>