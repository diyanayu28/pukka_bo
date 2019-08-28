<!DOCTYPE html>

<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <title>PT. Pukka Solusi INDONESIA </title>


  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css"/> -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/images/logo/pukka.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/images/logo/logoPukka.png" rel="logoPukka">

  <link href="<?php echo base_url(); ?>assets/js/EasyAutocomplete/dist/easy-autocomplete.min.css"rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url(); ?>assets/css/custom.css"/>

  <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
  <script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"clean"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(!d||0!==a.indexOf("<?php echo base_url(); ?>assets/css")&&0!==a.indexOf("<?php echo base_url(); ?>assets/demo")?"":".rtl")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

  <!-- DEMO ONLY: Set RTL direction -->
  <script>"ltr"!==document.getElementsByTagName("html")[0].getAttribute("dir")&&"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

  <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
  <script>
    _pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/css/bootstrap.min.css', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/css/pixeladmin.min.css', 'px-demo-stylesheet-core');
    _pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/css/widgets.min.css', 'px-demo-stylesheet-widgets');
  </script>

  <!-- DEMO ONLY: Load theme -->
  <script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"Clean");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('<?php echo base_url(); ?>assets/css/themes/');
  </script>

  <!-- Demo assets -->
  <script>_pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/demo/demo.css');</script>
  <!-- / Demo assets -->
  <!-- holder.js -->
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>

  <!-- Pace.js -->
  <script src="<?php echo base_url(); ?>assets/pace/pace.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/pixeladmin.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/EasyAutocomplete/dist/jquery.easy-autocomplete.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.inputmask/4.0/jquery.inputmask.bundle.js"></script>
  <script src="<?php echo base_url().'assets/js/highcharts/code/highcharts.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/highcharts/code/highcharts-3d.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/highcharts/code/modules/stock.js';?>"></script>  
  <script src="<?php echo base_url().'assets/js/highcharts/code/modules/exporting.js';?>"></script>
  <!-- Custom styling -->
  <style>
    .page-header-form .input-group-addon,
    .page-header-form .form-control {
      background: rgba(0,0,0,.05);
    }
    .bg-info {
      background-color: #ea5d27!important;
    }
    .bg-black {
    background-color: #ea5d27!important;
    }
    
  </style>
  
  <link href="<?php echo base_url(); ?>assets/css/custom.css"rel="stylesheet" type="text/css" />
  <!-- / Custom styling -->
