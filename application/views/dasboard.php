    <link href="<?= base_url('assets/template/') ?>/plugins/components/morrisjs/morris.css" rel="stylesheet">
    <script src="<?= base_url('assets/template/') ?>/plugins/components/raphael/raphael-min.js"></script>
    <script src="<?= base_url('assets/template/') ?>/plugins/components/morrisjs/morris.js"></script>
    <script type="text/javascript">
        $(function() { 
            "use strict"; 
    // Dashboard 1 Morris-chart
    Morris.Area({
        element: 'morris-area-chart',
        data: [

        <?php foreach($grafik->result_array() as $data): ?>
            {
                period: '<?= $data['tanggal_barang'] ?>',
                barang_masuk: <?= (int)$data['jumlah_barang'] ?>,
                barang_keluar: <?= (int)$data['jumlah_barang_keluar'] ?>,

            },  
        <?php endforeach; ?>
        ],
        xkey: 'period',
        ykeys: ['barang_masuk', 'barang_keluar'],
        labels: ['Barang Masuk', 'Barang Keluar'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors: ['#00bbd9', '#ffb136', '#4a23ad'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 1,
        hideHover: 'auto',
        lineColors: ['#00bbd9', '#ffb136', '#4a23ad'],
        resize: true 
    });


    // Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [

        <?php foreach($grafik->result_array() as $sql): ?>

         {
            y: '<?= tgl_indonesia($sql['tanggal_barang']) ?>',
            a: <?= $sql['jumlah_barang'] ?>,
            b: <?= $sql['jumlah_barang_keluar'] ?> 
        }, 
    <?php endforeach; ?>


    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Barang Masuk', 'Barang Keluar'],
    barColors: ['#2ecc71', '#0283cc', '#e74a25'],
    hideHover: 'auto',
    gridLineColor: '#e0e0e0',
    resize: true
});

});

</script>


<div class="container-fluid">
    <!-- row -->
    <div class="row">
       <div class="task-widget2">
        <div class="task-image">
           <img src="<?= base_url('assets/template') ?>/plugins/images/task.jpg" alt="task" class="img-responsive">
           <div class="task-image-overlay"></div>
           <div class="task-detail">
            <h2 class="font-light text-white m-b-0"><?= $this->config->item('selamat_datang') ?></h2>
            <small class="font-normal text-white m-t-5"><?= $this->config->item('deskripsi') ?></small>
        </div>
        <div class="task-add-btn">
            <a href="<?= base_url('Crud_create') ?>" class="btn btn-success">+</a>
        </div>
    </div>
    <div class="task-total">

    </div>
    <div class="col-md-6">
        <div class="white-box">
            <h3 class="box-title"><i class="fa fa-cubes"></i>Data Barang.</h3>
            <ul class="list-inline text-right">
                <li>
                    <h5><i class="fa fa-circle text-info m-r-5"></i>Barang Masuk </h5> </li>
                    <li>
                        <h5><i class="fa fa-circle text-warning m-r-5"></i>Barang Keluar</h5> </li>

                    </ul>
                    <div id="morris-area-chart"></div>
                </div>
            </div>

            <div class="col-md-6">

              <div class="white-box">
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle text-info m-r-5"></i>Barang Masuk </h5> </li>
                        <li>
                            <h5><i class="fa fa-circle text-warning m-r-5"></i>Barang Keluar</h5> </li>

                        </ul>

                  <h3 class="box-title"><i class="fa fa-cubes"></i>Data Barang.</h3>
                  <div id="morris-bar-chart"></div>
              </div>
          </div>
      </div>
  </div>
