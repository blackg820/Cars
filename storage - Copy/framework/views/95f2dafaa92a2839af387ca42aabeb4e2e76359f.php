<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Edit Location')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-admins')): ?>

                            <form method="POST" action="<?php echo e(route('location.create')); ?>">
                                <?php echo csrf_field(); ?>

                                
                                <div class="form-group row">
                                    <label for="City" class="col-md-4 col-form-label text-md-right"><?php echo e(__('City')); ?></label>

                                    <div class="col-md-6">
                                        <input id="City" type="text" class="form-control <?php $__errorArgs = ['City'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="City" value="" required autocomplete="City" autofocus>

                                        <?php $__errorArgs = ['City'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Add City')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-users')): ?>
                            <form method="POST" action="<?php echo e(route('college.create')); ?>">
                                <?php echo csrf_field(); ?>

                                
                                <div class="form-group row">
                                    <label for="College"
                                        class="col-md-4 col-form-label text-md-right"><?php echo e(__('College')); ?></label>

                                    <div class="col-md-6">
                                        <input id="College" type="text"
                                            class="form-control <?php $__errorArgs = ['College'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="College" value=""
                                            required autocomplete="College" autofocus>

                                        <?php $__errorArgs = ['College'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="Cityselect"
                                        class="col-md-4 col-form-label text-md-right"><?php echo e(__('City select')); ?></label>

                                    <div class="col-md-6">
                                        <select name="Cityselect" class="form-control" id="Cityselect">
                                            <?php if(isset($coll->city_id)): ?>
                                                <option value="<?php echo e($coll->city_id); ?>"><?php echo e($coll->city); ?></option>
                                            <?php endif; ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if(isset($coll->city_id)): ?>
                                                    <?php if($city['id'] == $coll->city_id && $city['city'] == $coll->city): ?>
                                                        <?php continue; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <option value="<?php echo e($city['id']); ?>"><?php echo e($city['city']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value="0">no cities</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Add College')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-location')): ?>

                            <form method="POST" action="<?php echo e(route('address.create')); ?>">
                                <?php echo csrf_field(); ?>

                                
                                
                                
                            
                                <div class="form-group row">
                                    <label for="Address"
                                        class="col-md-4 col-form-label text-md-right"><?php echo e(__('Address')); ?></label>

                                    <div class="col-md-6">
                                        <input id="Address" type="text"
                                            class="form-control <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Address" value=""
                                            required autocomplete="Address" autofocus>

                                        <?php $__errorArgs = ['Address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                
                            <div class="form-group row">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Price')); ?></label>

                                <div class="col-md-6">
                                    <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="price" value="<?php echo e(old('price', Auth::user()->profile()->price)); ?>" required
                                        autocomplete="price">

                                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <?php echo e(__('Add Address')); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cars/resources/views/location/show.blade.php ENDPATH**/ ?>