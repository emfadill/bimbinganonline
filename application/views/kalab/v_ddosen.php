
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
                        <a class="btn btn-xs bg-navy margin" href="<?php echo base_url().'c_kalab/editdosen/'.$dosen->id_dosen; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Dosen"><i class="fa fa-pencil"></i></a>
                       <!--  <a onclick="return confirm('Apa anda ini menghapus dosen id=<?php echo $dosen->nama_dosen; ?> ini ?');" href="<?php echo base_url().'c_kalab/hapusdosen/'.$dosen->id_dosen; ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Dosen"><i class="fa fa-trash-o"></i></a> -->
                       <!-- <a onclick="deletedata(<?php echo $dosen->id_dosen ?>)" data-target="#delete"  href="#" data-toggle="tooltip" data-placement="bottom" title="Hapus Dosen"><i class="fa fa-trash-o"></i></a> -->
                        <!-- <button class="btn btn-danger" data-id_dosen="<?php echo $dosen->id_dosen; ?>" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></button> -->
                        <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $dosen->id_dosen;?>"><i class="fa fa-trash-o"></i></a>
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
        <?php 
        foreach($datadosen as $i){
            $id_dosen=$i->id_dosen;
            $nama_dosen=$i->nama_dosen;
            $nid=$i->nid;
            $jenis_bimbingan=$i->jenis_bimbingan;
        ?>

   <!-- ============ MODAL HAPUS BARANG =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $id_dosen;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Hapus Dosen</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'c_kalab/hapusdosen/'.$id_dosen; ?>">
                <div class="modal-body">
                    <p>Anda yakin mau menghapus dosen <b><?php echo $nama_dosen;?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_dosen" value="<?php echo $dosen->id_dosen;?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <?php }?>
    <!--END MODAL HAPUS BARANG--> 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


  


<script>

  // $(document).ready(function(){
  //   $('#delete').on('show.bs.modal', function (event) {
  //     var button = $(event.relatedTarget)
  //     var id_dosen = button.data('id_dosen')
  //     var modal = $(this)
  //     modal.find('.modal-body #id_dosen').val(id_dosen);
  //     })
  // });
  //   function deletedata(id)
  // {
  //   swal({
  //     title: "Anda Yakin?",
  //     text: "Data <?php echo $row->nama_dosen; ?> Akan Dihapus Secara Permanen!",
  //     type: "warning",
  //     showCancelButton: true,
  //     // confirmButtonColor: "#DD6B55",
  //     confirmButtonText: "Yes, delete it!",
  //     closeOnConfirm: false
  //   },
  //   function(){
  //     $.ajax({
  //         url: "<?php echo base_url('c_kalab/hapusdosen') ?>",
  //         type: "post",
  //         data: {id:id},
  //         success:function(){
  //           swal('Data Berhasil Di Hapus', ' ', 'success');
  //           $("#delete").fadeTo("slow", 0.7, function(){
  //             $(this).remove();
  //           })
 
  //         },
  //         error:function(){
  //           swal('data gagal di hapus', 'error');
  //         }
  //     });
       
  //   });
  // }
  </script>
