<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('service/view');?>">List Data</a></li>
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

        <form id="validation-form" method="post" action="<?php echo site_url('service/detailAction');?>" class="form-horizontal" enctype="multipart/form-data">    
            <div class="form-panel">
                <div class="table-responsive">
                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Category
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $category_name?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Service Name
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $service_name?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    SEO Title
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $service_seo?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Description
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="text-align: justify;">
                                    <?php echo $description?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Meta Keyword
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $meta_keyword?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Meta Description
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="text-align: justify;">
                                    <?php echo $meta_desc; ?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Tag
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $tag_name ?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Image
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo(!empty($image)) ? '<img class="avatar-view" src="'.base_url().'files/service/'.$image.'" style="width:200px;height:auto;border:8px solid #ccc">' : '';?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Posted at
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo $posted_at?>
                                </div>
                            </tr>
                        </thead>
                    </table>

                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <label class="col-md-3 col-sm-3 col-xs-12">
                                    Status
                                </label>
                            </tr>
                            <tr>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php 
                                            if ($status == 'Y') {
                                                echo "<span class='badge bg-success'>Aktif</span>";
                                            }else{
                                                echo "<span class='badge bg-danger'>Tidak Aktif</span>";
                                            }
                                        ?>
                                </div>
                            </tr>
                        </thead>
                    </table>
                </div>                                    
            </div>
            <div class="col-lg-6 col-lg-offset-3">
                <a href="<?php echo site_url('service/view')?>" class="btn btn-default btn-sm pull-center">
                    <img src="<?php echo base_url();?>assets/images/icon-back.png"> Kembali
                </a>
            </div>
        </form> 
    </div>
</div>    