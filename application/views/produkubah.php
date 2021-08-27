    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PRODUK
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UBAH DATA PRODUK</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('produk'); ?>">Lihat Data Produk</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart('produk/ubahproses');?>
                                    <p>Kategori</p>
                                    <select class="form-control show-tick" name="idKategori" id="idKategori">
                                        <option selected disabled>- Pilih Kategori -</option>
                                        <?php foreach($datakategori->result_array() as $kategori) {?>
                                        <option
                                            value="<?php echo $kategori['idKategori']; ?>"
                                            <?php if ($kategori['idKategori'] == $produk->idKategori){ echo 'selected="selected"'; } ?>
                                        ><?php echo $kategori['namaKategori'] ;?></option>
                                        <?php } ?>
                                    </select><br>&nbsp;
                                    <p>Merek</p>
                                    <select class="form-control show-tick" name="idMerek" id="idMerek">
                                        <option selected disabled>- Pilih Merek -</option>
                                        <?php foreach($datamerek->result_array() as $merek) {?>
                                        <option
                                            value="<?php echo $merek['idMerek']; ?>"
                                            <?php if ($merek['idMerek'] == $produk->idMerek){ echo 'selected="selected"'; } ?>
                                        ><?php echo $merek['namaMerek']; ?></option>
                                        <?php } ?>
                                    </select><br>&nbsp;
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="idProduk" value="<?php echo $produk->idProduk; ?>">
                                        <input type="text" class="form-control" name="namaProduk" value="<?php echo $produk->namaProduk; ?>" required>
                                        <label class="form-label">Nama Produk</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="harga" value="<?php echo $produk->harga; ?>" required>
                                        <label class="form-label">Harga</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="stok" value="<?php echo $produk->stok; ?>" required>
                                        <label class="form-label">Stok</label>
                                    </div>
                                </div>
                                    <p>Foto</p>
                                    <input type="file" class="form-control" name="foto"><br>
                                    <img src="<?php echo base_url('assets/images/produk/'); ?><?php echo $produk->foto; ?>" style="max-width:100%;"/><br>&nbsp;
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize" required><?php echo $produk->deskripsi; ?></textarea>
                                        <label class="form-label">Deskripsi</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Status</p>
                                    <input type="radio" name="status" id="Baru" value="Baru" class="with-gap"
                                    <?php if ($produk->status == 'Baru'){ echo 'checked="checked"'; } ?>
                                    ><label for="Baru">Baru</label>

                                    <input type="radio" name="status" id="Bekas" value="Bekas" class="with-gap"
                                    <?php if ($produk->status == 'Bekas'){ echo 'checked="checked"'; } ?>
                                    ><label for="Bekas" class="m-l-20">Bekas</label>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">KIRIM</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>