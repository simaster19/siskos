<?php







$totalAdmin = totalDataAdmin();
$totalKost  = totalKost();
$totalUserPublic = totalUserPublic();
$totalMember = totalMember();




?>


<div class="container-fluid">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Admin</span>
          <span class="info-box-number">
            <?= $totalAdmin ?>
            <!-- <small>%</small> -->
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-home"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data Kost</span>
          <span class="info-box-number"><?= $totalKost; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Data User</span>
          <span class="info-box-number"><?= $totalUserPublic; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Member</span>
          <span class="info-box-number"><?= $totalMember; ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->

  <!-- Left col -->

  <!-- MAP & BOX PANE -->

  <!-- <div class="row">
              
            
               <div class="col-md-">
           
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Bar Chart
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div id="bar-chart" style="height: 300px;"></div>
                    </div>
                 
                  </div>
              
                  </div>
            </div> -->



  <!-- /.col -->




  <!-- /.row -->
</div>
<!--/. container-fluid -->