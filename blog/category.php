<?php
require_once 'blog-db.php';

// Initialize BlogDB
$blogDB = new BlogDB();

// Get category from URL
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
if (empty($category)) {
    header('HTTP/1.0 404 Not Found');
    include('../404.php');
    exit;
}

// Get category info and posts
$categoryInfo = $blogDB->getCategoryBySlug($category);
if (!$categoryInfo) {
    header('HTTP/1.0 404 Not Found');
    include('../404.php');
    exit;
}

// Pagination
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = 6; // Posts per page
$offset = ($page - 1) * $limit;

$posts = $blogDB->getPostsByCategory($category, $limit, $offset);
$totalPosts = $blogDB->getTotalPostsByCategory($category);
$totalPages = ceil($totalPosts / $limit);

// SEO Data
$pageTitle = htmlspecialchars($categoryInfo['name']) . ' - ThiyagiDigital Blog';
$metaDescription = 'Browse ' . htmlspecialchars($categoryInfo['name']) . ' articles and insights from ThiyagiDigital. Expert tips on digital marketing, SEO, and web development.';
$metaKeywords = htmlspecialchars($categoryInfo['name']) . ', digital marketing, SEO, web development, ThiyagiDigital';
$canonicalUrl = 'https://thiyagidigital.com/blog/category/' . $category . ($page > 1 ? '?page=' . $page : '');

require_once '../header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($categoryInfo['name']); ?> - ThiyagiDigital Blog">
    <meta property="og:description" content="<?php echo $metaDescription; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:image" content="https://thiyagidigital.com/assets/img/logo/logo-white.png">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($categoryInfo['name']); ?> - ThiyagiDigital Blog">
    <meta name="twitter:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:image" content="https://thiyagidigital.com/assets/img/logo/logo-white.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    
    <!-- RSS Feed Auto-discovery -->
    <link rel="alternate" type="application/rss+xml" title="ThiyagiDigital Blog RSS Feed" href="/blog/rss">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "<?php echo addslashes($categoryInfo['name']); ?> - ThiyagiDigital Blog",
        "description": "<?php echo addslashes($metaDescription); ?>",
        "url": "<?php echo $canonicalUrl; ?>",
        "mainEntity": {
            "@type": "Blog",
            "name": "ThiyagiDigital Blog"
        }
    }
    </script>

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/css/fontawesome.css" rel="stylesheet">

    <style>
        .blog-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        .blog-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        .blog-hero .container {
            position: relative;
            z-index: 2;
        }
        .category-badge {
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
        }
        .blog-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        .blog-card-img {
            height: 250px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 1.2rem;
        }
        .blog-card-body {
            padding: 2rem;
        }
        .blog-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
            line-height: 1.3;
        }
        .blog-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 1rem;
        }
        .read-more {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        .read-more:hover {
            color: #764ba2;
            text-decoration: none;
        }
        .pagination-wrapper {
            margin-top: 4rem;
        }
        .page-link {
            color: #667eea;
            border-color: #667eea;
            border-radius: 8px !important;
            margin: 0 2px;
        }
        .page-link:hover {
            background-color: #667eea;
            border-color: #667eea;
            color: white;
        }
        .page-item.active .page-link {
            background-color: #667eea;
            border-color: #667eea;
        }
        .breadcrumb-item a {
            color: #667eea;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #764ba2;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="blog-hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/blog/">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($categoryInfo['name']); ?></li>
                    </ol>
                </nav>
                <h1 class="mb-4"><?php echo htmlspecialchars($categoryInfo['name']); ?></h1>
                <p class="lead"><?php echo htmlspecialchars($categoryInfo['description'] ?: 'Explore our latest insights and articles in ' . $categoryInfo['name']); ?></p>
                <div class="mt-4">
                    <span class="badge bg-light text-dark p-2">
                        <i class="fas fa-newspaper me-2"></i>
                        <?php echo $totalPosts; ?> Article<?php echo $totalPosts != 1 ? 's' : ''; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Section -->
<section class="py-5">
    <div class="container">
        <?php if (count($posts) > 0): ?>
            <div class="row g-4">
                <?php foreach ($posts as $post): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card blog-card">
                            <div class="blog-card-img">
                                <?php if ($post['featured_image']): ?>
                                    <img src="images/<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                         class="card-img-top" 
                                         alt="<?php echo htmlspecialchars($post['title']); ?>"
                                         style="height: 250px; object-fit: cover;">
                                <?php else: ?>
                                    <i class="fas fa-image fa-3x"></i>
                                <?php endif; ?>
                            </div>
                            <div class="card-body blog-card-body">
                                <a href="<?php echo htmlspecialchars($post['category_slug']); ?>" class="category-badge">
                                    <?php echo htmlspecialchars($post['category_name']); ?>
                                </a>
                                <h3 class="blog-title">
                                    <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($post['title']); ?>
                                    </a>
                                </h3>
                                <div class="blog-meta">
                                    <span><i class="fas fa-user me-1"></i><?php echo htmlspecialchars($post['author']); ?></span>
                                    <span><i class="fas fa-calendar-alt me-1"></i><?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                                </div>
                                <p class="blog-excerpt">
                                    <?php echo htmlspecialchars(substr(strip_tags($post['content']), 0, 150)); ?>...
                                </p>
                                <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($totalPages > 1): ?>
                <div class="pagination-wrapper">
                    <nav aria-label="Blog pagination">
                        <ul class="pagination justify-content-center">
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="py-5">
                        <i class="fas fa-search fa-3x text-muted mb-4"></i>
                        <h3>No Posts Found</h3>
                        <p class="text-muted">There are currently no posts in the "<?php echo htmlspecialchars($categoryInfo['name']); ?>" category.</p>
                        <a href="/blog/" class="btn btn-primary mt-3">
                            <i class="fas fa-arrow-left me-2"></i>Back to Blog
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

</body>
</html>

<?php require_once '../footer.php'; ?>