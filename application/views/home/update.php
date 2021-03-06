<div class="container my-4">
    <?= form_open_multipart("main/updatebid?id=".$id); ?>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= $barang[0]['judul'] ?>" id="judul">
    </div>
    <div class="form-group">
        <label for="description" name="description">Description</label>
        <textarea name="description" id="description" cols="30" class="form-control" rows="10"><?= $barang[0]['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input type="number" value="<?= $barang[0]['harga'] ?>" name="harga" class="form-control" id="harga">
    </div>
    <button class="btn btn-primary">submit</button>
    <?= form_close(); ?>
</div>