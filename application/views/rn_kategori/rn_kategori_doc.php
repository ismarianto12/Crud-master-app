 
    <body>
        <h2>Rn_kategori List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Kategori</th>
		<th>Tanggal Kategori</th>
		
            </tr><?php
            foreach ($rn_kategori_data as $rn_kategori)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_kategori->nama_kategori ?></td>
		      <td><?php echo $rn_kategori->tanggal_kategori ?></td>	
                </tr>
                <?php
            }
            ?>
        