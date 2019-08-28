<ol class="breadcrumb page-breadcrumb">
    <li><a href="<?php echo site_url('home/view');?>">Beranda</a></li>
    <li class="active">Tampil Data</li>
</ol>
<div class="page-header">
    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-gear"></i>Pengaturan Group</span></h1>
</div>

<div class="panel">
    <div class="panel-body">
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
                        <th style="width:10%">Aksi</th>
                        <th style="width:27%">Nama Group</th>
                        <th style="width:22%">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach($list_group as $value){
                        ?>
                        <tr>
                            <td class="tekscenter"><?php echo $no;?></td>
                            <td class="tekscenter">
                                <div class="btn-action">
                                    <a href="<?php echo site_url('group/edit/'.$value->groupId)?>" class="btn btn-default btn-xs load <?php echo $this->updateon ?>" data-toggle="tooltip" data-placement="top" title="Ubah Data">
                                        <img src="<?php echo base_url().'assets/images/icon-edit.png'?>">
                                    </a>
                                    <a href="<?php echo site_url('group/delete/'.$value->groupId)?>" class="btn btn-default btn-flat btn-xs <?php echo $this->deleteon ?>" data-toggle="tooltip" data-placement="top" title="Hapus Data" data-confirm="Anda yakin akan menghapus data?">
                                        <img src="<?php echo base_url().'assets/images/icon-delete.png'?>">
                                    </a>
                                </div>
                            </td>
                            <td><?php echo $value->groupName;?></td>
                            <td><?php echo $value->description;?></td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>    
 <script>
    $(function() {
      $('#datalist').dataTable();
      $('#datalist_wrapper .table-caption').html('<a href="<?php echo site_url();?>group/add" class="btn pull-right load"><img src="<?php echo base_url();?>assets/images/icon-add.png"> Tambah Data</a>');
      $('#datalist_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });
  </script>
