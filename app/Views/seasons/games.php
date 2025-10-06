<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>

<div class="container mt-5">
    <h1>Games in Season <?= $season->start ?> - <?= $season->finish ?></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Round</th>
                <th>Home Team</th>
                <th>Away Team</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game) : ?>
                <tr>
                    <td><?= $game->round ?></td>
                    <td><?= $teams[$game->home]->name ?></td>
                    <td><?= $teams[$game->away]->name ?></td>
                    <td><a href="<?= site_url('game/' . $game->id) ?>"><?= $game->goals_home ?> - <?= $game->goals_away ?></a></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
