<?php if ($_SESSION['level'] != 'Admin') { ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MEREK</h2>
            </div>
            <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Perizinan ditolak</strong> karena tipe akun Anda tidak diizinkan atau ada masalah pada akun Anda.</div>
        </div>
    </section>

<?php } else { ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    MEREK
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>UBAH DATA MEREK</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo site_url('merek'); ?>">Lihat Data Merek</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php echo form_open_multipart('merek/ubahproses');?>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="idMerek" value="<?php echo $merek->idMerek; ?>">
                                        <input type="text" class="form-control" name="namaMerek" value="<?php echo $merek->namaMerek; ?>" required>
                                        <label class="form-label">Nama Merek</label>
                                    </div>
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

<?php } ?>