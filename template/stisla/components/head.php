<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?= config('library_name') . ' | ' . config('library_subname') ?></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/fontawesome/css/all.min.css') ?>">

<!-- CSS Libraries -->
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/jqvmap/dist/jqvmap.min.css') ?>">
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/summernote/summernote-bs4.css') ?>">
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/owlcarousel2/dist/assets/owl.carousel.min.css') ?>">
<link rel="stylesheet" href="<?= stislaAssetUrl('modules/owlcarousel2/dist/assets/owl.theme.default.min.css') ?>">

<!-- Template CSS -->
<link rel="stylesheet" href="<?= stislaAssetUrl('css/style.css') ?>">
<link rel="stylesheet" href="<?= stislaAssetUrl('css/components.css') ?>">
<!-- SLiMS -->
<link href="<?php echo SWB; ?>css/core.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>colorbox/colorbox.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>chosen/chosen.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>toastr/toastr.min.css?<?php echo date('this') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>jquery.imgareaselect/css/imgareaselect-default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>datepicker/css/datepicker-bs4.min.css" rel="stylesheet" />
<link href="<?php echo AWB . 'admin_template/default/style.css?v='.date('this'); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= stislaAssetUrl('css/stisla-slims.css') ?>">
<!-- End SLiMS -->

<!-- js -->
<!-- General JS Scripts -->
<script src="<?= stislaAssetUrl('modules/jquery.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/popper.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/tooltip.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/moment.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('js/stisla.js') ?>"></script>

<!-- JS Libraies -->
<script src="<?= stislaAssetUrl('modules/jquery.sparkline.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/chart.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/owlcarousel2/dist/owl.carousel.min.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/summernote/summernote-bs4.js') ?>"></script>
<script src="<?= stislaAssetUrl('modules/chocolat/dist/js/jquery.chocolat.min.js') ?>"></script>

<!-- SLiMS JS -->
<script type="text/javascript" src="<?php echo JWB; ?>updater.js?v=<?php echo date('this') ?>"></script>
<script type="text/javascript" src="<?php echo JWB; ?>gui.js??v=<?php echo date('this') ?>"></script>
<script type="text/javascript" src="<?php echo JWB; ?>form.js?v=<?php echo date('this') ?>"></script>
<script type="text/javascript" src="<?php echo JWB; ?>calendar.js?v=<?php echo date('this') ?>"></script>
<script type="text/javascript" src="<?php echo JWB; ?>chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>chosen/ajax-chosen.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>ckeditor5/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>tooltipsy.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>jquery.imgareaselect/scripts/jquery.imgareaselect.pack.js">
</script>
<script type="text/javascript" src="<?php echo JWB; ?>webcam.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>scanner.js"></script>
<script type="text/javascript" src="<?php echo SWB; ?>js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo SWB; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>toastr/toastr.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>datepicker/js/datepicker-full.min.js"></script>
<?php if (file_exists(SB . 'js/datepicker/js/locales/' . substr($sysconf['default_lang'], 0,2) . '.js')): ?>
<script type="text/javascript"
    src="<?php echo JWB; ?>datepicker/js/locales/<?= substr($sysconf['default_lang'], 0,2) ?>.js"></script>
<?php endif; ?>
<!-- SLiMS JS -->