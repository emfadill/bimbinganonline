
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $hitungpta3; ?></h3>

              <p>Data Proposal Diterima</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
               <h3><?php echo $hitungpta1; ?></h3>

              <p>Data Proposal Tunggu</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <h3><?php echo $hitungpta2; ?></h3>

              <p>Data Proposal Revisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
          
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Proposal Tugas Akhir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Konsentrasi</th>
                  <th>Topik</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datata as $ta) {?>
                <tr>
                  <td><?php echo $ta->id; ?></td>
                  <td><?php echo $ta->npm; ?></td>
                  <td><?php echo $ta->nama_mahasiswa; ?></td>
                  <td><?php echo $ta->konsentrasi; ?></td>
                  <td><?php echo $ta->topik_ta; ?></td>
                 <td><span class="label label-warning"><?php echo $ta->status; ?></span></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
                <a href="<?php echo base_url(); ?>kalab/listpengajuanproposal" type="button" class="btn btn-block btn-default btn-sm">Lihat Selengkapnya</a>
              </div>
              
            </div>
          </div>          
        </div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

