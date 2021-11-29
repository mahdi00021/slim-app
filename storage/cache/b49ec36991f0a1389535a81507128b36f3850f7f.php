<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 17:44
 */
?>

<?php $__env->startSection('content'); ?>

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">ورود</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="<?php echo e($baseurl); ?>/login" method="post" style="width: 100%; ">

                <div class="mb-3">
                    <label class="form-label">شماره موبایل را وارد کنید</label>
                    <input type="text" name="mobile" class="form-control" required>
                </div>
                <input type="hidden" name="<?php echo e($csrf['nameKey']); ?> " value="<?php echo e($csrf['name1']); ?>">
                <input type="hidden" name="<?php echo e($csrf['valueKey']); ?>" value="<?php echo e($csrf['value']); ?>">
                <button type="submit" class="btn btn-primary">ورود</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['baseurl' => $baseurl], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/auth/login.blade.php ENDPATH**/ ?>