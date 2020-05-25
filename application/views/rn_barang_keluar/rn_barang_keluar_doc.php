 
    <body>
        <h2>Rn_barang_keluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Transaksi</th>
		<th>Id Barang</th>
		<th>Id Project</th>
		<th>Jumlah Keluar</th>
		<th>Penerima</th>
		<th>Id Admin</th>
		<th>Tanggal Keluar</th>
		<th>Alamat Penerima</th>
		
            </tr><?php
            foreach ($rn_barang_keluar_data as $rn_barang_keluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_barang_keluar->kode_transaksi ?></td>
		      <td><?php echo $rn_barang_keluar->id_barang ?></td>
		      <td><?php echo $rn_barang_keluar->id_project ?></td>
		      <td><?php echo $rn_barang_keluar->jumlah_keluar ?></td>
		      <td><?php echo $rn_barang_keluar->penerima ?></td>
		      <td><?php echo $rn_barang_keluar->id_admin ?></td>
		      <td><?php echo $rn_barang_keluar->tanggal_keluar ?></td>
		      <td><?php echo $rn_barang_keluar->alamat_penerima ?></td>	
                </tr>
                <?php
            }
            ?>
        