 
        <h2>Sistem_informasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Sistem</th>
		<th>Tahun Develop</th>
		<th>Tahun Selesai</th>
		<th>Status Server</th>
		
            </tr><?php
            foreach ($sistem_informasi_data as $sistem_informasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $sistem_informasi->nama_sistem ?></td>
		      <td><?php echo $sistem_informasi->tahun_develop ?></td>
		      <td><?php echo $sistem_informasi->tahun_selesai ?></td>
		      <td><?php echo $sistem_informasi->status_server ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    