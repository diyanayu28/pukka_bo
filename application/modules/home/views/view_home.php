<ol class="breadcrumb page-breadcrumb">
</ol>

<div class="page-header">
  <div class="row">
    <div class="col-md-12 text-center text-nowrap">
      <h1>DASHBOARD</h1>
  </div>

  <hr class="page-wide-block visible-xs visible-sm">

  <!-- Spacer -->
  <div class="m-b-2 visible-xs visible-sm clearfix"></div>
</div>
</div>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <?php
    foreach ($menu as $value) {
        if($value->menuStyle != "sub"){

            ?>
            <div class="col-md-3">
                <a href="<?php echo site_url().$value->page.'/'.$value->subPage?>" class="panel box bg-white text-default">
                  <div class="box-row">
                    <div class="box-cell p-x-3 text-center" style="padding-top:30px">
                      <i class="box-bg-icon font-size-72 ion-ios-<?php echo $value->iconMenu?>" style="color:<?php echo $value->menuColor?>"></i>
                  </div>
              </div>

              <div class="box-row">
                <div class="box-cell p-x-3" style="padding-bottom:30px">
                  <div class="text-center font-weight-semibold font-size-16"><?php echo $value->menuName?></div>
              </div>
          </div>
      </a>
  </div>
  <?php
}
}
?>
</div>
<div class="row">
  <div class="col-md-12">

    <!-- Uploads -->

    <div class="panel box">
      <div class="box-cell col-md-8 p-a-1 bg-info">
            GRAFIK PENGUNJUNG
        <div id="hero-graph" style="height: 230px;"></div>
      </div>
    </div>

    <div class="panel box" style="width: 30%; float: left; height: 320px;">
      <!-- <div class="box-row"> -->

        <div class="box-cell col-md-4 p-a-3 valign-top">
          <h4 class="m-y-1 font-weight-normal"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Uploads</h4>
          <ul class="list-group m-x-0 m-t-3 m-b-0">
            <li class="list-group-item p-x-1 b-x-0 b-t-0">
              <span class="label label-primary pull-right">
                <?php 
                  $query=$this->db->query("SELECT * FROM service WHERE is_deleted='0'");
                  $jml=$query->num_rows();
                ?>
                <?php echo $jml;?>
              </span>
                Service
          </li>
          <li class="list-group-item p-x-1 b-x-0">
              <span class="label label-danger pull-right">
                <?php 
                  $query=$this->db->query("SELECT * FROM news WHERE is_deleted='0'");
                  $jml=$query->num_rows();
                ?>
                <?php echo $jml;?>
              </span>
              News
          </li>
          <li class="list-group-item p-x-1 b-x-0 b-b-0">
              <span class="label label-info pull-right">
                <?php 
                  $query=$this->db->query("SELECT * FROM video WHERE is_deleted='0'");
                  $jml=$query->num_rows();
                ?>
                <?php echo $jml;?>
              </span>
              Videos
          </li>
      </ul>
  </div>
</div>

  <!-- MAP & BOX PANE -->
    <div class="panel box" style="float: right; width: 70%; height: 320px;">
        <div class="box-cell col-md-4 p-a-3 valign-top">
          <h4 class="m-y-1 font-weight-normal"><i class="fa fa-file-text text-primary"></i>&nbsp;&nbsp;Popular Posts</h4>
          <ul class="list-group m-x-0 m-t-3 m-b-0">
            <li class="list-group-item p-x-1 b-x-0 b-t-0">

              <table class="table">
              <?php 
                  $query=$this->db->query("SELECT * FROM news WHERE fk_id_category='20' limit 5");
                  foreach ($query->result_array() as $i) :
                      $id_news=$i['id_news'];
                      $news_title=$i['news_title'];
              ?>
                  <tr>
                    <td><?php echo $news_title;?></td>
                  </tr>
              <?php endforeach;?>
              </table>
            </li>
          </ul>
        </div>
      </div>
            
    <!-- /.box-body -->
  
<!-- / Uploads -->

<!-- Pie charts -->

