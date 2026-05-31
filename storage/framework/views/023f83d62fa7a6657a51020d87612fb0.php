<?php $__env->startSection('title', 'Employee Dashboard'); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .page {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 16px;
        gap: 20px;
    }

    /* HEADER */
    .header {
        width: 100%; max-width: 960px;
        background: rgba(255,255,255,0.6);
        backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(24,56,18,0.2);
        border-radius: 20px; padding: 14px 20px;
        display: flex; align-items: center; justify-content: space-between;
        gap: 12px; flex-wrap: wrap;
    }
    .header-center { text-align: center; }
    .header-center h1 { font-size: clamp(17px, 4vw, 22px); font-weight: 800; color: #183812; }
    .header-center p  { font-size: 13px; color: #555; margin-top: 2px; }
    .header-center p span { font-weight: 700; color: #1a1a1a; }

    .btn-logout {
        padding: 8px 18px; font-size: 13px; font-weight: 600;
        color: #fff; border-radius: 50px;
        background: linear-gradient(135deg, #e53e3e, #fc8181);
        border: none; cursor: pointer; text-decoration: none;
        transition: opacity 0.15s;
    }
    .btn-logout:hover { opacity: 0.85; }

    /* STATS */
    .stats {
        width: 100%; max-width: 960px;
        display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 14px;
    }
    .stat-card {
        background: rgba(255,255,255,0.6); backdrop-filter: blur(16px);
        border: 1px solid rgba(24,56,18,0.2); border-radius: 20px;
        padding: 20px 22px; display: flex; align-items: center; gap: 16px;
        transition: transform 0.15s, box-shadow 0.15s;
    }
    .stat-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(24,56,18,0.14); }
    .stat-icon {
        width: 48px; height: 48px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; flex-shrink: 0;
        background: linear-gradient(135deg, #183812, #3a7a30);
        box-shadow: 0 4px 14px rgba(24,56,18,0.3);
    }
    .stat-info .num { font-size: 28px; font-weight: 800; color: #183812; line-height: 1; }
    .stat-info .lbl { font-size: 12px; color: #777; margin-top: 3px; font-weight: 500; }

    /* SECTION */
    .section {
        width: 100%; max-width: 960px;
        background: rgba(255,255,255,0.6); backdrop-filter: blur(16px);
        border: 1px solid rgba(24,56,18,0.2); border-radius: 20px;
        padding: 22px 24px;
    }
    .section-title { font-size: 15px; font-weight: 700; color: #183812; margin-bottom: 16px; }

    .form-grid {
        display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
    }
    input, select {
        width: 100%; padding: 10px 13px;
        border: 1.5px solid rgba(24,56,18,0.2); border-radius: 10px;
        font-size: 13px; color: #1a1a1a; outline: none;
        transition: border 0.15s; background: #fff;
    }
    input:focus, select:focus { border-color: #183812; }

    .btn-add {
        background: linear-gradient(135deg, #183812, #3a7a30);
        color: #fff; border: none; padding: 10px 26px;
        border-radius: 50px; font-size: 13px; font-weight: 700;
        cursor: pointer; margin-top: 12px; transition: opacity 0.15s;
    }
    .btn-add:hover { opacity: 0.85; }

    /* TABLE */
    .table-scroll { overflow-x: auto; -webkit-overflow-scrolling: touch; }
    table { width: 100%; border-collapse: collapse; min-width: 520px; }
    thead tr { background: rgba(24,56,18,0.06); }
    th {
        padding: 11px 16px; text-align: left; font-size: 11px;
        font-weight: 700; color: #183812; white-space: nowrap;
        text-transform: uppercase; letter-spacing: 0.6px;
        border-bottom: 1px solid rgba(24,56,18,0.1);
    }
    td {
        padding: 12px 16px; font-size: 13px;
        border-bottom: 1px solid rgba(24,56,18,0.06); color: #1a1a1a;
    }
    tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: rgba(24,56,18,0.03); }

    .badge { padding: 3px 10px; border-radius: 20px; font-size: 11px; font-weight: 700; }
    .badge-active   { background: #d1fae5; color: #065f46; }
    .badge-inactive { background: #fee2e2; color: #991b1b; }

    .dept-tag {
        background: rgba(24,56,18,0.1); color: #183812;
        padding: 3px 10px; border-radius: 6px; font-size: 11px; font-weight: 600;
    }

    .delete-btn { color: #ccc; font-size: 16px; cursor: pointer; background: none; border: none; transition: color 0.15s; }
    .delete-btn:hover { color: #e53e3e; }

    .empty { text-align: center; padding: 40px; color: #aaa; font-size: 14px; }

    @media (max-width: 600px) {
        .header { padding: 12px 14px; }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page">

    <!-- HEADER -->
    <div class="header">
        <div></div>
        <div class="header-center">
            <h1>Employee Dashboard</h1>
            <p>Welcome, <span><?php echo e(auth()->user()->full_name); ?></span></p>
        </div>
        <div>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats">
        <div class="stat-card">
            <div class="stat-info">
                <div class="num"><?php echo e($stats['total']); ?></div>
                <div class="lbl">Total Employees</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <div class="num"><?php echo e($stats['active']); ?></div>
                <div class="lbl">Active</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <div class="num"><?php echo e($stats['departments']); ?></div>
                <div class="lbl">Departments</div>
            </div>
        </div>
        
    </div>

    <!-- ADD EMPLOYEE -->
    <div class="section">
        <div class="section-title">Add New Employee</div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">✅ <?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-error">⚠️ <?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('employees.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-grid">
                <input type="text"   name="full_name"  placeholder="Full Name"  value="<?php echo e(old('full_name')); ?>"  required>
                <input type="email"  name="email"      placeholder="Email"      value="<?php echo e(old('email')); ?>"      required>
                <input type="text"   name="phone"      placeholder="Phone"      value="<?php echo e(old('phone')); ?>">
                <select name="department">
                    <?php $__currentLoopData = ['Engineering','HR','Finance','Marketing','Operations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dept); ?>" <?php echo e(old('department')==$dept ? 'selected':''); ?>><?php echo e($dept); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="text"   name="position"   placeholder="Position"   value="<?php echo e(old('position')); ?>"   required>
                <input type="number" name="salary"     placeholder="Salary"     value="<?php echo e(old('salary')); ?>"     step="0.01">
            </div>
            <button type="submit" class="btn-add"> Add Employee</button>
        </form>
    </div>

    <!-- EMPLOYEE TABLE -->
    <div class="section">
        <div class="section-title"> Employee List</div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="color:#aaa"><?php echo e($emp->id); ?></td>
                        <td><strong><?php echo e($emp->full_name); ?></strong></td>
                        <td style="color:#666"><?php echo e($emp->email); ?></td>
                        <td><span class="dept-tag"><?php echo e($emp->department); ?></span></td>
                        <td><?php echo e($emp->position); ?></td>
                        <td><?php echo e($emp->salary ? '$'.number_format($emp->salary, 2) : '—'); ?></td>
                        <td>
                            <span class="badge <?php echo e($emp->status === 'active' ? 'badge-active' : 'badge-inactive'); ?>">
                                <?php echo e(ucfirst($emp->status)); ?>

                            </span>
                        </td>
                        <td>
                            <form method="POST" action="<?php echo e(route('employees.destroy', $emp->id)); ?>"
                                  onsubmit="return confirm('Delete this employee?')" style="margin:0">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-btn">🗑</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="empty">No employees yet — add one above!</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\wamp64last\www\PHP_LARAVEL\resources\views/employees/index.blade.php ENDPATH**/ ?>