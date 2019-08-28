<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('conf_menu/view');?>">Tampil Data</a></li>
    <li class="active">Tambah Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-gear"></i>Tambah Menu</h1>
</div>
<div class="panel">
    <form id="validation-form" method="post" action="<?php echo site_url('conf_menu/addAction');?>" class="form-horizontal">
        <div class="panel-body">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="col-lg-3 control-div">Pilih Page<span class="required" style="color: red"> *</span></div>
                    <div class="col-lg-9">
                        <a data-toggle="modal" data-target="#pilih_page" data-dismiss="modal">
                            <div class="input-group">
                                <input type="hidden" name="pageId" value="<?php if($pageId!=""){ echo $pageId; } ?>" class="form-control" placeholder="Pilih Halaman" >
                                <input type="text" name="pagediv" value="<?php if($pageId!=""){ echo $page_by_id->labelPage; } ?>" class="form-control" placeholder="Pilih Halaman" >
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-success"><i class="fa fa-ellipsis-h"></i></button> 
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Nama Menu<span class="required" style="color: red"> *</span></div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="menuName">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Icon Menu</div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="iconMenu">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Menu Style<span class="required" style="color: red"> *</span></div>
                                        <div class="col-lg-9">
                                            <select name="menuStyle" class="form-control">
                                                <option value="single">Single Menu</option>
                                                <option value="parent">Parent Menu</option>
                                                <option value="sub">Sub Menu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Parent Menu<span class="required" style="color: red"> *</span></div>
                                        <div class="col-lg-9">
                                            <select name="menuParentId" class="form-control">
                                                <option value="0">Tidak Menggunakan Parent</option>
                                                <?php
                                                foreach ($list_menu as $parent) {
                                                    if($parent->menuStyle == 'parent'){
                                                        echo "<option value=".$parent->menuId.">".$parent->menuName."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Menu Order<span class="required" style="color: red"> *</span></div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="menuOrder">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Menu Position<span class="required"> *</span></div>
                                        <div class="col-lg-9">
                                            <select name="menuPosition" class="form-control">
                                                <option value="">.: Select Position :.</option>
                                                <option value="sidebar">Sidebar</option>
                                                <option value="content">Content</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-3 control-div">Description</div>
                                        <div class="col-lg-9">
                                            <textarea class="form-control" name="description"></textarea>
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
                                        <a href="<?php echo site_url('conf_menu/view');?>" class="btn btn-info">
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
</div>


<div class="modal fade" id="pilih_page" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="#" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></i> Pilih Page</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover" id="dataTables-page">
                    <thead>
                        <tr>
                            <th style="width:5%">No</th>
                            <th style="width:20%">Aksi </th>
                            <th>Page</th>
                            <th>Label Page </th>
                            <th>Sub Page </th>
                            <th>Action Page</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($list_page as $value) {
                        ?>
                        <tr>
                            <td class="tekscenter"><?php echo $no ?> </td>
                            <td class="tekscenter">
                                <a data-toggle="tooltip" data-placement="top" title="Pilih Page" href="<?php echo site_url('conf_menu/add/'.$value->pageId)?>" class="btn btn-default btn-xs">
                                <img src="<?php echo base_url();?>assets/images/icon-article.png">
                                </a>
                            </td>
                            <td><?php echo $value->page ?></td>
                            <td><?php echo $value->labelPage ?></td>
                            <td><?php echo $value->subPage ?></td>
                            <td><?php echo $value->action ?></td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer clearfix">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
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
                'pageId': {
                    required: true
                    
                },
                'menuName': {
                    required: true
                    
                },
                'menuStyle': {
                    required: true
                    
                },
                'menuParentId': {
                    required: true
                    
                },
                'menuOrder': {
                    required: true
                    
                },
                'menuPosition': {
                    required: true
                    
                }
            }
        });
    });
</script>
					