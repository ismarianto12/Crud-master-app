 
    <body>
        <h2>Pencapaian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Bidang</th>
		<th>Nama Pencapaian</th>
		<th>Status Pencapaian</th>
		<th>Komplain</th>
		<th>Tahun Realisasi</th>
		<th>Tahun Mulai</th>
		
            </tr><?php
            foreach ($pencapaian_data as $pencapaian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pencapaian->id_bidang ?></td>
		      <td><?php echo $pencapaian->nama_pencapaian ?></td>
		      <td><?php echo $pencapaian->status_pencapaian ?></td>
		      <td><?php echo $pencapaian->komplain ?></td>
		      <td><?php echo $pencapaian->tahun_realisasi ?></td>
		      <td><?php echo $pencapaian->tahun_mulai ?></td>	
                </tr>
                <?php
            }
            ?>
        