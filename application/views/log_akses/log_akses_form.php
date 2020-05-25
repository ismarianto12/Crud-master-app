
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
            <label for="varchar" class='control-label col-md-3'><b>Username<?php echo form_error('username') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Akses<?php echo form_error('akses') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="akses" id="akses" placeholder="Akses" value="<?php echo $akses; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Url<?php echo form_error('url') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="datetime" class='control-label col-md-3'><b>Waktu Akses<?php echo form_error('waktu_akses') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="waktu_akses" id="waktu_akses" placeholder="Waktu Akses" value="<?php echo $waktu_akses; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_akses" value="<?php echo $id_akses; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('log_akses') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
