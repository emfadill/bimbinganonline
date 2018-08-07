
  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
      <strong>Copyright &copy; 2018 <a href="#">RRoger</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<!-- SweetAlert -->
<script src="<?php echo base_url(); ?>dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>dist/sweetalert.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url(); ?>bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url(); ?>bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url(); ?>bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url(); ?>bower_components/Flot/jquery.flot.categories.js"></script>
<!-- page script -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script>
  $(function () {
    $(".select2").select2();
    $("#example1").DataTable({
        "order": [[ 0, "desc" ]]
    });
    $("#example3").DataTable({
        "order": [[ 0, "desc" ]]
    });
    $("#example4").DataTable({
        "order": [[ 0, "desc" ]]
    });
    $('#example2').DataTable({
      "paging": true,
      "order": [[ 0, "desc" ]],
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker5').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker6').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker7').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: false,
      showMeridian:false,
      format: 'HH:mm'
    });
  

  var donutData = [
      { label: 'Series2', data: 30, color: '#3c8dbc' },
      { label: 'Series3', data: 20, color: '#0073b7' },
      { label: 'Series4', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })

    });

  /*function deletedata(id)
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
  }*/

</script>
</body>
</html>
