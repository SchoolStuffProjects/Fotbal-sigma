<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <h1>Sezóny</h1>
        <div class="row">
            <?php foreach ($seasons as $season) : ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5><a href="<?= site_url('seasons/' . $season->id) ?>">Season <?= $season->start ?> - <?= $season->finish ?></a></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <footer>
            <?= $pager->links() ?>
        </footer>
</div>

<?= $this->endSection() ?>
