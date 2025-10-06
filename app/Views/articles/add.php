<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1>Přidat článek</h1>

<form action="<?= site_url('article/save') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Titul</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Text</label>
        <textarea name="text" class="form-control wysiwyg" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="photo" class="form-control">
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="top" id="topSwitch">
        <label class="form-check-label" for="topSwitch">Top</label>
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="published" id="publishedSwitch" checked>
        <label class="form-check-label" for="publishedSwitch">Publikovat</label>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Uložit</button>
</form>

<?= $this->endSection() ?>
