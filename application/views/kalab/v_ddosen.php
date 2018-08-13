
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
                       <!-- <a onclick="deletedata(<?php echo $dosen->id_dosen ?>)" data-target="#delete"  href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus Dosen"><i class="fa fa-trash-o"></i></a> -->
                       <!--  <button class="btn btn-danger" data-id_dosen="<?php echo $dosen->id_dosen; ?>" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></button> -->
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
<!-- Modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="" method="post">
            
          <div class="modal-body">
                <p class="text-center">
                    Are you sure you want to delete this?
                </p>
                <input type="hidden" name="id_dosen" id="id_dosen" value="">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
          </div>
      </form>
    </div>
  </div>
   </div> 


<script>

  $(document).ready(function(){
    $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id_dosen = button.data('id_dosen')
      var modal = $(this)
      modal.find('.modal-body #id_dosen').val(id_dosen);
      })
  });
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
