
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reservation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Reservation history</li>
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
                <h3 class="card-title">Reservation</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <!--						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                                            <i class="fas fa-times"></i></button>-->
                </div>
            </div>
            <div class="card-body">
                <?php //print_r($history) ?>
                <div class="row">
                    <div class="col-md-12">
                        <table id="tbl2" style="width: 100%" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Res. ID</th>
                                    <th>Hotel name</th>
                                    <th>Room Type</th>
                                    <th>Rooms</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                    <th>Reservation Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($history as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->id?></td>
                                    <td><?= $value->hotel_name?></td>
                                    <td><?= $value->room_type?></td>
                                    <td><?= $value->room_count?></td>
                                    <td><?= $value->startDate?></td>
                                    <td><?= $value->endDate?></td>
                                    <td><?= $value->dateTime?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



            <!-- /.card-body -->
<!--            <div class="card-footer">
                <input type="button" disabled="" class="btn btn-success " style="float: right;" id="reBtn" onclick="makeRevervation()" value="Reserve">

            </div>-->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--<script src="<?php //echo base_url("assets/js/user_home.js")  ?>"></script>-->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $("a").removeClass("active");
        $(".user_history").addClass("active");
         var table = $('#tbl2').DataTable({
        "scrollX": true,
    });
    });
</script>