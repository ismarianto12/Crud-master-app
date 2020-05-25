
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
            <label for="varchar" class='control-label col-md-3'><b>Nama Client<?php echo form_error('nama_client') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_client" id="nama_client" placeholder="Nama Client" value="<?php echo $nama_client; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Perusahaan<?php echo form_error('perusahaan') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" value="<?php echo $perusahaan; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Divisi<?php echo form_error('divisi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Divisi" value="<?php echo $divisi; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>No Telp<?php echo form_error('no_telp') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
    </div>
	    <div class="form-group">
            <label for="alamat" class='control-label col-md-3'><b>Alamat<?php echo form_error('alamat') ?></b></label>

             <div class='col-md-9'>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tanggal Client<?php echo form_error('tanggal_client') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tanggal_client" id="tanggal_client" placeholder="Tanggal Client" value="<?php echo $tanggal_client; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_client" value="<?php echo $id_client; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_client') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
