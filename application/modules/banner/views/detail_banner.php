<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('banner/view');?>">List Data</a></li>
    <li class="active">Detail Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Detail <?php echo $this->title?> </h1>
</div>
<div class="panel">
    <div class="panel-body">
        <?php if (!empty($msg[2])){ ?>
        <div class="alert alert-<?php echo $msg[0];?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-div="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
        </div>
        <?php } ?>

        <form id="validation-form" method="post" action="<?php echo site_url('banner/detailAction');?>" class="form-horizontal" enctype="multipart/form-data"> 

            <div class="form-panel" style="background-color:#fff">
                <div class="col-sm-12 col-md-12 col-lg-4 text-center">
                    
                    <?php echo(!empty($banner)) ? '<img class="avatar-view" src="'.base_url().'files/gambar/'.$banner.'" style="width:200px;height:auto;border:8px solid #ccc">' : '';?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Label Banner
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $label_banner?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Banner Category
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $banner_category?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Banner Description
                        </label>
                        <div class="col-lg-9">
                            <textarea class="form-control" name="banner_desc" style="height:100px;" readonly="true"><?php echo $banner_desc; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Alt Text
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $alt_text?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Banner
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo(!empty($banner)) ? '<a href="'.base_url().'files/gambar/'.$banner.'" target="_blank">'.$banner.'</a>' : '';?>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Status
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="hidden-xs">: </span>
                            <?php 
                                if ($i_status == 'Y') {
                                    echo "<span class='badge bg-success'>Aktif</span>";
                                }else{
                                    echo "<span class='badge bg-danger'>Tidak Aktif</span>";
                                }
                            ?>
                    </div>
                </div>
                    
                    <div class="form-group" style="margin:top:50px;">
                        <div class="col-lg-9 col-lg-offset-3">
                            <a href="<?php echo site_url('banner/view')?>" class="btn btn-default btn-sm pull-center">
                            <img src="<?php echo base_url();?>assets/images/icon-back.png"> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>     
        </form> 
    </div>
</div>    