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

    var urlFilters = '/rent?';

    // console.log(type, location, beds, lower, upper)

    var filters = [];

     if(typeRent !== '' ){
         var t = {
             name: 'property-type',
             val: typeRent
         }
        filters.push(t);
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
    if(lowerRent !== ''){
        var lprice = {
            name: 'lower',
            val: lowerRent.replace('₤', '')
        }
       filters.push(lprice);
    }
    if(upperRent !== ''){
        var uprice = {
            name: 'upper',
            val: upperRent.replace('₤', '')
        }
       filters.push(uprice);
    }
    // console.log(filters)

    filters.forEach(function(item){
        urlFilters += item.name+'='+item.val+';';
    });
    console.log(urlFilters)

    window.location.href = urlFilters;
})

// refer-rent-search
// refer-val-rent
//refer-find-btn-rent

$('#refer-find-btn-rent').on('click', function (e) {
    e.preventDefault();

    var referValrent = $('#refer-val-rent').val();
    console.log(referValrent)

    var urlFiltersRefRent = '/rent';

    if(referValrent !== ''){
        urlFiltersRefRent += '?refer='+referValrent
        console.log(urlFiltersRefRent)
        window.location.href = urlFiltersRefRent;
    }


})

