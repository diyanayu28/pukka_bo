    
    <div class="row top_tiles">
        <article class="breadcrumbs">
            <a class="load" href="<?php echo site_url('home/view');?>">Beranda</a>
            <div class="breadcrumb_divider"></div>
            <a class="current">Tampil Data</a>
        </article>
        <div class="x_panel">
            <div class="x_title">
                <h2>Data Pegawai <small>Tampil Data</small></h2>
                <div class="filter <?php echo $this->createon; ?>">
                    <a href="<?php echo site_url('employee/add');?>" class="btn btn-default btn-sm pull-right load">
                        <img src="<?php echo $this->config->item('path_btn').'icon-add.png'?>"> Tambah Data
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <?php if (!empty($msg[2])){ ?>
                <div class="alert alert-<?php echo $msg[0];?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-div="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
                </div>
                <?php } ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-employe">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Register</th>
                                <th>Page</th>
                                <th>Sub Page</th>
                                <th>Label</th>
                                <th>Group</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
        <?php $this->load->view('petunjuk/petunjuk_aksi');?>
    </div>
<script type="text/javascript">
$(document).ready(function(){
    $('#dataTables-employe').dataTable({
        "processing": true,
        "serverSide": true,
        "columns": [
            { "data": "no", "class" : "text-center", 'sortable' : false },
            { "data": "aksi", "class" : "text-center", 'sortable' : false },
            { "data": "register", "class" : "text-center", 'sortable' : false },
            { "data": "page", "class" : "text-center", 'sortable' : true},
            { "data": "subPage", "class" : "text-left", 'sortable' : true},
            { "data": "labelPage", "class" : "text-left", 'sortable' : true},
            { "data": "groupName", "class" : "text-center", 'sortable' : true},
        ],
        "order" : [[6, 'desc']],
        "ajax": {
            "url" : "<?php echo $url_get_json;?>",
            "type" : "POST",
            "data" : {}
        }
    });
});

$(document).on('click', '#dataTables-employe a.btn-delete', function(e){
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal').length) {
        $('body').append('<div id="dataConfirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 id="dataConfirmLabel">Konfirmasi</h4></div><div class="modal-body"></div><div class="modal-footer"><a class="btn btn-info" id="dataConfirmOK">Ya</a><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Tidak</button></div></div></div></div>');
    } 
    $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
    $('#dataConfirmOK').attr('href', href);
    $('#dataConfirmModal').modal({show:true});
    return false;
});
</script>
                    