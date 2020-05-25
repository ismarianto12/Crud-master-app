 
<div class='col-lg-12' style='background:#fff'>
<div class='box'>
 <div class='box-title'>
  
  <br />   
  <?php echo anchor(site_url('sistem_informasi/tambah'), 'Tambah Data', 'class="btn bg-info"'); ?>
  </div>
 <div class='ibox-content'> 
 <?= $this->session->flashdata('message') ?>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Sistem</th>
		<th>Tahun Develop</th>
		<th>Tahun Selesai</th>
		<th>Status Server</th>
		<th>Action</th>
            </tr><?php
            foreach ($sistem_informasi_data as $sistem_informasi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sistem_informasi->nama_sistem ?></td>
			<td><?php echo $sistem_informasi->tahun_develop ?></td>
			<td><?php echo $sistem_informasi->tahun_selesai ?></td>
			<td><?php echo $sistem_informasi->status_server ?></td>
			<td style="text-align:center" width="200px"><div class='btn-group'>
				<?php 
				echo anchor(site_url('sistem_informasi/detail/'.$sistem_informasi->id_sistem),'Detail','class="btn btn-success"'); 
				echo '  '; 
				echo anchor(site_url('sistem_informasi/edit/'.$sistem_informasi->id_sistem),'Edit','class="btn btn-info"'); 
				echo '  '; 
				echo anchor(site_url('sistem_informasi/hapus/'.$sistem_informasi->id_sistem),'Hapus','class="btn btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('sistem_informasi/excel'), 'Excel','class="btn bg-maroon btn-flat margin"'); ?>
		<?php echo anchor(site_url('sistem_informasi/word'), 'Word','class="btn bg-maroon btn-flat yellow"'); ?>
		<?php echo anchor(site_url('sistem_informasi/pdf'), 'PDF','class="btn bg-maroon btn-flat margin"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
       </div>
     </div>
    </div>
   