/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    // const sidebarToggle = document.body.querySelector('#sidebarToggle');
    // if (sidebarToggle) {
    //     // Uncomment Below to persist sidebar toggle between refreshes
    //     // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     //     document.body.classList.toggle('sb-sidenav-toggled');
    //     // }
    //     sidebarToggle.addEventListener('click', event => {
    //         event.preventDefault();
    //         document.body.classList.toggle('sb-sidenav-toggled');
    //         localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    //     });
    // }

});

$(function(){
    var current = window.location.href;

    $('#sidebar-main nav a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href') == current){
            $this.css({"background-color": "#164384"});
            $this.parent('.nav').parent('.collapse').addClass('show');

        }
    })

    var theTotal = 0;

    $('#addexp').click(function(e){


        $('#totalitemfoot').css('opacity','1');

        var amount = $.trim($('#amount').val());
        if(amount != '' ){
            if(!isNaN(amount)){
                var ref = $('#ref').val()
                var expense = $('#expense').val()

                theTotal = Number(theTotal) + Number(amount);
                $('#itemdata').append(`<tr><td style="width:40px; text-align:center"></td><td>${expense}<input type="hidden" name="expensehead[]" value="${expense}"></td><td class ="thisamount">${amount}</td><td>${ref}</td><td class="removedata" style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></td></tr>`);
                $('#amount').val("");
                $('#ref').val("");
                $('#expense').val("");
                $('#totalamount').text(theTotal);
                $('#totalvalue').val(theTotal);


                updateSerial();
            }
        }
    });

    $('#itemdata').on('click','.removedata',function(){
        var currentamount = $(this).closest('tr').find('.thisamount').html();
        theTotal = Number(theTotal) - Number(currentamount);
        $('#totalamount').text( theTotal);
        $(this).closest('tr').remove();


        updateSerial();
    });

    //update the serial no
    function updateSerial(){

        var table = document.getElementById("create_expanse_table");
        var rowcountAfterDelete = document.getElementById("create_expanse_table").rows.length -1;
        for(var i=1;i<rowcountAfterDelete;i++){
            table.rows[i].cells[0].innerHTML=i;
        }
    }




})
