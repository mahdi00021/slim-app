<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 17:14
 */
?>

<?php
/**
 * Created by PhpStorm.
 * UserDataAccess: MAHDI
 * Date: 24/07/2021
 * Time: 18:46
 */
?>


<?php $__env->startSection('content'); ?>

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">سایت جدید</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="<?php echo e($baseurl); ?>/admin/panel/addNewSite" method="post" style="width: 100%;align-content: center;">

                <div class="mb-3">
                    <label class="form-label">نام سایت به فارسی</label>
                    <input type="text" name="site_name_fa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">نام سایت به انگلیسی</label>
                    <input type="text" name="site_name_en" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-check-label">رتبه در ایران</label>
                    <input type="text" name="alexa_local_rank" class="form-control" required>

                </div>

                <div class="mb-3">
                    <label class="form-check-label"> رتبه در جهان</label>
                    <input type="text" name="alexa_global_rank" class="form-control" required>

                </div>

                <div class="mb-3">
                    <label class="form-check-label">آدرس سایت</label>
                    <input type="text" name="site_url" class="form-control" required>

                </div>

                <input type="hidden" name="<?php echo e($nameKey); ?> " value="<?php echo e($name1); ?>">
                <input type="hidden" name="<?php echo e($valueKey); ?>" value="<?php echo e($value); ?>">

                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', ['baseurl' => $baseurl], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/ads/insertSite.blade.php ENDPATH**/ ?>