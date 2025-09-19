<?php
session_start();
require_once 'blog-db.php';

// Simple authentication (in production, use proper authentication)
if (!isset($_SESSION['blog_admin'])) {
    if (isset($_POST['admin_password'])) {
        if ($_POST['admin_password'] === 'thiyagi2025') {
            $_SESSION['blog_admin'] = true;
            header('Location: admin.php');
            exit;
        } else {
            $error = 'Invalid password';
        }
    }
    
    if (!isset($_SESSION['blog_admin'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Blog Admin Login | ThiyagiDigital</title>
            <style>
                body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 40px; }
                .login-container { max-width: 400px; margin: 100px auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
                .login-title { text-align: center; margin-bottom: 30px; color: #333; }
                .form-group { margin-bottom: 20px; }
                label { display: block; margin-bottom: 5px; color: #555; }
                input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; }
                button { width: 100%; padding: 12px; background: #667eea; color: white; border: none; border-radius: 5px; cursor: pointer; }
                button:hover { background: #5a6fd8; }
                .error { color: #d32f2f; margin-bottom: 20px; padding: 10px; background: #ffebee; border-radius: 5px; }
            </style>
        </head>
        <body>
            <div class="login-container">
                <h2 class="login-title">🔐 Blog Admin Login</h2>
                <?php if (isset($error)): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label>Admin Password:</label>
                        <input type="password" name="admin_password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Initialize blog database
$blogDB = new BlogDB();

// Handle actions
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'logout':
            session_destroy();
            header('Location: admin.php');
            exit;
            
        case 'generate_images':
            header('Location: images/generate-images.php');
            exit;
            
        case 'delete_post':
            if (isset($_GET['id'])) {
                $sql = "DELETE FROM blog_posts WHERE id = ?";
                $stmt = $blogDB->pdo->prepare($sql);
                $stmt->execute([$_GET['id']]);
                $success = "Post deleted successfully!";
            }
            break;
            
        case 'toggle_status':
            if (isset($_GET['id'])) {
                $sql = "UPDATE blog_posts SET status = IF(status = 'published', 'draft', 'published') WHERE id = ?";
                $stmt = $blogDB->pdo->prepare($sql);
                $stmt->execute([$_GET['id']]);
                $success = "Post status updated!";
            }
            break;
    }
}

// Get statistics
$totalPosts = $blogDB->getTotalPosts();
$totalCategories = count($blogDB->getAllCategories());
$totalViews = $blogDB->pdo->query("SELECT SUM(views) FROM blog_posts")->fetchColumn();
$recentPosts = $blogDB->pdo->query("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 10")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin Dashboard | ThiyagiDigital</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f7fa; }
        
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .admin-header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .admin-title {
            font-size: 1.8rem;
            font-weight: 600;
        }
        
        .admin-nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .admin-nav a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }
        
        .admin-nav a:hover {
            background: rgba(255,255,255,0.2);
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            text-align: center;
            border-top: 4px solid #667eea;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
            font-size: 1.1rem;
        }
        
        .admin-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        .section-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
            background: #f8f9fa;
            border-radius: 10px 10px 0 0;
        }
        
        .section-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #333;
        }
        
        .section-content {
            padding: 25px;
        }
        
        .posts-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .posts-table th,
        .posts-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .posts-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-published {
            background: #d4edda;
            color: #155724;
        }
        
        .status-draft {
            background: #f8d7da;
            color: #721c24;
        }
        
        .action-btn {
            display: inline-block;
            padding: 4px 8px;
            margin: 0 2px;
            border-radius: 3px;
            text-decoration: none;
            font-size: 0.8rem;
            transition: background 0.3s ease;
        }
        
        .btn-edit {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .btn-toggle {
            background: #fff3e0;
            color: #f57c00;
        }
        
        .btn-delete {
            background: #ffebee;
            color: #d32f2f;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 10px 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #5a6fd8;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .quick-actions {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        .truncate {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        @media (max-width: 768px) {
            .admin-header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .admin-nav {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .posts-table {
                font-size: 0.9rem;
            }
            
            .truncate {
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
    <header class="admin-header">
        <div class="admin-header-content">
            <h1 class="admin-title">📚 Blog Admin Dashboard</h1>
            <nav class="admin-nav">
                <a href="../index.php" target="_blank">👁️ View Blog</a>
                <a href="?action=generate_images">🖼️ Generate Images</a>
                <a href="?action=logout">🚪 Logout</a>
            </nav>
        </div>
    </header>

    <div class="admin-container">
        <?php if (isset($success)): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo number_format($totalPosts); ?></div>
                <div class="stat-label">Total Posts</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo number_format($totalCategories); ?></div>
                <div class="stat-label">Categories</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo number_format($totalViews); ?></div>
                <div class="stat-label">Total Views</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo date('M j'); ?></div>
                <div class="stat-label">Last Updated</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="?action=generate_images" class="btn-primary">🖼️ Generate Featured Images</a>
            <a href="../sitemap.xml.php" target="_blank" class="btn-primary">🗺️ Update Sitemap</a>
            <a href="../index.php" target="_blank" class="btn-primary">👁️ View Live Blog</a>
        </div>

        <!-- Recent Posts Management -->
        <div class="admin-section">
            <div class="section-header">
                <h2 class="section-title">📝 Recent Blog Posts</h2>
            </div>
            <div class="section-content">
                <?php if (!empty($recentPosts)): ?>
                    <div style="overflow-x: auto;">
                        <table class="posts-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Views</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentPosts as $post): ?>
                                    <tr>
                                        <td>
                                            <div class="truncate">
                                                <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                                                <br>
                                                <small style="color: #666;"><?php echo htmlspecialchars(substr($post['excerpt'], 0, 100)); ?>...</small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status-badge status-<?php echo $post['status']; ?>">
                                                <?php echo ucfirst($post['status']); ?>
                                            </span>
                                        </td>
                                        <td><?php echo number_format($post['views']); ?></td>
                                        <td><?php echo date('M j, Y', strtotime($post['created_at'])); ?></td>
                                        <td>
                                            <a href="../<?php echo $post['slug']; ?>" class="action-btn btn-edit" target="_blank">👁️ View</a>
                                            <a href="?action=toggle_status&id=<?php echo $post['id']; ?>" class="action-btn btn-toggle">
                                                <?php echo $post['status'] === 'published' ? '📝 Draft' : '🚀 Publish'; ?>
                                            </a>
                                            <a href="?action=delete_post&id=<?php echo $post['id']; ?>" 
                                               class="action-btn btn-delete" 
                                               onclick="return confirm('Are you sure you want to delete this post?')">🗑️ Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p style="text-align: center; color: #666; padding: 40px;">No blog posts found.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Database Info -->
        <div class="admin-section">
            <div class="section-header">
                <h2 class="section-title">🗄️ Database Information</h2>
            </div>
            <div class="section-content">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div>
                        <h4>Database Tables</h4>
                        <ul style="list-style-type: none; padding: 0;">
                            <li>✅ blog_posts</li>
                            <li>✅ blog_categories</li>
                            <li>✅ post_categories</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Features Active</h4>
                        <ul style="list-style-type: none; padding: 0;">
                            <li>✅ Clean URLs (.htaccess)</li>
                            <li>✅ SEO Optimization</li>
                            <li>✅ Category Management</li>
                            <li>✅ View Tracking</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Sample Data</h4>
                        <ul style="list-style-type: none; padding: 0;">
                            <li>✅ <?php echo count($blogDB->getAllCategories()); ?> Categories</li>
                            <li>✅ <?php echo $totalPosts; ?> Sample Posts</li>
                            <li>✅ Featured Images</li>
                            <li>✅ Meta Data</li>
                        </ul>
                    </div>
                </div>
                
                <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                    <h4 style="margin-bottom: 15px;">🎯 Blog Setup Complete!</h4>
                    <p style="color: #666; line-height: 1.6; margin-bottom: 15px;">
                        Your blog system is fully functional with clean URLs, SEO optimization, and sample content. 
                        The database will be created automatically on first visit if it doesn't exist.
                    </p>
                    <p style="color: #666; line-height: 1.6;">
                        <strong>Blog URLs:</strong><br>
                        📖 Main Blog: <a href="../index.php" target="_blank" style="color: #667eea;">/blog/</a><br>
                        📄 Sample Post: <a href="../top-seo-strategies-2025" target="_blank" style="color: #667eea;">/blog/top-seo-strategies-2025</a><br>
                        📂 Category: <a href="../category/seo-tips" target="_blank" style="color: #667eea;">/blog/category/seo-tips</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>