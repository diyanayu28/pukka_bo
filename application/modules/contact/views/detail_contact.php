<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('contact/view');?>">List Data</a></li>
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

        <form id="defaultForm" method="post" action="<?php echo site_url('contact/detailAction/'.$id_contact);?>" class="form-horizontal" enctype="multipart/form-data">    
            <div class="form-panel">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Name
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="hidden-xs">: </span><?php echo $name?>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Email
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="hidden-xs">: </span><?php echo $email?>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Subject
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <span class="hidden-xs">: </span><?php echo $subject?>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Message
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="message" style="height:200px;" readonly="true"><?php echo $message; ?></textarea>        
                    </div>
                </div> 
            </div>

                <div class="col-lg-6 col-lg-offset-3">
                        <a href="<?php echo site_url('contact/view')?>" class="btn btn-default btn-sm pull-center">
                            <img src="<?php echo base_url();?>assets/images/icon-back.png"> Kembali
                        </a>
                </div>
                </div>                                     
            </div>
        </form> 
    </div>
</div>    
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#loader').remove();    
        $('#spiner').remove(); 
        $('#defaultForm').formValidation({
            message: 'This value is not valid',
            fields: {
                jrsKode: {
                    validators: {
                        notEmpty: {
                            message: '<b>Kode Jurusan</b> tidak boleh kosong'
                        }
                    }
                },
                suNama: {
                    validators: {
                        notEmpty: {
                            message: '<b>Nama BKU</b> tidak boleh kosong'
                        }
                    }
                }
            }
        });
    });

</script>   