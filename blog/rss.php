<?php
require_once 'blog-db.php';

// Set content type for RSS
header('Content-Type: application/rss+xml; charset=UTF-8');

// Initialize blog database
$blogDB = new BlogDB();

// Get recent posts for RSS feed
$posts = $blogDB->getRecentPosts(20);

// RSS feed settings
$siteUrl = 'https://thiyagidigital.com';
$feedTitle = 'ThiyagiDigital Blog - Digital Marketing Insights';
$feedDescription = 'Stay updated with the latest digital marketing trends, SEO strategies, web development tips, and business growth insights from ThiyagiDigital experts.';
$feedLanguage = 'en-us';
$feedCopyright = 'Copyright ' . date('Y') . ' ThiyagiDigital. All rights reserved.';
$managingEditor = 'info@thiyagidigital.com (ThiyagiDigital Team)';
$webMaster = 'admin@thiyagidigital.com (ThiyagiDigital Admin)';

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title><![CDATA[<?php echo $feedTitle; ?>]]></title>
        <link><?php echo $siteUrl; ?>/blog/</link>
        <description><![CDATA[<?php echo $feedDescription; ?>]]></description>
        <language><?php echo $feedLanguage; ?></language>
        <copyright><![CDATA[<?php echo $feedCopyright; ?>]]></copyright>
        <managingEditor><![CDATA[<?php echo $managingEditor; ?>]]></managingEditor>
        <webMaster><![CDATA[<?php echo $webMaster; ?>]]></webMaster>
        <pubDate><?php echo date('r'); ?></pubDate>
        <lastBuildDate><?php echo date('r'); ?></lastBuildDate>
        <generator>ThiyagiDigital Custom Blog System</generator>
        <docs>https://www.rssboard.org/rss-specification</docs>
        <ttl>60</ttl>
        <atom:link href="<?php echo $siteUrl; ?>/blog/rss.php" rel="self" type="application/rss+xml" />
        
        <image>
            <url><?php echo $siteUrl; ?>/assets/img/logo/logo.png</url>
            <title><![CDATA[<?php echo $feedTitle; ?>]]></title>
            <link><?php echo $siteUrl; ?>/blog/</link>
            <width>144</width>
            <height>144</height>
            <description><![CDATA[ThiyagiDigital Logo]]></description>
        </image>
        
        <?php foreach ($posts as $post): ?>
            <item>
                <title><![CDATA[<?php echo $post['title']; ?>]]></title>
                <link><?php echo $siteUrl; ?>/blog/<?php echo $post['slug']; ?></link>
                <guid isPermaLink="true"><?php echo $siteUrl; ?>/blog/<?php echo $post['slug']; ?></guid>
                <description><![CDATA[<?php echo $post['excerpt']; ?>]]></description>
                <content:encoded><![CDATA[<?php echo $post['content']; ?>]]></content:encoded>
                <author><![CDATA[info@thiyagidigital.com (<?php echo $post['author']; ?>)]]></author>
                <pubDate><?php echo date('r', strtotime($post['created_at'])); ?></pubDate>
                
                <?php if (!empty($post['meta_keywords'])): ?>
                    <category><![CDATA[<?php echo $post['meta_keywords']; ?>]]></category>
                <?php endif; ?>
                
                <?php if (!empty($post['featured_image'])): ?>
                    <enclosure url="<?php echo $siteUrl; ?>/blog/images/<?php echo $post['featured_image']; ?>" type="image/jpeg" length="0" />
                <?php endif; ?>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>