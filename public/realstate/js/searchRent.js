// search-rent
// search_rent-type
// search_rent-location
// search_rent-beds
//price-rent

$('#find-rent-btn').on('click', function (e) {
    e.preventDefault();
    var typeRent = $('#search_rent-type').val();
    var locationRent = $('#search_rent-location').val();
    var bedsRent = $('#search_rent-beds').val();

    var lowerRent = $('#price-rent .noUi-handle-lower .noUi-tooltip').html();
    var upperRent = $('#price-rent .noUi-handle-upper .noUi-tooltip').html();

    console.log(typeRent, locationRent, bedsRent, lowerRent, upperRent)

    $.ajax({
        url: '',
        type: 'POST',
        data: {
            _token: token,
            typeRent: typeRent,
            locationRent: locationRent,
            bedsRent: bedsRent,
            lowerRent: lowerRent,
            upperRent: upperRent
        },
        success: function(data){


        },
        error: function(error){

        }
    });
})

// refer-rent-search
// refer-val-rent
//refer-find-btn-rent

$('#refer-find-btn-rent').on('click', function (e) {
    e.preventDefault();
    var referValrent = $('#refer-val-rent').val();
    console.log(referValrent)

    $.ajax({
        url: '',
        type: 'POST',
        data: {
            _token: token,
            referValrent: referValrent
        },
        success: function(data){


        },
        error: function(error){

        }
    });

})