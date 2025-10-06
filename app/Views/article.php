<?=$this->extend("layout/template");?>

<?=$this->section("content");?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><?= $article->title ?></h1>
        <div>
            <a href="<?= site_url('article/edit/' . $article->id) ?>" class="btn btn-warning">
                Edit
            </a>

            <form action="<?= site_url('article/delete/' . $article->id) ?>" method="post" style="display:inline-block;" 
                  onsubmit="return confirm('Opravdu chcete článek smazat?');">
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>

    <p class="text-muted">
        Publikováno: <?= date('j.n.Y', strtotime($article->created_at ?? 'now')) ?>
    </p>

    <?php if ($article->photo): ?>
        <img src="<?= base_url('database_stuff/obrazky/sigma/' . $article->photo) ?>" 
             alt="<?= $article->title ?>" class="img-fluid mb-4 rounded">
    <?php endif; ?>

    <div class="fs-5">
        <?= $article->text ?>
    </div>
</div>

<?=$this->endSection();?>
