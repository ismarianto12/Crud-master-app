 
    <body>
        <h2>Rn_lokasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Lokasi</th>
		<th>Gedung Utama</th>
		<th>Tanggal Lokasi</th>
		
            </tr><?php
            foreach ($rn_lokasi_data as $rn_lokasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_lokasi->nama_lokasi ?></td>
		      <td><?php echo $rn_lokasi->gedung_utama ?></td>
		      <td><?php echo $rn_lokasi->tanggal_lokasi ?></td>	
                </tr>
                <?php
            }
            ?>
        