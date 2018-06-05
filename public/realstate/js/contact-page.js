function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

$("#contact-phone").keypress(function (e) {
    if (e.which != 43 && e.which != 41 && e.which != 40 && e.which != 46 && e.which != 45 && e.which != 46 &&
        !(e.which >= 48 && e.which <= 57)) {
        return false;
    }
});


// var contactRecaptchaError = true;

// var contactResponse = function (response) {
//     $('#contact-recaptcha').hide();
//     if (response == '') {
//         contactRecaptchaError = true;
//     } else {
//         contactRecaptchaError = false;
//     }
// };


// var widgetId12;
// var onloadCallback12 = function () {

//     widgetId12 = grecaptcha.render('contact-recaptcha', {
//         'sitekey': '6Le6d1oUAAAAAALuQXyL6Z1oqWd2qg2Er2tp1iPj',
//         'callback': contactResponse
//     });

// };

// contact-name
// contact-email
// contact-phone
// contact-subject
// contact-message

// submit-contact-form

$('#submit-contact-form').on('click', function (e) {
    e.preventDefault();

    let name = $('#contact-name').val();
    let email = $('#contact-email').val();
    let phone = $('#contact-phone').val();
    let subject = $('#contact-subject').val();
    let message = $('#contact-message').val();
    let token = $('[name="_token"]').val();

    let saveEmail = $('#contact-email').val();

    let error = false;

    // console.log(saveEmail);

    // console.log(name, email, phone, subject, message)

    $('#contact-email').on('focus', function () {
        $('#contact-email').attr('placeholder', '');
        $('#contact-email').val(saveEmail);
    })

    if(name == ''){
        $('#contact-name').val('');
        $('#contact-name').attr('placeholder', 'Enter name');
        $('#contact-name').addClass('incorect-input');
        error = true;
    }else{
        $('#contact-name').removeClass('incorect-input');
    }

    if (name.length > 30) {
        $('#contact-name').val('');
        $('#contact-name').attr('placeholder', 'Maximum 30 characters');
        $('#contact-name').addClass('incorect-input');
        error = true;
    }

    if (!validateEmail(email)) {
        $('#contact-email').val('');
        $('#contact-email').attr('placeholder', 'Enter the correct email');
        $('#contact-email').addClass('incorectEmail');
        $('#contact-email').addClass('incorect-input');
        error = true;
    }else{
        $('#contact-email').removeClass('incorect-input');
    }

    if(phone == ''){
        $('#contact-phone').val('');
        $('#contact-phone').attr('placeholder', 'Enter phone');
        $('#contact-phone').addClass('incorect-input');
        error = true;
    }else{
        $('#contact-phone').removeClass('incorect-input');
    }

    if(message == ''){
        $('#contact-message').val('');
        $('#contact-message').attr('placeholder', 'Enter message');
        $('#contact-message').addClass('incorect-input');
        error = true;
    }else{
        $('#contact-message').removeClass('incorect-input');
    }

    if( contactRecaptchaError == true){
        error == true;
    }

    if(error == false){

        // $.ajax({
        //     url: '',
        //     type: 'POST',
        //     data: {
        //         _token: token,
        //         name: name,
        //         email: email,
        //         phone: phone,
        //         subject: subject,
        //         message: message
        //     },
        //     success: function (data) {
        //         if (data.status == 'success') {
        //             $('#contact-name').val('');
        //             $('#contact-name').attr('placeholder', 'Name');
        //             $('#contact-name').removeClass('incorect-input');

        //             $('#contact-email').val('');
        //             $('#contact-email').attr('placeholder', 'Email');
        //             $('#contact-email').removeClass('incorect-input');

        //             $('#contact-phone').val('');
        //             $('#contact-phone').attr('placeholder', 'Phone Number');
        //             $('#contact-phone').removeClass('incorect-input');

        //             $('#contact-subject').val('');
        //             $('#contact-subject').attr('placeholder', 'Subject');
        //             $('#contact-subject').removeClass('incorect-input');

        //             $('#contact-message').val('');
        //             $('#contact-message').attr('placeholder', 'Message');
        //             $('#contact-message').removeClass('incorect-input');

        //             saveEmail = '';
        //             $('#successModal').modal('show')

        //         }

        //     },
        //     error: function (error) {
        //         console.log(error);
        //     }
        // });
    console.log('Name='+name+'-- Email='+email+'--, phone='+phone+'--, subject+'+subject+'--, message='+message)
    $('#successModal').modal('show')
    }




})
