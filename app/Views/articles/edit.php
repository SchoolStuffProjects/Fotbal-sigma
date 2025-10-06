<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<h1>Editovat článek</h1>

<form action="<?= site_url('article/update/' . $article->id) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Titul</label>
        <input type="text" name="title" class="form-control" value="<?= $article->title ?>" required>
    </div>

    <div class="mb-3">
        <label>Text</label>
        <textarea id="text" name="text" class="form-control wysiwyg" rows="10"><?= $article->text ?></textarea>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <?php if (!empty($article->photo)): ?>
            <div class="mb-2">
                <img src="<?= base_url('writable/uploads/articles/' . $article->photo) ?>" alt="Photo" width="150">
            </div>
        <?php endif; ?>
        <input type="file" name="photo" class="form-control">
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="top" id="topSwitch" <?= $article->top ? 'checked' : '' ?>>
        <label class="form-check-label" for="topSwitch">Top</label>
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="published" id="publishedSwitch" <?= $article->published ? 'checked' : '' ?>>
        <label class="form-check-label" for="publishedSwitch">Publikovat</label>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Uložit</button>
</form>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#text',
    menubar: false,
    plugins: 'lists link image',
    toolbar: 'undo redo | bold italic underline | bullist numlist | link image'
  });
</script>

<?= $this->endSection() ?>
