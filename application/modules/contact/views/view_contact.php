<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li class="active">Tampil Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i><?php echo $this->title?> </h1>
</div>
<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
                
                <a href="<?php echo $url_restore;?>" class="btn btn-default pull-right" style="margin-right: 17px; margin-bottom: 10px;"><img src="<?php echo base_url('assets/images/btn/icon-sync.png');?>"> Restore</a>

            </div>
            
                <div class="table-responsive">
                    <?php if (!empty($msg[2])){ ?>
                    <div class="alert alert-<?php echo $msg[0];?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-div="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <i class="<?php echo $msg[1];?>"></i><label><?php echo $msg[2];?></label>
                    </div>
                    <?php } ?>
                    <table id="datalist" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Aksi</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date Received</th>
                            </tr>
                        </thead>
                    </table>
                </div>
    </div>    
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#datalist').dataTable({
            "processing": true,
            "serverSide": true,
            columns: [
                { "data": "no", "class" : "text-center", "width":"5%", 'sortable' : false },
                { "data": "aksi", "class" : "text-center", "width":"14%", 'sortable' : false },
                { "data": "name", "class" : "text-center", 'sortable' : true},
                { "data": "email", "class" : "text-left", 'sortable' : false},
                { "data": "subject", "class" : "text-left", 'sortable' : false},
                { "data": "date_received", "class" : "text-left", 'sortable' : false}
            ],
            "order" : [],
            "ajax": {
                "url" : "<?php echo $url_get_json;?>",
                "type" : "POST",
                "data" : {}
            }
        });
        $('#datalist_wrapper .datalist_filter input').attr('placeholder', 'Search...');
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
                    