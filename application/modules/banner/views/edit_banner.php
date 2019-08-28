<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('banner/view');?>">List Data</a></li>
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


        <form id="validation-form" method="post" action="<?php echo site_url('banner/editAction/'.$id_banner);?>" class="form-horizontal" enctype="multipart/form-data">    
            <div class="form-panel">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Label Banner <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="label_banner" class="form-control" value="<?php echo $label_banner?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Banner Category <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="banner_category" class="form-control">
                            <option value="">.: Pilih :.</option>
                            <?php
                                if (!empty($option_category)) {
                                    foreach ($option_category as $key => $value) {
                                        echo '<option value="'.$key.'" '.set_select('banner_category', $key, ($banner_category == $value) ? true : false).'>'.$value.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Banner Description
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="banner_desc" style="height:200px;"><?php echo $banner_desc; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Banner <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="banner" class="InputBox"><span id="file_error"></span>
                        <input type="hidden" name="banner" value="<?php echo $banner?>">
                        <?php echo(!empty($banner)) ? 'File Sebelumnya : <a href="'.base_url().'files/gambar/'.$banner.'" target="_blank">'.$banner.'</a>' : '';?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Alt Text
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="alt_text" class="form-control" value="<?php echo $alt_text?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Status
                    </label>
                        <div class="col-lg-9">
                            <div class="col-lg-9">
                                <?php
                                if($i_status == "Y"){
                                    $checked1='checked';
                                    $checked2='';
                                    }else{
                                    $checked1='';
                                    $checked2='checked';
                                    }
                                ?>
                            <div class="option">
                                <input type="radio" name="i_status" id="optionsRadios1" value="Y" <?php echo $checked1;?> /> Aktif
                            </div>
                            <div class="option">
                                <input type="radio" name="i_status" id="optionsRadios1" value="N" <?php echo $checked2;?> /> Tidak Aktif
                            </div>
                        </div>
                    </div>
                </div>

                </div>

                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-3">
                        <input type="hidden" name="id_banner" value="<?php echo $id_banner?>">
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
                            <a href="<?php echo site_url('banner/view');?>" class="btn btn-info">
                                Ya
                            </a> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                   <!--/ modal-->
                </div>                                     
            </div>
        </form> 
        <?php $this->load->view('petunjuk/petunjuk_addedit');?>
    </div>
</div>    
<script type="text/javascript"> 
    $(function() {
    $('#validation-form').pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'label_banner': {
                required: true
            },
            'banner_category': {
                required: true
            }
        }
         
    });

    $('input[type=file]').change(function () {
        $("#file_error").html("").css("color","#FF0000");
        $(".InputBox").css("border-color","#F0F0F0");

        var val = $(this).val().toLowerCase();
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png|gif)$");
        if(!(regex.test(val))) {
            $(this).val('');
            $(".InputBox").css("border-color","#FF0000");
            $("#file_error").html("Please upload .jpg or .png or .GIF file of notice");
            
        return false;
        } 

        if (this.files[0].size > 1000000 || this.files[0].size > 1000000)
            {
                //reset file upload control
               $(this).val('');
               //show an alert to the user
               $("#file_error").html("The file you are trying to upload is too large (max 1 MB)");
               $(".InputBox").css("border-color","#FF0000");
               //alert('Allowed file size exceeded 1 MB');


            }
        });

});
</script>   