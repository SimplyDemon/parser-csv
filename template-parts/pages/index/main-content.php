<div class="container">
    <h1>
        Parser CSV
    </h1>
    <a href="/api-test">Api test</a>
    <?php
    if (!empty($errorMessage)) {
        ?>
        <div class="alert alert-danger" role="alert">
            Error: <?= $errorMessage ?>
        </div>
        <?php
    } elseif (!empty($csv) && is_array($csv)) {
        require_once 'template-parts/pages/index/table.php';
    }

    require_once 'template-parts/pages/index/form.php';
    ?>
</div>
