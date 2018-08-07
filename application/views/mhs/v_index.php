 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Pengajuan Proposal Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
          <div class="col-xs-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Proposal Tugas Akhir</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <div class="box">
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Konsentrasi</th>
                        <th>Topik</th>
                        <th>Status</th>
                        <th>Action</th>
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
                        <td><?php echo $ta->status; ?></td>
                        <td>
                        <center>
                            <a href="<?php echo base_url().'c_mhs/viewppro/'.$ta->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
                          <!-- <a onclick="return confirm('Apa anda ingin menghapus data pengajuan id=<?php echo $ta->id; ?> ini ');" href="<?php echo base_url().'c_mhs/hapuspro/'.$ta->id.'/'.$ta->$landasan_teori_alur_kerja ?>"> <i class="glyphicon glyphicon-trash"></i></a> -->
                        </center>
                      </td>
                      </tr>
                      <?php } ?>       
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                </div>
                <!-- /.tab-pane -->
                
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->