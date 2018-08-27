
  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pengajuan Proposal Tugas Akhir</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Konsentrasi</th>
                  <th>Topik</th>
                  <th>Tahun Akademik</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Reviewer</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($datata as $ta) { ?>
                  <tr>
                    <td><?php echo $ta->id; ?></td>
                      <td><?php echo $ta->npm; ?></td>
                      <td><?php echo $ta->nama_mahasiswa; ?></td>
                      <td><?php echo $ta->konsentrasi; ?></td>
                      <td><?php echo $ta->topik_ta; ?></td>
                      <td><?php echo $ta->tahun_akademik_diterima; ?></td>
                      <td><?php echo $ta->semester_diterima; ?></td>
                      <td><?php if ($ta->status == "Tunggu") { ?>
                            <span class="label label-warning"><?php echo $ta->status; ?>
                          <?php } else if ($ta->status == "Revisi") { ?>
                            <span class="label label-danger"><?php echo $ta->status; ?>
                              <?php } else { ?>
                              <span class="label label-success"><?php echo $ta->status; ?>
                          <?php } ?></td>
                      <td><?php echo $ta->dosen; ?></td>
                      <td>
                        <center>
                          <?php if ($ta->status == "Tunggu") { ?>
                            <a class="btn btn-xs bg-navy margin" href="<?php echo base_url().'c_dosen/reviewta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                          <?php } else{ ?>
                            <a class="btn btn-xs bg-olive margin" href="<?php echo base_url().'c_dosen/viewpta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
                          <?php } ?>
                        </center>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
