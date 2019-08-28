<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('identity/view');?>">List Data</a></li>
    <li class="active">Ubah Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Ubah <?php echo $this->title?> </h1>
</div>

<form id="validation-form" method="post" action="<?php echo site_url('identity/editAction/'.$id_identity);?>" class="form-horizontal" enctype="multipart/form-data"> 
<div class="col-md-6">
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
     
            <div class="form-panel">

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Website Name <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="website_name" class="form-control" required="true"value="<?php echo $website_name?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Website Address <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="website_address" class="form-control" value="<?php echo $website_address?>">
                    </div>
                </div>  
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Meta Description
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="meta_description"><?php echo $meta_description?>
                        </textarea>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Meta Keyword
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="meta_keyword" class="form-control" value="<?php echo $meta_keyword?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Ubah Icon
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="file" name="favicon" class="InputBox"><span id="file_error"></span>
                        <input type="hidden" name="favicon" value="<?php echo $favicon?>">
                        <?php echo(!empty($favicon)) ? 'File Sebelumnya : <a href="'.base_url().'files/identity/'.$favicon.'" target="_blank">'.$favicon.'</a>' : '';?>
                        <a href="<?= base_url(); ?>identity/deleteImage/<?= $data['favicon']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Gambar">
                        </a>
                    </div>
                </div>

            </div>

                    <div class="col-lg-6 col-lg-offset-3">
                        <input type="hidden" name="id_identity" value="<?php echo $id_identity?>">
                        <button type="submit" class="btn btn-primary" name="simpan"><i class="fa fa-save"></i> Simpan</button>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal"><i class="fa fa-times"></i> Batal</a>
                    </div>
                </div>  

                <?php $this->load->view('petunjuk/petunjuk_addedit');?>

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
                            <a href="<?php echo site_url('identity/view');?>" class="btn btn-info">
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

<div class="col-md-6">
<div class="panel">
    <div class="panel-body">
     
            <div class="form-panel">

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Company Description
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="description"><?php echo $description?>
                        </textarea>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Company Address
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <textarea class="form-control" name="address"><?php echo $address?>
                        </textarea>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Phone
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="phone" class="InputBox" value="<?php echo $phone?>"><span id="phone_error"></span>
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Email
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="email" class="form-control" value="<?php echo $email?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Google Plus
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="google_plus" class="form-control" value="<?php echo $google_plus?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Twitter
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="twitter" class="form-control" value="<?php echo $twitter?>">
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Facebook
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="facebook" class="form-control" value="<?php echo $facebook?>">
                    </div>
                </div>  

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        LinkedIn
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="linkedin" class="form-control" value="<?php echo $linkedin?>">
                    </div>
                </div> 

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12">
                        Instagram
                    </label>
                    <div class="col-md-9 col-sm-6 col-xs-12">
                        <input type="text" name="instagram" class="form-control" value="<?php echo $instagram?>">
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
        </form> 
    </div>
</div>    
<script type="text/javascript"> 

    $(function() {
    $('#validation-form').pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'website_address': {
                required: true,
                url: true
            },
            'website_name': {
                required: true
            },
            'email': {
                email: true
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

    $('input[type=text]').change(function (phone) {
        $("#phone_error").html("").css("color","#FF0000");
        $(".InputBox").css("border-color","#F0F0F0");

        var val = $(this).val().toLowerCase();
        var phone = $('input[name="phone"]').val(),
            intRegex = /[0-9 -()+]+$/;
                if((phone.length < 6) || (phone.length > 12) || (!intRegex.test(val)))
                    {
                    $(this).val('');
                    $(".InputBox").css("border-color","#FF0000");
                    $("#phone_error").html("Please enter a valid phone number");

                return false;
                    }
        });
});

</script>   