</head>
<body>
  <?php $this->load->view('main/layout-common', $set);?>

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- <script>
    // -------------------------------------------------------------------------
    // Initialize DEMO sidebar

    $(function() {
      pxDemo.initializeDemoSidebar();

      $('#px-demo-sidebar').pxSidebar();
      pxDemo.initializeDemo();
    });
  </script> -->

  <script type="text/javascript">
    // -------------------------------------------------------------------------
    // Initialize DEMO

    $(function() {
      var file = String(document.location).split('/').pop();

      // Remove unnecessary file parts
      file = file.replace(/(\.html).*/i, '$1');

      if (!/.html$/i.test(file)) {
        file = 'index.html';
      }

      // Activate current nav item
      $('body > .px-nav')
        .find('.px-nav-item > a[href="' + file + '"]')
        .parent()
        .addClass('active');

      $('body > .px-nav').pxNav();
      $('body > .px-footer').pxFooter();

      $('#navbar-notifications').perfectScrollbar();
      $('#navbar-messages').perfectScrollbar();
    });
  </script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize uploads chart

    // $(function() {
    //   // var data = [
    //   //   { day: '2014-03-10', v: pxDemo.getRandomData(20, 5) },
    //   //   { day: "hahah", v: pxDemo.getRandomData(20, 5) },
    //   //   { day: '2014-03-12', v: pxDemo.getRandomData(20, 5) },
    //   //   { day: '2014-03-13', v: pxDemo.getRandomData(20, 5) },
    //   //   { day: '2014-03-14', v: pxDemo.getRandomData(20, 5) },
    //   //   { day: '2014-03-15', v: pxDemo.getRandomData(20, 5) },
    //   //   { day: '2014-03-16', v: pxDemo.getRandomData(20, 5) }
    //   // ];

    //   new Morris.Line({
    //     element: 'hero-graph',
    //     data : [
    //     { day: '2014-01-12', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-02-13', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-03-14', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-04-15', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-05-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-06-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-07-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-08-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-09-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-10-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-11-16', v: pxDemo.getRandomData(20, 5) },
    //     { day: '2014-12-16', v: pxDemo.getRandomData(20, 5) }
    //   ],
    //     //data: data,
    //     xkey: 'day',
    //     ykeys: ['v'],
    //     labels: ['Value'],
    //     lineColors: ['#fff'],
    //     lineWidth: 2,
    //     pointSize: 4,
    //     gridLineColor: 'rgba(255,255,255,.5)',
    //     resize: true,
    //     gridTextColor: '#fff',
    //     xLabels: "day",
    //     xLabelFormat: function(d) {
    //       return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()];
          
    //     },
    //   });
    // });

    // -------------------------------------------------------------------------
    // Initialize easy pie charts

    $(function() {
      var colors = pxDemo.getRandomColors();

      var config = {
        animate: 2000,
        scaleColor: false,
        lineWidth: 4,
        lineCap: 'square',
        size: 90,
        trackColor: 'rgba(0, 0, 0, .09)',
        onStep: function(_from, _to, currentValue) {
          var value = $(this.el).attr('data-max-value') * currentValue / 100;

          $(this.el)
            .find('> span')
            .text(Math.round(value) + $(this.el).attr('data-suffix'));
        },
      }

      var data = [
        pxDemo.getRandomData(1000, 1),
        pxDemo.getRandomData(100, 1),
        pxDemo.getRandomData(64, 1),
      ];

      $('#easy-pie-chart-1')
        .attr('data-percent', (data[0] / 1000) * 100)
        .attr('data-max-value', 1000)
        .easyPieChart($.extend({}, config, { barColor: colors[0] }));

      $('#easy-pie-chart-2')
        .attr('data-percent', (data[1] / 100) * 100)
        .attr('data-max-value', 100)
        .easyPieChart($.extend({}, config, { barColor: colors[1] }));

      $('#easy-pie-chart-3')
        .attr('data-percent', (data[2] / 64) * 100)
        .attr('data-max-value', 64)
        .easyPieChart($.extend({}, config, { barColor: colors[2] }));
    });

    // -------------------------------------------------------------------------
    // Initialize retweets graph

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#sparkline-1").pxSparkline(data, {
        type: 'line',
        width: '100%',
        height: '42px',
        fillColor: '',
        lineColor: '#fff',
        lineWidth: 2,
        spotColor: '#ffffff',
        minSpotColor: '#ffffff',
        maxSpotColor: '#ffffff',
        highlightSpotColor: '#ffffff',
        highlightLineColor: '#ffffff',
        spotRadius: 4,
      });
    });

    // -------------------------------------------------------------------------
    // Initialize Monthly visitor statistics graph

    $(function() {
      var data = [
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
        pxDemo.getRandomData(300, 100),
      ];

      $("#sparkline-2").pxSparkline(data, {
        type: 'bar',
        height: '42px',
        width: '100%',
        barSpacing: 2,
        zeroAxis: false,
        barColor: '#ffffff',
      });
    });

    // -------------------------------------------------------------------------
    // Initialize scrollbars

    $(function() {
      $('#support-tickets').perfectScrollbar();
      $('#comments').perfectScrollbar();
      $('#threads').perfectScrollbar();
    });
  </script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize DataTables

    $(function() {
      $('#datatables').dataTable();
      $('#datatables_wrapper .table-caption').text('');
      $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });
  </script>
</body>
</html>
