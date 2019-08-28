<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('conf_page/view');?>">List Data</a></li>
    <li class="active">Edit Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-gear"></i>Edit Group</span></h1>
</div>
<div class="panel">
    <div class="panel-body">
        <form id="validation-form" method="post" action="<?php echo site_url('Group/update/'.$data_by_id->groupId);?>" class="form-horizontal">
            <div class="col-lg-8">
                <div class="form-group">
                    <div class="col-lg-3 control-div">Nama Group<span class="required" style="color: red">*</span></div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="groupName" value="<?php echo $data_by_id->groupName; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-3 control-div">Description</div>
                    <div class="col-lg-9">
                        <textarea class="form-control" name="description"><?php echo $data_by_id->description; ?></textarea>
                    </div>
                </div>  
                <div class="form-group">
                    <div class="col-lg-3 control-label">&nbsp;</div>
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
                                <a href="<?php echo site_url('group/view');?>" class="btn btn-info">
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

<script type="text/javascript"> 
    $(function() {
    $('#validation-form').pxValidate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'groupName': {
                    required: true
                    
                }
            }
        });
    });
</script>