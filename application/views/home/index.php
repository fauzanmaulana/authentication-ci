<div class="container">
    <div class="row mt-5">

        <?php foreach($barang as $data) : ?>
            <div class="col-md-4">
                <div class="card card-news">
                    <div class="card-header img-card" 
                    style="background-image:url('<?= base_url('assets/barang/'.$data['gambar']) ?>');"></div>
                    <div class="card-body">
                        <p class="card-text text-center"><a href="#" style="text-decoration:none"><?=$data['judul']?></a></p>
                        <div class="date-wrapper d-flex justify-content-around text-left">
                            <div class="date-news">
                                <p><?= date('M j Y g:i A', strtotime($data['created_at'])) ?></p>
                            </div>
                            <div class="news-author">
                                <p><?= $data['username'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>

    </div>
</div>