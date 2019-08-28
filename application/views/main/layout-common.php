<!--.px-navbarunter Inbox-->
<?php 
    $query=$this->db->query("SELECT * FROM contact WHERE contact_status='1'");
    $jum_pesan=$query->num_rows();
?>

<?php 
    $query=$this->db->query("SELECT * FROM subscribe WHERE subscribe_status='1'");
    $jum_subscribe=$query->num_rows();
?>

<nav class="px-nav px-nav-left px-nav-animate">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
      <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
        <?php
            if ($this->foto_profil != ''){
              echo '<img class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px" src="'.base_url('files/akun').'/'.$this->foto_profil.'">';
            }else{
              echo '<img class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px" src="'.base_url('files/akun').'/default.jpg">';
            }
        ?>
        <div class="font-size-16"><span class="font-weight-light">Hai, </span><strong><?php echo $this->realname?></strong></div>

        <div class="btn-group" style="margin-top: 4px;">
          <a href="<?php echo site_url().'contact/view';?>" class="btn btn-xs btn-primary btn-outline" title="contact"><i class="fa fa-envelope"></i></a>
          <a href="<?php echo site_url().'akun/view';?>" class="btn btn-xs btn-primary btn-outline" title="profil"><i class="fa fa-user"></i></a>
          <a href="<?php echo site_url().'akun/editPassword';?>" class="btn btn-xs btn-primary btn-outline" title="setting password"><i class="fa fa-cog"></i></a>
          <a href="<?php echo site_url().'login/logout';?>" class="btn btn-xs btn-danger btn-outline" title="off"><i class="fa fa-power-off"></i></a>
        </div>
      </li>
      <?php $this->layout->set_content('menu/view_menu', '');?>
    </ul>
  </nav>

  <nav class="navbar px-navbar">
    <!-- Header -->
    <div class="navbar-header">
      <a class="navbar-brand px-demo-brand" href="<?php echo site_url('index.php')?>">
        <span class="navbar"><img src="<?php echo base_url().'assets/images/logo/logoPukka.png'?>" style="height: 30px;"</span>
      </a>
      
    </div>

    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
      <ul class="nav navbar-nav navbar-right"> 
        <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>            
              <?php
                if ($jum_pesan > 0) {
                  echo '<span class="label label-success">'.$jum_pesan.'</span>';
                }
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $jum_pesan;?> pesan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
                    $contact=$this->db->query("SELECT contact.*,DATE_FORMAT(date_received,'%d %M %Y') AS tanggal FROM contact WHERE contact_status='1' ORDER BY id_contact DESC LIMIT 5");
                    foreach ($contact->result_array() as $in) :
                        $id_contact=$in['id_contact'];
                        $name=$in['name'];
                        $email=$in['email'];
                        $subject=$in['subject'];
                        $message=$in['message'];
                        $date_received=$in['tanggal'];
                ?>
                  <!-- start message -->
                    <a href="<?php echo base_url().'contact/view'?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url().'assets/images/user_blank.png'?>" class="img-circle" alt="User Image" style="height: 25px;">
                      </div>
                      <h4>
                        <?php echo $name;?>
                      </h4>
                        <small><i class="fa fa-clock-o"></i> <?php echo $date_received;?></small>
                    </a>
                  <!-- end message -->
                  <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url().'contact/view'?>">Lihat Semua Pesan</a></li>
            </ul>
          </li>


          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php
                if ($jum_subscribe > 0) {
                  echo '<span class="label label-success">'.$jum_subscribe.'</span>';
                }
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Anda memiliki <?php echo $jum_subscribe;?> subscriber baru</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
                    $subscribe=$this->db->query("SELECT subscribe.*,DATE_FORMAT(subscribe_date,'%d %M %Y') AS tanggal FROM subscribe WHERE subscribe_status='1' ORDER BY id_subscribe DESC LIMIT 5");
                    foreach ($subscribe->result_array() as $in) :
                        $id_subscribe=$in['id_subscribe'];
                        $email=$in['email'];
                        $subscribe_date=$in['tanggal'];
                ?>
                  <!-- start message -->
                    <a href="<?php echo base_url().'subscribe/view'?>">
                      <div class="pull-left">
                        <img src="<?php echo base_url().'assets/images/user_blank.png'?>" class="img-circle" alt="User Image" style="height: 25px;">
                      </div>
                      <h4>
                        <?php echo $email;?>
                      </h4>
                        <small><i class="fa fa-clock-o"></i> <?php echo $subscribe_date;?></small>
                    </a>
                  <!-- end message -->
                  <?php endforeach;?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url().'contact/view'?>">Lihat Semua Subscriber</a></li>
            </ul>
          </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php
                    if ($this->foto_profil != ''){
                        echo '<img class="pull-xs-left m-r-2 border-round" style="width: 50px; height: 50px;padding:6px" src="'.base_url('files/akun').'/'.$this->foto_profil.'">';
                    }else{
                        echo '<img class="pull-xs-left m-r-2 border-round" style="width: 50px; height: 50px;padding:6px" src="'.base_url('files/akun').'/default.jpg">';
                    }
            ?>
            <span class="hidden-md"><?php echo $this->realname;?></span>
          </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url().'akun/view';?>">Profil</a></li>
              <li><a href="<?php echo site_url().'akun/editPassword';?>">Ubah Password</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo site_url().'login/logout';?>"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Keluar</a></li>
            </ul>
        </li>

        <li>
            <a href="<?php echo base_url().'../pukka_web/Homepage/index'?>" target="_blank" title="Lihat Website"><i class="fa fa-globe"></i></a>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

<!-- mulai content-->
  
  <div class="px-content">
    <?php $this->layout->set_content($set['html'], $set['data']);?>
  </div>
<!-- akhir content-->
  <footer class="px-footer px-footer-bottom p-t-1">
    &nbsp;
  </footer>
