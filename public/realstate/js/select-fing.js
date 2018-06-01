
$('#search_sale-country').on('change', function () {
    console.log('SELECT');
    $('.select-any').attr('selected', false);

    var countrID = $(this).val();
    console.log(countrID)

    $( ".location-select option" ).each(function() {
        if($(this).hasClass('country-'+countrID)){
            console.log($(this).attr('class'))
            $(this).show();
            console.log(this)
        }else{
            $(this).hide();
            console.log('SULAAAA')
        }
     });

    // if( $(this).val() == 'Spain'){
        
    //     $( ".location-select option" ).each(function( index ) {
    //         if($(this).hasClass('select-any')){
    //             $(this).attr('selected', true);
    //         }else{
    //             $(this).attr('selected', false);
    //         }
    //     });

    //     console.log($(this).val());

        

    // }

    // if( $(this).val() == 'Gibraltar'){
    //     $( ".location-select option" ).each(function( index ) {
    //         if($(this).hasClass('select-any')){
    //             $(this).attr('selected', true);
    //         }else{
    //             $(this).attr('selected', false);
    //         }
    //     });

    //     console.log($(this).val());
    //     // $('.select-any').attr('selected', true);
    //     $('.country-sp').hide();
    //     $('.country-gb').show();
    // }
})




/*------------------------*/ 
$('#search_rent-country').on('change', function () {
    console.log('SELECT');
    $('.select-any').attr('selected', false);

    if( $(this).val() == 'Spain'){

        $( ".location-select option" ).each(function( index ) {
            if($(this).hasClass('select-any')){
                $(this).attr('selected', true);
            }else{
                $(this).attr('selected', false);
            }
        });

        console.log($(this).val());
        // $('.select-any').attr('selected', true);
        $('.country-gb').hide();
        $('.country-sp').show();
    }

    if( $(this).val() == 'Gibraltar'){
        $( ".location-select option" ).each(function( index ) {
            if($(this).hasClass('select-any')){
                $(this).attr('selected', true);
            }else{
                $(this).attr('selected', false);
            }
        });

        console.log($(this).val());
        // $('.select-any').attr('selected', true);
        $('.country-sp').hide();
        $('.country-gb').show();
    }
    
})

// tbs-rent
// tbs-sale

$('.tbs-sale').on('click', function () {
    $('.country-sp').show();
    $('.country-gb').show();
    $('.country-any').attr('selected', true)
})

$('.tbs-rent').on('click', function () {
    $('.country-sp').show();
    $('.country-gb').show();
    $('.country-any').attr('selected', true)
})

// $('#search_rent-location').val('');
// $('#search_rent-country').val('');

//  $('#search_sale-location').val('');
//  $('#search_sale-country').val('')


