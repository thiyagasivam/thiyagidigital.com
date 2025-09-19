<?php
require_once 'blog-db.php';
require_once '../header.php';

// Initialize blog database
$blogDB = new BlogDB();

// Get search query
$searchQuery = isset($_GET['q']) ? trim($_GET['q']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$postsPerPage = 9;

// Search results
$posts = [];
$totalPosts = 0;
$totalPages = 0;

if (!empty($searchQuery)) {
    // Get search results
    $posts = $blogDB->searchPosts($searchQuery, 1000); // Get all matching posts first
    $totalPosts = count($posts);
    
    // Apply pagination
    $offset = ($page - 1) * $postsPerPage;
    $posts = array_slice($posts, $offset, $postsPerPage);
    $totalPages = ceil($totalPosts / $postsPerPage);
}

// Get sidebar data
$popularPosts = $blogDB->getPopularPosts(5);
$recentPosts = $blogDB->getRecentPosts(5);
$categories = $blogDB->getAllCategories();

// SEO Meta Tags
$pageTitle = !empty($searchQuery) ? "Search Results for '$searchQuery' | ThiyagiDigital Blog" : "Search Blog | ThiyagiDigital";
$metaDescription = !empty($searchQuery) ? "Search results for '$searchQuery' in ThiyagiDigital blog. Find articles about digital marketing, SEO, web development and more." : "Search ThiyagiDigital blog for expert articles on digital marketing, SEO, web development, and business growth strategies.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="robots" content="noindex, follow">
    
    <!-- RSS Feed Auto-discovery -->
    <link rel="alternate" type="application/rss+xml" title="ThiyagiDigital Blog RSS Feed" href="/blog/rss">
    
    <style>
        .search-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0 60px;
            color: white;
            text-align: center;
        }
        
        .search-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .search-form {
            max-width: 600px;
            margin: 30px auto 0;
            display: flex;
            gap: 15px;
        }
        
        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            outline: none;
        }
        
        .search-button {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
            padding: 15px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .search-button:hover {
            background: rgba(255,255,255,0.3);
            border-color: rgba(255,255,255,0.5);
        }
        
        .search-results-info {
            margin: 30px 0 20px;
            font-size: 1.1rem;
            color: rgba(255,255,255,0.9);
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
        }
        
        .search-results {
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
        }
        
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .blog-card-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
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
            color: #667eea;
        }
        
        .blog-card-excerpt {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .highlight {
            background: #fff3cd;
            padding: 2px 4px;
            border-radius: 3px;
            font-weight: 600;
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
        
        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-results i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #ddd;
        }
        
        .search-suggestions {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-top: 30px;
        }
        
        .suggestions-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .suggestions-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .suggestion-tag {
            background: white;
            color: #667eea;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .suggestion-tag:hover {
            background: #667eea;
            color: white;
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
            color: #667eea;
            text-decoration: none;
        }
        
        .breadcrumb-nav a:hover {
            text-decoration: underline;
        }
        
        .breadcrumb-separator {
            color: #999;
        }
        
        @media (max-width: 768px) {
            .search-hero h1 {
                font-size: 2.5rem;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .blog-grid {
                grid-template-columns: 1fr;
            }
            
            .search-results {
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
            <span>Search<?php echo !empty($searchQuery) ? " - $searchQuery" : ''; ?></span>
        </nav>
    </section>

    <!-- Search Hero Section -->
    <section class="search-hero">
        <div class="container">
            <h1>🔍 Search Blog</h1>
            
            <form class="search-form" method="GET" action="">
                <input type="text" name="q" class="search-input" 
                       placeholder="Search for articles, tips, guides..." 
                       value="<?php echo htmlspecialchars($searchQuery); ?>" required>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Search
                </button>
            </form>
            
            <?php if (!empty($searchQuery)): ?>
                <div class="search-results-info">
                    Found <?php echo number_format($totalPosts); ?> result<?php echo $totalPosts !== 1 ? 's' : ''; ?> for "<strong><?php echo htmlspecialchars($searchQuery); ?></strong>"
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Search Results -->
    <div class="blog-container">
        <div class="blog-grid">
            <!-- Main Content -->
            <div class="search-main">
                <?php if (!empty($searchQuery) && !empty($posts)): ?>
                    <div class="search-results">
                        <?php foreach ($posts as $post): ?>
                            <article class="blog-card">
                                <div class="blog-card-image"></div>
                                
                                <div class="blog-card-content">
                                    <div class="blog-card-meta">
                                        <span><i class="fas fa-calendar-alt"></i> <?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                                        <span><i class="fas fa-eye"></i> <?php echo number_format($post['views']); ?> views</span>
                                    </div>
                                    
                                    <h2 class="blog-card-title">
                                        <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>">
                                            <?php 
                                            // Highlight search terms in title
                                            $highlightedTitle = str_ireplace($searchQuery, '<span class="highlight">'.$searchQuery.'</span>', $post['title']);
                                            echo $highlightedTitle;
                                            ?>
                                        </a>
                                    </h2>
                                    
                                    <p class="blog-card-excerpt">
                                        <?php 
                                        // Highlight search terms in excerpt
                                        $highlightedExcerpt = str_ireplace($searchQuery, '<span class="highlight">'.$searchQuery.'</span>', $post['excerpt']);
                                        echo $highlightedExcerpt;
                                        ?>
                                    </p>
                                    
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
                                <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo ($page - 1); ?>">&laquo; Previous</a>
                            <?php endif; ?>
                            
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <?php if ($i == $page): ?>
                                    <span class="current"><?php echo $i; ?></span>
                                <?php elseif ($i <= 3 || $i > $totalPages - 3 || abs($i - $page) <= 2): ?>
                                    <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php elseif ($i == 4 && $page > 6): ?>
                                    <span>...</span>
                                <?php elseif ($i == $totalPages - 3 && $page < $totalPages - 5): ?>
                                    <span>...</span>
                                <?php endif; ?>
                            <?php endfor; ?>
                            
                            <?php if ($page < $totalPages): ?>
                                <a href="?q=<?php echo urlencode($searchQuery); ?>&page=<?php echo ($page + 1); ?>">Next &raquo;</a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                <?php elseif (!empty($searchQuery) && empty($posts)): ?>
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>No Results Found</h3>
                        <p>Sorry, we couldn't find any articles matching "<strong><?php echo htmlspecialchars($searchQuery); ?></strong>"</p>
                        
                        <div class="search-suggestions">
                            <h4 class="suggestions-title">Try searching for:</h4>
                            <div class="suggestions-tags">
                                <a href="?q=SEO" class="suggestion-tag">SEO</a>
                                <a href="?q=Digital Marketing" class="suggestion-tag">Digital Marketing</a>
                                <a href="?q=Web Development" class="suggestion-tag">Web Development</a>
                                <a href="?q=Social Media" class="suggestion-tag">Social Media</a>
                                <a href="?q=Content Marketing" class="suggestion-tag">Content Marketing</a>
                                <a href="?q=E-commerce" class="suggestion-tag">E-commerce</a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="no-results">
                        <i class="fas fa-search"></i>
                        <h3>Search Our Blog</h3>
                        <p>Enter keywords to find articles about digital marketing, SEO, web development, and business growth.</p>
                        
                        <div class="search-suggestions">
                            <h4 class="suggestions-title">Popular Topics:</h4>
                            <div class="suggestions-tags">
                                <a href="?q=SEO tips" class="suggestion-tag">SEO Tips</a>
                                <a href="?q=Digital Marketing" class="suggestion-tag">Digital Marketing</a>
                                <a href="?q=Web Development" class="suggestion-tag">Web Development</a>
                                <a href="?q=Social Media Marketing" class="suggestion-tag">Social Media Marketing</a>
                                <a href="?q=Content Marketing" class="suggestion-tag">Content Marketing</a>
                                <a href="?q=E-commerce" class="suggestion-tag">E-commerce</a>
                                <a href="?q=Business Growth" class="suggestion-tag">Business Growth</a>
                                <a href="?q=Mobile Design" class="suggestion-tag">Mobile Design</a>
                            </div>
                        </div>
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

                <!-- Categories -->
                <?php if (!empty($categories)): ?>
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">📂 Categories</h3>
                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            <?php foreach ($categories as $category): ?>
                                <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px 15px; background: white; border-radius: 8px; transition: background-color 0.3s ease;">
                                    <a href="/blog/category/<?php echo htmlspecialchars($category['slug']); ?>" style="color: inherit; text-decoration: none;">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </a>
                                    <span style="background: #667eea; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem;">
                                        <?php echo $category['post_count']; ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>

<?php require_once '../footer.php'; ?>
</body>
</html>