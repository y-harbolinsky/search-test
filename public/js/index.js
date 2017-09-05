$(document).ready(function () {
    $('#search').click(function (e) {
        e.preventDefault();
        $('#loader').removeClass('hidden');
        $.ajax({
            url: url,
            data: $('#search_form').serialize()
        })
        .success(function (data) {
            $('#results').text('');

            if (data.results) {
                data.results.forEach(function (el, index) {
                    $('#loader').addClass('hidden');

                    var p = '<p class="w-100">' + el.name + ', price: ' + el.price +
                        ', bathrooms: ' + el.bathrooms +
                        ', bedrooms: ' + el.bedrooms +
                        ', garages: ' + el.garages +
                        ', storeys: ' + el.storeys + '</p>';
                    $('#results').append(p);
                });
            } else {
                $('#results').append('<p>' + data.message + '</p>');
            }
        })
        .error(function (error) {
            console.log(error);
        });
    });
});
