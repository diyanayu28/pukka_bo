<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <title>PT. Pukka Solusi INDONESIA</title>

    <!-- Favicons -->
  <link href="assets/images/logo/pukka.png" rel="icon">
  <link href="assets/images/logo/logoPukka.png" rel="logoPukka">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">

  <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
  <script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"clean"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(!d||0!==a.indexOf("<?php echo base_url(); ?>assets/css")&&0!==a.indexOf("<?php echo base_url(); ?>assets/demo")?"":".rtl")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

  <!-- DEMO ONLY: Set RTL direction -->
  <script>"ltr"!==document.getElementsByTagName("html")[0].getAttribute("dir")&&"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

  <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
  <script>
    _pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/css/bootstrap.min.css', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/css/pixeladmin.min.css', 'px-demo-stylesheet-core');
  </script>

  <!-- DEMO ONLY: Load theme -->
  <script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"clean");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('<?php echo base_url(); ?>assets/css/themes/');
  </script>

  <!-- Demo assets -->
  <script>_pxDemo_loadStylesheet('<?php echo base_url(); ?>assets/demo/demo.css');</script>
  <!-- / Demo assets -->

  <!-- Pace.js -->
  <script src="<?php echo base_url(); ?>assets/pace/pace.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>

  <!-- Custom styling -->
  <style>
    .page-signin-header {
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
      text-align:center;
    }

    .page-signin-header .btn {
      position: absolute;
      top: 12px;
      right: 15px;
    }

    html[dir="rtl"] .page-signin-header .btn {
      right: auto;
      left: 15px;
    }

    .page-signin-container {
      width: auto;
      margin: 30px 10px;
    }

    .page-signin-container form {
      border: 0;
      box-shadow: 0 2px 2px rgba(0,0,0,.05), 0 1px 0 rgba(0,0,0,.05);
      border-radius: 20px;
      background: black;
    }

    @media (min-width: 544px) {
      .page-signin-container {
        width: 350px;
        margin: 60px auto;
      }
    }

    .page-signin-social-btn {
      width: 40px;
      padding: 0;
      line-height: 40px;
      text-align: center;
      border: none !important;
    }

    #page-signin-forgot-form { display: none; }
    .bg-black{
      background :#000 !important;
    }

    .bg-img{
      background-color: #ea5d27;
    }

    #btn{
      color: #cc7000;
    }

    .btn-info2 {
    color: #fff;
    border-color: #2bd233;
    background: #34cc23;
  }

  </style>
  <!-- / Custom styling -->
</head>
<body class="bg-img">
  <div class="page-signin-header p-a-1 text-sm-center" style="background: black;">

    <a class="px-demo-brand px-demo-brand-lg text-white" href="index.html"><img src="<?php echo base_url().'assets/images/logo/logoPukka.png'?>" style="height: 50px;"></a>

  </div>

  <!-- Sign In form -->
  <?php if (!empty($msg[2])){ ?>
        <div class="alert alert-<?php echo $msg[3];?> alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-div="Close">
                    <span aria-hidden="true">×</span>
              </button>
                    <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
        </div>
  <?php } ?>

  <div class="page-signin-container" id="page-signin-form">
   
    <form id="defaultForm" class="panel p-a-4" method="POST" action="<?php echo site_url('login/validate_login'); ?>">

      <fieldset class=" form-group form-group-lg">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Nama Pengguna" required="true">
            <span class="glyphicon form-control-feedback"><img src="assets/images/icon/icon-user.png" style="height: 16px;"></span>
          </div>
      </fieldset>

      <fieldset class=" form-group form-group-lg">
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required="true">
          <span class="glyphicon form-control-feedback"><img src="assets/images/icon/icon-key.png" style="height: 16px;"></span>
        </div>
      </fieldset>

     
      <button type="submit" class="btn btn-block btn-lg btn-info2 m-t-3">MASUK</button>
    </form>

    <!--h4 class="m-y-3 text-xs-center font-weight-semibold text-muted">or sign in with</h4>

    <div class="text-xs-center">
      <a href="index.html" class="page-signin-social-btn btn btn-success btn-rounded" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;&nbsp;
      <a href="index.html" class="page-signin-social-btn btn btn-info btn-rounded" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;&nbsp;
      <a href="index.html" class="page-signin-social-btn btn btn-danger btn-rounded" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a>
    </div-->
  </div>

  <!-- / Sign In form -->

  <!-- Reset form -->

  <div class="page-signin-container" id="page-signin-forgot-form">
    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold font-size-20">Password reset</h2>

    <form action="index.html" class="panel p-a-4">
      <fieldset class="form-group form-group-lg">
        <input type="email" class="form-control" placeholder="Your Email">
      </fieldset>

      <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Send password reset link</button>
      <div class="m-t-2 text-muted">
        <a href="#" id="page-signin-forgot-back">&larr; Back</a>
      </div>
    </form>
  </div>

  <!-- / Reset form -->

  <!-- ==============================================================================
  |
  |  SCRIPTS
  |
  =============================================================================== -->

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/pixeladmin.min.js"></script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize DEMO sidebar

  </script>

  <script>
    // -------------------------------------------------------------------------
    // Initialize page components

    $(function() {

      $('#page-signin-forgot-link').on('click', function(e) {
        e.preventDefault();

        $('#page-signin-form').css({ display: 'none' });
        $('#page-signin-forgot-form').css({ display: 'block' });

        $(window).trigger('resize');
      });

      $('#page-signin-forgot-back').on('click', function(e) {
        e.preventDefault();

        $('#page-signin-form').css({ display: 'block' });
        $('#page-signin-forgot-form').css({ display: 'none' });

        $(window).trigger('resize');
      });

      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>
