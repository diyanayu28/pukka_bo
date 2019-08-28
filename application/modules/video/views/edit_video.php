<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('video/view');?>">List Data</a></li>
    <li class="active">Ubah Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Ubah <?php echo $this->title?> </h1>
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

        <form id="validation-form" method="post" action="<?php echo site_url('video/editAction/'.$id_video);?>" class="form-horizontal" enctype="multipart/form-data">    
            <div class="form-panel">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Video Title <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="video_title" class="form-control" value="<?php echo $video_title; ?>">
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Link Embed Video <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="link_embed"><?php echo $link_embed; ?></textarea>
                    </div>
                </div> 


                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-lg-9">
                            <div class="col-lg-9">
                                <?php
                                if($status == "Y"){
                                    $checked1='checked';
                                    $checked2='';
                                    }else{
                                    $checked1='';
                                    $checked2='checked';
                                    }
                                ?>
                            <div class="option">
                                <input type="radio" name="status" id="optionsRadios1" value="Y" <?php echo $checked1;?> /> Aktif
                            </div>
                            <div class="option">
                                <input type="radio" name="status" id="optionsRadios1" value="N" <?php echo $checked2;?> /> Tidak Aktif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-lg-6 col-lg-offset-3">
                        <input type="hidden" name="id_video" value="<?php echo $id_video?>">
                        <button type="submit" class="btn btn-primary" name="simpan"><i class="fa fa-save"></i> Simpan</button>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>  

                <!-- Modal -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </h5>
                          </div>
                          <div class="modal-body">
                            Apakah Anda yakin ingin meninggalkan halaman ini ?
                          </div>
                          <div class="modal-footer">
                            <a href="<?php echo site_url('video/view');?>" class="btn btn-info">
                                Ya
                            </a> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                   <!--/ modal-->                               
            </div>
        </form> 
    </div>
</div>    

<?php $this->load->view('petunjuk/petunjuk_addedit');?>

<script type="text/javascript"> 
    $(function() {
    $('#validation-form').pxValidate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'link_embed': {
                    required: true,
                    
                }
            }
        });
    });
</script>   