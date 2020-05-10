$(document).ready(function () {
    $("a").removeClass("active");
    $(".dashbord_class").addClass("active");
    $("#hotel").select2({
        theme: 'bootstrap4'
    })
    $('#reservation').daterangepicker({
        minDate: new Date(),
        opens: "left",
        drops: "up",
        locale: {
            format: 'YYYY-MM-DD'

        }
    })
});

function loadTypes() {
    var hotelId = $("#hotel").val();
    disableCheckAvBtn();
    disableReserveBtn();
    if (hotelId == "0") {
        $('#type').empty();
        $('#typeTable').empty();
        $('#type').append('<option value="">Select Hotel first</option>');
        return false;
    }
    $.ajax({
        url: base_url+"Hotel_controller/get_hotelType",
        type: "get",
        data: {id: hotelId},
        success: function (data) {
            var arr = JSON.parse(data);
            var optionlist = "";
            $('#type').empty();
            $('#typeTable').empty();
            $('#type').append('<option value="0">Select Room Type</option>');
            for (i = 0; i < arr.length; i++) {
                $('#type').append('<option value="' + arr[i]["id"] + '">' + arr[i]["room_type"] + '</option>');
                $('#typeTable').append("<tr><td>" + arr[i]['room_type'] + "</td><td>" + arr[i]['px'] + "</td><td>" + arr[i]['price'] + "</td><tr>");
            }
        },
        error: function (jqXhr) {
            if (jqXhr.status == 400) { //Validation error or other reason for Bad Request 400
                var json = $.parseJSON(jqXhr.responseText);
                console.log(json);
            }
        }
    });
}

function roomTypeChange() {
    var type = $("#type").val();
    disableReserveBtn();
    if (type == "0") {
        disableCheckAvBtn();
    } else {
        $("#avBtn").prop('disabled', false);

    }
}

function disableCheckAvBtn() {
    $("#avBtn").prop('disabled', true);
    $("#av_body").empty();
}
function disableReserveBtn() {
    $("#reBtn").prop('disabled', true);
    $("#av_body").empty();
}

function checkAvailability() {
    $("#av_body").empty();
    var type = $("#type").val();
    var rooms = $("#rooms").val();
    var start = $('#reservation').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var end = $('#reservation').data('daterangepicker').endDate.format('YYYY-MM-DD');

    if (type == "" || rooms == "" || rooms == "0") {
        return false;
    }
    var dateArr = getDaysArray(start, end);
//        console.log(dateArr);

    $.ajax({
        url: base_url+"Reservation_controller/checkAvailability_ajx",
        type: "get",
        data: {type_id: type, dateList: dateArr},
        success: function (data) {
            var arr = JSON.parse(data);
            var capacity = arr['capacity'];
//                console.log(arr['availability']);
            var resSt = false;
            for (i = 0; i < arr['availability'].length; i++) {
                var reservations = arr['availability'][i]['reservations'];
                var avl = capacity - reservations;
                if (rooms <= avl) {
                    var style = "style='background: #7dec9fa3;'";
                } else {
                    var style = "style='background: #ec7d7da3;'";
                    resSt = true
                }
                $("#av_body").append("<tr " + style + "><td>" + arr['availability'][i]['date'] + "</td><td>" + avl + "</td></tr>");
            }
            $("#reBtn").prop('disabled', resSt);

        },
        error: function (jqXhr) {
            if (jqXhr.status == 400) { //Validation error or other reason for Bad Request 400
                var json = $.parseJSON(jqXhr.responseText);
                console.log(json);
            }
        }
    });
}

function makeRevervation() {
    var hotelId = $("#hotel").val();
    var roomType = $("#type").val()
    var rooms = $("#rooms").val()
    var start = $('#reservation').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var end = $('#reservation').data('daterangepicker').endDate.format('YYYY-MM-DD');
    var cardNumber = $("#cardNumber").val();
    var eXDate = $("#eXDate").val();
    var cvv = $("#cvv").val();
    var holderName = $("#holderName").val();
    if (cardNumber == "" || eXDate == "" || cvv == "" || holderName == "") {
        Swal.fire(
                'Error!',
                'Enter Card Details!',
                'error'
                );
        return false;
    }

    var data = {
        hotelId: hotelId,
        roomType: roomType,
        rooms: rooms,
        start: start,
        end: end,
        cardNumber: cardNumber,
        eXDate: eXDate,
        cvv: cvv,
        holderName: holderName
    };
    console.log(data)
    $.ajax({
        url: base_url+"Reservation_controller/saveReservation",
        type: "post",
        data: data,
        success: function (data) {
            var st = JSON.parse(data);
            Swal.fire(
                    'Success!',
                    'Reserved success!',
                    'success'
                    );

            $('#typeTable').empty();
            disableReserveBtn();
            disableCheckAvBtn();
            $("#rooms").val("1");
            $("#cardNumber").val("");
            $("#eXDate").val("");
            $("#cvv").val("");
            $("#hotel").val("0");
            $("#hotel").select2({
                theme: 'bootstrap4'
            })
            $("#holderName").val("");
            $('#type').empty();
            $('#type').append('<option value="">Select Hotel first</option>');
        },
        error: function (jqXhr) {
            if (jqXhr.status == 400) { //Validation error or other reason for Bad Request 400
                var json = $.parseJSON(jqXhr.responseText);
                console.log(json);
            }
        }
    });

}

function getDaysArray(start, end) {
    end = new Date(end);
    for (var arr = [], dt = new Date(start); dt <= end; dt.setDate(dt.getDate() + 1)) {
        var formattedDate = moment(new Date(dt)).format('YYYY-MM-DD');
//            console.log(formattedDate);
        arr.push(formattedDate);
    }
    return arr;
}
;