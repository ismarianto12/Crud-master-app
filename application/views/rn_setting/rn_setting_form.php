
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
            <label for="varchar" class='control-label col-md-3'><b>Parameter<?php echo form_error('parameter') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="parameter" id="parameter" placeholder="Parameter" value="<?php echo $parameter; ?>" />
        </div>
    </div>
	    <div class="form-group">
            <label for="nilai" class='control-label col-md-3'><b>Nilai<?php echo form_error('nilai') ?></b></label>

             <div class='col-md-9'>
            <textarea class="form-control" rows="3" name="nilai" id="nilai" placeholder="Nilai"><?php echo $nilai; ?></textarea>
        </div>
    </div>
	    <input type="hidden" name="id_setting" value="<?php echo $id_setting; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_setting') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
