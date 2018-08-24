
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
	        	<div class="box">
	            <!-- /.box-header -->
	            <div class="box-body">
	            	<div class="col-md-12">
	            		<table class="table">
	            			<?php echo form_open('c_kalab/exportxlsptasort'); ?>
		            		<tr>
		            			<td class="pull-right"><input type="submit" class="btn btn-info pull-right" value="Ambil Data"></td>
		            			
		            			<td class="pull-right">
									<div class="form-group">
					                  <select name="tahun_akademik_diterima" class="form-control">
					                  	
					                  	<?php foreach ($tahun as $t): ?>
					                  	<option><?php echo $t->thn; ?></option>	
					                  	<?php endforeach ?>
					                    
					                  </select>
					                </div>
		            			</td>
		            			<td class="pull-right">
		            				<div class="form-group">
					                  <select name="semester_diterima" class="form-control">
					                    <option>Ganjil</option>
					                    <option>Genap</option>
					                  </select>
					                </div>
		            			</td>
		            			<td class="pull-left"><h4 class="box-title">Ambil Data Proposal diterima Excel Berdasarkan Tahun Akademik</h4></td>
		            		</tr>
		            		<?php echo form_close(); ?>
		            	</table>
	            	</div>
	            </div>
	            <!-- /.box-body -->
	          </div>    
	        	 <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Tunggu</a></li>
                <li><a href="#tab_2" data-toggle="tab">Revisi</a></li>
                <li><a href="#tab_3" data-toggle="tab">Diterima</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
	          <div class="box">
	          	   <div class="box-tools pull-right">
                  <a href="<?php echo base_url(); ?>c_kalab/exportxlspta" class="btn btn-box-tool ">AMBIL DATA EXCEL</a>
                </div>
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
	                  <th>Reviewer</th>
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
		                  <td><span class="label label-warning"><?php echo $ta->status; ?></span></td>
		                  <td><?php echo $ta->dosen; ?></td>
		                  <td>
		                  	<center>
		                  		<?php if ($ta->status == "Tunggu") { ?>
		                  		
		                  			<a href="<?php echo base_url().'c_kalab/reviewta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-pencil"></i>
		                  			</a> | 
		                  			<a href="<?php echo base_url().'c_kalab/aformta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-share"></i></a>
		                  		<?php } else{ ?>
		                  			<a href="<?php echo base_url().'c_kalab/viewpta/'.$ta->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
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
	      	</div>
	      	<!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-body">
                    <table id="example4" class="table table-bordered table-striped">
                     <thead>
	                <tr>
	                  <th>No</th>
	                  <th>NIM</th>
	                  <th>Nama</th>
	                  <th>Konsentrasi</th>
	                  <th>Topik</th>
	                  <th>Status</th>
	                  <th>Reviewer</th>
	                  <th>Action</th>
	                </tr>
	                </thead>
	                <tbody>
		                <?php foreach ($datata_r as $ta_r) {?>
		                <tr>
		                  <td><?php echo $ta_r->id; ?></td>
		                  <td><?php echo $ta_r->npm; ?></td>
		                  <td><?php echo $ta_r->nama_mahasiswa; ?></td>
		                  <td><?php echo $ta_r->konsentrasi; ?></td>
		                  <td><?php echo $ta_r->topik_ta; ?></td>
		                  <td><span class="label label-danger"><?php echo $ta_r->status; ?></span></td>
		                  <td><?php echo $ta_r->dosen; ?></td>
		                  <td>
		                  	<center>
		                  		<?php if ($ta_r->status == "Tunggu") { ?>
		                  		
		                  			<a href="<?php echo base_url().'c_kalab/reviewta/'.$ta_r->id; ?>"> <i class="glyphicon glyphicon-pencil"></i>
		                  			</a> | 
		                  			<a href="<?php echo base_url().'c_kalab/aformta/'.$ta_r->id; ?>"> <i class="glyphicon glyphicon-share"></i></a>
		                  		<?php } else{ ?>
		                  			<a href="<?php echo base_url().'c_kalab/viewpta/'.$ta_r->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
		                  		<?php } ?>
		                  	</center>
		                  </td>
		                </tr>
		                <?php } ?>
	                </tbody>
                    </table>
                  </div>
                </div>
            </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                <div class="box">
                  <div class="box-body">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
	                <tr>
	                  <th>No</th>
	                  <th>NIM</th>
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
		                <?php foreach ($datata_dt as $ta_dt) {?>
		                <tr>
		                  <td><?php echo $ta_dt->id; ?></td>
		                  <td><?php echo $ta_dt->npm; ?></td>
		                  <td><?php echo $ta_dt->nama_mahasiswa; ?></td>
		                  <td><?php echo $ta_dt->konsentrasi; ?></td>
		                  <td><?php echo $ta_dt->topik_ta; ?></td>
		                  <td><?php echo $ta_dt->tahun_akademik_diterima; ?></td>
		                  <td><?php echo $ta_dt->semester_diterima; ?></td>
		                  <td><span class="label label-success"><?php echo $ta_dt->status; ?></span></td>
		                  <td><?php echo $ta_dt->dosen; ?></td>
		                  <td>
		                  	<center>
		                  		<?php if ($ta_dt->status == "Tunggu") { ?>
		                  		
		                  			<a href="<?php echo base_url().'c_kalab/reviewta/'.$ta_dt->id; ?>"> <i class="glyphicon glyphicon-pencil"></i>
		                  			</a> | 
		                  			<a href="<?php echo base_url().'c_kalab/aformta/'.$ta_dt->id; ?>"> <i class="glyphicon glyphicon-share"></i></a>
		                  		<?php } else{ ?>
		                  			<a href="<?php echo base_url().'c_kalab/viewpta/'.$ta_dt->id; ?>"> <i class="glyphicon glyphicon-search"></i></a>
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

