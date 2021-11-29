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
        <h5 class="card-header text-center">ثبت نام</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="/register" method="post" style="width: 100%; ">

                <div class="mb-3">
                    <label class="form-label">موبایل</label>
                    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">نام</label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputPassword1" required>
                </div>
                <div class="mb-3">
                    <label class="form-check-label">نام خانوادگی</label>
                    <input type="text" name="lastname" class="form-control" required>

                </div>
                <input type="hidden" name="<?php echo e($nameKey); ?> " value="<?php echo e($name1); ?>">
                <input type="hidden" name="<?php echo e($valueKey); ?>" value="<?php echo e($value); ?>">
                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/auth/register.blade.php ENDPATH**/ ?>