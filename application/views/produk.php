    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PRODUK</h2>
            </div>
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PRODUK
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('produk/tambah'); ?>">Tambah Data Produk</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <font color="red"><?php echo validation_errors(); ?><?php echo $error; ?></font>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KATEGORI</th>
                                        <th>MEREK</th>
                                        <th>NAMA PRODUK</th>
                                        <th>HARGA</th>
                                        <th>STOK</th>
                                        <th>FOTO</th>
                                        <th>DESKRIPSI</th>
                                        <th>STATUS</th>
                                        <th>PILIHAN</th>
                                    </tr>
                                </thead>
                                <?php $a=1; foreach ($data->result_array() as $key) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $a; ?></td>
                                        <td><?php echo $key["namaKategori"];?></td>
                                        <td><?php echo $key["namaMerek"];?></td>
                                        <td><?php echo $key["namaProduk"];?></td>
                                        <td><?php echo number_format($key["harga"]);?></td>
                                        <td><?php echo number_format($key["stok"]);?></td>
                                        <td><a href="<?php echo base_url('assets/images/produk/'); ?><?php echo $key["foto"];?>" target="_blank"><img src="<?php echo base_url('assets/images/produk/'); ?><?php echo $key["foto"];?>" style="max-width:100%;"/></a></td>
                                        <td><?php echo $key["deskripsi"];?></td>
                                        <td><?php echo $key["status"];?></td>
                                        <td>
                                            <button onclick="window.location.href='<?php echo site_url('produk/ubah/'.$key["idProduk"]); ?>';" type="button" class="btn btn-primary waves-effect"> <i class="material-icons">create</i> <span>UBAH</span> </button>
                                            <button onclick="hapus('<?php echo $key["idProduk"]; ?>')" type="button" class="btn btn-danger waves-effect"> <i class="material-icons">delete_sweep</i> <span>HAPUS</span> </button>
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
		document.location='<?php echo site_url(); ?>/produk/hapus/'+$id;
	}
}
</script>