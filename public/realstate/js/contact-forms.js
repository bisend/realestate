    /* CONTACT FORM FIX */
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $( document ).ready(function() {
        $('.show-register').on('click', function () {
            $('.Register-Interest').toggleClass('form-active');
            $('.Register-Interest').toggleClass('form-active-mob');
        })
    
        $('.show-collback').on('click', function () {
            $('.Call-Back-wrap').toggleClass('form-active');
            $('.Call-Back-wrap').toggleClass('form-active-mob');
        })
    });

    if(window.innerWidth < 991){
        $('.Register-Interest').removeClass('form-active');
        $('.Call-Back-wrap').removeClass('form-active');

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

        $('.incorectEmail').on('focus', function () {
            $('.incorectEmail').val(saveEmail);
        })

        var name = $('#register-name').val();
        var email = $('#register-email').val();

        var saveEmail = $('#register-email').val();
        var registrError = false;

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
            $('#register-name').val('');
            $('#register-name').attr('placeholder', 'Name');
            $('#register-name').removeClass('incorect-input');

            $('#register-email').val('');
            $('#register-email').attr('placeholder', 'Email');
            $('#register-email').removeClass('incorect-input');

            saveEmail = '';

            console.log('registr send')
        }
        
    })


    /* ---    send-register-form END     ---- */



    /* CALL BACK FORM */

    /* ---    send-register-form     ---- */

   
    $('#send-coll-back').on('click', function (e) {
        e.preventDefault();

        var name = $('#call-back-name').val();
        var phone = $('#call-back-phone').val();

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
            $('#call-back-name').val('');
            $('#call-back-name').attr('placeholder', 'Name');
            $('#call-back-name').removeClass('incorect-input');

            $('#call-back-phone').val('');
            $('#call-back-phone').attr('placeholder', 'Phone');
            $('#call-back-phone').removeClass('incorect-input');
            
            console.log('call back send')

        }
        
    })

    /* -- CALL BACK FORM END --*/