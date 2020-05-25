
<script type="text/javascript">
    $(function(){

    });

</script>

<div class="row" style="background: #fff;padding: 20px">
    <div class="col-md-12">
     <?php $get=isset($_GET['get']) ? $_GET['get'] : ''; if($get != 'hasil_sc'): ?>

     <form action="<?= base_url('Crud_create/create') ?>" method="POST">

        <div class="form-group">
            <label>Pilih Table Di Database - <a href="" class="btn btn-success"><i class='fa fa-refresh'></i> Refresh</a></label>
            <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                <option value="">Please Select</option>
                <?php
                $table_list = $this->ismarianto->table_list();
                $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                foreach ($table_list as $table) {
                    ?>
                    <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group" style="

        background-image: url('http://localhost/crud_master/assets/template/plugins/images/task.jpg');
        background-repeat: no-repeat; 
        padding: 10px;
        color: #fff;
        ">

        <div class="row">
         <div class="col-sm-offset-3 col-sm-9">
            <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>


            <div class="radio radio-custom">
                <input type="radio" name="jenis_tabel" id="radio1" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                <label for="radio1"><b> Serverside Datatables </b> </label>
            </div>

            <div class="radio radio-custom">
                <input type="radio" id="radio2"  name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                <label for="radio2"><b> Reguler Tabel</b></label>
            </div>


<!--                 <div class="col-md-5">
                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                        <label>
                            <input type="radio" name="jenis_tabel" value="reguler_table" <?php echo $jenis_tabel == 'reguler_table' ? 'checked' : ''; ?>>
                            Reguler Table
                        </label>

                    </div>                            
                </div>
                <div class="col-md-7">
                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                        <label>
                            <input type="radio" name="jenis_tabel" value="datatables" <?php echo $jenis_tabel == 'datatables' ? 'checked' : ''; ?>>
                            Serverside Datatables
                        </label>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox checkbox-success">
                <input id="checkbox31" type="checkbox" name="export_excel" value="1">
                <label for="checkbox31">Eksport Excel&nbsp;&nbsp; </label>&nbsp;&nbsp;

                <input id="checkbox32" type="checkbox" name="export_word" value="1">
                <label for="checkbox32">Eksport Word&nbsp;&nbsp;</label>&nbsp;&nbsp;

                <input id="checkbox33" type="checkbox" name="export_pdf" value="1">
                <label for="checkbox33">Eksport PDF&nbsp;&nbsp;</label>&nbsp;&nbsp;  
            </div>
        </div>
    </div> 
    <div class="form-group">
        <label>Custom Controller Name</label>
        <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
    </div>
    <div class="form-group">
        <label>Custom Model Name</label>
        <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
    </div>
    <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return konfirmasi()" />
    <input type="submit" value="Generate All" name="generateall" class="btn btn-danger" onclick="javascript: return konfirmasi()" />
    
</form>
<hr />
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Cara Penggunaaan Sistem
</button>
<br>

<?php
$hasil = array();
foreach ($hasil as $h) {
    echo '<p>' . $h . '</p>';
}
?>
</div>

</div>
<script type="text/javascript">
    function capitalize(s) {
        return s && s[0].toUpperCase() + s.slice(1);
    }

    function setname() {
        var table_name = document.getElementById('table_name').value.toLowerCase();
        if (table_name != '') {
            document.getElementById('controller').value = capitalize(table_name);
            document.getElementById('model').value = capitalize(table_name) + '_model';
        } else {
            document.getElementById('controller').value = '';
            document.getElementById('model').value = '';
        }
    }
</script>


<!-- model aplikasi -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Codeigniter CRUD Genereator.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">

   <p><strong>Tentang :</strong></p>
   <p><strong>Aplikasi </strong>ini adalah sebuah tool untuk bertujuan meringan kan kerja pengkodean&nbsp;<br />
    yang masih berbasih CREAT , UPDATE , DELETE , dan view data sehingga&nbsp;<br />
dapat mengoptimal kan waktu pengerjaan sebuah aplikasi berbasis web</p>

<p><br />
    <strong>cara menggunakan nya sangatlah simple yaitu :</strong><br />
    &nbsp;1. Pastikan database sudah ada table menu dan table login&nbsp;<br />
    &nbsp;2. Silahkan login pada aplikasi dengan default username dan password (admin , 123)&nbsp;<br />
    &nbsp;3. Pilih bagian menu http://localhost/crud_master/Crud_create&nbsp;<br />
&nbsp; &nbsp; pada opsi cobo box silahka pilih jenis table yang akan di buat CRUD (create , update dan delete secara otomatis). Pilihan pertama dengan menkosongkan pilihan pada cobobox dan mengklik create all , bertujuan untuk membuat&nbsp;</p>

<p>&nbsp; &nbsp; eksekusi perintah menghasilkan CRUD data keseluruhan yang ada pada table , dan pilihan kedua&nbsp; adalah memilih salah satu table yang ada pada combo box , kemudian klik generate</p>

<p>4.Apabila CRUD dari table sudah berhasil di buat silahkan setting menu untuk mengaktifkan hak akses level untuk mengakses modul yanf sudah di create sebelumnya&nbsp;&nbsp;</p>

<p>5.Selamat menggunakan , jika ada kritik dan saran silahkan tinggal kan komentar pada alamat email : <strong>kotokareh@gmail.com&nbsp;</strong></p>

<p><strong>6. Terima kasih banyak dan wassalam.</strong></p>

<p>&nbsp;</p>

<p><em>&nbsp;** ) Sistem ini sebelumnya adalah pengembangan dari tool CRUD generator Haviacode.com&nbsp; &nbsp;</em> &nbsp;<br />
&nbsp;</p>

<p><strong> 2018 <a target="_blank" href="kotokareh@gmail.com">ismarianto</a></strong></p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
</div>
</div>

<?php else: 

 if ($this->session->flashdata('hasil') == '') {
  $hasil = array();
  echo "<div class='alert alert-danger'>Maaf Untk Saat Ini Halaman Tidak Tersedia Harap Kembali kehalaman sebelumnya</div>";
}else{
    $hasil =$this->session->flashdata('hasil');
}  
?>
<h4>Modul pada aplikasi berhasil di create ..</h4>
<hr />
<div class="col-md-12">
 <div class="col-md-6">
  <h4>Sistem Berhasil Di Generate Silahkan cek file berikut pada folder..</h4>
  <?php 
  $no=1;
  foreach ($hasil as $h) {
    $cek = ($no%2) ? 'info' : 'warning';
    echo '<p><span class="tag label label-'.$cek.'"><i class="fa fa-hand-o-right"></i>' . $h . '</span></p>
    <hr />';
 $no++;
} 
?>
</div>

<div class="col-md-6">
 <h4>Url Hasil Create Data.</h4>
 <hr />
 <?php 
 
 foreach ($hasil as $sq =>$val) {
    $data =  substr($sq[6],52);
    echo '<p>'.base_url().str_replace('.php','',$data).'</p>';
}
?> 
</div>
</div>
<?php endif; ?>
<script type="text/javascript">
    function konfirmasi(){
        swal({
            title: 'Konfirmasi ',
            text: 'Apakah Anda Yakin Untuk akses perintah ini ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Ya',
            closeOnConfirm: false
        },
        function(){
         swal('Hapus Data', 'File Berhasil Di Buat', 'success'); 

     });
    }
</script>


  <!-- end model aplikasi -->