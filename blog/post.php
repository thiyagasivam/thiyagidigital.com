<?php
require_once 'blog-db.php';

// Get the slug from URL
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
if (empty($slug)) {
    // Try to get slug from the URL path
    $path = $_SERVER['REQUEST_URI'];
    $pathParts = explode('/', trim($path, '/'));
    $slug = end($pathParts);
    
    if (empty($slug) || $slug === 'blog') {
        header('Location: /blog/');
        exit;
    }
}

// Initialize blog database
$blogDB = new BlogDB();

// Get the blog post
$post = $blogDB->getPostBySlug($slug);

if (!$post) {
    header('HTTP/1.0 404 Not Found');
    require_once '../404.php';
    exit;
}

// Get related posts (same categories, excluding current post)
$categories = explode(',', $post['category_slugs'] ?? '');
$relatedPosts = [];
if (!empty($categories)) {
    $relatedPosts = $blogDB->getPostsByCategory($categories[0], 4, 0);
    // Remove current post from related posts
    $relatedPosts = array_filter($relatedPosts, function($relatedPost) use ($post) {
        return $relatedPost['id'] !== $post['id'];
    });
    $relatedPosts = array_slice($relatedPosts, 0, 3);
}

// Get sidebar data
$popularPosts = $blogDB->getPopularPosts(5);
$recentPosts = $blogDB->getRecentPosts(5);
$allCategories = $blogDB->getAllCategories();

// SEO Meta Tags
$pageTitle = $post['meta_title'] ?: ($post['title'] . ' | ThiyagiDigital Blog');
$metaDescription = $post['meta_description'] ?: substr(strip_tags($post['excerpt']), 0, 155) . '...';
$metaKeywords = $post['meta_keywords'] ?: 'digital marketing, SEO, web development, ThiyagiDigital';
$canonicalUrl = 'https://thiyagidigital.com/blog/' . $post['slug'];

