$(document).ready(function () {
    
    $('.myauthform').submit(function (e) { 
        e.preventDefault();

        let form = $(this); 

        let feedback = form.children('.feedback'); 

        let button = form.children('button'); 

        let data = form.serialize(); 

        let url = form.attr('action'); 

        feedback.empty(); 

        $.post(url,data, function ()  {

           return  window.location = 'home'; 

        } ).fail( function (request) {

            let _error = JSON.parse(request.responseText); 

            $.each(_error.errors, function (indexInArray, valueOfElement) { 

                let msg = '<div class="alert alert-danger">'+valueOfElement+'</div>'; 

                feedback.append(msg); 
                 
            });

        } )
        
    });


    $('.myform').submit(function (e) { 
        e.preventDefault();

        let form = $(this); 

        let feedback = form.children('.feedback'); 

        let button = form.children('button'); 

        let data = form.serialize(); 

        let url = form.attr('action'); 

        feedback.empty(); 

        $.post(url,data, function (data)  {

           
            let msg = '<div class="alert alert-info">'+data+'</div>'; 

            feedback.append(msg); 

        } ).fail( function (request) {

            let _error = JSON.parse(request.responseText); 

            $.each(_error.errors, function (indexInArray, valueOfElement) { 

                let msg = '<div class="alert alert-danger">'+valueOfElement+'</div>'; 

                feedback.append(msg); 
                 
            });

        } )
        
    });


    $(".alert").alert();

  


});


