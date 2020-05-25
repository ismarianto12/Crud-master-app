 
    <body>
        <h2>Bidang_pencapaian List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Bidang</th>
		<th>Tahun Mulai</th>
		
            </tr><?php
            foreach ($bidang_pencapaian_data as $bidang_pencapaian)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $bidang_pencapaian->nama_bidang ?></td>
		      <td><?php echo $bidang_pencapaian->tahun_mulai ?></td>	
                </tr>
                <?php
            }
            ?>
        