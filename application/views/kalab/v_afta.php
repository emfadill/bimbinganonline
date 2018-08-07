<?php echo form_open('c_kalab/approveta'); ?>
  
<?php foreach ($datata as $ta) { ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengajuan Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Formulir Pengajuan Tugas Akhir telah di cek kelengkapannya.</h3>
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
                  </tr>
                  <tr>
                    <td>Rumusan Masalah</td>
                    <td><?php echo $ta->rumusan_masalah; ?></td>
                  </tr>
                  <tr>
                    <td>Tujuan</td>
                    <td><?php echo $ta->tujuan; ?></td>
                  </tr>
                  <tr>
                    <td>Batasan Masalah</td>
                    <td><?php echo $ta->batasan_masalah; ?></td>
                  </tr>
                  <tr>
                    <td>Metodologi Penelitian</td>
                    <td><?php echo $ta->metodologi_penelitian; ?></td>
                  </tr>
                  <tr>
                    <td>Dosen Reviewer</td>
                    <td>
                      <div class="form-group">
                    
                        <div class="radio">
                          <label>
                            <input name="pembimbing" id="optionsRadios3" value="Dosen Lain" type="radio">
                           Nama Dosen      
                            
                            <select class="form-control pull-right select2" name="dosen" >
                                <option>-</option>
                              <?php foreach ($listdosen as $dosen) { ?>
                                <option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen; ?>"><?php echo $dosen->nama_dosen; ?></option>
                                <?php } ?>
                            </select>                          
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                    
                </table>
                <br>
                <h4>Lampiran landasan teori dan alur kerja</h4>
                <table class="table">
                  <tr>
                    <td>Landasan teori dan alur kerja</td>
                    <td><a href="<?php echo base_url().'files/pengajuanta/'.$ta->landasan_teori_alur_kerja ?>" class="btn btn-block btn-primary btn-sm" target="_blank"><i class="fa fa-download"></i> DOWNLOAD</a></td>
                  </tr>
                </table>

               <!--  <table class="table">
                  <td>Setujui Pengajuan Proposal</td>
                  <td>
                      <div class="form-group">
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios1" value="Diterima" checked="" type="radio">
                            Diterima
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input name="status" id="optionsRadios2" value="Revisi" type="radio">
                            Revisi
                          </label>
                        </div>
                      </div>                    
                  </td>
                </table> -->
              </div>
              <div class="box-footer">
                <input type="hidden" name="id" value="<?php echo $ta->id; ?>">
                <input type="hidden" name="nama_mahasiswa" value="<?php echo $ta->nama_mahasiswa; ?>">
                <input type="hidden" name="npm" value="<?php echo $ta->npm; ?>">
                <input type="hidden" name="konsentrasi" value="<?php echo $ta->konsentrasi; ?>">
                <input type="hidden" name="topik_ta" value="<?php echo $ta->topik_ta; ?>">
                <input type="hidden" name="latar_belakang" value="<?php echo $ta->latar_belakang; ?>">
                <input type="hidden" name="rumusan_masalah" value="<?php echo $ta->rumusan_masalah; ?>">
                <input type="hidden" name="tujuan" value="<?php echo $ta->tujuan; ?>">
                <input type="hidden" name="batasan_masalah" value="<?php echo $ta->batasan_masalah; ?>">
                <input type="hidden" name="metodologi_penelitian" value="<?php echo $ta->metodologi_penelitian; ?>">
                <input type="hidden" name="landasan_teori_alur_kerja" value="<?php echo $ta->landasan_teori_alur_kerja; ?>">
                <input type="submit" class="btn btn-info pull-right" value="Kirim">
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

<?php echo form_close(); ?>