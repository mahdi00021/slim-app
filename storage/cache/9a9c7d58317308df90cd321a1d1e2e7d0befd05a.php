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
        <h5 class="card-header text-center">بنر جدید</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="/slim-app/public/panel/newAd" method="post" style="width: 100%;align-content: center;">

                <div class="mb-3">
                    <label class="form-label">نام سایت</label>
                    <input type="text" name="name_site" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">عنوان</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-check-label">توضیحات</label>
                    <textarea name="description" class="form-control"></textarea>

                </div>

                <div class="mb-3">
                    <label class="form-check-label">ابعاد بنر</label>
                    <input type="text" name="banner_size" class="form-control">

                </div>

                <div class="mb-3">
                    <label class="form-check-label">هزینه ی یک ماه</label>
                    <input type="text" name="price_month" class="form-control">

                </div>

                <div class="mb-3">
                    <label class="form-check-label">مکان تبلیغ</label>
                    <input type="text" name="place_ads" class="form-control">

                </div>

                <div class="mb-3">
                    <label class="form-check-label">هزینه ی کل</label>
                    <input type="text" name="price_total" class="form-control">

                </div>

                <div class="mb-3">
                    <label class="form-check-label">هزینه در 15 روز</label>
                    <input type="text" name="price_15" class="form-control">

                </div>


                <input type="hidden" name="<?php echo e($nameKey); ?> " value="<?php echo e($name1); ?>">
                <input type="hidden" name="<?php echo e($valueKey); ?>" value="<?php echo e($value); ?>">
                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/ads/insertPrice.blade.php ENDPATH**/ ?>