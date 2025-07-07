<?php
    include "header.php";
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 500px;">
            <div class="card">
                <div class="card-header">
                    Data Kategori
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="simpan_kategori.php" method="POST">

                                <div class="form-group mt-3">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori">

                                </div>
                                <input type="submit" class="btn btn-primary mt-3" value="Simpan">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "footer.html";
?>
