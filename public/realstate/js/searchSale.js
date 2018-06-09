// search-sale
// search_sale-type
// search_sale-location
// search_sale-beds



$('#find-sale').on('click', function (e) {
    e.preventDefault();
    var type = $('#search_sale-type').val();
    var location = $('#search_sale-location').val();
    var beds = $('#search_sale-beds').val();
    var country = $('#search_sale-country').val()

    var lower = $('#slider-price-sale .noUi-handle-lower .noUi-tooltip').html();
    var upper = $('#slider-price-sale .noUi-handle-upper .noUi-tooltip').html();

    var urlFilters = '/sale?search=true&';

    var referValSale = $('#refer-val-sale').val();

    var urlFiltersRef = '/property/';

    if(referValSale !== '') {
        urlFilters += 'property=' + referValSale;
        window.location.href = urlFilters;
    } else {
        var filters = [];

        if(type !== '' ){
            var t = {
                name: 'type',
                val: type
            }
           filters.push(t);
       }

       if(country !== ''){
        var c = {
            name: 'country',
            val: country
        }
       filters.push(c);
    }

       if(location !== ''){
           var l = {
               name: 'location',
               val: location
           }
          filters.push(l);
       }
       if(beds !== ''){
           var b = {
               name: 'beds',
               val: beds
           }
          filters.push(b);
       }
   
       filters.forEach(function(item){
           urlFilters += item.name+'='+item.val+'&';
       });
       
       if(lower !== ''){
           var lprice = {
            name: 'lower',
            val: lower.replace('₤', '').replace(/,/g , '')
        }
        urlFilters += lprice.name + '=' + lprice.val + '&';
        }
        if(upper !== ''){
            var uprice = {
                name: 'upper',
                val: upper.replace('₤', '').replace(/,/g , '')
            }
            urlFilters += uprice.name + '=' + uprice.val;
        }
       
       window.location.href = urlFilters;
    }
})

// refer-sale-search
// refer-val-sale
//refer-find-btn

// $('#refer-find-btn').on('click', function (e) {
//     e.preventDefault();

//     var referValSale = $('#refer-val-sale').val();
//     console.log(referValSale)

//     var urlFiltersRef = '/property/';

//     if(referValSale !== ''){
//         urlFiltersRef += referValSale
//         console.log(urlFiltersRef)
//         window.location.href = urlFiltersRef;
//     }
    
// })