 
           <div class='row'>
                    <div class='col-sm-12'>
                      <?= $this->session->userdata('message') ?>
                        <div class='white-box'>
                            <h3 class='box-title m-b-0'><?= $judul ?></h3>
                            <p class='text-muted m-b-30'>Tabel Data <?= $judul ?></p>
                            <div class='table-responsive'>  
                <?php echo anchor(site_url('rn_client/tambah'), 'Tambah Data', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('rn_client/excel'), '<i class=\'fa fa-file-excel-o\'></i>Excel', 'class="btn btn-info"'); ?>
		<?php echo anchor(site_url('rn_client/word'), '<i class=\'fa fa-file-word-o\'></i>Word', 'class="btn btn-danger"'); ?>
		<?php echo anchor(site_url('rn_client/pdf'), '<i class=\'fa fa-file-excel-o\'></i>PDF', 'class="btn btn-success"'); ?>
	    
  <br /><br />
        <table class="table" id="datatables">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Client</th>
		    <th>Perusahaan</th>
		    <th>Divisi</th>
		    <th>No Telp</th>
		    <th>Alamat</th>
		    <th>Tanggal Client</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
       
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#datatables").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#datatables input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "rn_client/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_client",
                            "orderable": false
                        },{"data": "nama_client"},{"data": "perusahaan"},{"data": "divisi"},{"data": "no_telp"},{"data": "alamat"},{"data": "tanggal_client"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
         
     function hapus(n){
        swal({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda Yakin Untuk Menghapus Data Ini?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Ya',
            closeOnConfirm: false
        },
        function(){
           swal('Hapus Data', 'Data Berhasil Di Hapus', 'success'); 
           window.location.href='<?= base_url('rn_client/hapus/') ?>'+n;
         });
    }
 </script>
      </div>
     </div>
   </div>
 </div>