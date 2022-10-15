jQuery('#create-user').submit(function(e){
    e.preventDefault();
    jQuery('#errormsg').html('');
    jQuery.ajax({
        url: "users",
        data:jQuery('#create-user').serialize(),
        type: 'post',
        success: function(result){
            console.log('hellow2')
            console.log(result)
            if(result.status=='error'){
                console.log(result.msg)
                    jQuery('#errormsg').html(result.msg);
                
            }
            if(result.status=='success'){
                
               window.location.href ="users"
            }
        }

    })
})