<div class="row">

  <div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-globe"></i>&nbsp;&nbsp;PENGUNJUNG HARI INI
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%d%m%y')=DATE_FORMAT(CURDATE(),'%d%m%y')");
          $jml=$query->num_rows();
        ?>
        <?php echo number_format($jml);?>
      </span></div>
  </div>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-globe"></i>&nbsp;&nbsp;PENGUNJUNG BULAN INI
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
          $jml=$query->num_rows();
        ?>
        <?php echo number_format($jml);?>
      </span></div>
  </div>
</div>
</div>
</div>



<div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-globe"></i>&nbsp;&nbsp;TOTAL PENGUNJUNG
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM pengunjung");
          $jml=$query->num_rows();
        ?>
        <?php echo number_format($jml);?>
      </span></div>
  </div>
</div>
</div>
</div>

</div>

<div class="row">

<div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-cloud"></i>&nbsp;&nbsp;SUBSCRIBER HARI INI
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM subscribe WHERE DATE_FORMAT(subscribe_date,'%d%m%y')=DATE_FORMAT(CURDATE(),'%d%m%y') AND is_deleted='0'");
          $jml=$query->num_rows();
        ?>
        <?php echo number_format($jml);?>
      </span></div>
  </div>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-cloud"></i>&nbsp;&nbsp;SUBSCRIBER BULAN INI
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM subscribe WHERE DATE_FORMAT(subscribe_date,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y') AND is_deleted='0'");
          $jml=$query->num_rows();
        ?>
        <?php echo number_format($jml);?>
      </span></div>
  </div>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-4">
    <div class="panel box">
      <div class="box-row">
        <div class="box-cell p-x-2 p-y-1 bg-black text-xs-center font-size-11 font-weight-semibold">
          <i class="fa fa-cloud"></i>&nbsp;&nbsp;TOTAL SUBSCRIBER
      </div>
  </div>
  <div class="box-row">
    <div class="box-cell p-y-2">
      <div class="text-xs-center">
        <?php 
          $query=$this->db->query("SELECT * FROM subscribe WHERE is_deleted='0'");
          $jml=$query->num_rows();
          ?>
          <?php echo $jml;?>
      </span></div>
  </div>
</div>
</div>
</div>

</div>

<!-- / Pie charts -->


</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      console.log("jQuery is ready")
      
      var data = [
        { month: "Jan", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'01%y')");
            $jml1=$query->num_rows();
            ?> value: <?php echo number_format($jml1);?> },
        { month: "Feb", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'02%y')");
            $jml2=$query->num_rows();
            ?> value: <?php echo number_format($jml2);?> },
        { month: "Mar", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'03%y')");
            $jml3=$query->num_rows();
            ?> value: <?php echo number_format($jml3);?> },
         { month: "Apr", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'04%y')");
            $jml4=$query->num_rows();
            ?> value: <?php echo number_format($jml4);?> },
         { month: "May", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'05%y')");
            $jml5=$query->num_rows();
            ?> value: <?php echo number_format($jml5);?> },
         { month: "Jun", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'06%y')");
            $jml6=$query->num_rows();
            ?> value: <?php echo number_format($jml6);?> },
         { month: "Jul", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'07%y')");
            $jml7=$query->num_rows();
            ?> value: <?php echo number_format($jml7);?> },
         { month: "Aug", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'08%y')");
            $jml8=$query->num_rows();
            ?> value: <?php echo number_format($jml8);?> },
         { month: "Sep", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'09%y')");
            $jml9=$query->num_rows();
            ?> value: <?php echo number_format($jml9);?> },
         { month: "Oct", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'10%y')");
            $jml10=$query->num_rows();
            ?> value: <?php echo number_format($jml10);?> },
         { month: "Nov", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'11%y')");
            $jml11=$query->num_rows();
            ?> value: <?php echo number_format($jml11);?> },
         { month: "Des", <?php 
            $query=$this->db->query("SELECT * FROM pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'12%y')");
            $jml12=$query->num_rows();
            ?> value: <?php echo number_format($jml12);?> },
       ]

      new Morris.Line({
        element: "hero-graph",
        data: data,
        xkey: 'month',
        ykeys: ['value'],
        labels: ['value'],
        lineColors: ['#fff'],
        lineWidth: 2,
        pointSize: 4,
        gridLineColor: 'rgba(255,255,255,.5)',
        resize: true,
        gridTextColor: '#fff',
        parseTime: false
      })

    });
</script>
