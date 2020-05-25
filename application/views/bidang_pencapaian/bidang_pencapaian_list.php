 
<div class='col-lg-12' style='background:#fff'>
<div class='box'>
 <div class='box-title'>
  
  <br />   
  <?php echo anchor(site_url('bidang_pencapaian/tambah'), 'Tambah Data', 'class="btn bg-info"'); ?>
  </div>
 <div class='ibox-content'> 
 <?= $this->session->flashdata('message') ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Bidang</th>
		<th>Tahun Mulai</th>
		<th>Action</th>
            </tr><?php
            foreach ($bidang_pencapaian_data as $bidang_pencapaian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $bidang_pencapaian->nama_bidang ?></td>
			<td><?php echo $bidang_pencapaian->tahun_mulai ?></td>
			<td style="text-align:center" width="200px"><div class='btn-group'>
				<?php 
				echo anchor(site_url('bidang_pencapaian/detail/'.$bidang_pencapaian->id_bidang),'Detail','class="btn btn-success"'); 
				echo '  '; 
				echo anchor(site_url('bidang_pencapaian/edit/'.$bidang_pencapaian->id_bidang),'Edit','class="btn btn-info"'); 
				echo '  '; 
				echo anchor(site_url('bidang_pencapaian/hapus/'.$bidang_pencapaian->id_bidang),'Hapus','class="btn btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</div></td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-info">Total Data Yang Tersedia : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('bidang_pencapaian/excel'), 'Excel','class="btn bg-maroon btn-flat margin"'); ?>
		<?php echo anchor(site_url('bidang_pencapaian/word'), 'Word','class="btn bg-maroon btn-flat yellow"'); ?>
		<?php echo anchor(site_url('bidang_pencapaian/pdf'), 'PDF','class="btn bg-maroon btn-flat margin"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
       </div>
     </div>
    </div>
   