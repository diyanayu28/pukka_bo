<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li class="active">Tampil Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-user"></i>Akun Pribadi</h1>
</div> 
<form id="defaultForm" method="post" action="<?php echo site_url('akun/update/'.$data_by_id->userId);?>" class="form-horizontal" enctype="multipart/form-data">
    <div class="panel">
        <div class="panel-body">
            <div class="btn-toolbar">
                <a href="<?php echo site_url('akun/editPassword')?>" class="btn btn-default btn-sm load <?php echo $this->updateon; ?>">
                    <img src="<?php echo base_url();?>assets/images/icon-setting.png"> Ubah Kata Sandi
                </a>
            </div>
            <br>
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
            <div class="form-panel" style="background-color:#fff">
                <div class="col-sm-12 col-md-12 col-lg-4 text-center">
                    <?php
                    if (!empty($data_by_id->foto)){
                        echo '<img class="avatar-view" src="'.base_url('files/akun').'/'.$data_by_id->foto.'" style="width:200px;height:auto;border:8px solid #ccc">';
                    }else{
                        echo '<img class="avatar-view" src="'.base_url('files/akun').'/default.jpg" style="width:200px;height:auto;border:8px solid #ccc">';
                    }
                    ?>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        <div class="col-lg-3 control-div">Nama Lengkap</div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="realname" value="<?php echo $data_by_id->realname; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-3 control-div">Username</div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $data_by_id->username; ?>">
                            <span id="username_result"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 control-div">Akses</div>
                        <div class="col-lg-9">

                            <input type="hidden" class="form-control" name="groupId" value="<?php echo $data_by_id->groupId;?>">
                            <input type="text" class="form-control" name="groupname" value="<?php echo $data_by_id->groupName;?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-lg-3 control-div">Status</div>
                        <div class="col-lg-9">
                            <?php 
                            if($data_by_id->active == "Yes"){
                                $stat = "Aktif";
                            }else{
                                $stat = "Tidak Aktif";
                            }
                            ?>
                            <input type="text" name="active" class="form-control" value="<?php echo $stat;?>" readonly />
                        </div>
                        <input type="hidden" name="active" value="<?php echo $data_by_id->active;?>">
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 control-div">Foto</div>
                        <div class="col-lg-9">

                            <input type="file" name="foto" class="InputBox"> <span id="file_error"></span>
                            <input type="hidden" name="foto" value="<?php echo $data_by_id->foto?>">
                            Foto sebelumnya : <?php echo $data_by_id->foto?>
                        </div>
                    </div>
                    <div class="form-group" style="margin:top:50px;">
                        <div class="col-lg-9 col-lg-offset-3">
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
                            <a href="<?php echo site_url('home/view');?>" class="btn btn-info">
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
    </div>
</form> 
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#username').change(function(){ // Change function for username; #username means the id of username input field. 
           var username = $('#username').val(); // Get the value of input username field and store it in a variable called username.
           if(username != ''){ // Check whether username input field is not a blank. If it is not empty, then the Ajax request will be executed.
            $.ajax({ // Beginning of Ajax request.
             url: "<?php echo base_url(); ?>/User/checkUsername", // URL for the controller function which is needed to be called to get the results. A request is sent to this URL.
             method: "POST", // Method is taken as POST since we are using POST method to send request.
             data: {username:username}, // Sends the username data to the server.
             success: function(data){ // Success callback function to be called after a request is successfully sent.
              $('#username_result').html(data); // If data is received from the server(message) it should be displayed.
             }
            });
           }
        });

        $('#loader').remove();    
        $('#spiner').remove(); 
        $("#reset").click(function(){
        $('#defaultForm').data('formValidation').resetForm();
     }); 
        $('#defaultForm').formValidation({
            message: 'This value is not valid',
            fields: {
                realname:{
                    validators: {
                        notEmpty: {
                            message: '<b>Nama Lengkap</b> tidak boleh kosong'
                        }
                    }
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: '<b>Nama Pengguna</b> tidak boleh kosong'
                        }
                    }
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