<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Edit Profile')); ?></div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <div class="text-center">
                                    <?php echo e($status); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('user.update', Auth::user()->id)); ?>">
                            <?php echo csrf_field(); ?>

                            <?php echo method_field('PUT'); ?>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required
                                        autocomplete="name" autofocus>

                                    <?php $__errorArgs = ['name'];
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
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required
                                        autocomplete="email">

                                    <?php $__errorArgs = ['email'];
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
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                        required autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
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
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Update User Info')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <br>
                        <form method="POST" action="<?php echo e(route('profile.update', Auth::user()->id)); ?>">
                            <?php echo csrf_field(); ?>

                            <?php echo method_field('PUT'); ?>
                            <div class="form-group row">
                                <label for="car_type"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Car Type')); ?></label>

                                <div class="col-md-6">
                                    <input id="car_type" type="text"
                                        class="form-control <?php $__errorArgs = ['car_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_type"
                                        value="<?php echo e(old('name', Auth::user()->profile()->car_type)); ?>" required
                                        autocomplete="car_type" autofocus>

                                    <?php $__errorArgs = ['car_type'];
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
                                <label for="car_model"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Car Model')); ?></label>

                                <div class="col-md-6">
                                    <input id="car_model" type="text"
                                        class="form-control <?php $__errorArgs = ['car_model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_model"
                                        value="<?php echo e(old('car_model', Auth::user()->profile()->car_model)); ?>" required
                                        autocomplete="car_model">

                                    <?php $__errorArgs = ['car_model'];
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
                                <label for="from"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('From Address')); ?></label>

                                <div class="col-md-6">
                                    <select name="from" class="form-control" id="from">
                                        <?php if(isset($coll)): ?>
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

                            <div class="form-group row">
                                <label for="to"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('To Address')); ?></label>

                                <div class="col-md-6">
                                    <select name="to" class="form-control" id="to">
                                        <?php if(isset($coll)): ?>
                                            <option value="<?php echo e($coll->id); ?>"><?php echo e($coll->college); ?></option>
                                        <?php endif; ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if(isset($coll->id)): ?>
                                                <?php if($collge['id'] == $coll->id && $collge['college'] == $coll->college): ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <option value="<?php echo e($collge['id']); ?>"><?php echo e($collge['college']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="0">No Colleges</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Phone  Number')); ?></label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="phone" value="<?php echo e(old('phone', Auth::user()->profile()->phone)); ?>" required
                                        autocomplete="phone">

                                    <?php $__errorArgs = ['phone'];
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
                                        <?php echo e(__('Update Profile')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cars/resources/views/profile/show.blade.php ENDPATH**/ ?>