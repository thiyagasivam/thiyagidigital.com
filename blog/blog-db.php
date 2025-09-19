<?php
// Blog Database Configuration
// This file handles all blog-related database operations

class BlogDB {
    private $host = '127.0.0.1:3306';
    private $dbname = 'u662933183_thiyagidigi';
    private $username = 'u662933183_thiyagidigi';
    private $password = '1K*KtzD#2Oa';
    public $pdo;
    
    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // If database doesn't exist, create it
            $this->createDatabase();
        }
    }
    
    private function createDatabase() {
        try {
            $pdo = new PDO("mysql:host={$this->host};charset=utf8", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create database
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->dbname}");
            
            // Connect to the new database
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create tables
            $this->createTables();
        } catch(PDOException $e) {
            die("Database creation failed: " . $e->getMessage());
        }
    }
    
    private function createTables() {
        // Create blog_posts table
        $sql = "CREATE TABLE IF NOT EXISTS blog_posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) UNIQUE NOT NULL,
            excerpt TEXT,
            content LONGTEXT NOT NULL,
            featured_image VARCHAR(255),
            author VARCHAR(100) DEFAULT 'ThiyagiDigital Team',
            status ENUM('draft', 'published') DEFAULT 'published',
            meta_title VARCHAR(255),
            meta_description TEXT,
            meta_keywords TEXT,
            views INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sql);
        
        // Create categories table
        $sql = "CREATE TABLE IF NOT EXISTS blog_categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            slug VARCHAR(100) UNIQUE NOT NULL,
            description TEXT,
            color VARCHAR(7) DEFAULT '#007cba',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sql);
        
        // Create post_categories junction table
        $sql = "CREATE TABLE IF NOT EXISTS post_categories (
            post_id INT,
            category_id INT,
            PRIMARY KEY (post_id, category_id),
            FOREIGN KEY (post_id) REFERENCES blog_posts(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE CASCADE
        )";
        $this->pdo->exec($sql);
        
        // Insert default categories
        $this->insertDefaultCategories();
        
        // Insert sample blog posts
        $this->insertSamplePosts();
    }
    
    private function insertDefaultCategories() {
        $categories = [
            ['SEO Tips', 'seo-tips', 'Search Engine Optimization strategies and tips', '#1e73be'],
            ['Digital Marketing', 'digital-marketing', 'Digital marketing trends and strategies', '#dd3333'],
            ['Web Development', 'web-development', 'Web development tutorials and best practices', '#8224e3'],
            ['Social Media', 'social-media', 'Social media marketing insights', '#1da1f2'],
            ['Content Marketing', 'content-marketing', 'Content creation and marketing strategies', '#ff6900'],
            ['E-commerce', 'ecommerce', 'E-commerce development and marketing tips', '#00b050'],
            ['Business Growth', 'business-growth', 'Business development and growth strategies', '#ffc107'],
            ['Technology', 'technology', 'Latest technology trends and updates', '#6f42c1']
        ];
        
        foreach ($categories as $category) {
            $sql = "INSERT IGNORE INTO blog_categories (name, slug, description, color) VALUES (?, ?, ?, ?)";
            $this->pdo->prepare($sql)->execute($category);
        }
    }
    
    private function insertSamplePosts() {
        $posts = [
            [
                'title' => 'Top 10 SEO Strategies That Drive Results in 2025',
                'slug' => 'top-seo-strategies-2025',
                'excerpt' => 'Discover the most effective SEO strategies that are driving real results in 2025. From AI-powered optimization to user experience factors.',
                'content' => $this->getSampleContent('seo'),
                'featured_image' => 'seo-strategies-2025.jpg',
                'meta_title' => 'Top 10 SEO Strategies 2025 | ThiyagiDigital',
                'meta_description' => 'Learn the top SEO strategies for 2025 that drive real results. Expert tips on AI optimization, user experience, and search ranking factors.',
                'meta_keywords' => 'SEO strategies 2025, search engine optimization, SEO tips, digital marketing'
            ],
            [
                'title' => 'How Social Media Marketing Boosts Brand Awareness',
                'slug' => 'social-media-marketing-brand-awareness',
                'excerpt' => 'Learn how strategic social media marketing can exponentially increase your brand visibility and customer engagement.',
                'content' => $this->getSampleContent('social'),
                'featured_image' => 'social-media-branding.jpg',
                'meta_title' => 'Social Media Marketing for Brand Awareness | ThiyagiDigital',
                'meta_description' => 'Discover how social media marketing strategies can boost your brand awareness and drive customer engagement effectively.',
                'meta_keywords' => 'social media marketing, brand awareness, digital marketing, social media strategy'
            ],
            [
                'title' => 'Complete Guide to E-commerce Website Development',
                'slug' => 'ecommerce-website-development-guide',
                'excerpt' => 'Everything you need to know about building a successful e-commerce website that converts visitors into customers.',
                'content' => $this->getSampleContent('ecommerce'),
                'featured_image' => 'ecommerce-development.jpg',
                'meta_title' => 'E-commerce Website Development Guide | ThiyagiDigital',
                'meta_description' => 'Complete guide to e-commerce website development. Learn about platforms, features, and best practices for online stores.',
                'meta_keywords' => 'ecommerce development, online store, web development, ecommerce website'
            ],
            [
                'title' => 'Content Marketing Strategies for Small Businesses',
                'slug' => 'content-marketing-small-business',
                'excerpt' => 'Practical content marketing strategies that small businesses can implement to compete with larger companies.',
                'content' => $this->getSampleContent('content'),
                'featured_image' => 'content-marketing-small-business.jpg',
                'meta_title' => 'Content Marketing for Small Business | ThiyagiDigital',
                'meta_description' => 'Effective content marketing strategies for small businesses. Learn how to create compelling content that drives results.',
                'meta_keywords' => 'content marketing, small business marketing, digital content, marketing strategies'
            ],
            [
                'title' => 'Why Your Business Needs a Mobile-First Website',
                'slug' => 'mobile-first-website-importance',
                'excerpt' => 'Understanding the importance of mobile-first design and how it impacts user experience and search rankings.',
                'content' => $this->getSampleContent('mobile'),
                'featured_image' => 'mobile-first-design.jpg',
                'meta_title' => 'Mobile-First Website Design Importance | ThiyagiDigital',
                'meta_description' => 'Learn why mobile-first website design is crucial for business success, user experience, and search engine rankings.',
                'meta_keywords' => 'mobile-first design, responsive design, web development, mobile optimization'
            ]
        ];
        
        foreach ($posts as $post) {
            $sql = "INSERT IGNORE INTO blog_posts (title, slug, excerpt, content, featured_image, meta_title, meta_description, meta_keywords) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)->execute([
                $post['title'], $post['slug'], $post['excerpt'], $post['content'],
                $post['featured_image'], $post['meta_title'], $post['meta_description'], $post['meta_keywords']
            ]);
        }
        
        // Assign categories to posts
        $this->assignCategoriesToPosts();
    }
    
    private function assignCategoriesToPosts() {
        $assignments = [
            ['top-seo-strategies-2025', 'seo-tips'],
            ['social-media-marketing-brand-awareness', 'social-media'],
            ['social-media-marketing-brand-awareness', 'digital-marketing'],
            ['ecommerce-website-development-guide', 'web-development'],
            ['ecommerce-website-development-guide', 'ecommerce'],
            ['content-marketing-small-business', 'content-marketing'],
            ['content-marketing-small-business', 'business-growth'],
            ['mobile-first-website-importance', 'web-development'],
            ['mobile-first-website-importance', 'technology']
        ];
        
        foreach ($assignments as $assignment) {
            $sql = "INSERT IGNORE INTO post_categories (post_id, category_id) 
                    SELECT p.id, c.id FROM blog_posts p, blog_categories c 
                    WHERE p.slug = ? AND c.slug = ?";
            $this->pdo->prepare($sql)->execute($assignment);
        }
    }
    
    private function getSampleContent($type) {
        $contents = [
            'seo' => '<h2>Introduction to SEO in 2025</h2><p>Search Engine Optimization continues to evolve rapidly, and staying ahead of the curve is crucial for business success. In this comprehensive guide, we\'ll explore the top 10 SEO strategies that are delivering exceptional results in 2025.</p><h3>1. AI-Powered Content Optimization</h3><p>With the rise of AI tools like ChatGPT and Google\'s advanced algorithms, creating AI-optimized content has become essential. Focus on:</p><ul><li>Natural language processing optimization</li><li>Semantic search optimization</li><li>User intent matching</li><li>Content depth and expertise</li></ul><h3>2. Core Web Vitals and Page Experience</h3><p>Google\'s Core Web Vitals remain a critical ranking factor. Ensure your website excels in:</p><ul><li>Largest Contentful Paint (LCP)</li><li>First Input Delay (FID)</li><li>Cumulative Layout Shift (CLS)</li></ul><h3>3. E-A-T (Expertise, Authoritativeness, Trustworthiness)</h3><p>Building authority in your industry is more important than ever. Demonstrate expertise through:</p><ul><li>Author bio optimization</li><li>Industry certifications</li><li>Client testimonials and case studies</li><li>Regular content updates</li></ul><p>At ThiyagiDigital, we specialize in implementing these cutting-edge SEO strategies to help businesses achieve sustainable growth in search rankings.</p>',
            
            'social' => '<h2>The Power of Social Media in Brand Building</h2><p>Social media marketing has transformed from a nice-to-have to an absolutely essential component of any successful marketing strategy. Let\'s explore how strategic social media marketing can exponentially boost your brand awareness.</p><h3>Platform-Specific Strategies</h3><h4>Facebook Marketing</h4><ul><li>Create engaging video content</li><li>Utilize Facebook Groups for community building</li><li>Implement Facebook Ads with precise targeting</li><li>Share behind-the-scenes content</li></ul><h4>Instagram Growth</h4><ul><li>Consistent visual branding</li><li>Strategic use of hashtags</li><li>Instagram Stories and Reels</li><li>Influencer collaborations</li></ul><h4>LinkedIn for B2B</h4><ul><li>Thought leadership content</li><li>Industry insights and trends</li><li>Professional networking</li><li>Company showcase pages</li></ul><h3>Measuring Social Media ROI</h3><p>Track key metrics including:</p><ul><li>Engagement rate</li><li>Reach and impressions</li><li>Website traffic from social</li><li>Lead generation</li><li>Brand mention sentiment</li></ul><p>ThiyagiDigital\'s social media marketing services help businesses build strong online communities and drive meaningful engagement across all major platforms.</p>',
            
            'ecommerce' => '<h2>Building a Successful E-commerce Website</h2><p>Creating an e-commerce website that converts visitors into customers requires careful planning, strategic design, and robust functionality. This comprehensive guide covers everything you need to know.</p><h3>Choosing the Right E-commerce Platform</h3><h4>Popular Platforms Comparison:</h4><ul><li><strong>WooCommerce:</strong> Perfect for WordPress users, highly customizable</li><li><strong>Shopify:</strong> User-friendly with excellent app ecosystem</li><li><strong>Magento:</strong> Enterprise-level features for large businesses</li><li><strong>BigCommerce:</strong> Built-in features with no transaction fees</li></ul><h3>Essential E-commerce Features</h3><ul><li>Product catalog with high-quality images</li><li>Secure payment gateway integration</li><li>Shopping cart and checkout optimization</li><li>Inventory management system</li><li>Customer account functionality</li><li>Order tracking and management</li><li>Mobile-responsive design</li></ul><h3>Conversion Optimization Tips</h3><ul><li>Simplify the checkout process</li><li>Display customer reviews and ratings</li><li>Implement abandoned cart recovery</li><li>Offer multiple payment options</li><li>Create urgency with limited-time offers</li><li>Optimize product pages for SEO</li></ul><h3>Security Considerations</h3><ul><li>SSL certificate implementation</li><li>PCI DSS compliance</li><li>Regular security updates</li><li>Data backup strategies</li></ul><p>At ThiyagiDigital, we specialize in creating high-converting e-commerce websites that drive sales and provide excellent user experiences.</p>',
            
            'content' => '<h2>Content Marketing for Small Business Success</h2><p>Small businesses often struggle to compete with larger companies\' marketing budgets. However, strategic content marketing can level the playing field by building trust, authority, and customer relationships.</p><h3>Content Strategy Fundamentals</h3><h4>Know Your Audience</h4><ul><li>Create detailed buyer personas</li><li>Understand pain points and challenges</li><li>Identify preferred content formats</li><li>Analyze competitor content strategies</li></ul><h3>Content Types That Work</h3><h4>Blog Posts</h4><ul><li>How-to guides and tutorials</li><li>Industry insights and trends</li><li>Case studies and success stories</li><li>Behind-the-scenes content</li></ul><h4>Visual Content</h4><ul><li>Infographics</li><li>Video tutorials</li><li>Social media graphics</li><li>Interactive content</li></ul><h3>Content Distribution Strategies</h3><ul><li>Social media platforms</li><li>Email marketing campaigns</li><li>Guest posting opportunities</li><li>Community forums and groups</li><li>Local networking events</li></ul><h3>Measuring Content Marketing Success</h3><ul><li>Website traffic growth</li><li>Lead generation metrics</li><li>Social media engagement</li><li>Email subscription rates</li><li>Customer acquisition cost</li></ul><p>ThiyagiDigital helps small businesses create compelling content marketing strategies that drive real business results within budget constraints.</p>',
            
            'mobile' => '<h2>Mobile-First Design: A Business Necessity</h2><p>With over 60% of web traffic coming from mobile devices, having a mobile-first website isn\'t just recommended—it\'s essential for business survival in today\'s digital landscape.</p><h3>Why Mobile-First Matters</h3><h4>User Behavior Changes</h4><ul><li>Consumers expect instant loading on mobile</li><li>Touch navigation requires different design approaches</li><li>Screen real estate is limited and precious</li><li>Mobile users have different intent and behavior patterns</li></ul><h4>SEO Benefits</h4><ul><li>Google uses mobile-first indexing</li><li>Mobile page speed affects rankings</li><li>Mobile usability is a ranking factor</li><li>Local search favors mobile-optimized sites</li></ul><h3>Mobile-First Design Principles</h3><ul><li><strong>Progressive Enhancement:</strong> Start with mobile and enhance for desktop</li><li><strong>Touch-Friendly Interface:</strong> Buttons and links sized for fingers</li><li><strong>Simplified Navigation:</strong> Hamburger menus and streamlined options</li><li><strong>Optimized Images:</strong> Fast-loading, responsive images</li><li><strong>Readable Typography:</strong> Fonts that work on small screens</li></ul><h3>Technical Implementation</h3><h4>Responsive Design Techniques</h4><ul><li>Flexible grid systems</li><li>Media queries for different screen sizes</li><li>Flexible images and media</li><li>Viewport meta tag optimization</li></ul><h4>Performance Optimization</h4><ul><li>Minimize HTTP requests</li><li>Optimize images and assets</li><li>Enable compression</li><li>Leverage browser caching</li><li>Use Content Delivery Networks (CDN)</li></ul><h3>Testing Your Mobile Experience</h3><ul><li>Google Mobile-Friendly Test</li><li>PageSpeed Insights mobile scores</li><li>Real device testing</li><li>User experience testing</li></ul><p>ThiyagiDigital specializes in creating mobile-first websites that provide exceptional user experiences across all devices and drive business growth.</p>'
        ];
        
        return $contents[$type] ?? '<p>Sample blog content coming soon...</p>';
    }
    
    // Public methods for blog functionality
    public function getAllPosts($limit = 10, $offset = 0) {
        $sql = "SELECT p.*, GROUP_CONCAT(c.name) as categories, GROUP_CONCAT(c.slug) as category_slugs 
                FROM blog_posts p 
                LEFT JOIN post_categories pc ON p.id = pc.post_id 
                LEFT JOIN blog_categories c ON pc.category_id = c.id 
                WHERE p.status = 'published' 
                GROUP BY p.id 
                ORDER BY p.created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPostBySlug($slug) {
        $sql = "SELECT p.*, GROUP_CONCAT(c.name) as categories, GROUP_CONCAT(c.slug) as category_slugs 
                FROM blog_posts p 
                LEFT JOIN post_categories pc ON p.id = pc.post_id 
                LEFT JOIN blog_categories c ON pc.category_id = c.id 
                WHERE p.slug = :slug AND p.status = 'published' 
                GROUP BY p.id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($post) {
            // Update view count
            $this->updateViews($post['id']);
        }
        
        return $post;
    }
    
    public function getPopularPosts($limit = 5) {
        $sql = "SELECT * FROM blog_posts WHERE status = 'published' ORDER BY views DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getRecentPosts($limit = 5) {
        $sql = "SELECT * FROM blog_posts WHERE status = 'published' ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllCategories() {
        $sql = "SELECT c.*, COUNT(pc.post_id) as post_count 
                FROM blog_categories c 
                LEFT JOIN post_categories pc ON c.id = pc.category_id 
                GROUP BY c.id 
                ORDER BY c.name";
        
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPostsByCategory($categorySlug, $limit = 10, $offset = 0) {
        $sql = "SELECT p.* FROM blog_posts p 
                JOIN post_categories pc ON p.id = pc.post_id 
                JOIN blog_categories c ON pc.category_id = c.id 
                WHERE c.slug = :category_slug AND p.status = 'published' 
                ORDER BY p.created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':category_slug', $categorySlug);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function searchPosts($query, $limit = 10) {
        $sql = "SELECT * FROM blog_posts 
                WHERE (title LIKE :query OR content LIKE :query OR excerpt LIKE :query) 
                AND status = 'published' 
                ORDER BY created_at DESC 
                LIMIT :limit";
        
        $stmt = $this->pdo->prepare($sql);
        $searchTerm = '%' . $query . '%';
        $stmt->bindParam(':query', $searchTerm);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    private function updateViews($postId) {
        $sql = "UPDATE blog_posts SET views = views + 1 WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $postId);
        $stmt->execute();
    }
    
    public function getTotalPosts() {
        $sql = "SELECT COUNT(*) FROM blog_posts WHERE status = 'published'";
        return $this->pdo->query($sql)->fetchColumn();
    }
    
    public function getCategoryBySlug($slug) {
        $stmt = $this->pdo->prepare("SELECT * FROM blog_categories WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }
    
    public function getTotalPostsByCategory($categorySlug) {
        $sql = "
            SELECT COUNT(*) 
            FROM blog_posts p 
            LEFT JOIN blog_categories c ON p.category_id = c.id 
            WHERE p.status = 'published' AND c.slug = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$categorySlug]);
        return $stmt->fetchColumn();
    }
}
?>