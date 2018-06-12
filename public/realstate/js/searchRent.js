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
    var countryRent = $('#search_rent-country').val();

    var lowerRentPerWeek = $('#price-rent-pw .noUi-handle-lower .noUi-tooltip').html();
    var upperRentPerWeek = $('#price-rent-pw .noUi-handle-upper .noUi-tooltip').html();
    var lowerRentPerMonth = $('#price-rent-pm .noUi-handle-lower .noUi-tooltip').html();
    var upperRentPerMonth = $('#price-rent-pm .noUi-handle-upper .noUi-tooltip').html();

    var urlFilters = '/rent?search=true&';
    var referValrent = $('#refer-val-rent').val();

    var urlFiltersRefRent = '/property/';

    if(referValrent !== ''){
        urlFilters += 'property=' + referValrent;
        window.location.href = urlFilters;
    } else {
        var filters = [];

        if(typeRent !== '' ){
            var t = {
                name: 'type',
                val: typeRent
            }
           filters.push(t);
       }

       if(countryRent !== ''){
        var c = {
            name: 'country',
            val: countryRent
        }
       filters.push(c);
    }

       if(locationRent !== ''){
           var l = {
               name: 'location',
               val: locationRent
           }
          filters.push(l);
       }
       if(bedsRent !== ''){
           var b = {
               name: 'beds',
               val: bedsRent
           }
          filters.push(b);
       }
   
       filters.forEach(function(item){
           urlFilters += item.name+'='+item.val+'&';
       });
       
       if(lowerRentPerWeek !== ''){
           var lpricePw = {
            name: 'lower-per-week',
            val: lowerRentPerWeek.replace('₤', '').replace(/,/g , '')
        }
        urlFilters += lpricePw.name + '=' + lpricePw.val + '&';
        }

        if(upperRentPerWeek !== ''){
            var upricePw = {
                name: 'upper-per-week',
                val: upperRentPerWeek.replace('₤', '').replace(/,/g , '')
            }
            urlFilters += upricePw.name + '=' + upricePw.val + '&';
        }

        if(lowerRentPerMonth !== ''){
            var lpricePm = {
             name: 'lower-per-month',
             val: lowerRentPerMonth.replace('₤', '').replace(/,/g , '')
         }
         urlFilters += lpricePm.name + '=' + lpricePm.val + '&';
         }
         
         if(upperRentPerMonth !== ''){
             var upricePm = {
                 name: 'upper-per-month',
                 val: upperRentPerMonth.replace('₤', '').replace(/,/g , '')
             }
             urlFilters += upricePm.name + '=' + upricePm.val;
         }
       
       window.location.href = urlFilters;
    }
})

// refer-rent-search
// refer-val-rent
//refer-find-btn-rent

// $('#refer-find-btn-rent').on('click', function (e) {
//     e.preventDefault();

//     var referValrent = $('#refer-val-rent').val();
//     console.log(referValrent)

//     var urlFiltersRefRent = '/property/';

//     if(referValrent !== ''){
//         urlFiltersRefRent += referValrent
//         console.log(urlFiltersRefRent)
//         window.location.href = urlFiltersRefRent;
//     }


// })

