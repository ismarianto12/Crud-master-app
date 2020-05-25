 
    <body>
        <h2>Rn_setting List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Parameter</th>
		<th>Nilai</th>
		
            </tr><?php
            foreach ($rn_setting_data as $rn_setting)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rn_setting->parameter ?></td>
		      <td><?php echo $rn_setting->nilai ?></td>	
                </tr>
                <?php
            }
            ?>
        