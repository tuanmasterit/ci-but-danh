-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2012 at 01:50 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_butdanh`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_commentmeta`
--

DROP TABLE IF EXISTS `ci_commentmeta`;
CREATE TABLE IF NOT EXISTS `ci_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ci_commentmeta`
--


-- --------------------------------------------------------

--
-- Table structure for table `ci_comments`
--

DROP TABLE IF EXISTS `ci_comments`;
CREATE TABLE IF NOT EXISTS `ci_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_comments`
--

INSERT INTO `ci_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_links`
--

DROP TABLE IF EXISTS `ci_links`;
CREATE TABLE IF NOT EXISTS `ci_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ci_links`
--

INSERT INTO `ci_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/'),
(3, 'http://wordpress.org/extend/ideas/', 'Suggest Ideas', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/support/', 'Support Forum', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_options`
--

DROP TABLE IF EXISTS `ci_options`;
CREATE TABLE IF NOT EXISTS `ci_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `ci_options`
--

INSERT INTO `ci_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 0, '_site_transient_timeout_theme_roots', '1339521994', 'yes'),
(2, 0, '_site_transient_theme_roots', 'a:2:{s:12:"twentyeleven";s:7:"/themes";s:9:"twentyten";s:7:"/themes";}', 'yes'),
(3, 0, 'siteurl', 'http://localhost/wordpress', 'yes'),
(4, 0, 'blogname', 'Bút Danh', 'yes'),
(5, 0, 'blogdescription', 'Just another WordPress site', 'yes'),
(6, 0, 'users_can_register', '0', 'yes'),
(7, 0, 'admin_email', 'vinhnt@tasvis.com.vn', 'yes'),
(8, 0, 'start_of_week', '1', 'yes'),
(9, 0, 'use_balanceTags', '0', 'yes'),
(10, 0, 'use_smilies', '1', 'yes'),
(11, 0, 'require_name_email', '1', 'yes'),
(12, 0, 'comments_notify', '1', 'yes'),
(13, 0, 'posts_per_rss', '10', 'yes'),
(14, 0, 'rss_use_excerpt', '0', 'yes'),
(15, 0, 'mailserver_url', 'mail.example.com', 'yes'),
(16, 0, 'mailserver_login', 'login@example.com', 'yes'),
(17, 0, 'mailserver_pass', 'password', 'yes'),
(18, 0, 'mailserver_port', '110', 'yes'),
(19, 0, 'default_category', '1', 'yes'),
(20, 0, 'default_comment_status', 'open', 'yes'),
(21, 0, 'default_ping_status', 'open', 'yes'),
(22, 0, 'default_pingback_flag', '1', 'yes'),
(23, 0, 'default_post_edit_rows', '20', 'yes'),
(24, 0, 'posts_per_page', '10', 'yes'),
(25, 0, 'date_format', 'F j, Y', 'yes'),
(26, 0, 'time_format', 'g:i a', 'yes'),
(27, 0, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(28, 0, 'links_recently_updated_prepend', '<em>', 'yes'),
(29, 0, 'links_recently_updated_append', '</em>', 'yes'),
(30, 0, 'links_recently_updated_time', '120', 'yes'),
(31, 0, 'comment_moderation', '0', 'yes'),
(32, 0, 'moderation_notify', '1', 'yes'),
(33, 0, 'permalink_structure', '', 'yes'),
(34, 0, 'gzipcompression', '0', 'yes'),
(35, 0, 'hack_file', '0', 'yes'),
(36, 0, 'blog_charset', 'UTF-8', 'yes'),
(37, 0, 'moderation_keys', '', 'no'),
(38, 0, 'active_plugins', 'a:0:{}', 'yes'),
(39, 0, 'home', 'http://localhost/wordpress', 'yes'),
(40, 0, 'category_base', '', 'yes'),
(41, 0, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(42, 0, 'advanced_edit', '0', 'yes'),
(43, 0, 'comment_max_links', '2', 'yes'),
(44, 0, 'gmt_offset', '0', 'yes'),
(45, 0, 'default_email_category', '1', 'yes'),
(46, 0, 'recently_edited', '', 'no'),
(47, 0, 'template', 'twentyeleven', 'yes'),
(48, 0, 'stylesheet', 'twentyeleven', 'yes'),
(49, 0, 'comment_whitelist', '1', 'yes'),
(50, 0, 'blacklist_keys', '', 'no'),
(51, 0, 'comment_registration', '0', 'yes'),
(52, 0, 'rss_language', 'en', 'yes'),
(53, 0, 'html_type', 'text/html', 'yes'),
(54, 0, 'use_trackback', '0', 'yes'),
(55, 0, 'default_role', 'subscriber', 'yes'),
(56, 0, 'db_version', '19470', 'yes'),
(57, 0, 'uploads_use_yearmonth_folders', '1', 'yes'),
(58, 0, 'upload_path', '', 'yes'),
(59, 0, 'blog_public', '1', 'yes'),
(60, 0, 'default_link_category', '2', 'yes'),
(61, 0, 'show_on_front', 'posts', 'yes'),
(62, 0, 'tag_base', '', 'yes'),
(63, 0, 'show_avatars', '1', 'yes'),
(64, 0, 'avatar_rating', 'G', 'yes'),
(65, 0, 'upload_url_path', '', 'yes'),
(66, 0, 'thumbnail_size_w', '150', 'yes'),
(67, 0, 'thumbnail_size_h', '150', 'yes'),
(68, 0, 'thumbnail_crop', '1', 'yes'),
(69, 0, 'medium_size_w', '300', 'yes'),
(70, 0, 'medium_size_h', '300', 'yes'),
(71, 0, 'avatar_default', 'mystery', 'yes'),
(72, 0, 'enable_app', '0', 'yes'),
(73, 0, 'enable_xmlrpc', '0', 'yes'),
(74, 0, 'large_size_w', '1024', 'yes'),
(75, 0, 'large_size_h', '1024', 'yes'),
(76, 0, 'image_default_link_type', 'file', 'yes'),
(77, 0, 'image_default_size', '', 'yes'),
(78, 0, 'image_default_align', '', 'yes'),
(79, 0, 'close_comments_for_old_posts', '0', 'yes'),
(80, 0, 'close_comments_days_old', '14', 'yes'),
(81, 0, 'thread_comments', '1', 'yes'),
(82, 0, 'thread_comments_depth', '5', 'yes'),
(83, 0, 'page_comments', '0', 'yes'),
(84, 0, 'comments_per_page', '50', 'yes'),
(85, 0, 'default_comments_page', 'newest', 'yes'),
(86, 0, 'comment_order', 'asc', 'yes'),
(87, 0, 'sticky_posts', 'a:0:{}', 'yes'),
(88, 0, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(89, 0, 'widget_text', 'a:0:{}', 'yes'),
(90, 0, 'widget_rss', 'a:0:{}', 'yes'),
(91, 0, 'timezone_string', '', 'yes'),
(92, 0, 'embed_autourls', '1', 'yes'),
(93, 0, 'embed_size_w', '', 'yes'),
(94, 0, 'embed_size_h', '600', 'yes'),
(95, 0, 'page_for_posts', '0', 'yes'),
(96, 0, 'page_on_front', '0', 'yes'),
(97, 0, 'default_post_format', '0', 'yes'),
(98, 0, 'initial_db_version', '19470', 'yes'),
(99, 0, 'ci_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(100, 0, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 0, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(102, 0, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(103, 0, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(104, 0, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(105, 0, 'sidebars_widgets', 'a:7:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:9:"sidebar-4";a:0:{}s:9:"sidebar-5";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(106, 0, 'cron', 'a:2:{i:1339514800;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}s:7:"version";i:2;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ci_postmeta`
--

DROP TABLE IF EXISTS `ci_postmeta`;
CREATE TABLE IF NOT EXISTS `ci_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_postmeta`
--

INSERT INTO `ci_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `ci_posts`
--

DROP TABLE IF EXISTS `ci_posts`;
CREATE TABLE IF NOT EXISTS `ci_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ci_posts`
--

INSERT INTO `ci_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?p=1', 0, 'post', '', 1),
(2, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/wordpress/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?page_id=2', 0, 'page', '', 0),
(3, 0, '2012-06-12 15:26:35', '0000-00-00 00:00:00', 'content', 'title', 'excerpt', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'guid', 0, 'post', '', 0),
(7, 2, '2012-06-17 06:58:54', '0000-00-00 00:00:00', '<table align=\\"left\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"0\\" width=\\"1\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt=\\"Ông Lê Hồng Sơn\\" height=\\"195\\" src=\\"http://vnexpress.net/Files/Subject/3b/bd/84/98/son.jpg\\" width=\\"250\\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class=\\"Image\\">\r\n				&Ocirc;ng L&ecirc; Hồng Sơn, Cục trưởng Cục kiểm tra văn bản quy phạm ph&aacute;p luật. Ảnh: <em>H&agrave; Anh</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class=\\"Normal\\">\r\n	Trao đổi với <em>VnExpress.net</em>, &ocirc;ng Sơn cho rằng gần đ&acirc;y c&oacute; nhiều ti&ecirc;u cực, vi phạm ph&aacute;p luật buộc x&atilde; hội, người d&acirc;n l&ecirc;n tiếng, thậm ch&iacute; c&oacute; người d&acirc;n phải lựa chọn biện ph&aacute;p cực đoan. Sự kiện ti&ecirc;u cực ở trường THPT Đồi Ng&ocirc; (Bắc Giang) l&agrave; một vấn đề x&atilde; hội, một hiện tượng rất đ&aacute;ng quan t&acirc;m.</p>\r\n<p class=\\"Normal\\">\r\n	&Ocirc;ng Sơn cho rằng, ở mức độ n&agrave;o đ&oacute;, Nh&agrave; nước v&agrave; x&atilde; hội chưa c&oacute; những biện ph&aacute;p thiết thực, quyết liệt để bảo vệ những người c&oacute; c&ocirc;ng ph&aacute;t hiện v&agrave; phản &aacute;nh ti&ecirc;u cực. Đ&aacute;ng tiếc, nhiều trường hợp người phản &aacute;nh ti&ecirc;u cực c&oacute; khi rơi v&agrave;o t&igrave;nh trạng lận đận v&agrave; phải hứng chịu những t&aacute;c động ngược.</p>\r\n<p class=\\"Normal\\">\r\n	Theo &ocirc;ng, trường hợp học sinh quay clip phản &aacute;nh ti&ecirc;u cực ở Bắc Giang phải đ&aacute;ng được t&ocirc;n vinh, ghi nhận bởi cần phải x&aacute;c định ở hội đồng thi đ&oacute; đ&atilde; c&oacute; một số người c&oacute; tr&aacute;ch nhiệm, gi&aacute;m thị v&agrave; một số học sinh đ&atilde; tham gia v&agrave;o những ti&ecirc;u cực, tr&aacute;i ph&aacute;p luật. Thậm ch&iacute;, c&oacute; căn cứ cho rằng những người đứng đầu hội đồng thi đ&atilde; l&agrave;m ngơ, dung t&uacute;ng cho những sai phạm nghi&ecirc;m trọng.</p>\r\n<p class=\\"Normal\\">\r\n	Cũng theo người đứng đầu Cục Kiểm tra văn bản quy phạm ph&aacute;p luật, trong Quy chế thi tốt nghiệp THPT của Bộ GD&amp;ĐT c&oacute; quy định nghi&ecirc;m cấm học sinh đưa những thiết bị, m&aacute;y m&oacute;c v&agrave;o ph&ograve;ng thi, đặc biệt l&agrave; những thiết bị c&oacute; gắn điện v&agrave; điện tử. Tuy nhi&ecirc;n, cần ph&acirc;n biệt, nếu đưa c&aacute;c thiết bị điện tử kia v&agrave;o phục vụ cho việc quay c&oacute;p, l&agrave;m b&agrave;i ti&ecirc;u cực th&igrave; cấm l&agrave; đ&uacute;ng.</p>\r\n<p class=\\"Normal\\">\r\n	Ở trường hợp trường THPT D&acirc;n lập Đồi Ng&ocirc;, học sinh mang m&aacute;y m&oacute;c v&agrave;o kh&ocirc;ng c&oacute; mục đ&iacute;ch quay c&oacute;p m&agrave; l&agrave; chống ti&ecirc;u cực th&igrave; phải xem x&eacute;t lại. Qua đ&oacute;, c&oacute; thể thấy quy chế của Bộ chưa chặt chẽ, c&ograve;n chung chung v&agrave; kh&ocirc;ng thể n&oacute;i học sinh quay clip l&agrave; sai.</p>\r\n', '\\''Học sinh quay clip ném phao đáng được tôn vinh\\'' ', 'Ông Lê Hồng Sơn, Cục trưởng Cục Kiểm tra văn bản quy phạm pháp luật, Bộ Tư pháp cho rằng, học sinh quay clip phản ánh tiêu cực ở trường THPT Đồi Ngô phải phải tôn vinh và việc mang thiết bị không nhằm quay cóp.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_terms`
--

DROP TABLE IF EXISTS `ci_terms`;
CREATE TABLE IF NOT EXISTS `ci_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ci_terms`
--

INSERT INTO `ci_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Chính trị', 'chính_trị', 0),
(2, 'Blogroll', 'blogroll', 0),
(3, 'Xã hội', 'xã_hội', 0),
(4, 'Kinh tế', 'kinh_tế', 0),
(5, 'Văn hóa', 'văn_hóa', 0),
(6, 'Thể thao', 'thể_thao', 0),
(7, 'Pháp luật', 'pháp_luật', 0),
(8, 'Phóng Sự', 'phóng_sự', 0),
(9, 'Y tế', 'y_tế', 0),
(10, 'Khoa học', 'khoa_học', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_term_relationships`
--

DROP TABLE IF EXISTS `ci_term_relationships`;
CREATE TABLE IF NOT EXISTS `ci_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_term_relationships`
--

INSERT INTO `ci_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 0),
(7, 2, 0),
(1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_term_taxonomy`
--

DROP TABLE IF EXISTS `ci_term_taxonomy`;
CREATE TABLE IF NOT EXISTS `ci_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ci_term_taxonomy`
--

INSERT INTO `ci_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'link_category', '', 0, 7),
(3, 3, 'category', '', 0, 0),
(4, 4, 'category', '', 0, 0),
(5, 5, 'category', '', 0, 0),
(6, 6, 'category', '', 0, 0),
(7, 7, 'category', '', 0, 0),
(8, 8, 'category', '', 0, 0),
(9, 9, 'category', '', 0, 0),
(10, 10, 'category', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_usermeta`
--

DROP TABLE IF EXISTS `ci_usermeta`;
CREATE TABLE IF NOT EXISTS `ci_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ci_usermeta`
--

INSERT INTO `ci_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'admin'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'ci_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}'),
(11, 1, 'ci_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp330_toolbar,wp330_media_uploader,wp330_saving_widgets'),
(13, 1, 'show_welcome_panel', '1'),
(14, 2, 'group', 'butdanh'),
(15, 3, 'group', 'butdanh'),
(16, 4, 'group', 'butdanh'),
(17, 5, 'group', 'butdanh'),
(18, 6, 'group', 'butdanh');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

DROP TABLE IF EXISTS `ci_users`;
CREATE TABLE IF NOT EXISTS `ci_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', 'admin@123', 'admin', 'vinhnt@tasvis.com.vn', '', '2012-06-12 15:26:34', '', 0, 'admin'),
(2, '', '', 'Viết Thịnh', '', '', '0000-00-00 00:00:00', '', 0, 'Viết Thịnh'),
(3, '', '', 'Anh Thư', '', '', '0000-00-00 00:00:00', '', 0, 'Anh Thư'),
(4, '', '', 'Lê Phi', '', '', '0000-00-00 00:00:00', '', 0, 'Lê Phi'),
(5, '', '', 'Vạn Bảo', '', '', '0000-00-00 00:00:00', '', 0, 'Vạn Bảo'),
(6, '', '', 'Hoàng Giang', '', '', '0000-00-00 00:00:00', '', 0, 'Hoàng Giang');
