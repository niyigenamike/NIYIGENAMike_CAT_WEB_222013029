/*Add all data in the database*/

$(function(){


    $('#registration-form').submit(function(e){
       var table = $(this).attr('class');

       e.preventDefault();
       $.ajax({
           url:'../classes/Users.php?f=register_user&table='+table+'',
           data: new FormData($(this)[0]),
           cache: false,
           contentType: false,
           processData: false,
           method: 'POST',
           type: 'POST',
           dataType: 'json',
           error:err=>{ 
               console.log(err);
            //   el.text("An error occured while saving data")
            alert(err);
           },
           success:function(resp){
               if(resp.status == 'success'){
                   alert("done well");

                   location.href= './?page='+table+'';
               }else if(!!resp.msg){
                   alert("failded sent");

               }else{
                   alert("fail");
               }

           }
       })
   })
})

function resetForm() {
   document.getElementById("registration-form").reset();
}
