<?php $__env->startSection('title'); ?>
    <h1>Edit Product</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('artikel'); ?>
<form action="<?php echo e(route('update.product', $prod->product_id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?> <!-- Use PUT method for updating -->

    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo e($prod->product_name); ?>" required>
    </div>

    <div class="form-group">
        <label for="product_stock">Product Stock</label>
        <input type="number" class="form-control" id="product_stock" name="product_stock" value="<?php echo e($prod->product_stock); ?>" required>
    </div>

    <div class="form-group">
        <label for="product_category">Product Category</label>
        <select class="form-control" id="product_category" name="product_category" required>
            <option value="Services" <?php echo e($prod->product_category == 'Services' ? 'selected' : ''); ?>>Services</option>
            <option value="Software" <?php echo e($prod->product_category == 'Software' ? 'selected' : ''); ?>>Software</option>
            <option value="Fraud" <?php echo e($prod->product_category == 'Fraud' ? 'selected' : ''); ?>>Fraud</option>
            <option value="Documents" <?php echo e($prod->product_category == 'Documents' ? 'selected' : ''); ?>>Documents</option>
            <option value="Drugs" <?php echo e($prod->product_category == 'Drugs' ? 'selected' : ''); ?>>Drugs</option>
            <option value="Others" <?php echo e($prod->product_category == 'Others' ? 'selected' : ''); ?>>Others</option>
        </select>
    </div>

    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo e($prod->product_price); ?>" required>
    </div>

    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image">
        <img src="<?php echo e(asset('/storage/'.$prod->product_image)); ?>" alt="<?php echo e($prod->product_image); ?>" height="80" width="80">
    </div>

    <div class="form-group">
        <label for="listing_date">Listing Date</label>
        <input type="date" class="form-control" id="listing_date" name="listing_date" value="<?php echo e($prod->listing_date); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER\silk_road_project\resources\views/edit.blade.php ENDPATH**/ ?>