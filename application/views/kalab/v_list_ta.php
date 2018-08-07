
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
	                  <td><center><a href="<?php echo base_url().'c_prodi/viewta/'.$ta->id_ta; ?>"> <i class="glyphicon glyphicon-search"></i></a></center></td>
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

