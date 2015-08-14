jQuery(document).ready(function($) {
    $("#post-delete").submit(function(){
        var checkedIDs = "";
        var searchIDs = [];

        $("#sortable-table input:checkbox:checked").map(function(){
            checkedIDs += $(this).val() + ",";
            searchIDs.push($(this).val());
        });
        data = {action:'mediatheque_process_results', postids:checkedIDs};
        $.post(ajaxurl,data,function(respone){
            var obj = $.parseJSON(respone);
            if(obj.status=="yes")
            {
                if(searchIDs.length>0){
                    for(var i=0; i<searchIDs.length; i++)
                    {
                        $('#post-' + searchIDs[i]).remove();
                    }
                }
            }
            else{
                alert(obj.des);
            }
        });

        return false;
    });
    $("#post-item-delete-mediatheque").submit(function(){
        var checkedIDs = "";
        var searchIDs = [];

        $("#sortable-table input:checkbox:checked").map(function(){
            checkedIDs += $(this).val() + ",";
            searchIDs.push($(this).val());
        });
        data = {action:'mediatheque_item_process_results', postids:checkedIDs};
        $.post(ajaxurl,data,function(respone){
            var obj = $.parseJSON(respone);
            if(obj.status=="yes")
            {
                if(searchIDs.length>0){
                    for(var i=0; i<searchIDs.length; i++)
                    {
                        $('#post-' + searchIDs[i]).remove();
                    }
                }
            }
            else{
                alert(obj.des);
            }
        });

        return false;
    });
    $(".mediatheque-category_id").change(function(){
        document.location.href="admin.php?page=mediatheque-items-page&cid=" + $(this).val();
    });
});