 
    <body>
        <h2>Rn_client List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Client</th>
		<th>Perusahaan</th>
		<th>Divisi</th>
		<th>No Telp</th>
		<th>Alamat</th>
		<th>Tanggal Client</th>
		
            </tr><?php
            foreach ($rn_client_data as $rn_client)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_client->nama_client ?></td>
		      <td><?php echo $rn_client->perusahaan ?></td>
		      <td><?php echo $rn_client->divisi ?></td>
		      <td><?php echo $rn_client->no_telp ?></td>
		      <td><?php echo $rn_client->alamat ?></td>
		      <td><?php echo $rn_client->tanggal_client ?></td>	
                </tr>
                <?php
            }
            ?>
        