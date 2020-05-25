
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
            <label for="varchar" class='control-label col-md-3'><b>Nama Sistem<?php echo form_error('nama_sistem') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_sistem" id="nama_sistem" placeholder="Nama Sistem" value="<?php echo $nama_sistem; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Tahun Develop<?php echo form_error('tahun_develop') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tahun_develop" id="tahun_develop" placeholder="Tahun Develop" value="<?php echo $tahun_develop; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Tahun Selesai<?php echo form_error('tahun_selesai') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tahun_selesai" id="tahun_selesai" placeholder="Tahun Selesai" value="<?php echo $tahun_selesai; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Status Server<?php echo form_error('status_server') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="status_server" id="status_server" placeholder="Status Server" value="<?php echo $status_server; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_sistem" value="<?php echo $id_sistem; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sistem_informasi') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
