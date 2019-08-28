                <div class="right_col" role="main">      
                    <div class="row top_tiles">
                        <article class="breadcrumbs">
                                <a class="load" href="<?php echo site_url('home/view');?>">Beranda</a>
                                <div class="breadcrumb_divider"></div>
                                <a class="current">Tampil Data</a>
                            </article>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List Pemberitahuan <small>Tampil Data</small></h2>
                                    <div class="filter">
                                        <a href="<?php echo site_url('user/add');?>" class="btn btn-default btn-sm pull-right load">
                                        <img src="<?php echo base_url();?>assets/images/icon-add.png"> Tambah Data
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if($msg[0] == '1'){ ?>
                                    <script>
                                        $(document).ready(function(){ setTimeout(function(){ $(".alert").removeClass("hidden"); $(".alert").addClass("fade in"); },500); });
                                        setTimeout(function(){ <?php unset($_SESSION['pesan']);?> }, 3000);
                                    </script>
                                    <?php } ?>
                                    <div class="alert alert-success alert-dismissible hidden" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-div="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
                                    </div>
                                    <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="dataTables-notif">
                                        <thead>
                                            <tr>
                                                <th>List Notifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($list_notification_all as $value){
                                        if($value->notifStatus == 1){
                                            $color = "style='background-color:#FFF3DD'";
                                        }else{
                                            $color = "";
                                        }
                                        ?>
                                        <tr <?php echo $color;?>>
                                            <td>
                                                <a href="<?php echo site_url('tagihan/data/'.$value->pinjamanId.'/'.$value->notifId);?>">
                                                    <strong><?php echo $value->pinjamanNamaLengkap.'</strong><br/> memiliki '.$value->notifPesan.' Periode '.format_bulan($value->tghTanggal);?></td>
                                                </a>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>    
                            <?php $this->load->view('petunjuk/petunjuk_aksi');?>
                    
                    </div>
                </div>
                    