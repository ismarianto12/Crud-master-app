
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
            <label for="varchar" class='control-label col-md-3'><b>Kode Barang<?php echo form_error('kode_barang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Nama Barang<?php echo form_error('nama_barang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Harga Beli<?php echo form_error('harga_beli') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="harga_beli" id="harga_beli" placeholder="Harga Beli" value="<?php echo $harga_beli; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Harga Jual<?php echo form_error('harga_jual') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga Jual" value="<?php echo $harga_jual; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Stok<?php echo form_error('stok') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Satuan<?php echo form_error('satuan') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Lokasi<?php echo form_error('id_lokasi') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_lokasi" id="id_lokasi" placeholder="Id Lokasi" value="<?php echo $id_lokasi; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Kategori<?php echo form_error('id_kategori') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Suplier<?php echo form_error('id_suplier') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_suplier" id="id_suplier" placeholder="Id Suplier" value="<?php echo $id_suplier; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="date" class='control-label col-md-3'><b>Tanggal Barang<?php echo form_error('tanggal_barang') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tanggal_barang" id="tanggal_barang" placeholder="Tanggal Barang" value="<?php echo $tanggal_barang; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Id Admin<?php echo form_error('id_admin') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="id_admin" id="id_admin" placeholder="Id Admin" value="<?php echo $id_admin; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rn_barang') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

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
