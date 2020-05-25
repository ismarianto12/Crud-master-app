 
    <body>
        <h2>Log_akses List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Akses</th>
		<th>Url</th>
		<th>Waktu Akses</th>
		
            </tr><?php
            foreach ($log_akses_data as $log_akses)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $log_akses->username ?></td>
		      <td><?php echo $log_akses->akses ?></td>
		      <td><?php echo $log_akses->url ?></td>
		      <td><?php echo $log_akses->waktu_akses ?></td>	
                </tr>
                <?php
            }
            ?>
        