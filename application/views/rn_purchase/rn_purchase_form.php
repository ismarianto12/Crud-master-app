
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
            <label for="varchar" class='control-label col-md-3'><b>Kode Purchase<?php echo form_error('kode_purchase') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="kode_purchase" id="kode_purchase" placeholder="Kode Purchase" value="<?php echo $kode_purchase; ?>" />
        </div>
    </div>
	    <div class="form-group">
            <label for="suplier" class='control-label col-md-3'><b>Suplier<?php echo form_error('suplier') ?></b></label>

             <div class='col-md-9'>
            <textarea class="form-control" rows="3" name="suplier" id="suplier" placeholder="Suplier"><?php echo $suplier; ?></textarea>
        </div>
    </div>
	    <div class="form-group">
            <label for="alamat_sup" class='control-label col-md-3'><b>Alamat Sup<?php echo form_error('alamat_sup') ?></b></label>

             <div class='col-md-9'>
            <textarea class="form-control" rows="3" name="alamat_sup" id="alamat_sup" placeholder="Alamat Sup"><?php echo $alamat_sup; ?></textarea>
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Barang<?php echo form_error('id_barang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tanggal Purchase<?php echo form_error('tanggal_purchase') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tanggal_purchase" id="tanggal_purchase" placeholder="Tanggal Purchase" value="<?php echo $tanggal_purchase; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Detail<?php echo form_error('detail') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="detail" id="detail" placeholder="Detail" value="<?php echo $detail; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Jumlah<?php echo form_error('jumlah') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_purchase" value="<?php echo $id_purchase; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_purchase') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
