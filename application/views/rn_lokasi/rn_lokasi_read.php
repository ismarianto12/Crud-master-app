 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Nama Lokasi</td><td><?php echo $nama_lokasi; ?></td></tr>
	    <tr><td>Gedung Utama</td><td><?php echo $gedung_utama; ?></td></tr>
	    <tr><td>Tanggal Lokasi</td><td><?php echo $tanggal_lokasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rn_lokasi') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>