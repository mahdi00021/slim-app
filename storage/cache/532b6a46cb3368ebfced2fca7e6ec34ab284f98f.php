<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 14:32
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo e($baseurl); ?>/css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php if(isset($_SESSION['mobile']) == null ): ?>
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/login">ورود</a>
                </li>

            <?php elseif(isset($_SESSION['mobile']) != null ): ?>
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href=""> خوش
                        آمدید <?php echo e($_SESSION['firstname']); ?> <?php echo e($_SESSION['lastname']); ?></a>
                </li>
                <li class="nav-item">
                    <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/logout">خروج</a>
                </li>

                <?php if($_SESSION['role']=='admin'): ?>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/admin/panel/dashboard">میزکار</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/admin/panel/NewSite">سایت جدید</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/admin/panel/NewPrice">افزودن قیمت</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/admin/panel/SitePic">افزودن عکس سایت</a>
                    </li>

                <?php elseif($_SESSION['role']=='user'): ?>
                    <li class="nav-item">
                        <a style="color: white;" class="nav-link" href="<?php echo e($baseurl); ?>/user/panel/dashboard">میزکار</a>
                    </li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>

    </div>
</nav>
<div>
    <div class="container-md">
        </br>
        <div style="margin-left: 340px;">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>

<?php /**PATH C:\xampp\htdocs\slim-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>