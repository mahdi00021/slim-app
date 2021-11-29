<?php
/**
 * Created by PhpStorm.
 * User: MAHDI
 * Date: 01/08/2021
 * Time: 17:14
 */
?>


<?php $__env->startSection('content'); ?>

    <div class="card" style="width: 60%;align-content: center; ">
        <h5 class="card-header text-center">افزودن تصویر برای سایت</h5>
        <div class="card-body" style="align-content: center; ">
            <form action="<?php echo e($baseurl); ?>/admin/panel/NewSitePic" method="post" style="width: 100%;align-content: center;"
                  enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">انتخاب سایت</label>
                    <select name="site_id" class="form-select" aria-label="Default select example" required>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($row['id']); ?>"><?php echo e($row['site_name_en']); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">عنوان فارسی عکس</label>
                    <input type="text" name="title_fa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-check-label">عنوان انگلیسی عکس</label>
                    <input type="text" name="title_en" class="form-control" required>

                </div>


                <div class="mb-3">
                    <label>افزودن عکس</label></br>
                    </br>
                    <input type="file" name="image" required/>
                </div>


                <input type="hidden" name="<?php echo e($csrf['nameKey']); ?> " value="<?php echo e($csrf['name1']); ?>">
                <input type="hidden" name="<?php echo e($csrf['valueKey']); ?>" value="<?php echo e($csrf['value']); ?>">

                <button type="submit" class="btn btn-primary">ثبت</button>


            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', ['baseurl' => $baseurl], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\slim-app\resources\views/ads/insertSitePic.blade.php ENDPATH**/ ?>