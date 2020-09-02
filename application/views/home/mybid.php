<div class="container mt-5">
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Description</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($barang as $data) : ?>
            <tr>
                <th scope="row">1</th>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['description'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><img src="<?= base_url('assets/barang/'.$data['gambar']) ?>" width="100"></td>
                <td>
                    <a href="<?= base_url('main/bidupdate?id='). $data['id']  ?>" class="btn btn-sm btn-success">update</a>
                    <a href="<?= base_url('main/deletebid?id='). $data['id']  ?>" class="btn btn-sm btn-danger">delete</a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>
</div>