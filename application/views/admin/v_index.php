
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
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Kerja Praktek</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Topik</th>
                  <th>Status</th>
                  <th>Lanjut ke Prodi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datakp as $kp) {?>
                <tr>
                  <td><?php echo $kp->npm; ?></td>
                  <td><?php echo $kp->nama_mahasiswa; ?></td>
                  <td><?php echo $kp->topik_kp; ?></td>
                  <td><?php echo $kp->status; ?></td>
                  <td><?php echo $kp->pass; ?></td>
                  <td><center><a href="<?php echo base_url().'c_admin/aformkp/'.$kp->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a><a href="<?php echo base_url().'c_admin/hapuskp/'.$kp->id.'/'.$kp->lampiran1.'/'.$kp->lampiran2; ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
                <a href="#" type="button" class="btn btn-block btn-default btn-sm">Lihat Selengkapnya</a>
              </div>
              
            </div>
          </div>          
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengajuan Tugas Akhir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Konsentrasi</th>
                  <th>Topik</th>
                  <th>Status</th>
                  <th>Lanjut ke Prodi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datata as $ta) {?>
                <tr>
                  <td><?php echo $ta->npm; ?></td>
                  <td><?php echo $ta->nama_mahasiswa; ?></td>
                  <td><?php echo $ta->konsentrasi; ?></td>
                  <td><?php echo $ta->topik_ta; ?></td>
                  <td><?php echo $ta->status; ?></td>
                  <td><?php echo $ta->pass; ?></td>
                  <td><center><a href="<?php echo base_url().'c_admin/aformta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-pencil"></i></a><a href="<?php echo base_url().'c_admin/hapusta/'.$ta->id.'/'.$ta->lampiran1.'/'.$ta->lampiran2; ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <div class="pull-right">
                <a href="#" type="button" class="btn btn-block btn-default btn-sm">Lihat Selengkapnya</a>
              </div>
              
            </div>
          </div>          
        </div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

