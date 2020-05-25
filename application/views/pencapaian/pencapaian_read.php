 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Id Bidang</td><td><?php echo $id_bidang; ?></td></tr>
	    <tr><td>Nama Pencapaian</td><td><?php echo $nama_pencapaian; ?></td></tr>
	    <tr><td>Status Pencapaian</td><td><?php echo $status_pencapaian; ?></td></tr>
	    <tr><td>Komplain</td><td><?php echo $komplain; ?></td></tr>
	    <tr><td>Tahun Realisasi</td><td><?php echo $tahun_realisasi; ?></td></tr>
	    <tr><td>Tahun Mulai</td><td><?php echo $tahun_mulai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pencapaian') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>