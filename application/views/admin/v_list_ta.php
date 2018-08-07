
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Tugas Akhir
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
	    <div class="row">
	    	<div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Tugas Akhir</h3>

	              <div class="box-tools">
	                <a href="<?php echo base_url(); ?>admin/tambahta" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus"></i> TAMBAH DATA TUGAS AKHIR</a>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example3" class="table table-bordered table-striped">
	                <thead>
	                
	                <tr>
	                  <th>No</th>
	                  <th>NPM</th>
	                  <th>Nama</th>
	                  <th>Konsentrasi</th>
	                  <th>Topik</th>
	                  <th>Dosen Pembimbing</th>
	                  <th>Status</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
	                <?php foreach ($datata as $ta) { ?>
	                <tr>
	                  <td><?php echo $ta->id_ta; ?></td>
	                  <td><?php echo $ta->npm; ?></td>
	                  <td><?php echo $ta->nama_mahasiswa; ?></td>
	                  <td><?php echo $ta->konsentrasi; ?></td>
	                  <td><?php echo $ta->topik_ta; ?></td>
	                  <td><?php echo $ta->pembimbing_ta; ?></td>
	                  <td><?php echo $ta->status; ?></td>
	                  <td><center><a href="<?php echo base_url().'c_admin/viewta/'.$ta->id_ta; ?>"> <i class="glyphicon glyphicon-search"></i></a><a onclick="return confirm('Apa anda ini menghapus data tugas akhir id=<?php echo $ta->id_ta; ?> ini ');" href="<?php echo base_url().'c_admin/hapusdta/'.$ta->id_ta; ?>"> <i class="glyphicon glyphicon-trash"></i></a></center></td>
	                </tr>
	                <?php } ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	          </div>    
			</div>
	    </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

