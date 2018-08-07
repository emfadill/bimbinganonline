
<?php echo form_open_multipart('c_front/proses_inputta'); ?>
<div style="min-height: 318px;" class="content-wrapper">
	<form>
	    <div class="container">
	      <section class="content">
	      	<div class="col-md-1"></div>
	      	<div class="col-md-10">
	      		
	      		<div class="box box-default">
		          <div class="box-header with-border">
		            <h3 class="box-title">Formulir Pengajuan Tugas Akhir</h3>
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
		            		<td>Tempat Tanggal Lahir</td>
		            		<td>
		            			<div class="col-xs-3">
				                  <input class="form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required>
				                </div>
				                <div class="col-xs-9">
			                      <div class="form-group">
			                        <div class="input-group date">
			                          <div class="input-group-addon">
			                            <i class="fa fa-calendar"></i>
			                          </div>
			                          <input type="text" class="form-control pull-right" id="datepicker2" placeholder="Tanggal Lahir" name="tanggal_lahir" >
			                        </div>
			                      </div> 
				                </div>
		            		</td>
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
		            		<td>Semester</td>
		            		<td>
		            			<select class="form-control" name="semester" style="width: 100%;">
					                <option value="7">7</option>
					                <option value="8">8</option>
					                <option value="9">9</option>
					                <option value="10">10</option>
					                <option value="11">11</option>
					                <option value="12">12</option>
					                <option value="13">13</option>
					                <option value="14">14</option>
					            </select>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>Alamat</td>
		            		<td><textarea class="form-control" name="alamat" required></textarea></td>
		            	</tr>
		            	<tr>
		            		<td>Telepon</td>
		            		<td><input class="form-control" name="telepon" type="text" required></td>
		            	</tr>
		            	<tr>
		            		<td>Email</td>
		            		<td><input class="form-control" name="email" type="email" required></td>
		            	</tr>
		            	<tr>
		            		<td>Topik Tugas Akhir</td>
		            		<td><textarea class="form-control" name="topik_ta" required></textarea></td>
		            	</tr>
		            	<tr>
		            		<td>Usulan Pembimbing</td>
		            		<td>
				                <div class="form-group">
					                <select class="form-control select2" name="pembimbing1" data-placeholder="Usulan Pembimbing 1" style="width: 100%;">
					                	<?php foreach ($listdosen as $dosen) { ?>
					                  	<option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen; ?>"><?php echo $dosen->nama_dosen; ?></option>
					                    <?php } ?>
					                </select>
				            	</div>
				                <div class="form-group">
					                <select class="form-control select2_1" name="pembimbing2" data-placeholder="Usulan Pembimbing 2" style="width: 100%;">
					                	<option>-</option>
					                	<?php foreach ($listdosen as $dosen) { ?>
					                  	<option value="<?php echo $dosen->nid.'|'.$dosen->nama_dosen; ?>"><?php echo $dosen->nama_dosen; ?></option>
					                  	<?php } ?>
					                </select>
				            	</div>
		            		</td>
		            	</tr>
		            	<tr>
		            		<td>Jumlah SKS yang sudah lulus</td>
		            		<td>
		            			<?php $jumlah_sks = 120; ?>
		            			<select class="form-control select2" name="jumlah_sks" placeholder="Untuk mengajukan tugas akhir dibutuhkan 120 SKS lulus" style="width: 100%;">
		            				<?php while ($jumlah_sks<=139) { ?>
		            					<option value="<?php echo $jumlah_sks ?>"><?php echo $jumlah_sks ?></option>	
		            				<?php $jumlah_sks++; } ?>
					            </select>
					            <br>
					            <small>Untuk mengajukan tugas akhir dibutuhkan 139 SKS lulus</small>
		            		</td>
		            	</tr>
		            </table>
		            <br>
		            <h4>Lampiran persyaratan kerja praktek</h4>
		            <table class="table">
		            	<tr>
		            		<td>Foto copy Bukti Pembayaran Kuliah dan FRS (yang mencantumkan Tugas Akhir)</td>
		            		<td><input type="file" name="lampiran1" required></td>
		            	</tr>
		            	<tr>
		            		<td>Daftar Nilai (transkrip akademik) terbaru (yang sudah diverifikasi akademik)</td>
		            		<td><input type="file" name="lampiran2" required></td>
		            	</tr>
		            	<tr>
		            		<td>Proposal Tugas Akhir</td>
		            		<td><input type="file" name="lampiran3" required></td>
		            	</tr>
		            	<tr>
		            		<td>Surat Keterangan Ikut Karya Ilmiah</td>
		            		<td><input type="file" name="lampiran4" required></td>
		            	</tr>
		            	<tr>
		            		<td>Foto Copy Sertifikat TOEFL (score min 400)</td>
		            		<td><input type="file" name="lampiran5" required></td>
		            	</tr>
		            	<tr>
		            		<td>Foto diri ukuran 3x4cm</td>
		            		<td><input type="file" name="lampiran6" required></td>
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