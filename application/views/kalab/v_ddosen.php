
  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Dosen</h3>
              <div class="pull-right"><a href="<?php echo base_url().'kalab/tambahdosen'; ?>" type="button" class="btn btn-block btn-default btn-sm"><i class="fa fa-plus"></i> Tambah Data Dosen</a></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Dosen</th>
                    <th>NID</th>
                    <th>Jenis Bimbingan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($datadosen as $dosen) {?>
                    <tr>
                      <td><?php echo $dosen->nama_dosen; ?></td>
                      <td><?php echo $dosen->nid; ?></td>
                      <td><?php echo $dosen->jenis_bimbingan; ?></td>
                      <td>
                      <center>
                        <a href="<?php echo base_url().'c_kalab/editdosen/'.$dosen->id_dosen; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Dosen"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Apa anda ini menghapus dosen id=<?php echo $dosen->nama_dosen; ?> ini ?');" href="<?php echo base_url().'c_kalab/hapusdosen/'.$dosen->id_dosen; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Dosen"><i class="fa fa-trash-o"></i></a>
                       <!-- <a onclick="deletedata(<?php echo $dosen->id_dosen ?>)" href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus Dosen"><i class="fa fa-trash-o"></i></a> -->
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

  <script>
    function deletedata(id)
  {
    swal({
      title: "Anda Yakin?",
      text: "Data <?php echo $row->nama_dosen; ?> Akan Dihapus Secara Permanen!",
      type: "warning",
      showCancelButton: true,
      // confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
          url: "<?php echo base_url('c_kalab/hapusdosen') ?>",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Data Berhasil Di Hapus', ' ', 'success');
            $("#delete").fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
 
          },
          error:function(){
            swal('data gagal di hapus', 'error');
          }
      });
       
    });
  }
  </script>
