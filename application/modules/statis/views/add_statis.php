
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/css/jquery-ui.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/tag-it/css/jquery.tagit.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/tag-it/css/tagit.ui-zendesk.css');?>">
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/tag-it/js/tag-it.min.js"></script>


<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li><a href="<?php echo site_url('statis/view');?>">List Data</a></li>
    <li class="active">Tambah Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Tambah <?php echo $this->title?> </h1>
</div>
<div class="panel">
    <div class="panel-body">
        <form id="validation-form" method="post" action="<?php echo site_url('statis/addAction');?>" class="form-horizontal" enctype="multipart/form-data">
            
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
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Kategori <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <select name="id_category" class="form-control">
                            <option value="" required="true">.: Select Category :.</option>
                            <?php
                            if (!empty($option_kategori)){
                                foreach ($option_kategori as $value) {
                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Page Title <span class="required" style="color: red">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="page_title" class="form-control" required="true">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Page Content <span style="color: red">*</span>
                    </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <textarea id="editor1" class="form-control" name="page_content"></textarea>
                        </div>
                </div> 

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Meta Description
                    </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <textarea class="form-control" name="meta_desc"></textarea>
                        </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Meta Keyword
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" name="meta_keyword" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Tag
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <input type="text" class="form-control" name="tag_name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Status
                    </label>
                        <div class="col-lg-9">
                            <div class="col-lg-9">
                                <div class="option">
                                    <input type="radio" name="status" id="optionsRadios1" value="Y"> Aktif
                                </div>
                                <div class="option">
                                    <input type="radio" name="status" id="optionsRadios1" value="N"> Tidak Aktif
                                </div>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12">
                        Image
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" name="image_static" class="InputBox"> <span id="file_error"></span>
                    </div>
                </div>
  
                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
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
                            <a href="<?php echo site_url('statis/view');?>" class="btn btn-info">
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

    CKEDITOR.replace('editor1' ,{
        filebrowserImageBrowseUrl : '<?php echo base_url(); ?>assets/kcfinder'
      });

    $(function(){
        $('#validation-form').pxValidate({
            ignore: '.ignore, select2-input',
            focusInvalid: false,
            rules: {
                'id_category': {
                    required: true
                },
                'page_title': {
                    required: true
                },
                'page_content': {
                    required: true
                }, 
                'image_static': {
                    required: true
                },
                'status': {
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

    $('[name=tag_name]').tagit({
        allowSpaces: true,
        tagSource: function( request, response ) {
            $.ajax({
                url: "<?php echo site_url('tag/get_autocomplete_tag_json');?>",
                dataType: "json",
                type: 'POST',
                data: {
                    q: request.term
                },
                success: function( data ) {
                    response( data );
                }
            });
        }
    });

    $(function () {
    $(".textarea").wysihtml5();
  });


</script>

<script src="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>	

<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>