 
    <body>
        <h2>Rn_purchase List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Purchase</th>
		<th>Suplier</th>
		<th>Alamat Sup</th>
		<th>Id Barang</th>
		<th>Tanggal Purchase</th>
		<th>Detail</th>
		<th>Jumlah</th>
		
            </tr><?php
            foreach ($rn_purchase_data as $rn_purchase)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_purchase->kode_purchase ?></td>
		      <td><?php echo $rn_purchase->suplier ?></td>
		      <td><?php echo $rn_purchase->alamat_sup ?></td>
		      <td><?php echo $rn_purchase->id_barang ?></td>
		      <td><?php echo $rn_purchase->tanggal_purchase ?></td>
		      <td><?php echo $rn_purchase->detail ?></td>
		      <td><?php echo $rn_purchase->jumlah ?></td>	
                </tr>
                <?php
            }
            ?>
        