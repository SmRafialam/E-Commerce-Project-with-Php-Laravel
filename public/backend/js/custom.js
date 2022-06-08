jQuery(document).ready(function(){
    showAlldata();
    function showAlldata(){
        $.ajax({
            url: 'catshow',
            type: 'GET',
            dataType: 'json',
            success:function(result){
                var sl=1;
                $.each(result.data, function(key, item){
                    jQuery(".tbody").append('<tr>\
                    <td> '+sl+' </td>\
                    <td> '+item.name+' </td>\
                    <td> '+item.description+' </td>\
                    <td> '+item.tag+' </td>\
                    <td> '+item.status+' </td>\
                    <td> <button type="button"  value="'+item.id+'" data-target="#catEditModal" data-toggle="modal" class="btn btn-sm btn-info catedit"><i class="fa fa-edit"></i></button>\
                    </td>\
                </tr>');
                });
                sl++;
            }
        });
    };
    jQuery(document).on('click','.catedit', function(e){
        e.preventDefault();
        var catId=jQuery(this).val();
        $.ajax({
                url:'catedit/'+catId,
                type:'GET',
                dataType:'json',
                success:function(result){
                   if(result.error=="400"){
                      jQuery(".modalmsg").append('<div class="alert alert-danger">'+result.error+'</div>');
                   }
                   else{
                      jQuery("#name").val(result.data.name);
                      jQuery("#description").val(result.data.description);
                      jQuery("#tag").val(result.data.tag);
                      jQuery("#statusvalue").val(result.data.status);
                      jQuery("#statusvalue").text(result.data.status);
                   }
                }
 
         });
           
    });

    jQuery(".addCategory").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
        var name = jQuery(".name").val();
        var description = jQuery(".description").val();
        var tag = jQuery(".tag").val();
        var status = jQuery(".status").val();
        $.ajax({
            url:'catstore',
            type:'POST',
            dataType: 'json',
            data:{
                'name':name,
                'description':description,
                'tag':tag,
                'status':status
            },
            success :function(result){
                if(result.status=="failed"){
                    jQuery(".nameError").text(result.errors.name);
                    jQuery(".desError").text(result.errors.description);
                    jQuery(".tagError").text(result.errors.tag);
                }
                else{
                    jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
                    jQuery(".msg").fadeOut(4000);
                    jQuery("#addCategory").modal('hide');
                    jQuery("#addCategory").find('input').val('');
                    jQuery("#addCategory").find('textarea').val('');
                }
            }
        });
    });
});

// jQuery(document).ready(function(){

   
//     showAlldata();
//     function showAlldata(){
//        $.ajax({
//              url:'catshow',
//              type:'GET',
//              dataType:'json',
//              success:function(result){
//                 var sl=1;
//                 $.each(result.data,function(key,item){
//                     jQuery(".tbody").append('<tr>\
//                     <td>'+sl+'</td>\
//                     <td>'+item.name+'</td>\
//                     <td>'+item.description+'</td>\
//                     <td>'+item.tag+'</td>\
//                     <td>'+item.status+'</td>\
//                     <td>\
//                         <button type="button"  value="'+item.id+'" data-target="#cateditmodal" data-toggle="modal" class="btn btn-sm btn-info catedit"><i class="fa fa-edit"></i></button>\
//                     </td>\
//                   </tr>');
//                 });
//                 sl++;
//              }
//        });
//     };
//     // jQuery(".catedit").click(function(){
//     //    var catId=jQuery(this).val();
//     //    alert(catId);
//     // });
//     jQuery(document).on('click','.catedit', function(e){
//            e.preventDefault();
//            var catId=jQuery(this).val();
//          $.ajax({
//                 url:'catedit/'+catId,
//                 type:'GET',
//                 dataType:'json',
//                 success:function(result){
//                    if(result.error=="400"){
//                       jQuery(".modalmsg").append('<div class="alert alert-danger">'+error.modalmsg+'</div>');
//                    }
//                    else{
//                       jQuery("#name").val(result.data.name);
//                       jQuery("#description").val(result.data.description);
//                       jQuery("#tag").val(result.data.tag);
//                       jQuery("#statusvalue").val(result.data.status);
//                       jQuery("#statusvalue").text(result.data.status);
//                    }
//                 }
 
//          });
           
//     });
//        jQuery(".addcategory").click(function(){
//          $.ajaxSetup({
//              headers: {
//                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//              }
//          });
//             var name=jQuery(".name").val();
//             var description=jQuery(".description").val();
//             var tag=jQuery(".tag").val();
//             var status=jQuery(".status").val();
 
//             $.ajax({
//                url:'catstore',
//                type:'POST',
//                dataType:'json',
//                data:{
//                    'name':name,
//                    'description':description,
//                    'tag':tag,
//                    'status':status
                  
//                },
//                success :function(result){
//                   if(result.status=="faild"){
//                      jQuery(".nameError").text(result.errors.name);
//                      jQuery(".descriptionError").text(result.errors.description);
//                      jQuery(".tagError").text(result.errors.tag);
//                   }
//                   else{
//                         jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
//                         jQuery(".msg").fadeOut(5000);
//                         jQuery("#addcategory").modal('hide');
//                         jQuery("#addcategory").find('input').val('');
//                         jQuery("#addcategory").find('textarea').val('');
 
//                   }
//                }
//             });
            
            
        
//        });
 
       
//           // $('#product_description').summernote();
       
//  });

 