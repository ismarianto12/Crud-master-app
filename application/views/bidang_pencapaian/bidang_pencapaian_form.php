
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
            <label for="varchar" class='control-label col-md-3'><b>Nama Bidang<?php echo form_error('nama_bidang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_bidang" id="nama_bidang" placeholder="Nama Bidang" value="<?php echo $nama_bidang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Tahun Mulai<?php echo form_error('tahun_mulai') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tahun_mulai" id="tahun_mulai" placeholder="Tahun Mulai" value="<?php echo $tahun_mulai; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_bidang" value="<?php echo $id_bidang; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bidang_pencapaian') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
