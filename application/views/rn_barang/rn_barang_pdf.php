 
        <h2>Rn_barang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Harga Beli</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Satuan</th>
		<th>Id Lokasi</th>
		<th>Id Kategori</th>
		<th>Id Suplier</th>
		<th>Tanggal Barang</th>
		<th>Id Admin</th>
		
            </tr><?php
            foreach ($rn_barang_data as $rn_barang)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_barang->kode_barang ?></td>
		      <td><?php echo $rn_barang->nama_barang ?></td>
		      <td><?php echo $rn_barang->harga_beli ?></td>
		      <td><?php echo $rn_barang->harga_jual ?></td>
		      <td><?php echo $rn_barang->stok ?></td>
		      <td><?php echo $rn_barang->satuan ?></td>
		      <td><?php echo $rn_barang->id_lokasi ?></td>
		      <td><?php echo $rn_barang->id_kategori ?></td>
		      <td><?php echo $rn_barang->id_suplier ?></td>
		      <td><?php echo $rn_barang->tanggal_barang ?></td>
		      <td><?php echo $rn_barang->id_admin ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    