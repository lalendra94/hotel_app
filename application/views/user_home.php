


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
                <div class="row mb-2">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Hotel</label>
                            <select onchange="loadTypes()" class="form-control" id="hotel"> 
                                <option value="0">Select Hotel</option>
                                <?php foreach ($hotel_list as $value) { ?>
                                    <option value="<?= $value->id; ?>"><?= $value->hotel_name ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>


                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <table class="table table-hover ">
                            <thead>
                            <th>Room type</th>
                            <th>Guests</th>
                            <th>Price Per Day</th>
                            </thead>
                            <tbody id="typeTable">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Room Types</label>
                            <select class="form-control" onchange="roomTypeChange()" id="type"> 
                                <option value="NULL">Select Hotel first</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Reservation Dates</label>
                            <input type="text" onchange="disableReserveBtn()" class="form-control" id="reservation">                                                

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="lable">Number of rooms</label>
                            <input type="number" onchange="disableReserveBtn()" min="1" class="form-control" value="1" id="rooms">                                                

                        </div>

                    </div>
                    <div class="col-md-12 ">
                        <input type="button" disabled=""  class="btn btn-info pull-right"  id="avBtn" style="float: right;" onclick="checkAvailability()" value="Check Availability">
                    </div>
                </div>

                <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Availability</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Rooms available</th>
                                    </tr>
                                </thead>
                                <tbody id="av_body"></tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6" id="card_details">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Credit Card Details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Card Number</label>
                                        <input type="text" id="cardNumber" class="form-control" maxlength="16" placeholder="xxxxxxxxxxxxxxxx">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <input type="text" id="eXDate" class="form-control" placeholder="MM/YY">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CVV</label>
                                        <input type="text" id="cvv" maxlength="3" class="form-control" placeholder="xxx">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Card holder's Name</label>
                                        <input type="text" id="holderName" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            </div>



            <!-- /.card-body -->
            <div class="card-footer">
                <input type="button" disabled="" class="btn btn-success " style="float: right;" id="reBtn" onclick="makeRevervation()" value="Reserve">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="<?php echo base_url("assets/js/user_home.js") ?>"></script>


