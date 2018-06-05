$('#search_sale-country').on('change', function () {

    $('.location-any').attr('selected', false);

        $( "#search_sale-location option" ).each(function() {
            if($(this).hasClass('location-any')){
                $(this).attr('selected', true);
            }else{
                $(this).attr('selected', false);
            }
        });


    let classSelect = $(this).val();
    console.log(classSelect)

    if(classSelect == ''){
        $( "#search_sale-location option" ).each(function() {
            $(this).show();
        });
    }else{
        $( "#search_sale-location option" ).each(function() {
            if($(this).hasClass('country-'+classSelect)){
                $(this).show();
                $('.location-any').show();
            }else{
                $(this).hide();
                $('.location-any').show();
            }
        });
    }

    if(classSelect == ''){
        $( ".chosen-results li" ).each(function() {
            $(this).show();
        });
    }else{
        $( ".chosen-results li" ).each(function() {
            if($(this).hasClass('country-'+classSelect)){
                $(this).show();
                $('.location-any').show();
            }else{
                $(this).hide();
                $('.location-any').show();
            }
        });
    }


})



$('#search_rent-country').on('change', function () {

    $('.location-any').attr('selected', false);

        $( "#search_rent-location option" ).each(function() {
            if($(this).hasClass('location-any')){
                $(this).attr('selected', true);
            }else{
                $(this).attr('selected', false);
            }
        });


    let classSelect = $(this).val();
    console.log(classSelect)

    if(classSelect == ''){
        $( "#search_rent-location option" ).each(function() {
            $(this).show();
        });
    }else{
        $( "#search_rent-location option" ).each(function() {
            if($(this).hasClass('country-'+countrID)){
                $(this).show();
                $('.location-any').show();
            }else{
                $(this).hide();
                $('.location-any').show();
            }
        });
    }

});
