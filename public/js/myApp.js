function getProductlines(id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        method: 'POST',
        url: '{{url(' / customers / getProductlines')}}',
        data: {_token: CSRF_TOKEN, 'customer_id': id},
        success: function (response) {
            $("#productline_id").html(response);
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}

function getProjects(id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        method: 'POST',
        url: '{{url(' / customers / getProjects')}}',
        data: {_token: CSRF_TOKEN, 'productline_id': id},
        success: function (response) {
            $("#project_id").html(response);
            console.log(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
