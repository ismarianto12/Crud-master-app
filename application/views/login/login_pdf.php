 
        <h2>Login List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Nama</th>
		<th>Level</th>
		<th>Foto</th>
		<th>Email</th>
		<th>Log</th>
		<th>Aktif</th>
		
            </tr><?php
            foreach ($login_data as $login)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $login->username ?></td>
		      <td><?php echo $login->password ?></td>
		      <td><?php echo $login->nama ?></td>
		      <td><?php echo $login->level ?></td>
		      <td><?php echo $login->foto ?></td>
		      <td><?php echo $login->email ?></td>
		      <td><?php echo $login->log ?></td>
		      <td><?php echo $login->aktif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    