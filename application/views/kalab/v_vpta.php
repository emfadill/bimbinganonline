
  
<?php foreach ($datata as $ta) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengajuan Proposal Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan Tugas Akhir telah di cek dan di review.</h3>
              </div>
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $ta->nama_mahasiswa; ?></td>
                  </tr>
                  <tr>
                    <td>NPM/NIM</td>
                    <td><?php echo $ta->npm; ?></td>
                  </tr>
                  <tr>
                    <td>Konsentrasi</td>
                    <td><?php echo $ta->konsentrasi; ?></td>
                  </tr>
                  <tr>
                    <td>Topik Tugas Akhir</td>
                    <td><?php echo $ta->topik_ta; ?></td>
                  </tr>
                 <tr>
                    <td>Latar Belakang</td>
                    <td><?php echo $ta->latar_belakang; ?></td>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_latar; ?></td>
                  </tr>
                  </tr>
                  <tr>
                    <td>Rumusan Masalah</td>
                    <td><?php echo $ta->rumusan_masalah; ?>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_rumusan; ?></td>
                  </tr>
                  </tr>
                  <tr>
                    <td>Tujuan</td>
                    <td><?php echo $ta->tujuan; ?>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_tujuan; ?></td>
                  </tr>                   
                  </tr>
                  <tr>
                    <td>Batasan Masalah</td>
                    <td><?php echo $ta->batasan_masalah; ?>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_batasan; ?></td>
                  </tr>
                  </tr>

                  <tr>
                    <td>Metodologi Penelitian</td>
                    <td><?php echo $ta->metodologi_penelitian; ?>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_metodologi; ?></td>
                  </tr>
                  </tr>
                  
                    
                </table>
                <br>
                <h4>Lampiran landasan teori dan alur kerja</h4>
                <table class="table">
                  <tr>
                    <td>Landasan teori dan alur kerja</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->landasan_teori_alur_kerja ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> DOWNLOAD</a>
                    <tr>
                    <td>Komentar</td>
                    <td><?php echo $ta->r_landasan; ?></td>
                  </tr>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <a href="<?php echo base_url().'kalab/listpengajuanproposal' ?>" class="btn btn-info pull-left"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
              </div>
            </div>
          </div>
          <div class="col-md-1"></div>       
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php } ?>
