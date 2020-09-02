<?php foreach($users as $user): ?>

    <div class="container mt-5">

        <div class="d-flex justify-content-between mb-2">
            <h3>All Product</h3>
        </div>

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
            <?php $noTabelBarang = 1; $noTabeluser = 1; ?>
            <?php foreach($barang as $data) : ?>
                <tr>
                    <th scope="row"><?=$noTabelBarang++?></th>
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

        <div class="d-flex justify-content-between mb-2">
            <h3>All User</h3>
            <a href="<?= base_url('main/exportExcelUser') ?>" class="btn btn-primary">Export Excel</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($allusers as $alluser) : ?>
                <tr>
                    <th scope="row"><?= $noTabeluser++ ?></th>
                    <td><?= $alluser['username'] ?></td>
                    <td><?= $alluser['email'] ?></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
    </div>

<?php endforeach; ?>