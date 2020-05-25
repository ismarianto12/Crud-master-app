
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
            <label for="varchar" class='control-label col-md-3'><b>Id Bidang<?php echo form_error('id_bidang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_bidang" id="id_bidang" placeholder="Id Bidang" value="<?php echo $id_bidang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Nama Pencapaian<?php echo form_error('nama_pencapaian') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_pencapaian" id="nama_pencapaian" placeholder="Nama Pencapaian" value="<?php echo $nama_pencapaian; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Status Pencapaian<?php echo form_error('status_pencapaian') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="status_pencapaian" id="status_pencapaian" placeholder="Status Pencapaian" value="<?php echo $status_pencapaian; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Komplain<?php echo form_error('komplain') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="komplain" id="komplain" placeholder="Komplain" value="<?php echo $komplain; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tahun Realisasi<?php echo form_error('tahun_realisasi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tahun_realisasi" id="tahun_realisasi" placeholder="Tahun Realisasi" value="<?php echo $tahun_realisasi; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Tahun Mulai<?php echo form_error('tahun_mulai') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tahun_mulai" id="tahun_mulai" placeholder="Tahun Mulai" value="<?php echo $tahun_mulai; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_pencapaian" value="<?php echo $id_pencapaian; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pencapaian') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
