<?php
require_once 'blog-db.php';
require_once '../header.php';

// Initialize blog database
$blogDB = new BlogDB();

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$postsPerPage = 9;
$offset = ($page - 1) * $postsPerPage;

// Get posts
$posts = $blogDB->getAllPosts($postsPerPage, $offset);
$totalPosts = $blogDB->getTotalPosts();
$totalPages = ceil($totalPosts / $postsPerPage);

// Get sidebar data
$popularPosts = $blogDB->getPopularPosts(5);
$recentPosts = $blogDB->getRecentPosts(5);
$categories = $blogDB->getAllCategories();

// SEO Meta Tags
$pageTitle = "Digital Marketing Blog | Expert Tips & Insights | ThiyagiDigital";
$metaDescription = "Stay updated with the latest digital marketing trends, SEO tips, web development insights, and business growth strategies from ThiyagiDigital experts.";
$metaKeywords = "digital marketing blog, SEO tips, web development, social media marketing, content marketing, ThiyagiDigital";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:description" content="<?php echo $metaDescription; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://thiyagidigital.com/blog/">
    <meta property="og:image" content="https://thiyagidigital.com/assets/img/blog/blog-hero.jpg">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $pageTitle; ?>">
    <meta name="twitter:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:image" content="https://thiyagidigital.com/assets/img/blog/blog-hero.jpg">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://thiyagidigital.com/blog/">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Blog",
        "name": "ThiyagiDigital Blog",
        "description": "<?php echo $metaDescription; ?>",
        "url": "https://thiyagidigital.com/blog/",
        "publisher": {
            "@type": "Organization",
            "name": "ThiyagiDigital",
            "url": "https://thiyagidigital.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://thiyagidigital.com/assets/img/logo/logo.png"
            }
        }
    }
    </script>
    
    <style>
        .blog-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 100px 0 80px;
            color: white;
            text-align: center;
        }
        
        .blog-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .blog-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
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
            background: linear-gradient(45deg, #667eea, #764ba2);
            position: relative;
            overflow: hidden;
        }
        
        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
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
        
        .blog-card-date {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .blog-card-views {
            display: flex;
            align-items: center;
            gap: 5px;
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
            color: #667eea;
        }
        
        .blog-card-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .blog-card-categories {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .category-tag {
            background: #f8f9fa;
            color: #667eea;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        
        .category-tag:hover {
            background: #667eea;
            color: white;
        }
        
        .read-more {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .read-more:hover {
            color: #5a6fd8;
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
        
        .sidebar-section:last-child {
            margin-bottom: 0;
        }
        
        .sidebar-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
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
            background: linear-gradient(45deg, #667eea, #764ba2);
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
            color: #667eea;
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
            transition: background-color 0.3s ease;
        }
        
        .category-item:hover {
            background: #667eea;
            color: white;
        }
        
        .category-item a {
            color: inherit;
            text-decoration: none;
        }
        
        .category-count {
            background: #667eea;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
        }
        
        .category-item:hover .category-count {
            background: white;
            color: #667eea;
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
            color: #667eea;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .pagination a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .pagination .current {
            background: #667eea;
            color: white;
            border-color: #667eea;
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
            .blog-hero h1 {
                font-size: 2.5rem;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .blog-posts {
                grid-template-columns: 1fr;
            }
            
            .blog-card-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Blog Hero Section -->
    <section class="blog-hero">
        <div class="container">
            <h1>📚 Digital Marketing Blog</h1>
            <p>Stay ahead with expert insights, proven strategies, and the latest trends in digital marketing, SEO, web development, and business growth.</p>
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
                                <div class="blog-card-image">
                                    <?php if ($post['featured_image']): ?>
                                        <img src="images/<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                             alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="blog-card-content">
                                    <div class="blog-card-meta">
                                        <span class="blog-card-date">
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                        </span>
                                        <span class="blog-card-views">
                                            <i class="fas fa-eye"></i>
                                            <?php echo number_format($post['views']); ?> views
                                        </span>
                                    </div>
                                    
                                    <h2 class="blog-card-title">
                                        <a href="<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a>
                                    </h2>
                                    
                                    <p class="blog-card-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                    
                                    <div class="blog-card-footer">
                                        <div class="blog-card-categories">
                                            <?php if ($post['categories']): ?>
                                                <?php 
                                                $categories = explode(',', $post['categories']);
                                                $categorySlugs = explode(',', $post['category_slugs']);
                                                for ($i = 0; $i < min(2, count($categories)); $i++): ?>
                                                    <a href="category/<?php echo trim($categorySlugs[$i]); ?>" class="category-tag">
                                                        <?php echo trim($categories[$i]); ?>
                                                    </a>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">
                                            Read More <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
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
                        <h3>No blog posts found</h3>
                        <p>We're working on adding amazing content. Check back soon!</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- Popular Posts -->
                <?php if (!empty($popularPosts)): ?>
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">🔥 Popular Posts</h3>
                        <?php foreach ($popularPosts as $post): ?>
                            <div class="sidebar-post">
                                <div class="sidebar-post-image"></div>
                                <div class="sidebar-post-content">
                                    <h4><a href="<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h4>
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
                                    <h4><a href="<?php echo htmlspecialchars($post['slug']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h4>
                                    <div class="sidebar-post-meta">
                                        <?php echo date('M j, Y', strtotime($post['created_at'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Categories -->
                <?php if (!empty($categories)): ?>
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">📂 Categories</h3>
                        <div class="category-list">
                            <?php foreach ($categories as $category): ?>
                                <div class="category-item">
                                    <a href="category/<?php echo htmlspecialchars($category['slug']); ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </a>
                                    <span class="category-count"><?php echo $category['post_count']; ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Newsletter Signup -->
                <div class="sidebar-section">
                    <h3 class="sidebar-title">📧 Stay Updated</h3>
                    <p style="margin-bottom: 20px; color: #666; font-size: 0.9rem;">Get the latest digital marketing tips and insights delivered to your inbox.</p>
                    <form action="../smailer" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
                        <input type="email" name="email" placeholder="Your email address" required 
                               style="padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 0.9rem;">
                        <input type="hidden" name="service" value="Newsletter Subscription">
                        <input type="hidden" name="message" value="Blog newsletter subscription">
                        <button type="submit" style="background: #667eea; color: white; padding: 12px; border: none; border-radius: 8px; cursor: pointer; font-weight: 500; transition: background 0.3s ease;">
                            Subscribe Now
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </div>

    <!-- JSON-LD for Blog Posts -->
    <?php if (!empty($posts)): ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "itemListElement": [
                <?php foreach ($posts as $index => $post): ?>
                {
                    "@type": "ListItem",
                    "position": <?php echo $index + 1; ?>,
                    "item": {
                        "@type": "BlogPosting",
                        "headline": "<?php echo addslashes($post['title']); ?>",
                        "description": "<?php echo addslashes($post['excerpt']); ?>",
                        "url": "https://thiyagidigital.com/blog/<?php echo $post['slug']; ?>",
                        "datePublished": "<?php echo date('c', strtotime($post['created_at'])); ?>",
                        "author": {
                            "@type": "Organization",
                            "name": "ThiyagiDigital"
                        }
                    }
                }<?php echo ($index < count($posts) - 1) ? ',' : ''; ?>
                <?php endforeach; ?>
            ]
        }
        </script>
    <?php endif; ?>

<?php require_once '../footer.php'; ?>
</body>
</html>