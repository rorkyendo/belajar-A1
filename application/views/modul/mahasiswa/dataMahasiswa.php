<div class="container">
  <div class="row">
    <div class="container-fluid">
      <div class="panel panel-default">
        <div class="panel panel-heading">
          <?php echo $subtitle;?>
        </div>
        <div class="panel panel-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="DataTables">
              <thead>
                <tr>
                  <th>Jenkel</th>
                  <th>Jumlah mahasiswa</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswa as $key): ?>
                <tr>
                  <td>
                    <?php if ($key->jenkel=='L'): ?>
                      Laki-Laki
                    <?php else: ?>
                      Perempuan
                    <?php endif; ?>
                  </td>
                  <td><?php echo $key->jumlah;?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel panel-heading">
          <?php echo 'Grafik '.$subtitle;?>
        </div>
        <div class="panel panel-body">
          <div id="chart-bars"></div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- CHART ------>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts-7.1.2/code/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts-7.1.2/code/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts-7.1.2/code/modules/data.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts-7.1.2/code/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts-7.1.2/code/modules/accessibility.js"></script>
<!-- Load and execute javascript code used only in this page -->
<script type="text/javascript">
Highcharts.chart('chart-bars', {
  data: {
      table: 'DataTables'
  },
  chart: {
      type: 'column'
  },
  colors: ['#0000FF'],
  title: {
      text: 'Grafik <?php echo $subtitle;?>'
  },
  yAxis: {
      allowDecimals: false,
      title: {
          text: 'Jumlah Mahasiswa'
      }
  },
  xAxis: {
      title: {
          text: 'Jenkel'
      }
  },
  tooltip: {
      formatter: function () {
          return '<b>' + this.series.name + '</b><br/>' +
              this.point.y;
      }
  }
});
</script>
