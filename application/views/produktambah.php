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
                            <h2>TAMBAH DATA PRODUK</h2>
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
                            <?php echo form_open_multipart('produk/tambahproses');?>
                                    <p>Kategori</p>
                                    <font color="red"><?php echo form_error('idKategori'); ?></font>
                                    <select class="form-control show-tick" name="idKategori">
                                        <option selected disabled>- Pilih Kategori -</option>
                                        <?php foreach($datakategori->result_array() as $kategori) {?>
                                        <option value="<?php echo $kategori['idKategori'];?>"><?php echo $kategori['namaKategori'];?></option>
                                        <?php } ?>
                                    </select><br>&nbsp;
                                    <p>Merek</p>
                                    <font color="red"><?php echo form_error('idMerek'); ?></font>
                                    <select class="form-control show-tick" name="idMerek">
                                        <option selected disabled>- Pilih Merek -</option>
                                        <?php foreach($datamerek->result_array() as $merek) {?>
                                        <option value="<?php echo $merek['idMerek'];?>"><?php echo $merek['namaMerek'];?></option>
                                        <?php } ?>
                                    </select><br>&nbsp;
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="namaProduk" required>
                                        <label class="form-label">Nama Produk</label>
                                        <font color="red"><?php echo form_error('namaProduk'); ?></font>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="harga" min="0" max="99999999" required>
                                        <label class="form-label">Harga</label>
                                        <font color="red"><?php echo form_error('harga'); ?></font>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="stok" min="0" max="99999" required>
                                        <label class="form-label">Stok</label>
                                        <font color="red"><?php echo form_error('stok'); ?></font>
                                    </div>
                                </div>
                                    <p>Foto</p>
                                    <font color="red"><?php echo form_error('foto'); ?><?php echo $error; ?></font>
                                    <input type="file" class="form-control" name="foto"><br>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Deskripsi</label>
                                        <font color="red"><?php echo form_error('deskripsi'); ?></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>Status</p>
                                    <font color="red"><?php echo form_error('status'); ?></font>
                                    <input type="radio" name="status" id="Baru" value="Baru" class="with-gap">
                                    <label for="Baru">Baru</label>

                                    <input type="radio" name="status" id="Bekas" value="Bekas" class="with-gap">
                                    <label for="Bekas" class="m-l-20">Bekas</label>
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