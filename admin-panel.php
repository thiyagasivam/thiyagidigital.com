<?php
// COMPREHENSIVE ADMIN PANEL FOR CONTACT FORM MANAGEMENT
// Secure dashboard to view, manage, and analyze contact submissions

session_start();

// Security Configuration
$admin_password = 'admin123';
$session_timeout = 3600; // 1 hour

// Check for logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin-panel');
    exit;
}

// Handle login
if (isset($_POST['password'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['login_time'] = time();
        header('Location: admin-panel');
        exit;
    } else {
        $login_error = 'Invalid password';
    }
}

// Check if logged in and session is valid
$is_logged_in = isset($_SESSION['admin_logged_in']) && 
                $_SESSION['admin_logged_in'] === true && 
                isset($_SESSION['login_time']) && 
                (time() - $_SESSION['login_time']) < $session_timeout;

if (!$is_logged_in) {
    // Show login form
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Login - ThiyagiDigital Contact Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <style>
            body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
            .login-container { max-width: 400px; margin: 10% auto; }
            .login-card { border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
            .brand-logo { width: 60px; height: 60px; background: #007cba; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; }
            .form-control:focus { border-color: #007cba; box-shadow: 0 0 0 0.2rem rgba(0, 124, 186, 0.25); }
            .btn-admin { background: linear-gradient(45deg, #007cba, #005a87); border: none; }
            .btn-admin:hover { background: linear-gradient(45deg, #005a87, #007cba); }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <div class="card login-card">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="brand-logo">
                                <i class="fas fa-shield-alt text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold">Admin Access</h3>
                            <p class="text-muted">Contact Management Dashboard</p>
                        </div>

                        <?php if (isset($login_error)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i> <?= htmlspecialchars($login_error) ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter admin password" required autocomplete="off">
                                </div>
                                <div class="form-text text-muted">
                                    <small>Default password: <code>admin123</code></small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-admin w-100 py-2">
                                <i class="fas fa-sign-in-alt"></i> Login to Dashboard
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i> 
                                Session expires after 1 hour of inactivity
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Update session time
$_SESSION['login_time'] = time();

// Load and process submissions
$submissions = [];
$totalSubmissions = 0;
$emailSent = 0;
$emailFailed = 0;
$todaySubmissions = 0;

if (file_exists('contact_submissions.json')) {
    $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (trim($line)) {
            $submission = json_decode($line, true);
            if ($submission) {
                $submissions[] = $submission;
                $totalSubmissions++;
                
                if ($submission['status'] === 'email_sent') $emailSent++;
                if ($submission['status'] === 'email_failed') $emailFailed++;
                
                if (isset($submission['timestamp']) && 
                    date('Y-m-d', strtotime($submission['timestamp'])) === date('Y-m-d')) {
                    $todaySubmissions++;
                }
            }
        }
    }
}

// Sort by timestamp (newest first)
usort($submissions, function($a, $b) {
    return strtotime($b['timestamp']) - strtotime($a['timestamp']);
});

// Pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$perPage = 10;
$totalPages = ceil($totalSubmissions / $perPage);
$offset = ($page - 1) * $perPage;
$paginatedSubmissions = array_slice($submissions, $offset, $perPage);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Contact Management | ThiyagiDigital</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007cba;
            --secondary-color: #005a87;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
        }

        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        .navbar-brand { font-weight: bold; }
        .stats-card { border-radius: 15px; border: none; transition: transform 0.2s; }
        .stats-card:hover { transform: translateY(-5px); }
        .stats-icon { width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        
        .submission-card { border-radius: 10px; border: none; margin-bottom: 20px; transition: box-shadow 0.3s; }
        .submission-card:hover { box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        
        .status-badge { padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600; }
        .status-received { background-color: #e3f2fd; color: #1565c0; }
        .status-email_sent { background-color: #e8f5e8; color: #2e7d32; }
        .status-email_failed { background-color: #fff3e0; color: #ef6c00; }
        
        .contact-info { font-size: 0.9rem; }
        .contact-info a { color: var(--primary-color); text-decoration: none; }
        .contact-info a:hover { text-decoration: underline; }
        
        .message-box { background-color: #f8f9fa; border-left: 4px solid var(--primary-color); padding: 1rem; border-radius: 5px; }
        
        .pagination-container { margin-top: 2rem; }
        
        @media (max-width: 768px) {
            .stats-card { margin-bottom: 1rem; }
            .table-responsive { font-size: 0.8rem; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--primary-color);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tachometer-alt"></i> ThiyagiDigital Admin
            </a>
            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> Admin
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?logout=1"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3 mb-0">Contact Management Dashboard</h1>
                <p class="text-muted">Manage and monitor contact form submissions</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3" style="background-color: var(--primary-color);">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h3 class="mb-1"><?= $totalSubmissions ?></h3>
                            <p class="text-muted mb-0">Total Submissions</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3" style="background-color: var(--success-color);">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <div>
                            <h3 class="mb-1"><?= $emailSent ?></h3>
                            <p class="text-muted mb-0">Emails Sent</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3" style="background-color: var(--warning-color);">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                        <div>
                            <h3 class="mb-1"><?= $emailFailed ?></h3>
                            <p class="text-muted mb-0">Email Failed</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <div class="card stats-card h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="stats-icon me-3" style="background-color: var(--info-color);">
                            <i class="fas fa-calendar-day text-white"></i>
                        </div>
                        <div>
                            <h3 class="mb-1"><?= $todaySubmissions ?></h3>
                            <p class="text-muted mb-0">Today's Submissions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submissions List -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-list"></i> Recent Submissions
                        </h5>
                        <div>
                            <a href="contact-form-debug" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-tools"></i> System Debug
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if (empty($paginatedSubmissions)): ?>
                            <div class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h4>No submissions yet</h4>
                                <p class="text-muted">Contact form submissions will appear here when users submit forms.</p>
                                <a href="forms-updated-test" class="btn btn-primary">
                                    <i class="fas fa-vial"></i> Test Forms
                                </a>
                            </div>
                        <?php else: ?>
                            <?php foreach ($paginatedSubmissions as $submission): ?>
                                <div class="submission-card card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h6 class="mb-1"><?= htmlspecialchars($submission['name']) ?></h6>
                                                    <span class="status-badge status-<?= $submission['status'] ?>">
                                                        <?= ucfirst(str_replace('_', ' ', $submission['status'])) ?>
                                                    </span>
                                                </div>
                                                
                                                <div class="contact-info mb-2">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <i class="fas fa-envelope me-1"></i>
                                                            <a href="mailto:<?= htmlspecialchars($submission['email']) ?>">
                                                                <?= htmlspecialchars($submission['email']) ?>
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <i class="fas fa-phone me-1"></i>
                                                            <a href="tel:<?= htmlspecialchars($submission['phone']) ?>">
                                                                <?= htmlspecialchars($submission['phone']) ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-cog me-1"></i>
                                                        <strong>Service:</strong> <?= htmlspecialchars($submission['service']) ?>
                                                    </small>
                                                </div>
                                                
                                                <?php if (!empty($submission['message'])): ?>
                                                    <div class="message-box">
                                                        <small class="text-muted d-block mb-1">
                                                            <i class="fas fa-comment me-1"></i> Message:
                                                        </small>
                                                        <?= nl2br(htmlspecialchars($submission['message'])) ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="text-md-end">
                                                    <small class="text-muted d-block">
                                                        <i class="fas fa-clock me-1"></i>
                                                        <?= date('M j, Y g:i A', strtotime($submission['timestamp'])) ?>
                                                    </small>
                                                    
                                                    <small class="text-muted d-block">
                                                        <i class="fas fa-globe me-1"></i>
                                                        <?= htmlspecialchars($submission['ip']) ?>
                                                    </small>
                                                    
                                                    <?php if (!empty($submission['attachment'])): ?>
                                                        <small class="text-muted d-block mt-1">
                                                            <i class="fas fa-paperclip me-1"></i>
                                                            <?= htmlspecialchars($submission['attachment']) ?>
                                                        </small>
                                                    <?php endif; ?>
                                                    
                                                    <small class="text-muted d-block">
                                                        <i class="fas fa-fingerprint me-1"></i>
                                                        ID: <?= htmlspecialchars(substr($submission['id'], -8)) ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Pagination -->
                            <?php if ($totalPages > 1): ?>
                                <div class="pagination-container d-flex justify-content-center">
                                    <nav>
                                        <ul class="pagination">
                                            <?php if ($page > 1): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                                </li>
                                            <?php endif; ?>
                                            
                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                                <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            
                                            <?php if ($page < $totalPages): ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </nav>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-3">
                                <h6>Data Files</h6>
                                <p class="text-muted mb-0">
                                    <?= file_exists('contact_submissions.json') ? '✅ JSON' : '❌ JSON' ?><br>
                                    <?= file_exists('contact_submissions.txt') ? '✅ TXT Backup' : '❌ TXT Backup' ?>
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h6>Email Config</h6>
                                <p class="text-muted mb-0">
                                    TO: gopikannaps@gmail.com<br>
                                    CC: kannasivamp@gmail.com
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h6>Upload Directory</h6>
                                <p class="text-muted mb-0">
                                    <?= is_dir('uploads/contact_attachments') ? '✅ Available' : '❌ Missing' ?><br>
                                    uploads/contact_attachments/
                                </p>
                            </div>
                            <div class="col-md-3">
                                <h6>Last Updated</h6>
                                <p class="text-muted mb-0">
                                    <?= date('M j, Y g:i A') ?><br>
                                    Session: <?= date('g:i A', $_SESSION['login_time']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Auto-refresh every 30 seconds -->
    <script>
        // Auto-refresh submissions every 30 seconds
        setInterval(function() {
            // Only refresh if user is on first page and no modal is open
            if (window.location.search === '' || window.location.search === '?page=1') {
                if (!document.querySelector('.modal.show')) {
                    window.location.reload();
                }
            }
        }, 30000);
        
        // Add tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>