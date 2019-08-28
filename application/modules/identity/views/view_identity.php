<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
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

        <form id="validation-form" method="post" action="<?php echo site_url('identity/editAction');?>" class="form-horizontal" enctype="multipart/form-data"> 

            <div class="form-panel" style="background-color:#fff">
                <!--go to edit-->
                <div class="form-group">
                    <a href="<?php echo site_url('identity/edit');?>" class="btn btn-default pull-left" style="margin-left: 950px;">
                        <img src="<?php echo base_url('assets/images/icon-edit.png');?>"> Edit</a> 
                </div>
                <!--/-->
                <div class="col-sm-12 col-md-12 col-lg-4 text-center">
                    
                    <?php echo(!empty($favicon)) ? '<img class="avatar-view" src="'.base_url().'files/identity/'.$favicon.'" style="width:200px;height:auto;border:8px solid #ccc">' : '';?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Website Name
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $website_name?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Website Address
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $website_address?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Company Description
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8" style="text-align: justify;">
                            <?php echo $description; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Company Address
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8" style="text-align: justify;">
                            <?php echo $address; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Phone
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $phone?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Email
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $email?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Google Plus
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $google_plus?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Twitter
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $twitter?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Facebook
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $facebook?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            LinkedIn
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $linkedin?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Instagram
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo $instagram?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Meta Description
                        </label>
                        <div class="col-lg-8">
                            <textarea class="form-control" readonly="true"><?php echo $meta_description; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Meta Keyword
                        </label>
                        <div class="col-lg-8">
                            <textarea class="form-control" readonly="true"><?php echo $meta_keyword; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">
                            Icon
                        </label>
                        <div class="col-lg-9">
                            <span class="hidden-xs">: </span><?php echo(!empty($favicon)) ? '<a href="'.base_url().'files/identity/'.$favicon.'" target="_blank">'.$favicon.'</a>' : '';?>
                        </div>
                    </div>
                </div>
            </div>     
        </form> 
    </div>
</div>    