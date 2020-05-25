 
<div class='col-lg-12' style='background:#fff'>
<div class='box'>
 <div class='box-title'>
  
  <br />   
  <?php echo anchor(site_url('pencapaian/tambah'), 'Tambah Data', 'class="btn bg-info"'); ?>
  </div>
 <div class='ibox-content'> 
 <?= $this->session->flashdata('message') ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Bidang</th>
		<th>Nama Pencapaian</th>
		<th>Status Pencapaian</th>
		<th>Komplain</th>
		<th>Tahun Realisasi</th>
		<th>Tahun Mulai</th>
		<th>Action</th>
            </tr><?php
            foreach ($pencapaian_data as $pencapaian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pencapaian->id_bidang ?></td>
			<td><?php echo $pencapaian->nama_pencapaian ?></td>
			<td><?php echo $pencapaian->status_pencapaian ?></td>
			<td><?php echo $pencapaian->komplain ?></td>
			<td><?php echo $pencapaian->tahun_realisasi ?></td>
			<td><?php echo $pencapaian->tahun_mulai ?></td>
			<td style="text-align:center" width="200px"><div class='btn-group'>
				<?php 
				echo anchor(site_url('pencapaian/detail/'.$pencapaian->id_pencapaian),'Detail','class="btn btn-success"'); 
				echo '  '; 
				echo anchor(site_url('pencapaian/edit/'.$pencapaian->id_pencapaian),'Edit','class="btn btn-info"'); 
				echo '  '; 
				echo anchor(site_url('pencapaian/hapus/'.$pencapaian->id_pencapaian),'Hapus','class="btn btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('pencapaian/excel'), 'Excel','class="btn bg-maroon btn-flat margin"'); ?>
		<?php echo anchor(site_url('pencapaian/word'), 'Word','class="btn bg-maroon btn-flat yellow"'); ?>
		<?php echo anchor(site_url('pencapaian/pdf'), 'PDF','class="btn bg-maroon btn-flat margin"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
       </div>
     </div>
    </div>
   