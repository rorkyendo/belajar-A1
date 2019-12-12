<div class="container">
  <div class="row">
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel panel-heading">
          <?php echo $subtitle;?>
        </div>
        <div class="panel panel-body">
          <?php echo $this->session->flashdata('notif');?>
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="DataTables">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Fakultas</th>
                  <th>Prodi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswa as $key): ?>
                <tr>
                  <td><?php echo $key->nim;?></td>
                  <td><?php echo $key->nama_lengkap;?></td>
                  <td><?php echo $key->alamat;?></td>
                  <td><?php echo $key->fakultas;?></td>
                  <td><?php echo $key->prodi;?></td>
                  <td>
                    <button type="button" onclick="detail('<?php echo $key->nim;?>')" class="btn btn-xs btn-info">Detail</button>
                    <button type="button" onclick="edit('<?php echo $key->nim;?>')" class="btn btn-xs btn-warning">Edit</button>
                    <button type="button" onclick="deleteData('<?php echo $key->nim;?>')" class="btn btn-xs btn-danger">Hapus</button>
                    <a onclick="return confirm('Apakah kamu yakin akan menghapus data mahasiswa dengan NIM <?php echo $key->nim;?> ?')" href="<?php echo base_url('mahasiswa/deleteMahasiswa?nim='.$key->nim);?>" class="btn btn-xs btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
$(document).ready( function () {
  $('#DataTables').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'colvis',
        'excel',
        'print'
    ]
  });
} );
</script> -->

<script type="text/javascript">
  function deleteData(nim){
    Swal.fire({
      title: 'Kamu Yakin akan menghapus data dengan NIM '+nim+'?',
      text: "Data yang sudah kamu hapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'YA, Hapus!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url:'<?php echo base_url('mahasiswa/deleteMahasiswa');?>',
          type:'GET',
          data:'nim='+nim,
          success:function(){
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            setInterval(function(){location.reload()},5000);
          },error:function(){
            alert('Ada yang error');
          }
        })
        //end of ajax
      }
      //end of if
    })
    //end of swal
  }
  //end of function
</script>
