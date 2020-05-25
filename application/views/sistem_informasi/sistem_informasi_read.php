 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Nama Sistem</td><td><?php echo $nama_sistem; ?></td></tr>
	    <tr><td>Tahun Develop</td><td><?php echo $tahun_develop; ?></td></tr>
	    <tr><td>Tahun Selesai</td><td><?php echo $tahun_selesai; ?></td></tr>
	    <tr><td>Status Server</td><td><?php echo $status_server; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sistem_informasi') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>