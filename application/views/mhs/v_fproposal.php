
<?php echo form_open_multipart('c_mhs/proses_inputproposal'); ?>
<div style="min-height: 318px;" class="content-wrapper">
	<form>
	    <div class="container">
	      <section class="content">
	      	<div class="col-md-1"></div>
	      	<div class="col-md-10">
	      		
	      		<div class="box box-default">
		          <div class="box-header with-border">
		            <h3 class="box-title">Formulir Pengajuan Proposal Tugas Akhir</h3>
		            <small>   <?php if (isset($lempar)) {echo $lempar;}?></small>
		          </div>
		          <div class="box-body">

		            <table class="table">
		            	<tr>
		            		<td>Nama</td>
		            		<td><input class="form-control" name="nama_mahasiswa" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>NPM/NIM</td>
		            		<td><input class="form-control" name="npm" type="text" required></td>
		            	</tr>
		            	
		            	<tr>
		            		<td>Konsentrasi</td>
		            		<td>
		            			<select class="form-control" name="konsentrasi" style="width: 100%;">
					                <option value="Applied Database">Applied Database</option>
					                <option value="Applied Networking">Applied Networking</option>
					                <option value="Information Technology">Information Technology</option>
					                <option value="Game dan Multimedia">Game dan Multimedia</option>
					                <option value="Interfacing System">Interfacing System</option>
					            </select>
		            		</td>
		            	</tr>
		            	
		            	<tr>
		            		<td>Topik Tugas Akhir</td>
		            		<td><textarea class="form-control" name="topik_ta" required></textarea></td>
		            	</tr>
		            	
		            	<tr>
		            		<td>Latar Belakang</td>
		            		<td><textarea class="form-control" name="latar_belakang" required></textarea></td>
		            	</tr>

		            	<tr>
		            		<td>Rumusan Masalah</td>
		            		<td><textarea class="form-control" name="rumusan_masalah" required></textarea></td>
		            	</tr>

		            	<tr>
		            		<td>Tujuan</td>
		            		<td><textarea class="form-control" name="tujuan" required></textarea></td>
		            	</tr>

		            	<tr>
		            		<td>Batasan masalah</td>
		            		<td><textarea class="form-control" name="batasan_masalah" required></textarea></td>
		            	</tr>

		            	<tr>
		            		<td>Metodologi penelitian</td>
		            		<td><textarea class="form-control" name="metodologi_penelitian" required></textarea></td>
		            	</tr>

		            	<tr>
		            		<td>Landasan teori dan alur kerja
		            		<br>
					            <small>Lampirkan berupa file MS.Word</small></td>
		            		
		            		<td><input type="file" name="landasan_teori_alur_kerja" required></td>
		            	</tr>
		            </table>
		            
		          </div>
		          <div class="box-footer">
		          	<input type="submit" class="btn btn-info pull-right" value="Kirim">
		          </div>
		        </div>
		        
	      	</div>
	        <div class="col-md-1"></div>
	      </section>
		</div>
	</form>
</div>
<?php echo form_close(); ?>