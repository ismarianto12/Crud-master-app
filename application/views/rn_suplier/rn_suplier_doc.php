 
    <body>
        <h2>Rn_suplier List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Suplier</th>
		<th>Alamat Suplier</th>
		<th>No Hp</th>
		<th>No Rek</th>
		
            </tr><?php
            foreach ($rn_suplier_data as $rn_suplier)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_suplier->nama_suplier ?></td>
		      <td><?php echo $rn_suplier->alamat_suplier ?></td>
		      <td><?php echo $rn_suplier->no_hp ?></td>
		      <td><?php echo $rn_suplier->no_rek ?></td>	
                </tr>
                <?php
            }
            ?>
        