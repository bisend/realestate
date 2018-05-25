// search-sale
// search_sale-type
// search_sale-location
// search_sale-beds

$('#find-sale').on('click', function (e) {
    e.preventDefault();
    var type = $('#search_sale-type').val();
    var location = $('#search_sale-location').val();
    var beds = $('#search_sale-beds').val();

    var lower = $('#slider-price-sale .noUi-handle-lower .noUi-tooltip').html();
    var upper = $('#slider-price-sale .noUi-handle-upper .noUi-tooltip').html();

    console.log(type, location, beds, lower, upper)

    $.ajax({
        url: '/search/sale',
        type: 'POST',
        data: {
            _token: $('[name="_token"]').val(),
            type: type,
            location: location,
            beds: beds,
            lower: lower,
            upper: upper
        },
        success: function(data){


        },
        error: function(error){

        }
    });
})

// refer-sale-search
// refer-val-sale
//refer-find-btn

$('#refer-find-btn').on('click', function (e) {
    e.preventDefault();

    var referValSale = $('#refer-val-sale').val();
    console.log(referValSale)


    $.ajax({
        url: '',
        type: 'POST',
        data: {
            _token: token,
            referValSale: referValSale
        },
        success: function(data){


        },
        error: function(error){

        }
    });
    
})