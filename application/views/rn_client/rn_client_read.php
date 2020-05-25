 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Nama Client</td><td><?php echo $nama_client; ?></td></tr>
	    <tr><td>Perusahaan</td><td><?php echo $perusahaan; ?></td></tr>
	    <tr><td>Divisi</td><td><?php echo $divisi; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tanggal Client</td><td><?php echo $tanggal_client; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rn_client') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>