<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('akun/view');?>">Tampil Data</a></li>
    <li class="active">Ubah Password</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-lock"></i>Ubah Password</h1>
</div>  
<form id="defaultForm" method="post" action="<?php echo site_url('akun/updatePassword/'.$data_by_id->userId);?>" class="form-horizontal">
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
                    <div class="col-lg-6 control-div">Kata Sandi Lama</div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="pass_old" autocomplete=”off”>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 control-div">Kata Sandi Baru</div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="pass_new" autocomplete=”off”>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 control-div">Ulangi Kata Sandi Baru</div>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="pass_new_retype" autocomplete=”off”>
                    </div>
                </div>
                <div class="form-group" style="margin:top:50px;">
                    <div class="col-lg-6 col-lg-offset-6">
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
</form> 
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#loader').remove();    
        $('#spiner').remove(); 
        $('#defaultForm').formValidation({
            message: 'This value is not valid',
            fields: {
                pass_old: {
                    validators: {
                        notEmpty: {
                            message: '<b>Kata Sandi Lama</b> tidak boleh kosong'
                        }
                    }
                },
                pass_new: {
                    validators: {
                        notEmpty: {
                            message: '<b>Kata Sandi Baru</b> tidak boleh kosong'
                        }
                    }
                },
                pass_new_retype: {
                    validators: {
                        notEmpty: {
                            message: '<b>Ulangi Kata Sandi Baru</b> tidak boleh kosong'
                        },
                        identical: {
                            field: 'pass_new',
                            message: '<b>Kata Sandi Baru</b> tidak sesuai'
                        }
                    }
                }
            }
        });
    });
</script> 