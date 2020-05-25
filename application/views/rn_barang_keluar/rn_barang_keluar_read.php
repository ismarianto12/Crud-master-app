 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Kode Transaksi</td><td><?php echo $kode_transaksi; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Id Project</td><td><?php echo $id_project; ?></td></tr>
	    <tr><td>Jumlah Keluar</td><td><?php echo $jumlah_keluar; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
	    <tr><td>Id Admin</td><td><?php echo $id_admin; ?></td></tr>
	    <tr><td>Tanggal Keluar</td><td><?php echo $tanggal_keluar; ?></td></tr>
	    <tr><td>Alamat Penerima</td><td><?php echo $alamat_penerima; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rn_barang_keluar') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>