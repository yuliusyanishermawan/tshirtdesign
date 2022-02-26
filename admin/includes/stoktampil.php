<form method="POST" action="action/produktambahstokact">
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['nama_produk']); ?>" readonly name="nama_produk">
        </div>
        <div class=" form-group">
            <label for="exampleInputEmail1">Jenis Kaos</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['jenis_kaos']); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Warna Kaos</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['warna_kaos']); ?>" disabled>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Harga Produk</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo htmlentities($result['harga_produk']); ?>" disabled>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Stok S Saat Ini</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok S Saat Ini" value=<?php echo $result['stok_s']; ?> readonly name="b_s">
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Stok M Saat Ini</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok M Saat Ini" value=<?php echo $result['stok_m']; ?> readonly name="b_m">
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Stok L Saat Ini</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok L Saat Ini" value=<?php echo $result['stok_l']; ?> readonly name="b_l">
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Stok XL Saat Ini</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Stok XL Saat Ini" value=<?php echo $result['stok_xl']; ?> readonly name="b_xl">
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Tambah Stok S</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Tambah Stok S" name="a_s" value=0>
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Tambah Stok M</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Tambah Stok M" name="a_m" value=0>
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Tambah Stok L</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Tambah Stok L" name="a_l" value=0>
            </div>
            <div class="col-3 form-group">
                <label for="exampleInputEmail1">Tambah Stok XL</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Tambah Stok XL" name="a_xl" value=0>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tambah Stok</button>
    </div>
</form>
</div>
<!-- /.card -->

<!-- Input addon -->

</div>
<div class="form-group">
</div>
</form>