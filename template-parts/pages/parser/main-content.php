<div class="container">
    <h1>
        Parser Results
    </h1>
    <a href="/">Main page</a>
    <?php
    if (!empty($errorMessage)) {
        ?>
        <div class="alert alert-danger" role="alert">
            Error: <?= $errorMessage ?>
        </div>
        <?php
    } elseif (!empty($csv) && is_array($csv)) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/pages/index/table.php';
    }
    ?>

</div>
