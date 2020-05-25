<?php
 $pesan = isset($pesan) ? $pesan : '';
 if($pesan == ''):  ?>
<h4>Maaf halaman yang dituju tidak di temukan . Silahkan ulangi pencarian </h4>
<?php else: ?>
<?= $pesan ?> 
<?php endif; ?>