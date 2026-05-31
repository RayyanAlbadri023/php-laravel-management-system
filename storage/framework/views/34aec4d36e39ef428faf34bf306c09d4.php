<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Employee System'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #f5f7f5 0%, #c8d9c6 100%);
            min-height: 100vh;
            color: #1a1a1a;
        }

        input, select, button { font-family: 'DM Sans', sans-serif; }

        .alert {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .alert-success { background: rgba(24,56,18,0.08); color: #183812; border: 1px solid rgba(24,56,18,0.2); }
        .alert-error   { background: #fff5f5; color: #c53030; border: 1px solid #fed7d7; }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH C:\wamp64\wamp64last\www\PHP_LARAVEL\resources\views/layouts/app.blade.php ENDPATH**/ ?>