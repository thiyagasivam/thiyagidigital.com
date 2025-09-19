<?php
require_once '../blog-db.php';
require_once '../../header.php';

// Get category slug
$categorySlug = isset($_GET['category']) ? $_GET['category'] : '';
if (empty($categorySlug)) {
    // Try to get from URL path
    $path = $_SERVER['REQUEST_URI'];
    $pathParts = explode('/', trim($path, '/'));
    $categorySlug = end($pathParts);
}

if (empty($categorySlug)) {
    header('Location: /blog/');
    exit;
}

// Initialize blog database
$blogDB = new BlogDB();

// Get category info
$categories = $blogDB->getAllCategories();
$currentCategory = null;
foreach ($categories as $cat) {
    if ($cat['slug'] === $categorySlug) {
        $currentCategory = $cat;
        break;
    }
}

if (!$currentCategory) {
    header('HTTP/1.0 404 Not Found');
    require_once '../../404.php';
    exit;
}

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$postsPerPage = 9;
$offset = ($page - 1) * $postsPerPage;

// Get posts for this category
$posts = $blogDB->getPostsByCategory($categorySlug, $postsPerPage, $offset);

// Count total posts in this category
$totalPostsQuery = "SELECT COUNT(*) FROM blog_posts p 
                    JOIN post_categories pc ON p.id = pc.post_id 
                    JOIN blog_categories c ON pc.category_id = c.id 
                    WHERE c.slug = :category_slug AND p.status = 'published'";
$stmt = $blogDB->pdo->prepare($totalPostsQuery);
$stmt->bindParam(':category_slug', $categorySlug);
$stmt->execute();
$totalPosts = $stmt->fetchColumn();
$totalPages = ceil($totalPosts / $postsPerPage);

// Get sidebar data
$popularPosts = $blogDB->getPopularPosts(5);
$recentPosts = $blogDB->getRecentPosts(5);

