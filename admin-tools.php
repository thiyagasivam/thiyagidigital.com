<!DOCTYPE html>
<html>
<head>
    <title>🎛️ Admin Tools - ThiyagiDigital Management</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .admin-container { max-width: 1000px; margin: 2rem auto; }
        .admin-card { 
            border-radius: 15px; 
            border: none; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.2); 
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .admin-card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 40px rgba(0,0,0,0.3); 
        }
        .tool-icon { 
            width: 80px; 
            height: 80px; 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin: 0 auto 1rem;
            font-size: 2rem;
        }
        .tool-card { 
            text-decoration: none; 
            color: inherit; 
            height: 100%;
        }
        .tool-card:hover { color: inherit; }
        .status-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        .status-online { background-color: #28a745; }
        .status-offline { background-color: #dc3545; }
        .brand-header { 
            background: rgba(255,255,255,0.1); 
            backdrop-filter: blur(10px); 
            border-radius: 15px; 
            color: white; 
            padding: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="container admin-container">
        <!-- Header -->
        <div class="brand-header text-center">
            <h1 class="display-4 fw-bold">
                <i class="fas fa-cogs"></i> ThiyagiDigital Admin
            </h1>
            <p class="lead mb-0">Complete Management & Monitoring Dashboard</p>
            <small class="text-white-50">
                <i class="fas fa-shield-alt"></i> Secure access to all administrative tools
            </small>
        </div>

        <!-- Admin Tools Grid -->
        <div class="row g-4">
            <!-- Main Admin Panel -->
            <div class="col-lg-4 col-md-6">
                <a href="admin-panel" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #007cba, #005a87);">
                                <i class="fas fa-tachometer-alt text-white"></i>
                            </div>
                            <h5 class="fw-bold">Main Dashboard</h5>
                            <p class="text-muted mb-3">Comprehensive contact management with statistics, submissions, and monitoring</p>
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-envelope"></i><br>
                                        Submissions
                                    </small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-chart-bar"></i><br>
                                        Analytics
                                    </small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-users"></i><br>
                                        Contacts
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Simple Admin (Working) -->
            <div class="col-lg-4 col-md-6">
                <a href="admin-working" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #28a745, #1e7e34);">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                            <h5 class="fw-bold">Simple Dashboard</h5>
                            <p class="text-muted mb-3">Lightweight admin panel with basic contact viewing and management features</p>
                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-list"></i><br>
                                        Quick View
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-rocket"></i><br>
                                        Fast Load
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Legacy Admin Contacts -->
            <div class="col-lg-4 col-md-6">
                <a href="admin_contacts?pass=admin123" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #17a2b8, #138496);">
                                <i class="fas fa-address-book text-white"></i>
                            </div>
                            <h5 class="fw-bold">Legacy Panel</h5>
                            <p class="text-muted mb-3">Original admin contacts interface with debug information and basic features</p>
                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-bug"></i><br>
                                        Debug Info
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-cog"></i><br>
                                        Basic Tools
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- System Debug Tools -->
            <div class="col-lg-4 col-md-6">
                <a href="contact-form-debug" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #ffc107, #e0a800);">
                                <i class="fas fa-tools text-dark"></i>
                            </div>
                            <h5 class="fw-bold">System Debug</h5>
                            <p class="text-muted mb-3">Complete system diagnostics, file checks, configuration status, and troubleshooting</p>
                            <div class="row text-center">
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-file-alt"></i><br>
                                        Files
                                    </small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-server"></i><br>
                                        Config
                                    </small>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">
                                        <i class="fas fa-wrench"></i><br>
                                        Fix
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Form Testing -->
            <div class="col-lg-4 col-md-6">
                <a href="forms-updated-test" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #6f42c1, #59359a);">
                                <i class="fas fa-vial text-white"></i>
                            </div>
                            <h5 class="fw-bold">Form Testing</h5>
                            <p class="text-muted mb-3">Test both main contact and sidebar forms with pre-filled data and validation</p>
                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-form"></i><br>
                                        Test Forms
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-check-double"></i><br>
                                        Validation
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Live Form Test -->
            <div class="col-lg-4 col-md-6">
                <a href="contact-form-live-test" class="tool-card">
                    <div class="card admin-card h-100">
                        <div class="card-body text-center p-4 position-relative">
                            <div class="status-indicator status-online" title="Active"></div>
                            <div class="tool-icon" style="background: linear-gradient(45deg, #dc3545, #c82333);">
                                <i class="fas fa-flask text-white"></i>
                            </div>
                            <h5 class="fw-bold">Live Testing</h5>
                            <p class="text-muted mb-3">Real-time form submission testing with detailed results and debugging information</p>
                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-play"></i><br>
                                        Live Test
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">
                                        <i class="fas fa-microscope"></i><br>
                                        Analysis
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Quick Stats -->
        <?php
        $stats = [
            'submissions' => 0,
            'today' => 0,
            'email_sent' => 0,
            'email_failed' => 0
        ];

        if (file_exists('contact_submissions.json')) {
            $lines = file('contact_submissions.json', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $stats['submissions'] = count($lines);
            
            foreach ($lines as $line) {
                if (trim($line)) {
                    $submission = json_decode($line, true);
                    if ($submission) {
                        if (isset($submission['timestamp']) && 
                            date('Y-m-d', strtotime($submission['timestamp'])) === date('Y-m-d')) {
                            $stats['today']++;
                        }
                        if ($submission['status'] === 'email_sent') $stats['email_sent']++;
                        if ($submission['status'] === 'email_failed') $stats['email_failed']++;
                    }
                }
            }
        }
        ?>

        <!-- Quick Statistics -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card admin-card">
                    <div class="card-body">
                        <h5 class="text-center mb-4">
                            <i class="fas fa-chart-line"></i> Quick Statistics
                        </h5>
                        <div class="row text-center">
                            <div class="col-3">
                                <h3 class="text-primary"><?= $stats['submissions'] ?></h3>
                                <small class="text-muted">Total Submissions</small>
                            </div>
                            <div class="col-3">
                                <h3 class="text-info"><?= $stats['today'] ?></h3>
                                <small class="text-muted">Today</small>
                            </div>
                            <div class="col-3">
                                <h3 class="text-success"><?= $stats['email_sent'] ?></h3>
                                <small class="text-muted">Emails Sent</small>
                            </div>
                            <div class="col-3">
                                <h3 class="text-warning"><?= $stats['email_failed'] ?></h3>
                                <small class="text-muted">Email Failed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-4">
            <div class="card admin-card">
                <div class="card-body py-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt"></i> 
                        Secure Admin Access • Last Updated: <?= date('M j, Y g:i A') ?> • 
                        <a href="contact" class="text-decoration-none">View Public Site</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>