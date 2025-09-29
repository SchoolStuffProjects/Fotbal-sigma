<?= $this->extend("layout/template") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <h1>Sezóny</h1>

    <?php if (!empty($seasons)) : ?>
        <div class="row">
            <?php foreach ($seasons as $season) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?= site_url('seasons/show/' . $season->id) ?>">
                                    Sezóna <?= esc($season->start) ?> - <?= esc($season->finish) ?>
                                </a>
                            </h5>

                            <?php if (!empty($season->leagues)) : ?>
                                <ul class="list-unstyled">
                                    <?php foreach ($season->leagues as $league) : ?>
                                        <li>
                                            <?= esc($league->name) ?> (Úroveň: <?= esc($league->level) ?>)
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <nav>
            <?= $pager->links() ?>
        </nav>

    <?php else: ?>
        <p>Žádné sezóny nenalezeny.</p>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
