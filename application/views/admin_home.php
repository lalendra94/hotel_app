


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Hotel</label>
                            <select class="form-control" id="hotel"> 
                                <option value="All">All</option>
                                <?php foreach ($hotel_list as $value) { ?>
                                    <option value="<?= $value->id; ?>"><?= $value->hotel_name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Reservation Dates</label>
                            <input type="text" onchange="" class="form-control" id="reservation">                                                

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Res. ID</th>
                                    <th>Hotel</th>
                                    <th>Room Type</th>
                                    <th>Guest Name</th>
                                    <th>tel</th>                                    
                                    <th>Rooms</th>
                                    <th>Check in</th>
                                    <th>Check out</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="application/javascript">
    $( document ).ready(function() {
    $("a").removeClass("active");
    $(".dashbord_class").addClass("active");
    
       $("#hotel").select2({
        theme: 'bootstrap4'
    })
    
    
      $('#reservation').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'

        }
    })
    });
   
</script>