// SEO Meta Tags
$pageTitle = $currentCategory['name'] . ' Articles | ThiyagiDigital Blog';
$metaDescription = 'Explore our latest ' . strtolower($currentCategory['name']) . ' articles and insights. ' . $currentCategory['description'];
$metaKeywords = strtolower($currentCategory['name']) . ', digital marketing, SEO, web development, ThiyagiDigital';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($metaKeywords); ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://thiyagidigital.com/blog/category/<?php echo $categorySlug; ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://thiyagidigital.com/blog/category/<?php echo $categorySlug; ?>">
    
    <style>
        .category-hero {
            background: linear-gradient(135deg, <?php echo $currentCategory['color']; ?> 0%, #764ba2 100%);
            padding: 80px 0 60px;
            color: white;
            text-align: center;
        }
        
        .category-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .category-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .category-stats {
            margin-top: 20px;
            font-size: 1rem;
            opacity: 0.8;
        }
        
        .blog-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }
        
        .blog-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .blog-posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #f0f0f0;
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .blog-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, <?php echo $currentCategory['color']; ?>, #764ba2);
            position: relative;
            overflow: hidden;
        }
        
        .blog-card-content {
            padding: 25px;
        }
        
        .blog-card-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .blog-card-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
            line-height: 1.4;
        }
        
        .blog-card-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .blog-card-title a:hover {
            color: <?php echo $currentCategory['color']; ?>;
        }
        
        .blog-card-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .read-more {
            color: <?php echo $currentCategory['color']; ?>;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .read-more:hover {
            opacity: 0.8;
        }
        
        .blog-sidebar {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            height: fit-content;
            position: sticky;
            top: 20px;
        }
        
        .sidebar-section {
            margin-bottom: 40px;
        }
        
        .sidebar-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
            padding-bottom: 10px;
            border-bottom: 2px solid <?php echo $currentCategory['color']; ?>;
        }
        
        .sidebar-post {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .sidebar-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .sidebar-post-image {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, <?php echo $currentCategory['color']; ?>, #764ba2);
            border-radius: 8px;
            flex-shrink: 0;
        }
        
        .sidebar-post-content h4 {
            font-size: 0.9rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        
        .sidebar-post-content h4 a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .sidebar-post-content h4 a:hover {
            color: <?php echo $currentCategory['color']; ?>;
        }
        
        .sidebar-post-meta {
            font-size: 0.8rem;
            color: #666;
        }
        
        .category-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .category-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background: white;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .category-item.active {
            background: <?php echo $currentCategory['color']; ?>;
            color: white;
        }
        
        .category-item:not(.active):hover {
            background: #e9ecef;
        }
        
        .category-item a {
            color: inherit;
            text-decoration: none;
        }
        
        .category-count {
            background: <?php echo $currentCategory['color']; ?>;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }
        
        .category-item.active .category-count {
            background: white;
            color: <?php echo $currentCategory['color']; ?>;
        }
        
        .breadcrumb {
            padding: 20px 0;
            background: #f8f9fa;
        }
        
        .breadcrumb-nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }
        
        .breadcrumb-nav a {
            color: <?php echo $currentCategory['color']; ?>;
            text-decoration: none;
        }
        
        .breadcrumb-nav a:hover {
            text-decoration: underline;
        }
        
        .breadcrumb-separator {
            color: #999;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 40px;
        }
        
        .pagination a,
        .pagination span {
            padding: 12px 18px;
            border: 1px solid #ddd;
            color: <?php echo $currentCategory['color']; ?>;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .pagination a:hover {
            background: <?php echo $currentCategory['color']; ?>;
            color: white;
            border-color: <?php echo $currentCategory['color']; ?>;
        }
        
        .pagination .current {
            background: <?php echo $currentCategory['color']; ?>;
            color: white;
            border-color: <?php echo $currentCategory['color']; ?>;
        }
        
        .no-posts {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-posts i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #ddd;
        }
        
        @media (max-width: 768px) {
            .category-hero h1 {
                font-size: 2.5rem;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .blog-posts {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <nav class="breadcrumb-nav">
            <a href="/">Home</a>
            <span class="breadcrumb-separator">/</span>
            <a href="/blog/">Blog</a>
            <span class="breadcrumb-separator">/</span>
            <span><?php echo htmlspecialchars($currentCategory['name']); ?></span>
        </nav>
    </section>

    <!-- Category Hero Section -->
    <section class="category-hero">
        <div class="container">
            <h1><?php echo htmlspecialchars($currentCategory['name']); ?> Articles</h1>
            <p><?php echo htmlspecialchars($currentCategory['description']); ?></p>
            <div class="category-stats">
                📊 <?php echo number_format($totalPosts); ?> articles • Updated regularly
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <div class="blog-container">
        <div class="blog-grid">
            <!-- Main Blog Posts -->
            <div class="blog-main">
                <?php if (!empty($posts)): ?>
                    <div class="blog-posts">
                        <?php foreach ($posts as $post): ?>
                            <article class="blog-card">
                                <div class="blog-card-image"></div>
                                
                                <div class="blog-card-content">
                                    <div class="blog-card-meta">
                                        <span><i class="fas fa-calendar-alt"></i> <?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                                        <span><i class="fas fa-eye"></i> <?php echo number_format($post['views']); ?> views</span>
                                    </div>
                                    
                                    <h2 class="blog-card-title">
                                        <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a>
                                    </h2>
                                    
                                    <p class="blog-card-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                    
                                    <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">
                                        Read More <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Pagination -->
                    <?php if ($totalPages > 1): ?>
                        <div class="pagination">
                            <?php if ($page > 1): ?>
                                <a href="?page=<?php echo ($page - 1); ?>">&laquo; Previous</a>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <?php if ($i == $page): ?>
                                    <span class="current"><?php echo $i; ?></span>
                                <?php elseif ($i <= 3 || $i > $totalPages - 3 || abs($i - $page) <= 2): ?>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php elseif ($i == 4 && $page > 6): ?>
                                    <span>...</span>
                                <?php elseif ($i == $totalPages - 3 && $page < $totalPages - 5): ?>
                                    <span>...</span>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <?php if ($page < $totalPages): ?>
                                <a href="?page=<?php echo ($page + 1); ?>">Next &raquo;</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <div class="no-posts">
                        <i class="fas fa-newspaper"></i>
                        <h3>No articles found</h3>
                        <p>We're working on adding more <?php echo strtolower($currentCategory['name']); ?> content. Check back soon!</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- All Categories -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">📂 All Categories</h3>
                    <div class="category-list">
                        <?php foreach ($categories as $category): ?>
                            <div class="category-item <?php echo ($category['slug'] === $categorySlug) ? 'active' : ''; ?>">
                                <a href="/blog/category/<?php echo htmlspecialchars($category['slug']); ?>">
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </a>
                                <span class="category-count"><?php echo $category['post_count']; ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Popular Posts -->
                <?php if (!empty($popularPosts)): ?>
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">🔥 Popular Posts</h3>
                        <?php foreach ($popularPosts as $post): ?>
                            <div class="sidebar-post">
                                <div class="sidebar-post-image"></div>
                                <div class="sidebar-post-content">
                                    <h4><a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h4>
                                    <div class="sidebar-post-meta">
                                        <?php echo number_format($post['views']); ?> views • <?php echo date('M j', strtotime($post['created_at'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Recent Posts -->
                <?php if (!empty($recentPosts)): ?>
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">🆕 Recent Posts</h3>
                        <?php foreach ($recentPosts as $post): ?>
                            <div class="sidebar-post">
                                <div class="sidebar-post-image"></div>
                                <div class="sidebar-post-content">
                                    <h4><a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h4>
                                    <div class="sidebar-post-meta">
                                        <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>

<?php require_once '../../footer.php'; ?>
</body>
</html>