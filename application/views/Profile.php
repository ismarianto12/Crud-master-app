<div class='row'>
<div class='col-md-12'>
<div class='panel panel-info'>
<div class='panel-heading'><i class="icon-user"></i> Edit Profil</div>
<div class='panel-wrapper collapse in' aria-expanded='true'>
<div class='panel-body'>
    <form action='' enctype="multipart/form-data" class='form-horizontal' method="POST">
     <input type="hidden" name="id_user" value="<?php echo $this->session->id_user; ?>" /> 
     <div class='form-body'>
        <h3 class='box-title'>Username</h3>
        <?= $this->session->flashdata('message'); ?>
        <hr class='m-t-0 m-b-40'>
        <div class='row'>
            <div class='col-md-6'>
                <div class='form-group'>
                    <label class='control-label col-md-3'>Username <?php echo form_error('username') ?></label>
                    <div class='col-md-9'>
                        <input type='text' name="username" class='form-control' placeholder='Username' value="<?= $username ?>"></div>
                    </div>
                </div>
                <!--/span-->
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-md-3'>Password <?php echo form_error('password') ?></label>
                        <div class='col-md-9'>
                            <input type='password' name="password" class='form-control' placeholder='Password..'></div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class='row'>
                 <div class='col-md-6'>
                    <div class='form-group'>
                        <label class='control-label col-md-3'>Nama <?php echo form_error('nama') ?></label>
                        <div class='col-md-9'>
                            <input type='text' name="nama" class='form-control' placeholder='Password..' value="<?= $nama ?>"></div>
                        </div>  
                    </div>
                    <!--/span-->
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Ulangi Password <?php echo form_error('password') ?></label>
                            <div class='col-md-9'>
                                <input type='password' name="password" class='form-control' placeholder='Password..'></div>
                            </div>  
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class='row'>
                      <div class='col-md-6'>
                        <div class='form-group'>
                            <label class='control-label col-md-3'>Email <?php echo form_error('email') ?></label>
                            <div class='col-md-9'>
                                <input type='email' name="email" class='form-control' placeholder='Email..' value="<?= $email ?>"></div>
                            </div>  
                        </div>
                        <!--/span-->
                        <div class='col-md-6'>
                            <div class='form-group'> 
                                <label class='control-label col-md-3'>Foto <?php echo form_error('foto') ?></label>
                                <div class='col-md-9'> 
                                   <img src="<?= base_url('assets/img/foto/'.$foto) ?>" alt="" class="header-avatar" id="image_upload_preview" class="img-responsive" style="width: 100px;height: 100px">
                                   <br />
                                   <input type='file' id="foto" name="foto" class='form-control' placeholder='Foto..'></div>
                               </div>  
                           </div>
                           <!--/span-->
                       </div>

                       <hr class='m-t-0 m-b-40'>

                   </div>
                   <div class='form-actions'>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='row'>
                                <div class='col-md-offset-3 col-md-9'>
                                    <button type='submit' class='btn btn-success' name="kirim"><i class="fa fa-user"></i> Edit Profil</button>
                                    <button type='button' class='btn btn-default'>Cancel</button>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-6'> </div>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
</div>
</div>



<script type="text/javascript">
$(function(){ 
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_upload_preview').attr('src', e.target.result);
        } 
        reader.readAsDataURL(input.files[0]);
    }
}

$("#foto").change(function () {
   var ext = $('#foto').val().split('.').pop().toLowerCase();
//Allowed file types
if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
swal('File Error', 'tidak bisa upload', 'warning'); 
$('#foto').val('');
}else{ 
readURL(this);
}
});
});



</script>