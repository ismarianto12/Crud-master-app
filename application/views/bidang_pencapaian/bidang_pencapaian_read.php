 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Nama Bidang</td><td><?php echo $nama_bidang; ?></td></tr>
	    <tr><td>Tahun Mulai</td><td><?php echo $tahun_mulai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bidang_pencapaian') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>