<table class="table table-hover">

    <thead class="thead-dark">
    <tr>
        <?php
        foreach ($csv[0] as $item) {
            ?>
            <th scope="col"><?= $item ?></th>
            <?php
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($csv as $line) {
        if ($line === $csv[0]) {
            continue;
        }
        ?>
        <tr>
            <?php
            foreach ($line as $item) {
                ?>
                <td><?= $item ?></td>
                <?php
            }
            ?>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
