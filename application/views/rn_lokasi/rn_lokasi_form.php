
   <div class='row'>
                    <div class='col-md-12'>
                        <div class='panel panel-info'>
                            <div class='panel-heading'><?= ucfirst($judul) ?></div>
<div class='panel-wrapper collapse in' aria-expanded='true'>
                        <div class='panel-body'>
                        <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
    <div class='form-body'> 
     ** ) Harap Isikan data yang di butuhkan pada form.
     <br /><br /><br /><br /> 
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Nama Lokasi<?php echo form_error('nama_lokasi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_lokasi" id="nama_lokasi" placeholder="Nama Lokasi" value="<?php echo $nama_lokasi; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Gedung Utama<?php echo form_error('gedung_utama') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="gedung_utama" id="gedung_utama" placeholder="Gedung Utama" value="<?php echo $gedung_utama; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tanggal Lokasi<?php echo form_error('tanggal_lokasi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tanggal_lokasi" id="tanggal_lokasi" placeholder="Tanggal Lokasi" value="<?php echo $tanggal_lokasi; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_lokasi" value="<?php echo $id_lokasi; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_lokasi') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

       </div>
    </div>
   </div>
 </div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
