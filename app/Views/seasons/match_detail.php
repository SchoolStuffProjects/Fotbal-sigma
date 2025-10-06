<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>

<div class="container mt-5">
    <h1>Match Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>Home Team</th>
            <td><?= $homeTeam->name ?></td>
        </tr>
        <tr>
            <th>Away Team</th>
            <td><?= $awayTeam->name ?></td>
        </tr>
        <tr>
            <th>Score</th>
            <td><?= $match->goals_home ?> - <?= $match->goals_away ?></td>
        </tr>
        <tr>
            <th>Round</th>
            <td><?= $match->round ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?= $match->date ?></td>
        </tr>
        <tr>
            <th>Time</th>
            <td><?= $match->time ?></td>
        </tr>
        <tr>
            <th>Stadium</th>
            <td><?= $match->stadium ?></td>
        </tr>
        <tr>
            <th>Attendance</th>
            <td><?= $match->attendance ?></td>
        </tr>
</div>

<?= $this->endSection() ?>
