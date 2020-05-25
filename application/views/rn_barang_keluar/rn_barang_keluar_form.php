
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
            <label for="varchar" class='control-label col-md-3'><b>Kode Transaksi<?php echo form_error('kode_transaksi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo $kode_transaksi; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Barang<?php echo form_error('id_barang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Project<?php echo form_error('id_project') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_project" id="id_project" placeholder="Id Project" value="<?php echo $id_project; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Jumlah Keluar<?php echo form_error('jumlah_keluar') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="jumlah_keluar" id="jumlah_keluar" placeholder="Jumlah Keluar" value="<?php echo $jumlah_keluar; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Penerima<?php echo form_error('penerima') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima" value="<?php echo $penerima; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Admin<?php echo form_error('id_admin') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_admin" id="id_admin" placeholder="Id Admin" value="<?php echo $id_admin; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tanggal Keluar<?php echo form_error('tanggal_keluar') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tanggal_keluar" id="tanggal_keluar" placeholder="Tanggal Keluar" value="<?php echo $tanggal_keluar; ?>" />
        </div>
    </div>
	    <div class="form-group">
            <label for="alamat_penerima" class='control-label col-md-3'><b>Alamat Penerima<?php echo form_error('alamat_penerima') ?></b></label>

             <div class='col-md-9'>
            <textarea class="form-control" rows="3" name="alamat_penerima" id="alamat_penerima" placeholder="Alamat Penerima"><?php echo $alamat_penerima; ?></textarea>
        </div>
    </div>
	    <input type="hidden" name="id_barang_keluar" value="<?php echo $id_barang_keluar; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_barang_keluar') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
