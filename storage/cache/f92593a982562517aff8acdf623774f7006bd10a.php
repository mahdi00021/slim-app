<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 19:02
 */
?>

<?php $__env->startSection('content'); ?>

    <div style="margin-left: -400px; ">


        </br>

        <?php if(isset($_SESSION['role'])): ?>
            <?php if($_SESSION['role']=="admin"): ?>
                <h2>مدیر</h2>
                <h2>اینجا میز کار شماست</h2>
            <?php else: ?>
                <h2>کاربر عادی</h2>
                </br>
            <?php endif; ?>
        <?php endif; ?>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', ['baseurl' => $baseurl], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/auth/profile.blade.php ENDPATH**/ ?>