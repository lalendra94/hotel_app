


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Make Reservation</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Make Reservation</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <!--						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                                            <i class="fas fa-times"></i></button>-->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Hotel</label>
                            <select onchange="loadTypes()" class="form-control" id="hotel"> 
                                <option value="">Select Hotel</option>
                                <?php foreach ($hotel_list as $value) { ?>
                                <option value="<?= $value->id; ?>"><?= $value->hotel_name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Room Types</label>
                            <select class="form-control" id="type"> 
                                <option value="">Select Hotel first</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Date</label>
                            <input type="text" class="form-control" id="reservation">                                                

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Room type</th>
                            <th>Guests</th>
                            <th>Price Per/Day</th>
                            </thead>
                            <tbody id="typeTable">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script >
    $(document).ready(function () {
        $("a").removeClass("active");
        $(".dashbord_class").addClass("active");
        $("#hotel").select2({
            theme: 'bootstrap4'
        })
        $('#reservation').daterangepicker({
            minDate: new Date(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        })
    });

    function loadTypes() {
        var hotelId = $("#hotel").val();
    
        if (hotelId == "" || hotelId == null) {
            $('#type').empty();
            $('#typeTable').empty();
            $('#type').append('<option value="">Select Hotel first</option>');
            return false;
        }
        $.ajax({
            url: "<?php echo base_url();?>Hotel_controller/get_hotelType",
            type: "get",
            data: {id: hotelId},
            success: function (data) {
                var arr = JSON.parse(data);
                var optionlist="";
                $('#type').empty();
                $('#typeTable').empty();
                $('#type').append('<option value="">Select Room Type</option>');
                var typeTable
                for(i=0;i<arr.length;i++){
                   $('#type').append('<option value="'+arr[i]["id"]+'">'+arr[i]["room_type"]+'</option>');
                   $('#typeTable').append("<tr><td>"+arr[i]['room_type']+"</td><td>"+arr[i]['px']+"</td><td>"+arr[i]['price']+"</td><tr>");
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
</script>


