 
    <body>
        <h2>Tmp_purchase List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Barang</th>
		<th>Jumlah</th>
		
            </tr><?php
            foreach ($tmp_purchase_data as $tmp_purchase)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tmp_purchase->id_barang ?></td>
		      <td><?php echo $tmp_purchase->jumlah ?></td>	
                </tr>
                <?php
            }
            ?>
        