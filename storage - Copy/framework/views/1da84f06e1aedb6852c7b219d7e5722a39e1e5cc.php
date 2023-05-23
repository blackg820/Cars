<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->role == 'owner'): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Admins Table')); ?></div>

                        <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->role != 'user'): ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-admins')): ?>
                                                    <tr>
                                                        <td><?php echo e($user->name); ?></td>
                                                        <td><?php echo e($user->email); ?></td>
                                                        <td><?php echo e($user->role); ?></td>
                                                        <?php if($user->role != "owner"): ?>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.edit', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('PUT'); ?>
                                                                    <button class="btn btn-primary">
                                                                        Make User
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.destroy', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button class="btn btn-danger">
                                                                        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('bi-trash-fill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        <?php else: ?>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.destroy', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('PUT'); ?>
                                                                    <button class="btn btn-dark" disabled>
                                                                        site owner
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.destroy', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button class="btn btn-dark" disabled>
                                                                        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('bi-trash-fill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    <?php endif; ?>
    <?php if(Auth::user()->can('edit-users')): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Users Table')); ?></div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-users')): ?>
                                                <?php if($user->role == 'user'): ?>
                                                    <tr>
                                                        <td><?php echo e($user->name); ?></td>
                                                        <td><?php echo e($user->email); ?></td>
                                                        <td><?php echo e($user->role); ?></td>
                                                            <?php if(Auth::user()->role == 'owner'): ?>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.edit', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('PUT'); ?>
                                                                    <button class="btn btn-primary">
                                                                        Make Admin
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <?php else: ?>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.destroy', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('PUT'); ?>
                                                                    <button class="btn btn-dark" disabled>
                                                                        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('bi-pencil-square'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <?php endif; ?>
                                                            <td>
                                                                <form class="d-inline" action="<?php echo e(route('user.destroy', $user->id)); ?>"
                                                                    method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button class="btn btn-danger">
                                                                        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('bi-trash-fill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/cars/resources/views/user/show.blade.php ENDPATH**/ ?>