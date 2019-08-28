<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('akun/view');?>">Tampil Data</a></li>
    <li class="active">Reset Password</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-lock"></i>Reset Password</h1>
</div>  
<form id="validation-form" method="post" action="<?php echo site_url('user/resetPasswordAction/'.$data_by_id->userId);?>" class="form-horizontal">
    <div class="panel">
        <div class="panel-body">
            <?php if($msg[0] == '1'){ ?>
            <script>
                $(document).ready(function(){ setTimeout(function(){ $(".alert").removeClass("hidden"); $(".alert").addClass("fade in"); },500); });
                setTimeout(function(){ <?php unset($_SESSION['pesan']);?> }, 3000);
            </script>
            <?php } ?>
            <div class="alert alert-<?php echo $msg['3']; ?> alert-dismissible hidden" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-div="Close"><span aria-hidden="true">×</span>
                </button>
                <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <div class="col-lg-6 control-div">Kata Sandi Baru <span class="required" style="color: red">*</span></div>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="pass_new" autocomplete=”off” id="pswd">
                    </div>
                    <div class="col-lg-2">
                        <i id= "icon" class="fa fa-eye-slash" style="margin-left: -17px; cursor: pointer;"></i>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-6 control-div">Ulangi Kata Sandi Baru <span class="required" style="color: red">*</span></div>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="pass_new_retype" autocomplete=”off” id="repswd">
                    </div>
                    <div class="col-lg-2">
                        <i id= "icon2" class="fa fa-eye-slash" style="margin-left: -17px; cursor: pointer;"></i>
                    </div>
                </div>

                <div class="form-group" style="margin:top:50px;">
                    <div class="col-lg-6">
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
                                <a href="<?php echo site_url('user/view');?>" class="btn btn-info">
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
    </div>
</form> 
<script type="text/javascript"> 
    $(function() {
    $('#validation-form').pxValidate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'pass_new': {
                    required: true,
                    minlength: 5,
                    pwcheck: true
                    
                },
                'pass_new_retype': {
                    required: true
                }

            },

            messages:{
            'pass_new':{
                minlength: "Your password must be have at least 5 characters long",
                pwcheck: "Your password must be have at least 1 numberic"
                },
            }
            
        });
    // function for show password
            var input = document.getElementById('pswd'),
                input2 = document.getElementById('repswd'),
                icon = document.getElementById('icon'),
                icon2 = document.getElementById('icon2');

               icon.onclick = function () {

                 if(input.className == 'form-control') {
                    input.setAttribute('type', 'text');
                    icon.className = 'fa fa-eye';
                   input.className = '';

                 } else {
                    input.setAttribute('type', 'password');
                    icon.className = 'fa fa-eye-slash';
                   input.className = 'form-control';
                }

               }

               icon2.onclick = function () {

                     if(input2.className == 'form-control') {
                        input2.setAttribute('type', 'text');
                        icon.className = 'fa fa-eye';
                       input2.className = '';

                     } else {
                        input2.setAttribute('type', 'repassword');
                        icon.className = 'fa fa-eye-slash';
                       input2.className = 'form-control';
                    }
               }

        $.validator.addMethod("pwcheck", function(value, element) {
            return /^[A-Za-z0-9\d=!\-@._*]+$/.test(value) // consists of only these
            && /\d/.test(value) // has a digit
            && /[a-z]/.test(value)
        });
    });
</script> 