jQuery(document).ready(function(){
    jQuery('.addCategory').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = jQuery("name").val();
        var des = jQuery("des").val();
        var tag = jQuery("tag").val();
        var status = jQuery("status").val();
        $.ajax({
            url:'catstore',
            type:'POST',
            dataType: 'json',
            data:{
                'name':name,
                'des':des,
                'tag':tag,
                'status':status
            },
            success :function(result){
                if(result.status=="failed"){
                    jQuery(".nameError").text(result.errors.name);
                }
            }
        });

    });
});