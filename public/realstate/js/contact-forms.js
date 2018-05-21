    /* CONTACT FORM FIX */
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    var onloadCallback = function() {
        alert("grecaptcha is ready!");
      };   

    $( document ).ready(function() {
        $('.show-register').on('click', function () {
            $('.Register-Interest').toggleClass('form-active-registr');
            $('.Register-Interest').toggleClass('form-active-mob-reg');
        })
    
        $('.show-collback').on('click', function () {
            $('.Call-Back-wrap').toggleClass('form-active');
            $('.Call-Back-wrap').toggleClass('form-active-mob');
        })
    });

    if(window.innerWidth < 991){
        $('.Register-Interest').removeClass('form-active');
        $('.Call-Back-wrap').removeClass('form-active');


        $('.show-register').on('click', function () {
            $('.Call-Back-wrap').removeClass('form-active');
            $('.Call-Back-wrap').removeClass('form-active-mob');
            
        })
    
        $('.show-collback').on('click', function () {
            $('.Register-Interest').removeClass('form-active-registr');
            $('.Register-Interest').removeClass('form-active-mob-reg');
        })


        // $('.Register-Interest').addClass('form-active-mob');
        // $('.Call-Back-wrap').addClass('form-active-mob');

       }

    // $( window ).resize(function() {
    //    if(window.innerWidth < 991){
    //     $('.Register-Interest').removeClass('form-active');
    //     $('.Call-Back-wrap').removeClass('form-active');
    //    }
    //   });

    /* ---    send-register-form     ---- */

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }


    $('#send-register-form').on('click', function (e) {
        e.preventDefault();

        var regPage = window.location.href;
        var name = $('#register-name').val();
        var email = $('#register-email').val();
        var token = $('[name="_token"]').val();
        var saveEmail = $('#register-email').val();
        var registrError = false;

        $('#register-email').on('focus', function () {
            $('#register-email').attr('placeholder', '');
            $('#register-email').val(saveEmail);
        })

        if(name == ''){
            $('#register-name').val('');
            $('#register-name').attr('placeholder', 'Enter the correct name');
            $('#register-name').addClass('incorect-input');
            registrError = true;
        }

        if( ! validateEmail(email)){
            $('#register-email').val('');
            $('#register-email').attr('placeholder', 'Enter the correct email');
            $('#register-email').addClass('incorectEmail');
            $('#register-email').addClass('incorect-input');
            registrError = true;
        }

        if(registrError == false){

            $.ajax({
                url: '/request/registerinterest',
                type: 'POST',
                data: {
                    _token: token,
                    name: name,
                    email: email,
                    regPage: regPage
                },
                success: function(data){
                    if (data.status == 'success')
                    {
                        $('#register-name').val('');
                        $('#register-name').attr('placeholder', 'Name');
                        $('#register-name').removeClass('incorect-input');
            
                        $('#register-email').val('');
                        $('#register-email').attr('placeholder', 'Email');
                        $('#register-email').removeClass('incorect-input');
            
                        saveEmail = '';
            
                        console.log('registr send')
            
                        $('#successModal').modal('show')
                        
                    }
        
                },
                error: function(error){
                    console.log(error);
                }
            });


        }
        
    })


    /* ---    send-register-form END     ---- */



    /* CALL BACK FORM */

    /* ---    send-register-form     ---- */

   
    $('#send-coll-back').on('click', function (e) {
        e.preventDefault();

        var name = $('#call-back-name').val();
        var phone = $('#call-back-phone').val();
        var backPage = window.location.href;
        var token = $('[name="_token"]').val();
        var registrError = false;

        if(name == ''){
            $('#call-back-name').val('');
            $('#call-back-name').attr('placeholder', 'Enter the correct name');
            $('#call-back-name').addClass('incorect-input');
            registrError = true;
        }

        if(phone == ''){
            $('#call-back-phone').val('');
            $('#call-back-phone').attr('placeholder', 'Enter the correct name');
            $('#call-back-phone').addClass('incorect-input');
            registrError = true;
        }



        if(registrError == false){
            console.log(token);
            $.ajax({
                url: '/request/callback',
                type: 'post',
                // contentType: false,      
                // cache: false,       
                // processData: false,
                data: {
                    _token :token,
                    name: name,
                    phone: phone,
                    backPage: backPage
                },
                success: function(data){
                    if (data.status == 'success')
                    {
                        $('#call-back-name').val('');
                        $('#call-back-name').attr('placeholder', 'Name');
                        $('#call-back-name').removeClass('incorect-input');
            
                        $('#call-back-phone').val('');
                        $('#call-back-phone').attr('placeholder', 'Phone');
                        $('#call-back-phone').removeClass('incorect-input');
                        
                        console.log('call back send')
            
                        $('#successModal').modal('show')
                        
                    }
        
                },
                error: function(error){
                    console.log(error);
                }
            });

        }
        
    })

    /* -- CALL BACK FORM END --*/