require_once '../header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($metaKeywords); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($post['author']); ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:image" content="https://thiyagidigital.com/blog/images/<?php echo $post['featured_image'] ?: 'default-blog-image.jpg'; ?>">
    <meta property="article:published_time" content="<?php echo date('c', strtotime($post['created_at'])); ?>">
    <meta property="article:modified_time" content="<?php echo date('c', strtotime($post['updated_at'])); ?>">
    <meta property="article:author" content="<?php echo htmlspecialchars($post['author']); ?>">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($post['title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="twitter:image" content="https://thiyagidigital.com/blog/images/<?php echo $post['featured_image'] ?: 'default-blog-image.jpg'; ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    
    <!-- RSS Feed Auto-discovery -->
    <link rel="alternate" type="application/rss+xml" title="ThiyagiDigital Blog RSS Feed" href="/blog/rss">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "<?php echo addslashes($post['title']); ?>",
        "description": "<?php echo addslashes($metaDescription); ?>",
        "image": "https://thiyagidigital.com/blog/images/<?php echo $post['featured_image'] ?: 'default-blog-image.jpg'; ?>",
        "url": "<?php echo $canonicalUrl; ?>",
        "datePublished": "<?php echo date('c', strtotime($post['created_at'])); ?>",
        "dateModified": "<?php echo date('c', strtotime($post['updated_at'])); ?>",
        "author": {
            "@type": "Organization",
            "name": "<?php echo addslashes($post['author']); ?>",
            "url": "https://thiyagidigital.com"
        },
        "publisher": {
            "@type": "Organization",
            "name": "ThiyagiDigital",
            "url": "https://thiyagidigital.com",
            "logo": {
                "@type": "ImageObject",
                "url": "https://thiyagidigital.com/assets/img/logo/logo.png"
            }
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php echo $canonicalUrl; ?>"
        }
    }
    </script>
    
    <style>
        .blog-post-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 60px 0 40px;
            color: white;
        }
        
        .blog-post-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .blog-post-header {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        
        .blog-post-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .blog-post-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .blog-post-excerpt {
            font-size: 1.2rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .blog-post-categories {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .post-category-tag {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 6px 15px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        
        .post-category-tag:hover {
            background: rgba(255,255,255,0.3);
            color: white;
        }
        
        .blog-post-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 50px;
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        .blog-post-main {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            line-height: 1.8;
        }
        
        .blog-post-featured-image {
            width: calc(100% + 100px);
            height: 400px;
            margin: -25px -50px 40px -50px;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        
        .blog-post-featured-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .blog-post-main h2 {
            color: #333;
            font-size: 2rem;
            margin: 40px 0 20px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }
        
        .blog-post-main h3 {
            color: #444;
            font-size: 1.5rem;
            margin: 30px 0 15px 0;
        }
        
        .blog-post-main h4 {
            color: #555;
            font-size: 1.2rem;
            margin: 25px 0 10px 0;
            font-weight: 600;
        }
        
        .blog-post-main p {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.1rem;
        }
        
        .blog-post-main ul,
        .blog-post-main ol {
            margin: 20px 0;
            padding-left: 30px;
        }
        
        .blog-post-main li {
            margin-bottom: 8px;
            color: #333;
        }
        
        .blog-post-main strong {
            color: #667eea;
            font-weight: 600;
        }
        
        .blog-post-main blockquote {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            margin: 30px 0;
            font-style: italic;
            border-radius: 0 8px 8px 0;
        }
        
        .blog-post-sidebar {
            height: fit-content;
            position: sticky;
            top: 20px;
        }
        
        .sidebar-widget {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .widget-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }
        
        .sidebar-post-item {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .sidebar-post-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .sidebar-post-thumb {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 8px;
            flex-shrink: 0;
        }
        
        .sidebar-post-content h5 {
            font-size: 0.9rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        
        .sidebar-post-content h5 a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .sidebar-post-content h5 a:hover {
            color: #667eea;
        }
        
        .sidebar-post-meta {
            font-size: 0.8rem;
            color: #666;
        }
        
        .related-posts {
            margin-top: 60px;
            background: #f8f9fa;
            padding: 50px;
            border-radius: 15px;
        }
        
        .related-posts-title {
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }
        
        .related-posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .related-post-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .related-post-card:hover {
            transform: translateY(-3px);
        }
        
        .related-post-image {
            width: 100%;
            height: 150px;
            background: linear-gradient(45deg, #667eea, #764ba2);
        }
        
        .related-post-content {
            padding: 20px;
        }
        
        .related-post-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.3;
        }
        
        .related-post-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .related-post-title a:hover {
            color: #667eea;
        }
        
        .related-post-excerpt {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }
        
        .related-post-meta {
            font-size: 0.8rem;
            color: #999;
        }
        
        .breadcrumb {
            padding: 20px 0;
            background: #f8f9fa;
        }
        
        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }
        
        .breadcrumb-nav a {
            color: #667eea;
            text-decoration: none;
        }
        
        .breadcrumb-nav a:hover {
            text-decoration: underline;
        }
        
        .breadcrumb-separator {
            color: #999;
        }
        
        .social-share {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 40px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
        }
        
        .social-share-label {
            font-weight: 600;
            color: #333;
        }
        
        .social-share-buttons {
            display: flex;
            gap: 10px;
        }
        
        .social-share-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        
        .social-share-btn:hover {
            transform: scale(1.1);
        }
        
        .share-facebook { background: #3b5998; }
        .share-twitter { background: #1da1f2; }
        .share-linkedin { background: #0077b5; }
        .share-whatsapp { background: #25d366; }
        
        @media (max-width: 768px) {
            .blog-post-title {
                font-size: 2rem;
            }
            
            .blog-post-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .blog-post-main {
                padding: 30px;
            }
            
            .blog-post-featured-image {
                width: calc(100% + 60px);
                margin: -15px -30px 30px -30px;
            }
            
            .blog-post-meta {
                flex-direction: column;
                gap: 10px;
            }
            
            .related-posts {
                padding: 30px 20px;
            }
            
            .related-posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Breadcrumb -->
    <section class="breadcrumb">
        <div class="blog-post-container">
            <nav class="breadcrumb-nav">
                <a href="/">Home</a>
                <span class="breadcrumb-separator">/</span>
                <a href="/blog/">Blog</a>
                <span class="breadcrumb-separator">/</span>
                <span><?php echo htmlspecialchars($post['title']); ?></span>
            </nav>
        </div>
    </section>

    <!-- Blog Post Hero -->
    <section class="blog-post-hero">
        <div class="blog-post-container">
            <div class="blog-post-header">
                <div class="blog-post-meta">
                    <span><i class="fas fa-calendar-alt"></i> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                    <span><i class="fas fa-user"></i> <?php echo htmlspecialchars($post['author']); ?></span>
                    <span><i class="fas fa-eye"></i> <?php echo number_format($post['views']); ?> views</span>
                </div>
                
                <h1 class="blog-post-title"><?php echo htmlspecialchars($post['title']); ?></h1>
                
                <?php if ($post['excerpt']): ?>
                    <p class="blog-post-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                <?php endif; ?>
                
                <?php if ($post['categories']): ?>
                    <div class="blog-post-categories">
                        <?php 
                        $categories = explode(',', $post['categories']);
                        $categorySlugs = explode(',', $post['category_slugs']);
                        for ($i = 0; $i < count($categories); $i++): ?>
                            <a href="/blog/category/<?php echo trim($categorySlugs[$i]); ?>" class="post-category-tag">
                                <?php echo trim($categories[$i]); ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Blog Post Content -->
    <div class="blog-post-container">
        <div class="blog-post-content">
            <!-- Main Content -->
            <article class="blog-post-main">
                <?php if ($post['featured_image']): ?>
                    <div class="blog-post-featured-image">
                        <img src="images/<?php echo htmlspecialchars($post['featured_image']); ?>" 
                             alt="<?php echo htmlspecialchars($post['title']); ?>">
                    </div>
                <?php endif; ?>
                
                <div class="blog-post-body">
                    <?php echo $post['content']; ?>
                </div>
                
                <!-- Social Share -->
                <div class="social-share">
                    <span class="social-share-label">Share this article:</span>
                    <div class="social-share-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($canonicalUrl); ?>" 
                           class="social-share-btn share-facebook" target="_blank" rel="noopener">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($canonicalUrl); ?>&text=<?php echo urlencode($post['title']); ?>" 
                           class="social-share-btn share-twitter" target="_blank" rel="noopener">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($canonicalUrl); ?>" 
                           class="social-share-btn share-linkedin" target="_blank" rel="noopener">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text=<?php echo urlencode($post['title'] . ' - ' . $canonicalUrl); ?>" 
                           class="social-share-btn share-whatsapp" target="_blank" rel="noopener">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="blog-post-sidebar">
                <!-- Popular Posts -->
                <?php if (!empty($popularPosts)): ?>
                    <div class="sidebar-widget">
                        <h3 class="widget-title">🔥 Popular Posts</h3>
                        <?php foreach ($popularPosts as $popularPost): ?>
                            <div class="sidebar-post-item">
                                <div class="sidebar-post-thumb"></div>
                                <div class="sidebar-post-content">
                                    <h5><a href="/blog/<?php echo htmlspecialchars($popularPost['slug']); ?>">
                                        <?php echo htmlspecialchars($popularPost['title']); ?>
                                    </a></h5>
                                    <div class="sidebar-post-meta">
                                        <?php echo number_format($popularPost['views']); ?> views
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Recent Posts -->
                <?php if (!empty($recentPosts)): ?>
                    <div class="sidebar-widget">
                        <h3 class="widget-title">🆕 Recent Posts</h3>
                        <?php foreach ($recentPosts as $recentPost): ?>
                            <div class="sidebar-post-item">
                                <div class="sidebar-post-thumb"></div>
                                <div class="sidebar-post-content">
                                    <h5><a href="/blog/<?php echo htmlspecialchars($recentPost['slug']); ?>">
                                        <?php echo htmlspecialchars($recentPost['title']); ?>
                                    </a></h5>
                                    <div class="sidebar-post-meta">
                                        <?php echo date('M j, Y', strtotime($recentPost['created_at'])); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Contact CTA -->
                <div class="sidebar-widget" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <h3 class="widget-title" style="color: white; border-color: rgba(255,255,255,0.3);">🚀 Need Expert Help?</h3>
                    <p style="margin-bottom: 20px; line-height: 1.6;">Ready to implement these strategies? Our digital marketing experts are here to help grow your business.</p>
                    <a href="/contact" style="display: inline-block; background: white; color: #667eea; padding: 12px 25px; border-radius: 25px; text-decoration: none; font-weight: 600; transition: transform 0.3s ease;">
                        Get Free Consultation
                    </a>
                </div>
            </aside>
        </div>
    </div>

    <!-- Related Posts -->
    <?php if (!empty($relatedPosts)): ?>
        <section class="related-posts">
            <div class="blog-post-container">
                <h2 class="related-posts-title">📖 Related Articles</h2>
                <div class="related-posts-grid">
                    <?php foreach ($relatedPosts as $relatedPost): ?>
                        <article class="related-post-card">
                            <div class="related-post-image"></div>
                            <div class="related-post-content">
                                <h3 class="related-post-title">
                                    <a href="/blog/<?php echo htmlspecialchars($relatedPost['slug']); ?>">
                                        <?php echo htmlspecialchars($relatedPost['title']); ?>
                                    </a>
                                </h3>
                                <p class="related-post-excerpt">
                                    <?php echo substr(htmlspecialchars($relatedPost['excerpt']), 0, 100) . '...'; ?>
                                </p>
                                <div class="related-post-meta">
                                    <?php echo date('M j, Y', strtotime($relatedPost['created_at'])); ?> • 
                                    <?php echo number_format($relatedPost['views']); ?> views
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php require_once '../footer.php'; ?>
</body>
</html>