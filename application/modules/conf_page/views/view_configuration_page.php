<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li class="active">Tampil Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-gear"></i>Pengaturan Halaman</span></h1>
</div>

<div class="panel">
    <div class="panel-body">

        <div class="box box-danger">
            <?php $this->load->view('petunjuk/petunjuk_page');?>    
        </div>

        <?php if($msg[0] == '1'){ ?>
            <script>
                $(document).ready(function(){ setTimeout(function(){ $(".alert").removeClass("hidden"); $(".alert").addClass("fade in"); },500); });
                setTimeout(function(){ <?php unset($_SESSION['pesan']);?> }, 3000);
            </script>
        <?php } ?>
        <div class="alert alert-success alert-dismissible hidden" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-div="Close"><span aria-hidden="true">×</span>
            </button>
            <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
        </div>
        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover" id="datalist">
                <thead>
                    <tr>
                        <th style="width:5%">No</th>
                        <th style="width:12%">Aksi</th>
                        <th style="width:20%">Register</th>
                        <th style="width:21%">Page</th>
                        <th style="width:16%">Label Page</th>
                        <th style="width:14%">Sub Page</th>
                        <th style="width:14%">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

    </div>
</div>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('#datalist').dataTable({
                "processing": true,
                "serverSide": true,
                "columns": [
                { "data": "no", "class" : "text-center", 'sortable' : false },
                { "data": "aksi", "class" : "text-center", 'sortable' : false },
                { "data": "register", "class" : "text-center", 'sortable' : false},
                { "data": "page", "class" : "text-left", 'sortable' : true},
                { "data": "labelPage", "class" : "text-left", 'sortable' : true},
                { "data": "subPage", "class" : "text-left", 'sortable' : true},
                { "data": "action", "class" : "text-left", 'sortable' : true}
                ],
                "order" : [],
                "ajax": {
                    "url" : "<?php echo $url_get_json;?>",
                    "type" : "POST",
                    "data" : {}
                }
            });
            $('#datalist_wrapper .table-caption').html('<a href="<?php echo site_url();?>conf_page/add" class="btn pull-right load"><img src="<?php echo base_url();?>assets/images/icon-add.png"> Tambah Data</a>');
            $('#datalist_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });

        $(document).on('click', '#datalist a.btn-delete', function(e){
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