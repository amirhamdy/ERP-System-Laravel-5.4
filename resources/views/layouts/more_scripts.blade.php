<script>
    function getPricebooks(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '{{url('/getPricebooks')}}',
            data: {_token: CSRF_TOKEN, 'currency_id': id},
            success: function (response) {
                $.each(response, function (key, value) {
                    var option = $("<option></option>").attr("value", key).text(value);
                    $('#pricebook_id').append(option);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }

    function getProductlines(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '{{url('/getProductlines')}}',
            data: {_token: CSRF_TOKEN, 'customer_id': id},
            success: function (response) {
                $.each(response, function (key, value) {
                    var option = $("<option></option>").attr("value", key).text(value);
                    $('#productline_id').append(option);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }

    function getProjects(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            method: 'POST',
            url: '{{url('/getProjects')}}',
            data: {_token: CSRF_TOKEN, 'productline_id': id},
            success: function (response) {
                $.each(response, function (key, value) {
                    var option = $("<option></option>").attr("value", key).text(value);
                    $('#project_id').append(option);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }

    function calculateJobPrice() {
        document.getElementById("result").style.display = "block";
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var productline_id = document.getElementById("productline_id").value;
        var project_id = document.getElementById("project_id").value;
        var name = document.getElementById("name").value;
        var job_type_id = document.getElementById("job_type_id").value;
        var amount = document.getElementById("amount").value;
        var unit_id = document.getElementById("unit_id").value;
        var source_language = document.getElementById("source_language_id").value;
        var target_language = document.getElementById("target_language_id").value;
        var subject_matter = document.getElementById("subject_matter_id").value;

        /*
                    var minimum = document.getElementById('minimum').checked;
                    var free = document.getElementById('free').checked;
        */

        var arrayData = {
            productline_id: productline_id,
            project_id: project_id,
            name: name,
            job_type_id: job_type_id,
            amount: amount,
            unit_id: unit_id,
            source_language: source_language,
            target_language: target_language,
            subject_matter: subject_matter,
            /*
                            minimum: minimum,
                            free: free
            */
        };

        $.ajax({
            method: 'POST',
            url: '{{url('/calculateJobPrice')}}',
            data: {_token: CSRF_TOKEN, arrayData},
            success: function (response) {
                $("#jobPrice2").html(response);
                /*
                if (response.hasOwnProperty('errors')) {
                    var myHTML = '<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.<br><br><ul>';
                    Object.keys(response.errors).forEach(function (key) {
                        console.log(key + " -> " + response[key]);
                        myHTML += '<li>' + key + " -> " + response[key] + '</li>';
                    });
                    myHTML += '</ul></div>';
                    $("#jobPrice").html(myHTML);
                    alert(myHTML);
                    //console.log(response);
                }
                */
            }
            ,
            error: function (response, jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }
</script>
