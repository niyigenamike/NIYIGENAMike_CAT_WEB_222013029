 $(function(){


     $('#registration-form').submit(function(e){
        var table = $(this).attr('class');

     alert(table);
        alert("clicked tsted well");
        e.preventDefault();
    /*    var fileInput = document.getElementById('user_image');
var filePath = fileInput.value;
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

if (!allowedExtensions.exec(filePath)) {
    alert('Only image files are allowed (JPEG, PNG, GIF).');
    return false;
}*/

      /*  $('.pop-alert').remove()
        var _this = $(this)
        var el = $('<div>')
        el.addClass("pop-alert alert alert-danger text-light mb-3 rounded-0 px-1 py-2")
        el.hide()*/
     //   start_loader()
        $.ajax({
            url:'http://localhost/schoolAdmin/classes/Users.php?f=register_user&table='+table+'',
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
             /*   _this.prepend(el)
                el.show('slow')
                $('html, body').scrollTop(_this.offset().top - '150')
                end_loader()*/ 
            },
            success:function(resp){
                if(resp.status == 'success'){
                    alert("done well");

                    location.href= './?page='+table+'';
                }else if(!!resp.msg){
                    alert("failded sent");

           /*         el.text(resp.msg)
                    _this.prepend(el)
                    el.show('slow')
                    $('html, body').scrollTop(_this.offset().top - '150')*/
                }else{
                    alert("fail");

                /*    el.text("An error occured while saving data")
                    _this.prepend(el)
                    el.show('slow')
                    $('html, body').scrollTop(_this.offset().top - '150')*/
                }
      //          end_loader()
        //        console

            }
        })
    })
})
 
 function resetForm() {
    document.getElementById("registration-form").reset();
}
 