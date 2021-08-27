<?php if ($_SESSION['level'] != 'Admin') { ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KATEGORI</h2>
            </div>
            <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Perizinan ditolak</strong> karena tipe akun Anda tidak diizinkan atau ada masalah pada akun Anda.</div>
        </div>
    </section>

<?php } else { ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KATEGORI</h2>
            </div>
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA KATEGORI
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('kategori/tambah'); ?>">Tambah Data Kategori</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <font color="red"><?php echo validation_errors(); ?></font>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA KATEGORI</th>
                                        <th>PILIHAN</th>
                                    </tr>
                                </thead>
                                <?php $a=1; foreach ($data->result_array() as $key) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $a; ?></td>
                                        <td><?php echo $key["namaKategori"];?></td>
                                        <td>
                                            <button onclick="window.location.href='<?php echo site_url('kategori/ubah/'.$key["idKategori"]); ?>';" type="button" class="btn btn-primary waves-effect"> <i class="material-icons">create</i> <span>UBAH</span> </button>
                                            <button onclick="hapus('<?php echo $key["idKategori"]; ?>')" type="button" class="btn btn-danger waves-effect"> <i class="material-icons">delete_sweep</i> <span>HAPUS</span> </button>
                                        </td>
                                    </tr>
                                    <?php $a++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </section>

<script type="text/javascript">
function hapus($id){
	var	conf=window.confirm('Yakin ingin menghapus data?');
	if (conf) {
		document.location='<?php echo site_url(); ?>/kategori/hapus/'+$id;
	}
}
</script>

<?php } ?>