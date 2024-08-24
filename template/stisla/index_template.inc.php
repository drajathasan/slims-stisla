<!DOCTYPE html>
<html lang="<?= substr(config('default_lang'), 0,2) ?>">

<head>
    <?php
        include stislaComponent('head');
        ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <?php include stislaComponent('navbar') ?>
            <?php include stislaComponent('sidebar') ?>
            <div class="main-content">
                <section id="mainContent" class="section" style="<?= isset($_GET['mod']) ? 'background-color: white; padding: 20px; border-radius: 10px' : 'background-color: transparent;' ?>">
                    <?= $main_content ?>
                </section>
                <?php include stislaComponent('footer') ?>
            </div>
        </div>
        <iframe name="blindSubmit" style="display: none; visibility: hidden; width: 0; height: 0;"></iframe>
        <!-- Page Specific JS File -->
        <script src="<?= stislaAssetUrl('js/page/index.js') ?>"></script>

        <!-- Template JS File -->
        <script src="<?= stislaAssetUrl('js/scripts.js') ?>"></script>
        <script src="<?= stislaAssetUrl('js/custom.js') ?>"></script>
        <?= $sysconf['page_footer']??'' ?>
</body>

</html>