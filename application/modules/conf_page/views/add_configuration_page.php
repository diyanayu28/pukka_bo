<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('conf_page/view');?>">List Data</a></li>
    <li class="active">Tambah Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-gear"></i>Tambah Halaman</span></h1>
</div>
<div class="panel">
    <div class="panel-body">
        <form id="validation-form" method="post" action="<?php echo site_url('conf_page/addAction');?>" class="form-horizontal">
            <div class="form-panel" style="background-color:#fff">
                <div class="col-lg-8">
                    <div class="panel-heading">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Page<span class="required" style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="page" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Label Page<span class="required" style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="labelPage">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Sub Page<span class="required" style="color: red">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="subPage" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Action</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="action">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 control-label">Status<span class="required" style="color: red">*</span></div>
                            <div class="col-lg-9">
                                <div class="option">
                                    <input type="radio" name="status" id="optionsRadios1" value="1" checked /> Aktif
                                </div>
                                <div class="option">
                                    <input type="radio" name="status" id="optionsRadios1" value="0" /> Tidak Aktif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3 control-div">&nbsp;</div>
                                <div class="col-lg-9">
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
                                        <a href="<?php echo site_url('conf_page/view');?>" class="btn btn-info">
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
        </br>
    </form>   
</div>

<script type="text/javascript"> 
    $(function() {
    $('#validation-form').pxValidate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'page': {
                    required: true
                    
                },
                'labelPage': {
                    required: true
                    
                },
                'subPage': {
                    required: true
                    
                },
                'status': {
                    required: true
                    
                }
            }
        });
    });
</script>