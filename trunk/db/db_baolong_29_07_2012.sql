-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2012 at 02:40 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_baolong`
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
-- Table structure for table `ci_logs`
--

DROP TABLE IF EXISTS `ci_logs`;
CREATE TABLE IF NOT EXISTS `ci_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `log_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `amount` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ci_logs`
--

INSERT INTO `ci_logs` (`id`, `user_id`, `log_type`, `log_content`, `created_date`, `amount`, `status`) VALUES
(1, 26, '1', 'Cập nhật điểm khi thêm mới hội viên', '2012-07-21 03:20:53', NULL, NULL),
(2, 27, '1', 'Cập nhật điểm khi thêm mới hội viên', '2012-07-21 03:21:59', NULL, NULL),
(3, 26, '1', 'Cập nhật điểm quy đổi: 15V', '2012-07-21 03:31:41', NULL, NULL),
(4, 28, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:24:15', NULL, NULL),
(5, 29, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:26:22', NULL, NULL),
(6, 30, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:27:57', NULL, NULL),
(7, 31, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:35:13', NULL, NULL),
(8, 32, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:39:51', NULL, NULL),
(9, 33, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:46:00', NULL, NULL),
(10, 34, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 02:47:27', NULL, NULL),
(11, 35, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:37:07', NULL, NULL),
(12, 36, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:38:19', NULL, NULL),
(13, 37, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:40:43', NULL, NULL),
(14, 38, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:41:26', NULL, NULL),
(15, 39, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:42:36', NULL, NULL),
(16, 40, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:51:13', NULL, NULL),
(17, 41, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 07:57:23', NULL, NULL),
(18, 42, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 08:01:19', NULL, NULL),
(19, 43, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 08:02:46', NULL, NULL),
(20, 44, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 08:03:54', NULL, NULL),
(21, 45, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 08:07:08', NULL, NULL),
(22, 46, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-25 08:07:25', NULL, NULL),
(23, 47, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-28 02:18:44', '1', NULL),
(24, 48, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-28 06:41:10', '1', NULL),
(25, 49, '1', 'Cập nhật điểm khi thêm mới hội viên: 18V', '2012-07-28 06:41:35', '1', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

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
(7, 0, 'admin_email', 'phamvanhung0818@gmail.com', 'yes'),
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
(106, 0, 'cron', 'a:2:{i:1339514800;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}s:7:"version";i:2;}', 'yes'),
(107, 0, 'count_visit', '58', 'yes');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `ci_postmeta`
--

INSERT INTO `ci_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 19, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(2, 19, 'giathitruong', '35000'),
(3, 20, 'featured_image', '/baolong/application/elfinder/php/../files/con%20xoa%20bop.gif'),
(4, 20, 'giathitruong', '20000'),
(5, 21, 'featured_image', '/baolong/application/elfinder/php/../files/nuoc%20suc%20mieng%20da%20hoa%20tieu.gif'),
(6, 21, 'giathitruong', '35000'),
(7, 22, 'featured_image', '/baolong/application/elfinder/php/../files/tiem%20long.gif'),
(8, 22, 'giathitruong', '35000'),
(9, 13, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(10, 13, 'giathitruong', '35000'),
(11, 14, 'featured_image', '/baolong/application/elfinder/php/../files/sieu%20nhan%20tieu%20bao.gif'),
(12, 14, 'giathitruong', '48000'),
(13, 15, 'featured_image', '/baolong/application/elfinder/php/../files/Tra-thanh-long-3d.png'),
(14, 15, 'giathitruong', '30000'),
(15, 16, 'featured_image', '/baolong/application/elfinder/php/../files/bach-long-thuy.png'),
(16, 16, 'giathitruong', '25000'),
(17, 17, 'featured_image', '/baolong/application/elfinder/php/../files/ngoc-duong-sam.png'),
(18, 17, 'giathitruong', '300000'),
(19, 18, 'featured_image', ''),
(20, 18, 'giathitruong', '250000'),
(21, 9, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(23, 11, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(24, 8, 'featured_image', '/baolong/application/elfinder/php/../files/voykisu.jpg'),
(25, 12, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(26, 23, 'featured_image', '/baolong/application/elfinder/php/../files/lon-sam-quy.png'),
(27, 23, 'giathitruong', '10000'),
(28, 24, 'featured_image', '/baolong/application/elfinder/php/../files/bo%20than%20hoan%20mem.gif'),
(29, 24, 'giathitruong', '100000'),
(34, 27, 'featured_image', '/baolong/application/elfinder/php/../files/sam-ngoc-duong.gif'),
(32, 26, 'featured_image', '/baolong/application/elfinder/php/../files/ruou-vang-dau.gif'),
(33, 26, 'giathitruong', '200000'),
(35, 27, 'giathitruong', '300000'),
(36, 28, 'featured_image', '/baolong/application/elfinder/php/../files/linh-chi-luc-vi.gif'),
(37, 28, 'giathitruong', '35000'),
(38, 29, 'featured_image', ''),
(40, 30, 'featured_image', '/baolong/application/elfinder/php/../files/khong-du-protein.jpg'),
(43, 34, 'featured_image', ''),
(39, 28, 'giahoivien', '33000'),
(41, 31, 'featured_image', ''),
(42, 32, 'featured_image', '/baolong/application/elfinder/php/../files/2011_79_16_puthong%20trong%20cay.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ci_posts`
--

INSERT INTO `ci_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?p=1', 0, 'post', '', 1),
(2, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/wordpress/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?page_id=2', 0, 'page', '', 0),
(3, 0, '2012-06-12 15:26:35', '0000-00-00 00:00:00', 'content', 'title', 'excerpt', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'guid', 0, 'post', '', 0),
(24, 1, '2012-06-30 06:48:08', '0000-00-00 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Bổ thận tr&aacute;ng dương, sinh tinh, tăng lực, chữa chứng đau lưng, mệt mỏi, di mộng tinh, liệt dương.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span><span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n', 'Bổ thận hoàn', 'Bổ thận tráng dương, sinh tinh, tăng lực, chữa chứng đau lưng, mệt mỏi, di mộng tinh, liệt dương.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(27, 1, '2012-07-01 05:53:52', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ thận, tăng lực, tăng &quot;sức bền&quot; trị chứng &quot;bất lực&quot;</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Sâm Ngọc Dương', 'Bổ thận, tăng lực, tăng "sức bền" trị chứng "bất lực"', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(26, 1, '2012-07-01 03:32:31', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ gan, thận, nu&ocirc;i m&aacute;u. Chữa chứng suy nhược, t&oacute;c bạc sớm, t&oacute;c rụng, &ugrave; tai.</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Rượu vang dâu', 'Bổ gan, thận, nuôi máu. Chữa chứng suy nhược, tóc bạc sớm, tóc rụng, ù tai.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(8, 2, '2012-06-24 00:00:00', '2012-06-24 02:00:00', '<h2 class="Lead">\r\n	Một số cơ quan b&aacute;o ch&iacute; v&agrave; c&aacute;c trang mạng của Trung Quốc đăng &yacute; kiến ph&aacute;t biểu của một v&agrave;i tướng lĩnh Trung Quốc k&ecirc;u gọi qu&acirc;n sự h&oacute;a &quot;Tam Sa&quot;, &quot;tr&ecirc;n c&aacute;c đảo của Tam Sa chỗ n&agrave;o đ&oacute;ng qu&acirc;n được th&igrave; đ&oacute;ng qu&acirc;n&quot;.<br />\r\n	&gt; <a class="Lead" href="http://vnexpress.net/gl/the-gioi/tu-lieu/2012/06/trung-quoc-cong-khai-y-do-doc-chiem-bien-dong/">Trung Quốc c&ocirc;ng khai &yacute; đồ độc chiếm biển Đ&ocirc;ng</a></h2>\r\n<p class="Normal">\r\n	Ng&agrave;y 21/6, trang mạng của Bộ D&acirc;n ch&iacute;nh Trung Quốc th&ocirc;ng b&aacute;o việc Quốc vụ viện nước n&agrave;y ph&ecirc; chuẩn quyết định th&agrave;nh lập c&aacute;i gọi l&agrave; &quot;th&agrave;nh phố Tam Sa&quot; với phạm vi quản l&yacute; bao gồm hai quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa của Việt Nam. Trung Quốc ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; ph&aacute;p l&yacute; để th&agrave;nh lập đơn vị h&agrave;nh ch&iacute;nh tr&ecirc;n l&atilde;nh thổ của một quốc gia c&oacute; chủ quyền như Việt Nam.</p>\r\n<p class="Normal">\r\n	Đ&atilde; từ l&acirc;u, &iacute;t nhất l&agrave; từ thế kỷ 17, c&aacute;c nh&agrave; nước Việt Nam đ&atilde; thực thi chủ quyền, tiến h&agrave;nh quản l&yacute;, khai th&aacute;c h&ograve;a b&igrave;nh li&ecirc;n tục hai quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa khi n&oacute; chưa thuộc về l&atilde;nh thổ của bất kỳ quốc gia n&agrave;o. C&aacute;c chứng cứ ph&aacute;p l&yacute; lịch sử khẳng định chủ quyền của Việt Nam đối với hai quần đảo n&agrave;y đang được lưu giữ kh&ocirc;ng chỉ ở c&aacute;c cơ quan lưu trữ của Việt Nam, m&agrave; c&ograve;n đang được lưu giữ ở trung t&acirc;m lưu trữ của c&aacute;c nước như Ph&aacute;p, Mỹ, Nhật, H&agrave; Lan, Anh...</p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt="Ảnh tư liệu." height="563" src="http://vnexpress.net/Files/Subject/3b/bd/8d/9a/Dai-nam-nhat-thong-toan-do_.jpg" width="400" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				C&aacute;c quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa được thể hiện trong Đại Nam nhất thống to&agrave;n đồ (năm 1834-1840). <em>Ảnh tư liệu.</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Võ y ký sự', 'Võ y ký sự', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:41:19', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(9, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	C&aacute;ch đ&acirc;y chừng 15 năm, &ocirc;ng Dương Qu&aacute;t, khi ấy l&agrave; Chủ nhiệm Ủy ban D&acirc;n số- Kế hoạch h&oacute;a gia đ&igrave;nh tỉnh Quảng Trị khẳng định, Việt Nam c&oacute; thể sản xuất được thuốc tr&aacute;nh thai đơn giản, hiệu quả, &iacute;t tốn k&eacute;m từ l&aacute; c&acirc;y rừng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Chủ đất người Ma Coong, Đinh Xon kể về lá thuốc lạ của dân tộc mình - ảnh GĐ&amp;CS" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/macoong2712_f07f9/chu-dat-nguoi-ma-coong-dinh-xon-ke-ve-la-thuoc-la-cua-dan-toc-minh-anh-gdampcs.jpg" /><br />\r\n	Chủ đất người Ma Coong, Đinh Xon kể về l&aacute; thuốc lạ của d&acirc;n tộc m&igrave;nh - ảnh GĐ&amp;CS</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo &ocirc;ng Qu&aacute;t, đồng b&agrave;o d&acirc;n tộc V&acirc;n Kiều, Pa C&ocirc; ở t&iacute;t s&acirc;u tr&ecirc;n đỉnh Trường Sơn, nếu kh&ocirc;ng muốn c&oacute; con, mỗi khi l&agrave;m chuyện ấy, người d&acirc;n chỉ cần &ldquo;yểm&rdquo; một mẩu l&aacute; c&acirc;y lạ dưới chiếu l&agrave; cứ&hellip; thoải m&aacute;i.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mỗi năm, người Ma Coong đều c&oacute; một đ&ecirc;m d&agrave;nh cho t&igrave;nh y&ecirc;u đ&ocirc;i lứa, ấy l&agrave; v&agrave;o ng&agrave;y 16 th&aacute;ng Gi&ecirc;ng hằng năm. Người Ma Coong gọi đ&ecirc;m t&igrave;nh đ&oacute; l&agrave; đ&ecirc;m đập trống. Đ&ecirc;m ấy, trai g&aacute;i y&ecirc;u nhau, thậm ch&iacute; cả những người đ&atilde; c&oacute; gia đ&igrave;nh đều c&oacute; thể đến với nhau, trao cho nhau tất cả những thứ thuộc về t&igrave;nh y&ecirc;u nam nữ.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau đ&ecirc;m t&igrave;nh ấy, nếu ai&hellip; v&ocirc; &yacute; m&agrave; để bạn t&igrave;nh của m&igrave;nh c&oacute; thai th&igrave; d&ugrave; c&oacute; trăng gi&oacute; qua đường cũng phải cắn răng m&agrave; cưới. Kh&ocirc;ng những thế, kẻ g&acirc;y hậu quả xấu đ&oacute; c&ograve;n phải &ldquo;nộp phạt&rdquo; cho bản nhiều rượu, nhiều thịt th&igrave; mới được bỏ qua.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Ông Quát nghiên cứu loại lá cây này từ hơn 15 năm nay... Ảnh: SGGP" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/latranhthai2712_f1f74/ong-quat-nghien-cuu-loai-la-cay-nay-tu-hon-15-nam-nay-anh-sggp.jpg" /><br />\r\n	&Ocirc;ng Qu&aacute;t nghi&ecirc;n cứu loại l&aacute; c&acirc;y n&agrave;y từ hơn 15 năm nay... Ảnh: SGGP</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Người Ma Coong c&oacute; l&aacute; c&acirc;y rừng kỳ lạ lắm, đ&ecirc;m t&igrave;nh chỉ cần ngắt một l&aacute; ấy mang theo b&ecirc;n m&igrave;nh th&igrave; kh&ocirc;ng lo chuyện đ&oacute; đ&acirc;u!&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Khi đ&atilde; y&ecirc;n t&acirc;m về sự an to&agrave;n của b&agrave;i thuốc, tại huyện Triệu Phong (Quảng Trị), cũng bằng l&aacute; c&acirc;y tr&ecirc;n, &ocirc;ng Qu&aacute;t cũng đ&atilde; &ldquo;thử&rdquo; tr&ecirc;n 19 cặp vợ chồng được lựa chọn ngẫu nhi&ecirc;n. Kết quả 18 cặp trong số đ&oacute; đ&atilde; ngừa thai được đ&uacute;ng theo &yacute; muốn của m&igrave;nh.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau nhiều lần thăm d&ograve;, &ocirc;ng biết, loại l&aacute; diệu kỳ đ&oacute; đồng b&agrave;o gọi l&agrave; l&aacute; a-năng. Thế nhưng, cũng giống như nhiều trường hợp kh&aacute;c, đồng b&agrave;o kh&ocirc;ng cho &ocirc;ng thấy lo&agrave;i l&aacute; thần diệu đ&oacute;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng Qu&aacute;t phải nộp lễ c&uacute;ng Gi&agrave;ng gồm một con lợn 70 kg v&agrave; 100 kg gạo mới đưa được c&acirc;y về. Từ năm 1996, &ocirc;ng bắt đầu tập trung nghi&ecirc;n cứu về n&oacute;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Suốt mấy năm lặn lội ở khắp c&aacute;c bản l&agrave;ng, rồi v&ugrave;i m&igrave;nh ở c&aacute;c trung t&acirc;m nghi&ecirc;n cứu, th&iacute; nghiệm ở cả trung ương lẫn địa phương, &ocirc;ng Qu&aacute;t v&agrave; c&aacute;c cộng sự nhiệt th&agrave;nh của m&igrave;nh l&agrave; những thầy thuốc người d&acirc;n tộc nổi tiếng ở Hướng H&oacute;a đ&atilde; thu được những kết quả đ&aacute;ng mừng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Khi c&oacute; được những l&aacute; thuốc thần b&iacute; của một số thầy lang c&oacute; tiếng ở Khe Sanh (Hướng H&oacute;a), lần đầu ti&ecirc;n, &ocirc;ng l&agrave;m th&iacute; nghiệm tr&ecirc;n thỏ. Kết quả l&agrave; d&ugrave; đến chu kỳ sinh nở nhưng hấp thụ thứ l&aacute; c&acirc;y đặc biệt n&agrave;y những c&aacute; thể thỏ c&aacute;i đ&atilde; kh&ocirc;ng thể mang thai.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Lần thứ hai, để t&igrave;m phản ứng phụ của thuốc, &ocirc;ng đ&atilde; thử tr&ecirc;n những c&aacute; thể chuột bạch tại Trường Đại học Y khoa Huế. Kết quả cũng v&ocirc; c&ugrave;ng mỹ m&atilde;n, l&aacute; thuốc tr&ecirc;n kh&ocirc;ng g&acirc;y bất cứ một phản ứng phụ n&agrave;o.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo &ocirc;ng Qu&aacute;t, sở dĩ đến giờ, c&ocirc;ng tr&igrave;nh của &ocirc;ng vẫn chưa về đến đ&iacute;ch l&agrave; bởi thiếu kinh ph&iacute;, th&ecirc;m nữa, chưa c&oacute; bất cứ kết luận khoa học về những biến chứng l&acirc;u d&agrave;i khi sử dụng b&agrave;i thuốc n&agrave;y. C&ograve;n một kh&oacute; khăn nữa, theo &ocirc;ng Qu&aacute;t, đ&oacute; l&agrave; sự b&iacute; hiểm đến kh&oacute; l&yacute; giải của l&aacute; a năng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	B&aacute;c sĩ Nguyễn Thị Hương, Ph&oacute; Chủ tịch Hội đ&ocirc;ng y tỉnh Quảng Trị khẳng định &ldquo;Đ&uacute;ng l&agrave; l&aacute; A Năng l&agrave; loại c&acirc;y thuốc c&oacute; c&ocirc;ng dụng tr&aacute;nh thai, đ&atilde; được đồng b&agrave;o người V&acirc;n Kiều sử dụng nhiều năm nay.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Ông Quát nghiên cứu loại lá cây này từ hơn 15 năm nay... Ảnh: SGGP" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/caytranhthai2712_7e0b4/ongquatnghiencuuloailacaynaytuhon15namnayanhsggp.jpg" /><br />\r\n	Theo giải th&iacute;ch của c&aacute;c nh&agrave; khoa học th&igrave; c&acirc;y A Năng thuộc họ Amarylli (thuộc chi Crium), chưa x&aacute;c định lo&agrave;i nhưng gần lo&agrave;i Crium Serrulatum - ảnh GĐCS</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Như đ&atilde; n&oacute;i, d&ugrave; th&acirc;n thiết tới đ&acirc;u th&igrave; đồng b&agrave;o d&acirc;n tộc vẫn giấu b&iacute; quyết của m&igrave;nh. Bởi thế, d&ugrave; c&oacute; được giống c&acirc;y qu&yacute; đ&oacute;, d&ugrave; trồng xanh um như những c&acirc;y cảnh kh&aacute;c trong nh&agrave;, nhưng nếu kh&ocirc;ng phải do người d&acirc;n tộc đặt thuốc th&igrave; a năng chỉ l&agrave; thứ l&aacute; v&ocirc; tri.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Cố gặng hỏi xem họ c&ograve;n b&iacute; quyết g&igrave; nữa khi sử dụng loại l&aacute; c&acirc;y n&agrave;y, nhưng lần n&agrave;o &ocirc;ng cũng chỉ nhận được c&acirc;u trả lời chung chung: A năng l&agrave; l&aacute; thuốc của Gi&agrave;ng. Đem về xu&ocirc;i Gi&agrave;ng kh&ocirc;ng đồng &yacute; n&ecirc;n v&ocirc; t&aacute;c dụng&hellip;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng Qu&aacute;t tiết lộ, tuy c&ocirc;ng tr&igrave;nh của &ocirc;ng vẫn đang dang dở nhưng đ&atilde; c&oacute; rất nhiều nh&agrave; khoa học c&oacute; tiếng ở cả trong v&agrave;i ngo&agrave;i nước đ&atilde; t&igrave;m tới, hỏi mua lại to&agrave;n bộ kết quả nghi&ecirc;n cứu, t&igrave;m hiểu đ&oacute; với gi&aacute; v&agrave;i tỉ đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Tuy nhi&ecirc;n, &ocirc;ng từ chối bởi &ocirc;ng muốn tự m&igrave;nh ho&agrave;n thiện c&ocirc;ng tr&igrave;nh khoa học n&agrave;y...</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align="right">\r\n	Theo&nbsp;Kiến thức</p>\r\n', 'Bí ẩn lá cây giúp nam nữ... ngừa thai', 'Nếu không muốn có con, mỗi khi làm chuyện ấy, người dân chỉ cần “yểm” một mẩu lá cây lạ dưới chiếu là cứ… thoải mái.', 'publish', 'open', 'open', '', '', '', '', '2012-07-03 05:06:10', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(11, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	Một cốc nước &eacute;p tr&aacute;i c&acirc;y kh&ocirc;ng những cung cấp năng lượng hoạt động cho cả ng&agrave;y, xua đi c&aacute;i n&oacute;ng oi bức của m&ugrave;a h&egrave; m&agrave; c&ograve;n l&agrave; &ldquo;trợ thủ&rdquo; đắc lực cho vẻ tươi s&aacute;ng khỏe mạnh của l&agrave;n da.</p>\r\n', 'Cách làm nước ép trái cây bổ dưỡng', 'Một cốc nước ép trái cây không những cung cấp năng lượng hoạt động cho cả ngày, xua đi cái nóng oi bức của mùa hè mà còn là “trợ thủ” đắc lực cho vẻ tươi sáng khỏe mạnh của làn da.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:39:17', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(12, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	(D&acirc;n tr&iacute;) - Hiểu r&otilde; những nguy cơ hiện hữu trong ch&iacute;nh những đồ d&ugrave;ng th&acirc;n thiện hằng ng&agrave;y, bạn sẽ biết c&aacute;ch lựa chọn những sản phẩm n&agrave;o an to&agrave;n cho sức khoẻ cả nh&agrave;.</p>\r\n', 'Lánh xa các chất độc quanh ta', '(Dân trí) - Hiểu rõ những nguy cơ hiện hữu trong chính những đồ dùng thân thiện hằng ngày, bạn sẽ biết cách lựa chọn những sản phẩm nào an toàn cho sức khoẻ cả nhà.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:43:42', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(13, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Chữa phong thấp, vi&ecirc;m khớp, vi&ecirc;m đau thần kinh tọa, đau t&ecirc; nhức mỏi th&acirc;n thể, vi&ecirc;m đau cột sống, bại liệt b&aacute;n th&acirc;n.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	Đọc kĩ hướng dẫn sử dụng trước khi d&ugrave;ng.</div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n', 'Hỏa Long', 'Chữa phong thấp, viêm khớp, viêm đau thần kinh tọa, đau tê nhức mỏi thân thể, viêm đau cột sống, bại liệt bán thân.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:13:29', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(14, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Bổ tỳ, ti&ecirc;u cam, dưỡng n&atilde;o, tăng sức đề kh&aacute;ng, ph&aacute;t triển tr&iacute; tu&ecirc;. Chữa chứng k&eacute;m ăn, khỏ ngủ, gầy yếu, da xanh v&agrave;ng, rồi loạn ti&ecirc;u ho&aacute;, mồ h&ocirc;i trộm, mệt mỏi, lười hoạt động, trầm cảm, ngại n&oacute;i, sợ h&atilde;i, chậm ph&aacute;t triển.&nbsp;</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span> <span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Siêu nhân tiểu bảo', 'Bổ tỳ, tiêu cam, dưỡng não, tăng sức đề kháng, phát triển trí tuê. Chữa chứng kém ăn, khỏ ngủ, gầy yếu, da xanh vàng, rồi loạn tiêu hoá, mồ hôi trộm, mệt mỏi, lười hoạt động, trầm cảm, ngại nói, sợ hãi, chậm phát triển. ', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:17:25', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(15, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Hỗ trợ, điều ho&agrave; đường huyết cho người bị bệnh tiểu đường m&aacute;t gan, th&ocirc;ng tiểu.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Trà thanh long', 'Hỗ trợ, điều hoà đường huyết cho người bị bệnh tiểu đường mát gan, thông tiểu.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:20:29', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(28, 1, '2012-07-01 06:02:19', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ thận, tư &acirc;m, chữa chứng mệt mỏi, thận hư, k&eacute;m ăn, kh&oacute; ngủ, suy yếu sinh l&yacute;.</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Linh chi lục vị', 'Bổ thận, tư âm, chữa chứng mệt mỏi, thận hư, kém ăn, khó ngủ, suy yếu sinh lý.', 'publish', 'open', 'open', '', '', '', '', '2012-07-03 04:10:59', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(16, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	M&aacute;t phổi, ti&ecirc;u đ&agrave;m, trị ho gi&oacute;, vi&ecirc;m họng, vi&ecirc;m phế quản, hen suyễn.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Bạch long thủy', 'Mát phổi, tiêu đàm, trị ho gió, viêm họng, viêm phế quản, hen suyễn.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:22:43', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(17, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<div class="productinfo">\r\n	<h4>\r\n		C&ocirc;ng dụng:</h4>\r\n	<div class="info">\r\n		Chai 500ml. Bổ thận tr&aacute;ng dương, tăng cường sức khoẻ, tăng cường sinh lực.</div>\r\n	<h4>\r\n		C&aacute;ch d&ugrave;ng:</h4>\r\n	<div class="info">\r\n		&nbsp;</div>\r\n	<h4>\r\n		Th&agrave;nh phần:</h4>\r\n	<div class="info">\r\n		&nbsp;</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Rượu ngọc dương sâm', 'Chai 500ml. Bổ thận tráng dương, tăng cường sức khoẻ, tăng cường sinh lực.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:24:24', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(18, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Chai 500ml. Phục hồi cơ thể sau lao động mệt nhọc, chữa chứng k&eacute;m ăn, kh&oacute; ngủ, đau lưng, nhức mỏi, thận suy, liệt dương.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Rượu sâm quế tửu', 'Chai 500ml. Phục hồi cơ thể sau lao động mệt nhọc, chữa chứng kém ăn, khó ngủ, đau lưng, nhức mỏi, thận suy, liệt dương.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:25:12', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(19, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa phong thấp, vi&ecirc;m khớp, vi&ecirc;m đau thần kinh tọa, đau t&ecirc; nhức mỏi th&acirc;n thể, vi&ecirc;m đau cột sống, bại liệt b&aacute;n th&acirc;n. C&aacute;ch d&ugrave;ng: Đọc kĩ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Hỏa Long', 'Chữa phong thấp, viêm khớp, viêm đau thần kinh tọa, đau tê nhức mỏi thân thể, viêm đau cột sống, bại liệt bán thân.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:01:54', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(20, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa chấn thương, sưng đau, bầm t&iacute;m, đau t&ecirc; nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nh&atilde;o d&acirc;y chằng.</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>:</p>\r\n<p>\r\n	Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Cồn xoa bóp', 'Chữa chấn thương, sưng đau, bầm tím, đau tê nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nhão dây chằng.', 'publish', 'open', 'open', '', '', '', 'Công dụng:\r\nChữa chấn thương, sưng đau, bầm tím, đau tê nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nhão dây chằng.\r\nCách dùng:\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.    \r\nThành phần:', '2012-06-30 03:05:11', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(21, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Trị s&acirc;u răng, vi&ecirc;m lợi, vi&ecirc;m họng hạt.</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>: Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Nước súc miệng dã hoa tiêu', 'Trị sâu răng, viêm lợi, viêm họng hạt.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:07:25', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(22, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa vi&ecirc;m đại tr&agrave;ng m&atilde;n t&iacute;nh, vi&ecirc;m lo&eacute;t h&agrave;nh t&aacute; tr&agrave;ng v&agrave; c&aacute;c chứng ti&ecirc;u chảy, kiết lỵ, đau bụng đầy hơi, kh&oacute; ti&ecirc;u, rối loạn ti&ecirc;u ho&aacute;</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>: Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Tiềm long', ' Chữa viêm đại tràng mãn tính, viêm loét hành tá tràng và các chứng tiêu chảy, kiết lỵ, đau bụng đầy hơi, khó tiêu, rối loạn tiêu hoá', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:09:46', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(23, 1, '2012-06-30 05:56:47', '0000-00-00 00:00:00', '<div class="productinfo">\r\n	<h4>\r\n		C&ocirc;ng dụng:</h4>\r\n	<div class="info">\r\n		Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực v&agrave; tr&iacute; &oacute;c. Lon 240 ml.</div>\r\n	<h4>\r\n		C&aacute;ch d&ugrave;ng:</h4>\r\n	<h4>\r\n		Th&agrave;nh phần:</h4>\r\n	<div class="info">\r\n		Nh&acirc;n s&acirc;m 2,5%&nbsp;<br />\r\n		Đương quy 5 %</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Nước uống sâm quy', 'Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực và trí óc. Lon 240 ml.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(29, 2, '2012-07-02 05:15:19', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Bệnh b&eacute; &ldquo;x&eacute;&rdquo; ra to.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau khi xem những đoạn quảng c&aacute;o m&agrave; ph&ograve;ng kh&aacute;m đa khoa Đầm Sen ở đường H&ograve;a B&igrave;nh, Q.11, TPHCM &ldquo;nổ&rdquo; về b&aacute;c sĩ Trung Quốc trị liệu hiệu quả c&aacute;c bệnh về sản phụ khoa, ng&agrave;y 11/5 chị Trần Thị T. ngụ ở TP Bu&ocirc;n Ma Thuột, tỉnh Đắk Lắk đ&atilde; tới chữa bệnh. B&aacute;c sĩ Ng&ocirc; Lương Ngọc, tự giới thiệu đến từ Đ&agrave;i Loan kh&aacute;m cho chị.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Kh&aacute;m xong, &ocirc;ng ta cho biết t&ocirc;i bị huyết trắng, nguy cơ chuyển sang ung thư nếu kh&ocirc;ng điều trị sớm. Thậm ch&iacute; họ c&ograve;n bảo rất dễ bị nhiễm HIV&rdquo;, chị T. thuật lại.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Liệu tr&igrave;nh chữa bệnh cho chị T., được c&aacute;c b&aacute;c sĩ ở ph&ograve;ng kh&aacute;m đưa ra trong v&ograve;ng 3 th&aacute;ng. Theo đ&oacute;, mỗi ng&agrave;y phải truyền 3 chai dịch với 2 mũi thuốc v&agrave; uống th&ecirc;m một số thuốc kh&aacute;c.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Đến ng&agrave;y 20/6, khi Thanh tra Sở Y tế TPHCM kiểm tra v&agrave; ph&aacute;t hiện nhiều b&aacute;c sĩ &ldquo;chui&rdquo; người Trung Quốc th&aacute;o chạy th&igrave; chị T., đ&atilde; chi ph&iacute; cho ph&ograve;ng kh&aacute;m hơn 50 triệu đồng. Trong khi sang kh&aacute;m ở BV An Sinh TPHCM, chị T. được chẩn đo&aacute;n chỉ bị vi&ecirc;m tuyến lộ, điều trị đơn giản v&agrave; chi ph&iacute; rất thấp.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị Chu Thị Hằng Ng., 41 tuổi ở Q. T&acirc;n Ph&uacute;, TPHCM cũng chỉ bị vi&ecirc;m nhiễm phụ khoa nhưng khi tới đ&acirc;y, &ldquo;b&aacute;c sĩ&rdquo; Trung Quốc ph&aacute;n ung thư cổ tử cung buộc phải điều trị với ph&aacute;c đồ 20 ng&agrave;y.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Cũng truyền dịch ghi to&agrave;n chữ Trung Quốc với ch&iacute;ch thuốc m&agrave; t&ocirc;i kh&ocirc;ng r&otilde; thuốc g&igrave;. Nhưng v&igrave; họ trấn an thuốc n&agrave;y điều trị hiệu quả n&ecirc;n t&ocirc;i tin. Ai d&egrave; mới đ&acirc;y b&aacute;o ch&iacute; phản &aacute;nh to&agrave;n thuốc kh&ocirc;ng nguồn gốc&rdquo;, chị Ng. n&oacute;i. Đ&oacute;ng hơn 10 triệu đồng cho ph&ograve;ng kh&aacute;m Đầm Sen nhưng khi đến đ&ograve;i tiền lại chị Ng. chỉ nhận được c&aacute;i lắc đầu từ chối.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Bị dọa sắp chết đến nơi do ung thư từ b&aacute;c sĩ Trung Quốc ở ph&ograve;ng kh&aacute;m Tr&agrave;ng An, Q. 11 n&ecirc;n chị Trần Hồng A. 45 tuổi ở Thuận An, tỉnh B&igrave;nh Dương phải r&aacute;ng chạy tiền để điều trị.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị A. cho biết, đến khi ph&aacute;t hiện sai phạm tại ph&ograve;ng kh&aacute;m n&agrave;y, chị sang khoa Phụ sản ở BV Đại học Y dược TPHCM thăm kh&aacute;m, l&agrave;m c&aacute;c si&ecirc;u &acirc;m v&agrave; x&eacute;t nghiệm mới biết m&igrave;nh bị buồng trứng đa nang chứ kh&ocirc;ng phải ung thư như lời b&aacute;c sĩ ở ph&ograve;ng kh&aacute;m khẳng định.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Rất may cho chị A. l&agrave; mới điều trị được 5 ng&agrave;y, tốn 12 triệu đồng. Mặc d&ugrave; c&aacute;c x&eacute;t nghiệm ở BV An Sinh đều kh&ocirc;ng ph&aacute;t hiện ra tế b&agrave;o ung thư nhưng chị Nguyễn D. H. 43 tuổi đến từ Long An được ph&ograve;ng kh&aacute;m Đ&ocirc;ng Phương &ldquo;ph&aacute;n&rdquo; ung thư tử cung, nguy hiểm đến t&iacute;nh mạng. Tin lời, chị H. cũng đ&oacute;ng 50% chi ph&iacute; với số tiền 25 triệu đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mất tiền&hellip; r&aacute;ng chịu!</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Thuốc không nguồn gốc, nhãn mác tràn đầy trong các phòng khám Trung Quốc." src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/thuoc-PK-TQ-2712_a04f8/thuoc-khong-nguon-goc-nhan-mac-tran-day-trong-cac-phong-kham-trung-quoc.jpg" /><br />\r\n	Thuốc kh&ocirc;ng nguồn gốc, nh&atilde;n m&aacute;c tr&agrave;n đầy trong c&aacute;c ph&ograve;ng kh&aacute;m Trung Quốc.&nbsp;&nbsp;Ảnh: L.N.</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau khi nhận được chiếc quạt nhựa in quảng c&aacute;o b&aacute;c sĩ Trung Quốc kh&aacute;m bệnh nam khoa giỏi tại ph&ograve;ng kh&aacute;m Trung Nam ở đường 3-2, Q.11 từ tay một người ph&aacute;t tờ rơi, b&agrave; Trần Thị H. ở 30/3A, tổ 14, phường Linh Xu&acirc;n, Q. Thủ Đức đưa con trai l&agrave; Trần H.H. 20 tuổi đến trị bệnh đau r&aacute;t đường tiểu.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Th&ocirc;ng dịch vi&ecirc;n cho biết b&aacute;c sĩ Trần người Trung Quốc kh&aacute;m cho ch&aacute;u H. &ldquo;B&aacute;c sĩ Trần n&oacute;i phải mổ cho ch&aacute;u gấp nếu kh&ocirc;ng sẽ bị v&ocirc; sinh. Với gi&aacute; m&agrave; b&aacute;c sĩ n&agrave;y n&oacute;i l&agrave; khoảng 4 triệu đồng n&ecirc;n t&ocirc;i chấp nhận&rdquo;, chị H. kể.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mổ xong, chị H. nhận được bịch thuốc vi&ecirc;n m&agrave;u đen được th&ocirc;ng dịch vi&ecirc;n y&ecirc;u cầu về nấu th&agrave;nh nước v&agrave; cho con uống hằng ng&agrave;y. Mỗi ng&agrave;y phải đưa ch&aacute;u đến ph&ograve;ng kh&aacute;m n&agrave;y chiếu đ&egrave;n tia hồng ngoại để trị dứt vi khuẩn v&igrave; sợ nhiễm tr&ugrave;ng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Họ n&oacute;i mổ 3,5 triệu đồng nhưng khi t&iacute;nh to&aacute;n tiền c&ocirc;ng mổ với thuốc ng&agrave;y đầu l&ecirc;n 10 triệu đồng&rdquo;, chị H. n&oacute;i. L&agrave;m nghề nhặt ve chai, cuộc sống khốn kh&oacute; nhưng lo cho con n&ecirc;n chị H. phải chạy vạy tiền để điều trị cho con đủ 12 ng&agrave;y kh&ocirc;ng sẽ &ldquo;bị nhiễm tr&ugrave;ng v&agrave; v&ocirc; sinh&rdquo; như lời b&aacute;c sĩ dặn.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau 12 ng&agrave;y điều trị, chi ph&iacute; cho ca mổ đ&atilde; l&ecirc;n 42 triệu đồng nhưng &ldquo;của qu&yacute;&rdquo; của con vẫn bị sưng l&ecirc;n. Qu&aacute; lo lắng, chị H. đưa con sang BV B&igrave;nh D&acirc;n. Sau 3 ng&agrave;y nằm viện với chi ph&iacute; 3 triệu đồng, H. xuất viện trong t&igrave;nh trạng khỏe mạnh.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;T&ocirc;i l&ecirc;n ph&ograve;ng kh&aacute;m Trung&nbsp;Nam&nbsp;gặp b&aacute;c sĩ Trần, hỏi sao b&ecirc;n B&igrave;nh D&acirc;n rẻ m&agrave; bệnh hết liền. &Ocirc;ng Trần n&oacute;i: &ldquo;Ăn phở ngo&agrave;i đường phải kh&aacute;c t&ocirc; phở ở kh&aacute;ch sạn 5 sao chứ&rdquo;, chị H. kể.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị Nguyễn Thị Anh T., ở x&atilde; An Ph&uacute;, huyện Củ Chi cho biết, c&aacute;ch đ&acirc;y 15 ng&agrave;y, chị đưa con g&aacute;i 16 tuổi đến Ph&ograve;ng kh&aacute;m y học cổ truyền Đ&ocirc;ng Phương ở C&aacute;ch Mạng Th&aacute;ng 8, Q. T&acirc;n B&igrave;nh kh&aacute;m trĩ.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mặc d&ugrave; kh&ocirc;ng c&oacute; chức năng cắt trĩ nhưng ph&ograve;ng kh&aacute;m n&agrave;y cũng mổ trĩ. Đến ng&agrave;y 23/6, chị T. đến ph&ograve;ng kh&aacute;m n&agrave;y lấy thuốc theo hẹn, th&igrave; nh&acirc;n vi&ecirc;n cho biết, b&aacute;c sĩ Trung Quốc đi vắng n&ecirc;n &ldquo;cứ cho con g&aacute;i ng&acirc;m nước n&oacute;ng với muối hột để s&aacute;t tr&ugrave;ng vết thương&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;T&ocirc;i đ&atilde; đ&oacute;ng gần 30 triệu đồng cho ca mổ, giờ họ lại bảo d&ugrave;ng nước muối để rửa vết thương, quả l&agrave; kh&ocirc;ng chấp nhận được&rdquo;, chị T. bức x&uacute;c. Chị đưa con g&aacute;i sang BV B&igrave;nh D&acirc;n để được chăm s&oacute;c, quay về ph&ograve;ng kh&aacute;m y&ecirc;u cầu bồi thường, th&igrave; nh&acirc;n vi&ecirc;n cho biết, b&aacute;c sĩ điều trị cho con chị đ&atilde; nghỉ việc rồi.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chiều 1/7, b&aacute;c sĩ Phạm Kim B&igrave;nh- quyền Ch&aacute;nh Thanh tra Sở Y tế TPHCM cho biết, về chức năng, Sở Y tế chỉ kiểm tra chuy&ecirc;n m&ocirc;n, giấy ph&eacute;p h&agrave;nh nghề của c&aacute;c ph&ograve;ng kh&aacute;m, chứ kh&ocirc;ng c&oacute; chức năng đứng ra y&ecirc;u cầu c&aacute;c cơ sở n&agrave;y bồi thường cho người bệnh. &ldquo;Tuy nhi&ecirc;n, người bệnh nếu c&oacute; cam kết về điều trị bệnh từ c&aacute;c ph&ograve;ng kh&aacute;m, c&oacute; giấy tờ chứng minh đầy đủ đ&atilde; điều trị ở đ&acirc;y th&igrave; c&oacute; thể khởi kiện ra t&ograve;a&rdquo;, b&aacute;c sĩ B&igrave;nh cho biết.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Phạt 2 ph&ograve;ng kh&aacute;m Trung Quốc vi phạm m&ocirc;i trường</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Cục Cảnh s&aacute;t Ph&ograve;ng chống tội phạm về m&ocirc;i trường- Bộ C&ocirc;ng an vừa ra quyết định xử phạt vi phạm h&agrave;nh ch&iacute;nh về bảo vệ m&ocirc;i trường đối với hai ph&ograve;ng kh&aacute;m Y học Trung Quốc (141 Phan Đăng Lưu, Q. Ph&uacute; Nhuận) v&agrave; Ph&ograve;ng kh&aacute;m đa khoa quốc tế Trung Nam (1509 đường Ba Th&aacute;ng Hai, Q.11, TPHCM) với tổng số tiền 270 triệu đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;2 ph&ograve;ng kh&aacute;m n&agrave;y bị ph&aacute;t hiện kh&ocirc;ng c&oacute; bản cam kết bảo vệ m&ocirc;i trường v&agrave; đề &aacute;n bảo vệ m&ocirc;i trường kh&ocirc;ng được x&aacute;c nhận theo quy định; kh&ocirc;ng ph&acirc;n loại chất thải nguy hại, để lẫn chất thải nguy hại kh&aacute;c loại với nhau hoặc chất thải kh&aacute;c; kh&ocirc;ng bố tr&iacute; nơi an to&agrave;n để lưu giữ tạm thời chất thải nguy hại.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align="right">\r\n	Theo&nbsp;L&ecirc; Nguyễn</p>\r\n<p align="right">\r\n	Tiền phong</p>\r\n', 'Bệnh nhân sập bẫy phòng khám Trung Quốc kêu trời', 'Người bệnh phải chịu cảnh tiền mất tật mang khi đến chữa trị tại các phòng khám Trung Quốc và không có người bệnh nào được các phòng khám này lo… hậu sự cố.', 'publish', 'open', 'open', '', '', '', '', '2012-07-03 04:28:01', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0);
INSERT INTO `ci_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(30, 1, '2012-07-03 05:00:53', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	(D&acirc;n tr&iacute;) - Để bảo vệ độ căng của v&ograve;ng 1, c&aacute;c &ldquo;liệu ph&aacute;p&rdquo; như thể dục, vận động, m&aacute;t xa, mỹ viện chỉnh sửa... đều được &aacute;p dụng. Tuy nhi&ecirc;n, ch&iacute;nh th&oacute;i quen sinh hoạt kh&ocirc;ng tốt mới l&agrave; &ldquo;thủ phạm&rdquo; l&agrave;m v&ograve;ng 1 ng&agrave;y c&agrave;ng b&eacute; đi.</h2>\r\n<div>\r\n	<p align="center">\r\n		&nbsp;<img alt="Không đủ protein" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/dep2712_a4f98/khong-du-protein.jpg" /><br />\r\n		<br />\r\n		&nbsp;</p>\r\n	<p>\r\n		Kh&ocirc;ng đủ protein</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Giảm b&eacute;o bằng c&aacute;ch kh&ocirc;ng ăn thịt, dầu mỡ c&oacute; thể l&agrave;m cho v&ograve;ng eo gọn lại nhưng cũng c&oacute; thể&nbsp;&nbsp;l&agrave;m cho v&ograve;ng 1 thu nhỏ.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&aacute;c thực phẩm gi&agrave;u protein v&agrave; chất b&eacute;o như c&aacute;c loại trứng, c&aacute;, thịt nạc, lạc, hạc đ&agrave;o, c&aacute;c loại đậu, vừng, dầu thực vật... ch&iacute;nh l&agrave; vật liệu l&yacute; tưởng để &ldquo;n&acirc;ng cấp&rdquo; v&ograve;ng ngực nhỏ.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		&Aacute;o ngực sai cỡ</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Rất nhiều phụ nữ mua &aacute;o ngực v&igrave; đẹp chứ kh&ocirc;ng ch&uacute; &yacute; c&oacute; ph&ugrave; hợp với khu&ocirc;n ngực. &Aacute;o qu&aacute; chật sẽ ảnh hưởng đến sự ph&aacute;t triển của ngực c&ograve;n mặc &aacute;o rộng lại l&agrave;m cho v&ograve;ng 1 bị trễ&nbsp;&nbsp;xuống.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&ugrave;ng với tuổi t&aacute;c, h&ocirc;n nh&acirc;n, sinh con, v&ograve;ng 1 của chị em đều c&oacute; sự biến đổi v&agrave; v&igrave; thế lu&ocirc;n phải thử &aacute;o trước khi mua.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Khi mặc &aacute;o ngực, đầu ti&ecirc;n n&ecirc;n c&agrave;i m&oacute;c sau lưng, sau đ&oacute; điều chỉnh d&acirc;y vai, cơ thể&nbsp;&nbsp;cong về ph&iacute;a trước, d&ugrave;ng tay chỉnh cho to&agrave;n bộ ngực nằm gọn trong quả &aacute;o.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vận động qu&aacute; nhiều</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vận động th&iacute;ch hợp gi&uacute;p cho v&ograve;ng 1 săn, đẹp nhưng vận động qu&aacute; nhiều hoặc khi vận động kh&ocirc;ng ch&uacute; &yacute; mặc &aacute;o ngực th&iacute;ch hợp lại c&oacute; thể l&agrave;m tổn hại v&ograve;ng 1.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Một số người khi vận động cảm thấy &aacute;o ngực th&agrave;nh &ldquo;của nợ&rdquo; bởi cảm gi&aacute;c n&oacute;ng, chật chội. Vậy n&ecirc;n việc chọn &aacute;o ngực chuy&ecirc;n d&ugrave;ng cho tập thể dục, khi tập luyện cần phải mặc l&ecirc;n để bảo vệ v&ograve;ng 1 của bạn, đặc biệt l&agrave; c&aacute;c m&ocirc;n như chạy bộ, nhảy d&acirc;y... rất cần thiết nếu kh&ocirc;ng muốn ngực ng&agrave;y c&agrave;ng nhỏ đi đồng thời c&ograve;n bị trễ xuống.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		M&aacute;t-xa sai c&aacute;ch</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		M&aacute;t-xa c&oacute; thể l&agrave;m cho v&ograve;ng 1 căng đầy nhưng tuỳ tiện m&aacute;t-xa hoặc m&aacute;t xa hướng xuống dưới chỉ l&agrave;m cho v&ograve;ng 1 ng&agrave;y c&agrave;ng b&eacute;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Phương ph&aacute;p m&aacute;t-xa &ldquo;chuẩn&rdquo; n&ecirc;n l&agrave;: trước khi ngủ nằm tr&ecirc;n giường, đầu ti&ecirc;n b&ocirc;i kem m&aacute;t-xa, sau đ&oacute; thuận theo m&ocirc; tuyến sữa m&aacute;t-xa v&ograve;ng tr&ograve;n theo hướng l&ecirc;n tr&ecirc;n, tay nhẹ nh&agrave;ng, tay phải m&aacute;t-xa b&ecirc;n ngực tr&aacute;i, tay tr&aacute;i ngược lại. Ngo&agrave;i ra, khi tắm mở nước ấm, d&ugrave;ng v&ograve;i hoa sen xả v&agrave;o ngực, như thế sẽ gi&uacute;p &iacute;ch cho v&ograve;ng 1 c&agrave;ng c&oacute; t&iacute;nh đ&agrave;n hồi.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Tắm kh&ocirc;ng đ&uacute;ng c&aacute;ch</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		D&ugrave;ng nước n&oacute;ng tắm c&oacute; thể th&uacute;c&nbsp;&nbsp;đẩy tuần ho&agrave;n m&aacute;u, nhưng khi tắm nước n&oacute;ng tốt nhất n&ecirc;n tr&aacute;nh trực tiếp xả v&agrave;o v&ugrave;ng ngực, c&agrave;ng kh&ocirc;ng n&ecirc;n ng&acirc;m m&igrave;nh trong nước n&oacute;ng qu&aacute; l&acirc;u, sẽ l&agrave;m cho da ng&agrave;y c&agrave;ng kh&ocirc;, m&ocirc; mềm v&ugrave;ng ngực c&agrave;ng c&agrave;ng gi&atilde;n ra, rời rạc. Nước n&oacute;ng th&iacute;ch hợp khi tắm n&ecirc;n để 27 độ C.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Nằm sấp ngủ</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Thời gian d&agrave;i nằm sấp ngủ, m&ocirc;t v&ugrave;ng ngực của phụ nữ sẽ bị ch&egrave;n &eacute;p, l&agrave;m cho v&ograve;ng 1 l&atilde;o h&oacute;a trước tuổi, da trở n&ecirc;n lỏng lẻo, v&ograve;ng 1 biến dạng, tuần ho&agrave;n m&aacute;u kh&ocirc;ng tốt. Phương ph&aacute;p cứu trợ l&agrave; tốt nhất đ&oacute; l&agrave; n&ecirc;n nằm ngủ với tư thế nằm ngửa.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p align="right">\r\n		Dương Hằng</p>\r\n	<p align="right">\r\n		Theo&nbsp;sohu</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Những thói quen làm vòng 1 ngày càng nhỏ.', '(Dân trí) - Để bảo vệ độ căng của vòng 1, các “liệu pháp” như thể dục, vận động, mát xa, mỹ viện chỉnh sửa... đều được áp dụng. Tuy nhiên, chính thói quen sinh hoạt không tốt mới là “thủ phạm” làm vòng 1 ngày càng bé đi.', 'publish', 'open', 'open', '', '', '', '', '2012-07-03 05:06:03', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(31, 1, '2012-07-04 05:50:02', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h2>\r\n	Thủ tướng Ch&iacute;nh phủ vừa quyết định bổ nhiệm Trợ l&yacute; Ủy vi&ecirc;n Bộ Ch&iacute;nh trị, Ph&oacute; Thủ tướng Ch&iacute;nh phủ Nguyễn Xu&acirc;n Ph&uacute;c v&agrave; một số c&aacute;n bộ Bảo hiểm tiền gửi Việt Nam.</h2>\r\n<div>\r\n	<p>\r\n		Cụ thể, tại Quyết định 828/QĐ-TTg, Thủ tướng bổ nhiệm &ocirc;ng Nguyễn Duy Hưng, H&agrave;m Vụ trưởng, Thư k&yacute; Ủy vi&ecirc;n Bộ Ch&iacute;nh trị, Ph&oacute; Thủ tướng Ch&iacute;nh phủ Nguyễn Xu&acirc;n Ph&uacute;c, giữ chức Trợ l&yacute; Ủy vi&ecirc;n Bộ Ch&iacute;nh trị, Ph&oacute; Thủ tướng Ch&iacute;nh phủ Nguyễn Xu&acirc;n Ph&uacute;c.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Tại Quyết định 815/QĐ-TTg, Thủ tướng bổ nhiệm lại &ocirc;ng B&ugrave;i Khắc Sơn, giữ chức Ủy vi&ecirc;n Hội đồng quản trị Bảo hiểm Tiền gửi Việt Nam ki&ecirc;m Tổng Gi&aacute;m đốc Bảo hiểm tiền gửi Việt Nam.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Tại Quyết định 816/QĐ-TTg, Thủ tướng bổ nhiệm &ocirc;ng Vũ Trung Trực, Trưởng ban Thư k&yacute; Hội đồng quản trị Bảo hiểm Tiền gửi Việt Nam, giữ chức Ủy vi&ecirc;n Hội đồng quản trị Bảo hiểm Tiền gửi Việt Nam ki&ecirc;m Trưởng ban Kiểm so&aacute;t Bảo hiểm Tiền gửi Việt Nam.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p align="right">\r\n		Theo&nbsp;Ho&agrave;ng Di&ecirc;n</p>\r\n	<p align="right">\r\n		Chinhphu.vn</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Thủ tướng bổ nhiệm một số cán bộ', 'Thủ tướng Chính phủ vừa quyết định bổ nhiệm Trợ lý Ủy viên Bộ Chính trị, Phó Thủ tướng Chính phủ Nguyễn Xuân Phúc và một số cán bộ Bảo hiểm tiền gửi Việt Nam.', 'publish', 'open', 'open', '', '', '', '', '2012-07-04 06:20:10', '0000-00-00 00:00:00', '', 0, '', 0, 'page', '', 0),
(32, 1, '2012-07-06 03:38:58', '0000-00-00 00:00:00', '<h2 style="padding: 0px; margin: 0px 0px 7px; color: rgb(76, 76, 76); font-size: 12px; font-family: Arial; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	<span style="padding: 0px; margin: 0px; color: rgb(0, 0, 0); font-size: 16px; text-decoration: none; text-transform: none; ">Trần thị Thuận<span class="Apple-converted-space">&nbsp;</span><br style="padding: 0px; margin: 0px; " />\r\n	B&aacute;oĐại đo&agrave;n kết số 05/11/2010</span></h2>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-align: center; ">\r\n	<div style="padding: 0px; margin: 0px; text-align: justify; ">\r\n		&ldquo;Bảo Long Đường&rdquo; l&agrave; kh&ocirc;ng gian văn h&oacute;a, bao tr&ugrave;m c&aacute;c hoạt động về y học, V&otilde; học, nghệ thuật, du lịch, điều dưỡng v&agrave; thương mại của Tập đo&agrave;n y dược Bảo Long - Một điển h&igrave;nh về sự bảo tồn v&agrave; ph&aacute;t triển c&aacute;c di sản văn h&oacute;a cổ truyền của d&acirc;n tộc, nơi gắn liền với sự nghiệp của nh&acirc;n vật &ldquo;huyền thoại&rdquo; trong bộ phim truyện d&agrave;i tập &ldquo;Đường đời&rdquo; đ&oacute; ch&iacute;nh l&agrave; thầy thuốc ưu t&uacute;, V&otilde; sư, Lương y, Tiến sĩ Y học Nguyễn Hữu Khai &ndash; Tổng gi&aacute;m đốc Tập đo&agrave;n Y dược Bảo Long, đồng thời l&agrave; nơi khởi nguồn của những c&acirc;u chuyện cổ t&iacute;ch giữa thời hiện đại về t&igrave;nh y&ecirc;u, về sự phục hồi kỳ diệu trong y học v&agrave; về x&atilde; hội mu&ocirc;n vẻ của đời thường&hellip;</div>\r\n	<img alt="" src="http://baolongduong.vn/Uploads/images/anh_tin_bai/2011_79_16_puthong%20trong%20cay.jpg" style="padding: 2px; margin: 0px; border: 0px none; max-width: 660px !important; text-align: center; " />&nbsp;<br style="padding: 0px; margin: 0px; " />\r\n	<em style="padding: 0px; margin: 0px; ">Thủ tướng nước CHDCND L&agrave;o Thongsing Thammavong&nbsp;<br style="padding: 0px; margin: 0px; " />\r\n	trồng c&acirc;y lưu niệm tại Tập đo&agrave;n y dược Bảo Long.</em><br style="padding: 0px; margin: 0px; " />\r\n	<div style="padding: 0px; margin: 0px; text-align: justify; ">\r\n		&ldquo;Bảo Long Đường&rdquo; l&agrave; t&igrave;nh nh&acirc;n loại &ldquo;người với người sống để y&ecirc;u thương&rdquo;. L&agrave; niềm tin gửi gắm cuộc đời v&agrave; sức khoẻ của đ&ocirc;ng đảo b&agrave; con trong nước v&agrave; Quốc tế. Bảo Long nổi tiếng trong lĩnh vực y học cổ truyền v&agrave; V&otilde; thuật cổ truyền, l&agrave; một trong những di sản văn h&oacute;a mang đậm bản sắc d&acirc;n tộc. Y học cổ truyền v&agrave; v&otilde; thuật cổ truyền được Đảng v&agrave; Nh&agrave; nước ch&uacute; trọng bảo tồn, ph&aacute;t triển để chăm lo v&agrave; bảo vệ sức khỏe nh&acirc;n d&acirc;n v&agrave; giới thiệu di sản văn h&oacute;a đ&aacute;ng tự h&agrave;o với bạn b&egrave; Quốc tế. Từ đường quốc lộ đoạn km số 10 (H&ograve;a Lạc - Sơn T&acirc;y) rẽ tr&aacute;i v&agrave;o &ldquo;Bảo Long Đường&rdquo; l&agrave; t&ograve;a nh&agrave; 10 tầng với diện t&iacute;ch s&agrave;n 900m2. - Tầng 1 giới thiệu h&agrave;ng trăm loại sản phẩm Đ&ocirc;ng dược mỹ phẩm chế từ thảo dược v&agrave; c&aacute;c loại thực phẩm thuốc nổi tiếng của Bảo Long, của c&aacute;c c&ocirc;ng ty Đ&ocirc;ng dược kh&aacute;c v&agrave; của Trung Quốc, H&agrave;n Quốc, Nhật Bản&hellip; - Tầng 2 l&agrave; khu xem mạch, k&ecirc; đơn, chẩn trị theo phương ph&aacute;p Đ&ocirc;ng y v&agrave; Đ&ocirc;ng t&acirc;y y kết hợp. - Tầng 3 l&agrave; văn ph&ograve;ng Ban l&atilde;nh đạo Tập đo&agrave;n v&agrave; c&aacute;c ph&ograve;ng ban Trợ l&yacute; Tổng gi&aacute;m đốc. - Tầng 4 l&agrave; khu kế to&aacute;n, kỹ thuật sản xuất. - Từ tầng 5 đến tầng 8 l&agrave; khu vực của khoa Nội Đ&ocirc;ng y Bệnh viện Bảo Long. - Tầng 9, tầng 10 l&agrave; ph&ograve;ng kh&aacute;ch. Theo đường một chiều rẽ phải l&agrave; khu căng tin, điểm t&acirc;m giải kh&aacute;t, nh&agrave; gửi xe của kh&aacute;ch v&agrave; b&atilde;i đỗ xe c&oacute; sức chứa đến v&agrave;i chục xe bu&yacute;t c&ugrave;ng l&uacute;c. Du kh&aacute;ch c&oacute; thể rửa ch&acirc;n tay, vệ sinh, nghỉ ngơi trong ph&ograve;ng hoặc trong vườn c&acirc;y xanh b&oacute;ng m&aacute;t để uống nước v&agrave; ăn nhẹ, sau đ&oacute; dạo bộ thăm quan, thư gi&atilde;n v&agrave; mua sắm Đ&ocirc;ng dược, mỹ phẩm v&agrave; cả đặc sản sữa xứ Đo&agrave;i c&ugrave;ng c&aacute;c sản phẩm của sữa Ba V&igrave;. Đặc biệt trong khu&ocirc;n vi&ecirc;n &ldquo;Bảo Long Đường&rdquo; c&oacute; khu văn h&oacute;a t&acirc;m linh, phảng phất dưới những c&acirc;y cổ thụ rợp b&oacute;ng m&aacute;t như rừng l&agrave; m&aacute;i ch&ugrave;a cổ k&iacute;nh. Nơi đ&acirc;y thờ Tam Bảo, Phật Tổ uy linh, thờ Tam t&ograve;a Th&aacute;nh Mẫu, thờ Đức Y tổ v&agrave; thờ Đức V&otilde; tổ. H&igrave;nh ảnh khiến cho nhiều du kh&aacute;ch cảm x&uacute;c linh ứng gai người l&agrave; khu thờ ch&acirc;n linh c&aacute;c c&aacute;n bộ nh&acirc;n vi&ecirc;n của Bảo Long đ&atilde; vĩnh viễn ra đi. C&oacute; cả những nh&acirc;n vật huyền thoại trong truyện phim d&agrave;i tập &ldquo;Đường đời&rdquo; đ&oacute; l&agrave; Yến Nhi (ngo&agrave;i đời l&agrave; vợ thứ 2 của V&otilde; sư, Lương y Nguyễn Hữu Khai) v&agrave; c&oacute; cả anh Th&igrave;n (Ngo&agrave;i đời l&agrave; Trung t&aacute; C&ocirc;ng an H&agrave; Quốc Kh&aacute;nh - Nguy&ecirc;n chủ tịch HĐQT C&ocirc;ng ty Đ&ocirc;ng Nam dược Bảo Long) c&ugrave;ng một số anh chị em bị tai nạn lao động, tai nạn giao th&ocirc;ng v&agrave; l&acirc;m bệnh hiểm ngh&egrave;o đ&atilde; tạ thế. Trong l&agrave;n kh&oacute;i nhang mờ ảo, h&agrave;ng ng&agrave;y h&agrave;ng giờ họ vẫn gắn b&oacute; với &ldquo;Bảo Long&rdquo;, chở che, ph&ugrave; hộ cho &ldquo;Bảo Long&rdquo; b&igrave;nh an v&agrave; kh&ocirc;ng ngừng ph&aacute;t triển trong c&ocirc;ng việc chữa bệnh cứu nh&acirc;n độ thế&hellip; Tầng 1 &ldquo;Bảo Long tự&rdquo; được trưng b&agrave;y những hiện vật truyền thống v&agrave; những Hu&acirc;n huy chương, C&uacute;p v&agrave;ng danh dự trong 20 năm x&acirc;y dựng v&agrave; trưởng th&agrave;nh của Bảo Long. Khu văn h&oacute;a t&acirc;m linh Bảo Long với sinh kh&iacute; sung m&atilde;n trong l&agrave;nh, l&agrave; nơi l&yacute; tưởng để thụ kh&iacute; vũ trụ luyện tập kh&iacute; c&ocirc;ng, tăng cường sức khoẻ, tr&iacute; tuệ v&agrave; lưu th&ocirc;ng kh&iacute; huyết, gi&uacute;p cho kết quả luyện &yacute;, luyện kh&iacute;, luyện h&igrave;nh, luyện phong c&aacute;ch nhanh th&agrave;nh tựu. Tại đ&acirc;y V&otilde; sư, Tiến sĩ Y học Nguyễn Hữu Khai đ&atilde; luyện tập v&agrave; t&iacute;ch luỹ được nhiều c&ocirc;ng năng kỳ b&iacute;. Đ&acirc;y cũng l&agrave; nơi m&agrave; mỗi khi bệnh nh&acirc;n mệt mỏi, kh&oacute; chịu trong người, họ tới để xả được kh&iacute; cho khoan kho&aacute;i, cho nhẹ người v&agrave; cho mau l&agrave;nh bệnh. Cũng tại nơi n&agrave;y, V&otilde; sư Nguyễn Hữu Khai đ&atilde; tổ chức c&aacute;c nh&agrave; kh&iacute; c&ocirc;ng nổi tiếng trong cả nước, h&agrave;ng ng&agrave;y chi&ecirc;u sinh mở lớp hướng dẫn học kh&iacute; c&ocirc;ng cho cộng đồng v&agrave; cả học vi&ecirc;n nước ngo&agrave;i. S&aacute;t với khu văn h&oacute;a t&acirc;m linh l&agrave; c&aacute;c s&acirc;n tập v&otilde; thuật. Dưới t&aacute;n rừng c&acirc;y xanh, học sinh trường Phổ th&ocirc;ng V&otilde; thuật Bảo Long với những b&agrave;i v&otilde; tự vệ, v&otilde; nghệ thuật c&ograve;n l&agrave; những tiết mục văn h&oacute;a l&agrave;m vơi đi những mệt mỏi, những bức bối, căng thẳng v&agrave; đem lại cảm x&uacute;c vui tươi, t&iacute;ch cực cho du kh&aacute;ch. Tiếp gi&aacute;p với khu văn h&oacute;a t&acirc;m linh l&agrave; c&aacute;c cơ sở của Bệnh viện Bảo Long với c&aacute;c khoa: Khoa Nội &ndash; Điều dưỡng; Khoa Nội &ndash; Kh&iacute; c&ocirc;ng; Khoa Nội &ndash; tổng hợp&hellip; C&ugrave;ng c&aacute;c nh&agrave; m&aacute;y sản xuất Đ&ocirc;ng dược, mỹ phẩm thảo dược, thực phẩm thuốc v&agrave; vườn thuốc mẫu với h&agrave;ng trăm c&acirc;y thuốc qu&yacute;. Trường Phổ th&ocirc;ng V&otilde; thuật Bảo Long th&agrave;nh lập năm 2007 đến nay đ&atilde; c&oacute; h&agrave;ng trăm học sinh năng khiếu V&otilde; thuật từ hầu hết c&aacute;c tỉnh, th&agrave;nh phố trong cả nước tới học. Bệnh viện Đa khoa Bảo Long với đội ngũ Gi&aacute;o sư, Tiến sĩ, B&aacute;c sĩ, Lương y gi&agrave;u kinh nghiệm c&ugrave;ng với cơ sở khang trang, tho&aacute;ng m&aacute;t, c&oacute; c&aacute;c ph&ograve;ng điều dưỡng, điều trị cao cấp, đầy đủ tiện nghi sinh hoạt, c&oacute; thể sử dụng c&aacute;c loại h&igrave;nh th&ocirc;ng tin như internet, Fax, Email&hellip;.Đồng thời cũng c&oacute; c&aacute;c loại ph&ograve;ng trung b&igrave;nh v&agrave; b&igrave;nh d&acirc;n để đ&aacute;p ứng mọi nhu cầu. Đặc biệt c&oacute; khoa Đ&ocirc;ng y vững mạnh với đội ngũ thầy thuốc giỏi tay nghề, gi&agrave;u y đức do thầy thuốc ưu t&uacute;, Lương y, Tiến sĩ Nguyễn Hữu Khai tận t&acirc;m truyền dạy. Kết hợp nhuần nhuyễn với y học hiện đại, Xquang, si&ecirc;u &acirc;m, điện t&acirc;m đồ, x&eacute;t nghiệm sinh h&oacute;a v&agrave; c&aacute;c thiết bị cấp cứu hồi sức ti&ecirc;n tiến&hellip;trị hiệu quả c&aacute;c chứng liệt do tai biến, vi&ecirc;m đa khớp m&atilde;n t&iacute;nh, tho&aacute;i h&oacute;a cột sống, gai cột sống, thiểu năng tuần ho&agrave;n n&atilde;o, u nang, gan, thận, buồng trứng, tử cung&hellip;v&agrave; c&aacute;c chứng bệnh m&atilde;n t&iacute;nh kh&oacute; chữa. Đ&atilde; điều trị hiệu quả nhiều ca bệnh hiểm ngh&egrave;o. C&oacute; những th&agrave;nh c&ocirc;ng m&agrave; nhiều lần được th&ocirc;ng tin đại ch&uacute;ng, b&aacute;o, đ&agrave;i ca ngợi l&agrave; những kỳ diệu của y học. Tại Bệnh viện Bảo Long qu&yacute; kh&aacute;ch ngo&agrave;i việc điều dưỡng phục hồi sức khỏe bằng thuốc uống, tắm nước thuốc, vật l&yacute; trị liệu phục hồi chức năng, chăm s&oacute;c da mặt thẩm mỹ, c&ograve;n được hướng dẫn tập V&otilde; dưỡng sinh v&agrave; kh&iacute; c&ocirc;ng trị bệnh đồng thời được giải tr&iacute; bằng c&aacute;c m&ocirc;n thể thao th&iacute;ch hợp. C&oacute; dịch vụ tr&ocirc;ng nom, điều dưỡng c&aacute;c cụ gi&agrave; khi con ch&aacute;u vắng mặt. Bảo Long đường giới thiệu m&ocirc; h&igrave;nh truyền thống phục vụ qu&iacute; kh&aacute;ch. 1.Si&ecirc;u thị Đ&ocirc;ng dược với h&agrave;ng trăm loại thuốc chữa bệnh c&ugrave;ng mỹ phẩm chế từ thảo dược thi&ecirc;n nhi&ecirc;n v&agrave; thực phẩm chức năng độc đ&aacute;o, hiệu quả, an to&agrave;n. 2. Kh&aacute;m chữa bệnh kết hợp h&agrave;i h&ograve;a giữa hai nền y học Đ&ocirc;ng y v&agrave; T&acirc;y y. 3. &Aacute;p dụng c&ocirc;ng nghệ th&ocirc;ng tin hiện đại v&agrave;o việc kh&aacute;m chữa bệnh v&agrave; cấp ph&aacute;t thuốc. 4. B&agrave;o chế dược liệu, sản xuất thuốc chữa bệnh với h&agrave;ng trăm sản phẩm đặc hiệu. 5. Sản xuất mỹ phẩm từ thảo dược thi&ecirc;n nhi&ecirc;n v&agrave; dịch vụ trị liệu chăm s&oacute;c sắc đẹp. 6. Hướng dẫn trồng v&agrave; sử dụng c&acirc;y thuốc qu&yacute; để chữa bệnh tại gia đ&igrave;nh. 7. Gi&aacute;o dục thể chất kết hợp giữa văn h&oacute;a với V&otilde; thuật.Dịch vụ biểu diễn nghệ thuật L&acirc;n sư rồng v&agrave; V&otilde; thuật s&acirc;n khấu điện ảnh. 8. Chữa bệnh bằng phương ph&aacute;p kh&ocirc;ng d&ugrave;ng thuốc (kh&iacute; c&ocirc;ng, dưỡng sinh, xoa b&oacute;p, bấm huyệt&hellip;). 9. Chế biến v&agrave; phục vụ đồ ăn, nước uống từ thảo dược kết hợp với thực phẩm phục hồi chức năng v&agrave; chữa bệnh. 10. Đăng cai tổ chức hội nghị, hội thảo, du lịch điều dưỡng, dưỡng l&atilde;o , dịch vụ nh&agrave; h&agrave;ng, kh&aacute;ch sạn&hellip; Đồng thời qua khung k&iacute;nh qu&iacute; kh&aacute;ch sẽ được tận mắt nh&igrave;n thấy từ thảo dược thi&ecirc;n nhi&ecirc;n (củ, c&acirc;y, d&acirc;y, l&aacute;) theo một d&acirc;y chuyền khoa học v&agrave; hiện đại để trở th&agrave;nh những sản phẩm thuốc chữa bệnh v&agrave; những sản phẩm l&agrave;m đẹp dung nhan thuần khiết m&agrave; qu&iacute; kh&aacute;ch đ&atilde; từng được sử dụng&hellip;. Tập đo&agrave;n y dược Bảo Long đ&atilde; được Nh&agrave; nước đ&aacute;nh gi&aacute; l&agrave; một điểm s&aacute;ng về c&ocirc;ng t&aacute;c x&atilde; hội h&oacute;a y tế, gi&aacute;o dục, văn h&oacute;a v&agrave; thể thao. Năm 2008 đ&atilde; vinh dự được Chủ tịch nước tặng thưởng Hu&acirc;n chương lao động hạng 3 đồng thời được Thủ tướng Ch&iacute;nh phủ c&ugrave;ng c&aacute;c Bộ v&agrave; c&aacute;c tỉnh, th&agrave;nh phố tặng nhiều huy chương v&agrave; bằng khen. Tập đo&agrave;n y dược Bảo Long gồm 14 C&ocirc;ng ty, trường học, bệnh viện, trung t&acirc;m hoạt động kh&eacute;p k&iacute;n lĩnh vực y dược học, từ gieo trồng, kiếm h&aacute;i, bảo tồn dược liệu thi&ecirc;n nhi&ecirc;n đến sản xuất thuốc v&agrave; kh&aacute;m chữa bệnh đồng thời x&acirc;y dựng cả một m&ocirc; h&igrave;nh gi&aacute;o dục, đ&agrave;o tạo thể chất tinh hoa V&otilde; thuật từ tuổi nhi đồng v&agrave; đ&agrave;o tạo c&aacute;c thầy thuốc, lương y, Dược sĩ, y sĩ, Kỹ thuật vi&ecirc;n điều dưỡng&hellip; Qu&yacute; kh&aacute;ch đến thăm &ldquo;Bảo Long đường&rdquo; thường quan t&acirc;m v&agrave; ghi ch&eacute;p những băng r&ocirc;n in những &yacute; đẹp, lời hay treo trong khu&ocirc;n vi&ecirc;n v&agrave; c&aacute;c khu l&agrave;m việc do Lương y, Ts Nguyễn Hữu Khai sưu tầm v&agrave; s&aacute;ng t&aacute;c để nhắc nhở v&agrave; gi&aacute;o dục CBCNV, học sinh, sinh vi&ecirc;n c&oacute; nh&acirc;n c&aacute;ch văn h&oacute;a: &nbsp;</div>\r\n</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Ph&aacute; sản lớn nhất của đời người l&agrave; tuyệt vọng&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* K&ecirc; đơn phải ph&ugrave; hợp với chẩn đo&aacute;n v&agrave; đảm bảo sử dụng thuốc hợp l&yacute;, an to&agrave;n, kh&ocirc;ng v&igrave; lợi &iacute;ch c&aacute; nh&acirc;n m&agrave; giao cho người bệnh thuốc k&eacute;m phẩm chất, thuốc kh&ocirc;ng đ&uacute;ng với y&ecirc;u cầu v&agrave; mức độ bệnh.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&nbsp;* Kh&ocirc;ng được rời bỏ vị tr&iacute; trong khi l&agrave;m nhiệm vụ, theo d&otilde;i v&agrave; xử tr&iacute; kịp thời c&aacute;c diễn biến của người bệnh.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Khi người bệnh ra viện phải dặn d&ograve; chu đ&aacute;o, hướng dẫn họ tiếp tục điều trị, tự chăm s&oacute;c v&agrave; giữ g&igrave;n sức khỏe.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Thật th&agrave;, đo&agrave;n kết, t&ocirc;n trọng đồng nghiệp, k&iacute;nh trọng c&aacute;c bậc thầy, sẵn s&agrave;ng truyền thụ kiến thức, học hỏi kinh nghiệm, gi&uacute;p đỡ lẫn nhau.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Khi bản th&acirc;n c&ograve;n c&oacute; thiếu s&oacute;t, phải tự gi&aacute;c nhận tr&aacute;ch nhiệm về m&igrave;nh, kh&ocirc;ng đổ lỗi cho đồng nghiệp, cho tuyến trước.</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Đừng coi m&igrave;nh l&agrave; đại thụ giữa rừng lau v&agrave; chớ coi m&igrave;nh l&agrave; c&acirc;y lau giữa rừng đại thụ&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Cảnh khổ l&agrave; nấc thang của bậc anh t&agrave;i, l&agrave; kho t&agrave;ng của người kh&ocirc;n kh&eacute;o, l&agrave; vực thẳm của kẻ đuối tr&iacute;&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Tử tế c&oacute; trong mọi người phải đ&aacute;nh thức n&oacute;, phải t&ocirc;n thờ n&oacute;. Nếu thiếu n&oacute; th&igrave; mọi nỗ lực đều trở th&agrave;nh những tr&ograve; vớ vẩn&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Cứ v&agrave;o trận sẽ t&igrave;m ra c&aacute;ch đ&aacute;nh&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;Biết đủ th&igrave; đủ, chờ đủ biết đến bao giờ&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* &ldquo;L&agrave;m ra sản phẩm để b&aacute;n được nhiều kh&ocirc;ng phải l&agrave;m ra nhiều sản phẩm để b&aacute;n&rdquo;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Muốn c&oacute; hạnh ph&uacute;c phải c&oacute; việc l&agrave;m ch&acirc;n ch&iacute;nh. Muốn c&oacute; việc l&agrave;m phải l&agrave;m tốt c&ocirc;ng việc của m&igrave;nh&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* V&otilde; thuật l&agrave; sức mạnh v&ocirc; song, l&agrave; nghị lực ki&ecirc;n cường, l&agrave; &yacute; ch&iacute; sắt đ&aacute;, l&agrave; tinh thần cao thượng.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Tận c&ugrave;ng của v&otilde; l&agrave; văn, tận c&ugrave;ng của miếng cơm manh &aacute;o l&agrave; nghĩa kh&iacute;, l&agrave; c&aacute;i cao cả của t&igrave;nh người.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Chịu thiệt một t&yacute; để bạn m&igrave;nh vui. * Kh&ocirc;ng c&oacute; bệnh nan y th&igrave; kh&ocirc;ng c&oacute; thầy thuốc giỏi.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* M&acirc;u thuẫn l&agrave; kh&ocirc;ng thể tr&aacute;nh khỏi. Song kh&ocirc;ng để m&acirc;u thuẫn trở th&agrave;nh hận th&ugrave;.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Trăn trở, cực nhọc cứu người qua đau khổ đ&oacute; l&agrave; tr&ograve; &ldquo;ti&ecirc;u khiển&rdquo; của bậc t&acirc;m đạo.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Ban ơn m&agrave; nghĩ đến được đền đ&aacute;p th&igrave; kh&ocirc;ng c&ograve;n l&agrave; &acirc;n huệ!&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Đuổi bệnh cứu người đ&atilde; kh&oacute;, song xua được những vết tối x&acirc;m lấm t&acirc;m m&igrave;nh c&ograve;n kh&oacute; hơn nhiều.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Cẩn thận, chu đ&aacute;o khi b&agrave;o chế, kiểm tra kỹ lưỡng ch&iacute;nh x&aacute;c trước khi g&oacute;i thuốc cho bệnh nh&acirc;n.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Viết ra những g&igrave; sẽ l&agrave;m, l&agrave;m theo những g&igrave; đ&atilde; viết. * Biết đủ chẳng nhục, biết dừng chẳng nguy.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* Giao c&ocirc;ng việc. Hướng dẫn thực hiện. Kiểm tra gi&aacute;m s&aacute;t. Nghiệm thu kết quả. Tổng hợp b&aacute;o c&aacute;o.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	* L&agrave;m việc theo 5S: S&agrave;ng lọc - Sắp xếp - Sạch sẽ - Săn s&oacute;c - Sẵn s&agrave;ng.&nbsp;</div>\r\n<div style="padding: 0px; margin: 0px; color: rgb(76, 76, 76); font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&ldquo;Bảo Long đường &rdquo; l&agrave; m&ocirc; h&igrave;nh th&acirc;n thiện đ&aacute;p ứng nhu cầu tham quan, du lịch v&agrave; điều dưỡng của đ&ocirc;ng đảo qu&iacute; kh&aacute;ch trong v&agrave; ngo&agrave;i nước.</div>\r\n', 'Bảo Long Đường nơi du lịch điều dưỡng lý tưởng và thân thiện', '“Bảo Long Đường” là không gian văn hóa, bao trùm các hoạt động về y học, Võ học, nghệ thuật, du lịch, điều dưỡng và thương mại của Tập đoàn y dược Bảo Long - Một điển hình về sự bảo tồn và phát triển các di sản văn hóa cổ truyền của dân tộc, nơi gắn liền với sự nghiệp của nhân vật “huyền thoại” trong bộ phim truyện dài tập “Đường đời” đó chính là thầy thuốc ưu tú, Võ sư, Lương y, Tiến sĩ Y học Nguyễn Hữu Khai – Tổng giám đốc Tập đoàn Y dược Bảo Long, đồng thời là nơi khởi nguồn của những câu chuyện cổ tích giữa thời hiện đại về tình yêu, về sự phục hồi kỳ diệu trong y học và về xã hội muôn vẻ của đời thường…', 'publish', 'open', 'open', '', '', '', '', '2012-07-06 06:14:33', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(33, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '8', 'Lượt truy cập', '', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'count_access', '', 0),
(34, 1, '2012-07-18 03:56:38', '0000-00-00 00:00:00', '<h3>\r\n	Bạn n&ecirc;n sử dụng dịch vụ tư vấn v&agrave; gi&aacute;m s&aacute;t trước khi thiết kế website</h3>\r\n<p>\r\n	Bạn c&oacute; tự hỏi, doanh nghiệp hoặc tổ chức của bạn c&oacute; thực sự cần một trang web? Dưới đ&acirc;y l&agrave; một số l&yacute; do v&igrave; sao website l&agrave; một &yacute; tưởng tuyệt vời.</p>\r\n<p>\r\n	Intenet cung cấp sự tiếp cận b&igrave;nh đẳng cho d&ugrave; bạn chỉ l&agrave; một c&ocirc;ng ty nhỏ hay sở hữu 500 firm, do đ&oacute; Internet c&oacute; xu hướng l&agrave; &ldquo;một s&acirc;n chơi b&igrave;nh đẳng&rdquo;.</p>\r\n<p>\r\n	Khi ng&agrave;y c&agrave;ng nhiều doanh nghiệp v&agrave; tổ chức tham gia v&agrave;o cộng đồng internet, th&igrave; những người kh&ocirc;ng c&oacute; website sẽ dần đặt m&igrave;nh v&agrave;o thế cạnh tranh bất lợi.</p>\r\n<p>\r\n	Chi ph&iacute; của một trang web &iacute;t hơn nhiều khi so s&aacute;nh với c&aacute;c chi ph&iacute; li&ecirc;n quan đến c&aacute;c phương ph&aacute;p quảng c&aacute;o truyền thống như gửi mail trực tiếp, quảng c&aacute;o tr&ecirc;n b&aacute;o hay tạp ch&iacute;, radio v&agrave; truyền h&igrave;nh.</p>\r\n<p>\r\n	Website tạo ra cơ hội cung cấp cho kh&aacute;ch h&agrave;ng của bạn th&ocirc;ng tin mới nhất khi họ cần v&agrave; cho ph&eacute;p bạn tự do thay đổi sản phẩm, dịch vụ, v&agrave; th&ocirc;ng tin một c&aacute;ch kịp thời.</p>\r\n<p>\r\n	Bạn c&oacute; thể tạo ra th&ecirc;m một cơ hội khuyến kh&iacute;ch kh&aacute;ch h&agrave;ng gh&eacute; thăm cửa h&agrave;ng hoặc mua sản phẩm của bạn từ website bằng c&aacute;ch cung cấp cho họ Phiếu giảm gi&aacute; hay th&ocirc;ng tin khuyến mại trực tiếp tr&ecirc;n website</p>\r\n<p>\r\n	Cho ph&eacute;p tận dụng tiền quảng c&aacute;o bằng c&aacute;ch hiển thị địa chỉ website của bạn qua c&aacute;c h&igrave;nh thức kh&aacute;c của&nbsp; phương tiện truyền th&ocirc;ng. Nếu bạn sử dụng h&igrave;nh thức quảng c&aacute;o tốn k&eacute;m tr&ecirc;n radio, TV hay tờ rơi, chỉ c&oacute; một lượng th&ocirc;ng tin giới hạn được đưa v&agrave;o. Hiển thị địa chỉ website để hướng kh&aacute;ch h&agrave;ng truy cập v&agrave;o website của bạn, nơi bạn c&oacute; thể cung cấp đầy đủ th&ocirc;ng tin cho việc b&aacute;n h&agrave;ng.</p>\r\n<p>\r\n	Website l&agrave; nơi l&yacute; tưởng để giới thiệu danh s&aacute;ch &ldquo;Những c&acirc;u hỏi thường gặp&rdquo; của ch&iacute;nh bạn. Nghĩ ra c&acirc;u hỏi v&agrave; c&acirc;u trả lời, chi tiết như bạn th&iacute;ch v&agrave; ch&iacute;nh x&aacute;c như bạn muốn, c&oacute; thể cung cấp cho kh&aacute;ch h&agrave;ng sự gi&uacute;p đỡ ngay lập tức về c&acirc;u hỏi của họ v&agrave; giảm số lượng c&aacute;c cuộc gọi đến nh&acirc;n vi&ecirc;n dịch vụ kh&aacute;ch h&agrave;ng của bạn.</p>\r\n<p>\r\n	Kh&aacute;ch gh&eacute; thăm website của bạn c&oacute; thể download v&agrave; in ra nhiều loại t&agrave;i liệu. Bạn c&oacute; thể tiết kiệm chi ph&iacute; in ấn v&agrave; ph&acirc;n ph&aacute;t c&aacute;c t&agrave;i liệu như bản đồ, mẫu đăng k&yacute;, sản phẩm văn học, hướng dẫn lắp r&aacute;p,bản giới thiệu, phiếu giảm gi&aacute;, v&agrave; th&ocirc;ng tin li&ecirc;n lạc với nhiều đối tượng kh&aacute;ch h&agrave;ng.</p>\r\n<p>\r\n	Với gần 2 tỷ người d&ugrave;ng tr&ecirc;n to&agrave;n thế giới, sự phổ biến của Internet sẽ tiếp tục đ&aacute;ng kể. khi nhận thức dần được n&acirc;ng cao, người d&ugrave;ng sẽ mong đợi c&aacute;c c&ocirc;ng ty v&agrave; tổ chức c&oacute; website. Sự t&iacute;n nhiệm d&agrave;nh cho mỗi c&ocirc;ng ty thường được dựa tr&ecirc;n c&aacute;ch họ thể hiện tr&ecirc;n website..</p>\r\n<p>\r\n	Cho ph&eacute;p kh&aacute;ch h&agrave;ng của bạn truy cập v&agrave; t&igrave;m mua sản phẩm trực tuyến v&agrave; gi&uacute;p doanh số b&aacute;n h&agrave;ng tăng l&ecirc;n m&agrave; kh&ocirc;ng cần c&oacute; sự tham gia trực tiếp của bạn.</p>\r\n<p>\r\n	Giờ giấc b&acirc;y giờ kh&ocirc;ng c&ograve;n l&agrave; vấn đề nữa. Với một website, sản phẩm, dịch vụ, th&ocirc;ng tin của bạn trở sẽ lu&ocirc;n sẵn s&agrave;ng 24h một ng&agrave;y, 7 ng&agrave;y 1 tuần với bất cứ ai c&oacute; truy cập internet</p>\r\n<p>\r\n	<em>Theo cnywebsitesolutions</em></p>\r\n', 'Tư vấn thiết kế website', 'Tư vấn thiết kế website', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'page', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1c0c86e3ba97ab7e04ff3fb772059d6f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11', 1343498516, 'a:5:{s:9:"user_data";s:0:"";s:8:"username";s:12:"hoangminh123";s:7:"user_id";s:2:"26";s:12:"display_name";s:7:"Mr.Minh";s:9:"logged_in";b:1;}'),
('65895577908254ce0785e05e1501ce6a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1', 1343500477, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:12:"vanhung90_hd";s:7:"user_id";s:1:"7";s:12:"display_name";s:6:"HungPV";s:9:"logged_in";b:1;s:19:"user_activation_key";s:0:"";}');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `ci_terms`
--

INSERT INTO `ci_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(41, 'Y tế sức khỏe', 'y_tế_sức_khỏe', 0),
(2, 'Blogroll', 'blogroll', 0),
(17, 'Tin tức nổi bật', 'tin_tuc_noi_bat', 0),
(43, 'Bệnh thường gặp', 'bệnh_thường_gặp', 0),
(42, 'Chuyên đề đông y', 'chuyên_đề_đông_y', 0),
(40, 'Tin tức', 'tin_tức', 0),
(16, 'Tin tức tiêu biểu', 'tin_tuc_tieu_bieu', 0),
(18, 'Đông dược', 'đông_dược', 0),
(19, 'Mỹ phẩm', 'mỹ_phẩm', 0),
(20, 'Thực phẩm chức năng', 'thực_phẩm_chức_năng', 0),
(21, 'Rượu', 'rượu', 0),
(22, 'Trà thảo dược', 'trà_thảo_dược', 0),
(23, 'Bệnh cơ xương khớp', 'bệnh_cơ_xương_khớp', 0),
(24, 'Bệnh hô hấp - Tai mũi họng', 'bệnh_hô_hấp_tai_mũi_họng', 0),
(25, 'Bệnh tiêu hóa - Trĩ - Gan mật', 'bệnh_tiêu_hóa_trĩ_gan_mật', 0),
(26, 'Bệnh sinh dục - Tiết niệu', 'bệnh_sinh_dục_tiết_niệu', 0),
(27, 'Bệnh tim mạch - Huyết áp', 'bệnh_tim_mạch_huyết_áp', 0),
(28, 'Màng đắp mặt', 'màng_đắp_mặt', 0),
(29, 'Dầu gội đầu', 'dầu_gội_đầu', 0),
(30, 'Kem dưỡng da', 'kem_dưỡng_da', 0),
(31, 'Sữa rửa mặt', 'sữa_rửa_mặt', 0),
(32, 'Sữa tắm', 'sữa_tắm', 0),
(33, 'Sản phẩm nổi bật', 'sản_phẩm_nổi_bật', 0),
(34, 'Tuần hoàn não - Thần kinh', 'tuần_hoàn_não_thần_kinh', 0),
(35, 'Giới thiệu', 'giới_thiệu', 0),
(36, 'Tập đoàn', 'tập_đoàn', 0),
(37, 'Cơ cấu tổ chức', 'cơ_cấu_tổ_chức', 0),
(38, 'Thành tích', 'thành_tích', 0),
(39, 'Tổng giám đốc', 'tổng_giám_đốc', 0),
(44, 'Ăn kiêng theo bệnh', 'ăn_kiêng_theo_bệnh', 0),
(45, 'Tự xoa bóp bấm huyệt', 'tự_xoa_bóp_bấm_huyệt', 0),
(46, 'Làm đẹp', 'làm_đẹp', 0),
(47, 'Tư vấn khám bệnh', 'tư_vấn_khám_bệnh', 0),
(48, 'Phác đồ điều trị', 'phác_đồ_điều_trị', 0),
(49, 'Tự chữa bệnh tại nhà', 'tự_chữa_bệnh_tại_nhà', 0),
(50, 'Biện chứng luận trị', 'biện_chứng_luận_trị', 0),
(51, 'Tư vấn và giải đáp', 'tư_vấn_và_giải_đáp', 0),
(52, 'Sách', 'sách', 0),
(53, 'Văn học - Thơ ca', 'văn_học_thơ_ca', 0),
(54, 'Y học', 'y_học', 0),
(55, 'Khí công -Y võ dưỡng sinh', 'khí_công_y_võ_dưỡng_sinh', 0),
(56, 'Truyện ngắn', 'truyện_ngắn', 0),
(57, 'Báo tường', 'báo_tường', 0),
(58, 'Phật pháp tâm linh', 'phật_pháp_tâm_linh', 0);

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
(23, 20, 0),
(1, 1, 0),
(11, 16, 0),
(8, 17, 0),
(9, 16, 0),
(23, 23, 0),
(11, 17, 0),
(12, 16, 0),
(13, 33, 0),
(14, 33, 0),
(15, 33, 0),
(16, 33, 0),
(17, 33, 0),
(18, 33, 0),
(19, 23, 0),
(21, 24, 0),
(22, 25, 0),
(20, 23, 0),
(24, 23, 0),
(26, 21, 0),
(27, 21, 0),
(28, 34, 0),
(30, 5, 0),
(32, 36, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `ci_term_taxonomy`
--

INSERT INTO `ci_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(42, 42, 'category', 'Chuyên đề đông y', 41, 0),
(2, 2, 'link_category', '', 0, 7),
(17, 17, 'category', 'Tin tức nổi bật', 40, 0),
(43, 43, 'category', 'Bệnh thường gặp', 41, 0),
(41, 41, 'category', 'Y tế sức khỏe', 0, 0),
(40, 40, 'category', 'Tin tức', 0, 0),
(16, 16, 'category', 'Tin tức tiêu biểu', 40, 0),
(18, 18, 'catpro', 'Đông dược Bảo Long', 0, 0),
(19, 19, 'catpro', 'Mỹ phẩm', 0, 0),
(20, 20, 'catpro', 'Thực phẩm chức năng', 0, 0),
(21, 21, 'catpro', 'Rượu', 0, 0),
(22, 22, 'catpro', 'Trà thảo dược', 0, 0),
(23, 23, 'catpro', 'Bệnh cơ xương khớp', 18, 0),
(24, 24, 'catpro', 'Bệnh hô hấp - Tai mũi họng', 18, 0),
(25, 25, 'catpro', 'Bệnh tiêu hóa - Trĩ - Gan mật', 18, 0),
(26, 26, 'catpro', 'Bệnh sinh dục - Tiết niệu', 18, 0),
(27, 27, 'catpro', 'Bệnh tim mạch - Huyết áp', 18, 0),
(28, 28, 'catpro', 'Màng đắp mặt', 19, 0),
(29, 29, 'catpro', 'Dầu gội đầu', 19, 0),
(30, 30, 'catpro', 'Kem dưỡng da', 19, 0),
(31, 31, 'catpro', 'Sữa rửa mặt', 19, 0),
(32, 32, 'catpro', 'Sữa tắm', 19, 0),
(33, 33, 'catpro', 'Sản phẩm nổi bật', 0, 0),
(34, 34, 'catpro', 'Tuần hoàn não - Thần kinh', 18, 0),
(35, 35, 'category', 'Giới thiệu', 0, 0),
(36, 36, 'category', 'Tập đoàn', 35, 0),
(37, 37, 'category', 'Cơ cấu tổ chức', 35, 0),
(38, 38, 'category', 'Thành tích', 35, 0),
(39, 39, 'category', 'Tổng giám đốc', 35, 0),
(44, 44, 'category', 'Ăn kiêng theo bệnh', 41, 0),
(45, 45, 'category', 'Tự xoa bóp bấm huyệt', 41, 0),
(46, 46, 'category', 'Làm đẹp', 41, 0),
(47, 47, 'category', 'Tư vấn khám bệnh', 0, 0),
(48, 48, 'category', 'Phác đồ điều trị', 47, 0),
(49, 49, 'category', 'Tự chữa bệnh tại nhà', 47, 0),
(50, 50, 'category', 'Biện chứng luận trị', 47, 0),
(51, 51, 'category', 'Tư vấn và giải đáp', 47, 0),
(52, 52, 'category', 'Sách', 0, 0),
(53, 53, 'category', 'Văn học - Thơ ca', 52, 0),
(54, 54, 'category', 'Y học', 52, 0),
(55, 55, 'category', 'Khí công - Y võ dưỡng sinh', 52, 0),
(56, 56, 'category', 'Truyện ngắn', 0, 0),
(57, 57, 'category', 'Báo tường', 0, 0),
(58, 58, 'category', 'Phật pháp tâm linh', 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=404 ;

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
(18, 6, 'group', 'butdanh'),
(19, 7, 'group', 'thanhvien'),
(20, 8, 'group', 'thanhvien'),
(21, 9, 'group', 'thanhvien'),
(26, 14, 'group', 'hoivien'),
(73, 14, 'group', 'hoivien'),
(74, 14, 'parent', 'admin'),
(75, 14, 'boothtitle', 'Gianhang'),
(76, 14, 'vcoin', '18'),
(77, 14, 'chooseuser', 'vanhung90'),
(78, 14, 'birthdate', '23/12/1989'),
(79, 14, 'bank', 'BANK'),
(80, 14, 'atm', 'STK'),
(81, 14, 'phone', 'DT'),
(82, 14, 'noio', 'NO'),
(83, 14, 'dctt', 'DCTT'),
(84, 14, 'cmt', 'CMT'),
(85, 14, 'sex', '0'),
(86, 26, 'group', 'hoivien'),
(87, 26, 'parent', 'admin'),
(88, 26, 'boothtitle', 'Gianhang'),
(89, 26, 'vcoin', '18'),
(90, 26, 'chooseuser', 'vanhung90'),
(91, 26, 'birthdate', '23/12/1989'),
(92, 26, 'bank', 'BANK'),
(93, 26, 'atm', 'STK'),
(94, 26, 'phone', 'DT'),
(95, 26, 'noio', 'NO'),
(96, 26, 'dctt', 'DCTT'),
(97, 26, 'cmt', 'CMT'),
(98, 26, 'sex', '0'),
(99, 27, 'group', 'hoivien'),
(100, 27, 'parent', 'admin'),
(101, 27, 'boothtitle', 'Gianhang'),
(102, 27, 'vcoin', '3'),
(103, 27, 'chooseuser', 'minhhv'),
(104, 27, 'birthdate', '23/12/1989'),
(105, 27, 'bank', 'BANK'),
(106, 27, 'atm', 'STK'),
(107, 27, 'phone', 'DT'),
(108, 27, 'noio', 'NO'),
(109, 27, 'dctt', 'DCTT'),
(110, 27, 'cmt', 'CMT'),
(111, 27, 'sex', '0'),
(112, 28, 'group', 'hoivien'),
(113, 28, 'parent', 'vanhung90_hd'),
(114, 28, 'boothtitle', 'a'),
(115, 28, 'vcoin', '18'),
(116, 28, 'chooseuser', 'vanhung90_hd'),
(117, 28, 'birthdate', '23/12/1989'),
(118, 28, 'bank', 'BANK'),
(119, 28, 'atm', 'STK'),
(120, 28, 'phone', 'DT'),
(121, 28, 'noio', 'NO'),
(122, 28, 'dctt', 'DCTT'),
(123, 28, 'cmt', 'CMT'),
(124, 28, 'sex', '1'),
(125, 29, 'group', 'hoivien'),
(126, 29, 'parent', 'vanhung90_hd'),
(127, 29, 'boothtitle', 'a'),
(128, 29, 'vcoin', '18'),
(129, 29, 'chooseuser', 'vanhung90_hd'),
(130, 29, 'birthdate', '23/12/1989'),
(131, 29, 'bank', 'BANK'),
(132, 29, 'atm', 'STK'),
(133, 29, 'phone', 'DT'),
(134, 29, 'noio', 'NO'),
(135, 29, 'dctt', 'DCTT'),
(136, 29, 'cmt', 'CMT'),
(137, 29, 'sex', '1'),
(138, 30, 'group', 'hoivien'),
(139, 30, 'parent', 'hoangminh'),
(140, 30, 'boothtitle', 'a'),
(141, 30, 'vcoin', '18'),
(142, 30, 'chooseuser', 'hoangminh'),
(143, 30, 'birthdate', '23/12/1989'),
(144, 30, 'bank', 'BANK'),
(145, 30, 'atm', 'STK'),
(146, 30, 'phone', 'DT'),
(147, 30, 'noio', 'NO'),
(148, 30, 'dctt', 'DCTT'),
(149, 30, 'cmt', 'CMT'),
(150, 30, 'sex', '1'),
(151, 31, 'group', 'hoivien'),
(152, 31, 'parent', 'hoangminh123'),
(153, 31, 'boothtitle', 'a'),
(154, 31, 'vcoin', '18'),
(155, 31, 'chooseuser', 'hoangminh123'),
(156, 31, 'birthdate', '23/12/1989'),
(157, 31, 'bank', 'BANK'),
(158, 31, 'atm', 'STK'),
(159, 31, 'phone', 'DT'),
(160, 31, 'noio', 'NO'),
(161, 31, 'dctt', 'DCTT'),
(162, 31, 'cmt', 'CMT'),
(163, 31, 'sex', '1'),
(164, 32, 'group', 'hoivien'),
(165, 32, 'parent', 'vinhnt'),
(166, 32, 'boothtitle', 'Gianhang'),
(167, 32, 'vcoin', '18'),
(168, 32, 'chooseuser', 'hoangminh123'),
(169, 32, 'birthdate', 'l;l'),
(170, 32, 'bank', ''),
(171, 32, 'atm', 'STK'),
(172, 32, 'phone', 'DT'),
(173, 32, 'noio', 'NO'),
(174, 32, 'dctt', 'DCTT'),
(175, 32, 'cmt', 'CMT'),
(176, 32, 'sex', '1'),
(177, 33, 'group', 'hoivien'),
(178, 33, 'parent', 'cuccungqsssa'),
(179, 33, 'boothtitle', 'Gianhang'),
(180, 33, 'vcoin', '18'),
(181, 33, 'chooseuser', 'hoangminh1234'),
(182, 33, 'birthdate', '23/12/1989'),
(183, 33, 'bank', 'BANK'),
(184, 33, 'atm', 'STK'),
(185, 33, 'phone', 'DT'),
(186, 33, 'noio', 'NO'),
(187, 33, 'dctt', 'DCTT'),
(188, 33, 'cmt', 'CMT'),
(189, 33, 'sex', '0'),
(190, 34, 'group', 'hoivien'),
(191, 34, 'parent', 'hoangminh1123'),
(192, 34, 'boothtitle', 'sađ'),
(193, 34, 'vcoin', '18'),
(194, 34, 'chooseuser', 'hoangminh1123'),
(195, 34, 'birthdate', '23/12/1989'),
(196, 34, 'bank', 'BANK'),
(197, 34, 'atm', 'STK'),
(198, 34, 'phone', 'DT'),
(199, 34, 'noio', 'NO'),
(200, 34, 'dctt', 'DCTT'),
(201, 34, 'cmt', 'CMT'),
(202, 34, 'sex', '1'),
(203, 35, 'group', 'hoivien'),
(204, 35, 'parent', 'hoangminh1234'),
(205, 35, 'boothtitle', 'Gianhang'),
(206, 35, 'vcoin', '18'),
(207, 35, 'chooseuser', 'hoangminh1234'),
(208, 35, 'birthdate', '23/12/1989'),
(209, 35, 'bank', 'BANK'),
(210, 35, 'atm', 'STK'),
(211, 35, 'phone', 'DT'),
(212, 35, 'noio', 'NO'),
(213, 35, 'dctt', 'DCTT'),
(214, 35, 'cmt', 'CMT'),
(215, 35, 'sex', '1'),
(216, 36, 'group', 'hoivien'),
(217, 36, 'parent', 'admin'),
(218, 36, 'boothtitle', 'Gianhang'),
(219, 36, 'vcoin', '18'),
(220, 36, 'chooseuser', 'hoangminh'),
(221, 36, 'birthdate', '23/12/1989'),
(222, 36, 'bank', 'BANK'),
(223, 36, 'atm', 'STK'),
(224, 36, 'phone', 'DT'),
(225, 36, 'noio', 'NO'),
(226, 36, 'dctt', 'DCTT'),
(227, 36, 'cmt', 'CMT'),
(228, 36, 'sex', '1'),
(229, 37, 'group', 'hoivien'),
(230, 37, 'parent', 'admin'),
(231, 37, 'boothtitle', 'Gianhang'),
(232, 37, 'vcoin', '18'),
(233, 37, 'chooseuser', 'cuchuoi'),
(234, 37, 'birthdate', '23/12/1989'),
(235, 37, 'bank', 'BANK'),
(236, 37, 'atm', 'STK'),
(237, 37, 'phone', 'DT'),
(238, 37, 'noio', 'NO'),
(239, 37, 'dctt', 'DCTT'),
(240, 37, 'cmt', 'CMT'),
(241, 37, 'sex', '1'),
(242, 38, 'group', 'hoivien'),
(243, 38, 'parent', 'cuccung'),
(244, 38, 'boothtitle', 'Gianhang'),
(245, 38, 'vcoin', '18'),
(246, 38, 'chooseuser', 'cuccung'),
(247, 38, 'birthdate', '23/12/1989'),
(248, 38, 'bank', 'BANK'),
(249, 38, 'atm', 'STK'),
(250, 38, 'phone', 'DT'),
(251, 38, 'noio', 'NO'),
(252, 38, 'dctt', 'DCTT'),
(253, 38, 'cmt', 'CMT'),
(254, 38, 'sex', '1'),
(255, 39, 'group', 'hoivien'),
(256, 39, 'parent', 'cuccung'),
(257, 39, 'boothtitle', 'Gianhang'),
(258, 39, 'vcoin', '18'),
(259, 39, 'chooseuser', 'cuccung'),
(260, 39, 'birthdate', '23/12/1989'),
(261, 39, 'bank', 'BANK'),
(262, 39, 'atm', 'STK'),
(263, 39, 'phone', 'DT'),
(264, 39, 'noio', 'NO'),
(265, 39, 'dctt', 'DCTT'),
(266, 39, 'cmt', 'CMT'),
(267, 39, 'sex', '1'),
(268, 40, 'group', 'hoivien'),
(269, 40, 'parent', 'cuchuoi'),
(270, 40, 'boothtitle', 'Gianhang'),
(271, 40, 'vcoin', '18'),
(272, 40, 'chooseuser', 'cuchuoi'),
(273, 40, 'birthdate', '23/12/1989'),
(274, 40, 'bank', 'BANK'),
(275, 40, 'atm', 'STK'),
(276, 40, 'phone', 'DT'),
(277, 40, 'noio', 'NO'),
(278, 40, 'dctt', 'DCTT'),
(279, 40, 'cmt', 'CMT'),
(280, 40, 'sex', '0'),
(281, 41, 'group', 'hoivien'),
(282, 41, 'parent', 'cuchuoi'),
(283, 41, 'boothtitle', 'Gianhang'),
(284, 41, 'vcoin', '18'),
(285, 41, 'chooseuser', 'cuccungq'),
(286, 41, 'birthdate', '23/12/1989'),
(287, 41, 'bank', 'BANK'),
(288, 41, 'atm', 'STK'),
(289, 41, 'phone', 'DT'),
(290, 41, 'noio', 'NO'),
(291, 41, 'dctt', 'DCTT'),
(292, 41, 'cmt', 'CMT'),
(293, 41, 'sex', '1'),
(294, 42, 'group', 'hoivien'),
(295, 42, 'parent', 'mmmm'),
(296, 42, 'boothtitle', 'Gianhang'),
(297, 42, 'vcoin', '18'),
(298, 42, 'chooseuser', 'mmmm'),
(299, 42, 'birthdate', '23/12/1989'),
(300, 42, 'bank', 'BANK'),
(301, 42, 'atm', 'STK'),
(302, 42, 'phone', 'DT'),
(303, 42, 'noio', 'NO'),
(304, 42, 'dctt', 'DCTT'),
(305, 42, 'cmt', 'CMT'),
(306, 42, 'sex', '1'),
(307, 43, 'group', 'hoivien'),
(308, 43, 'parent', 'camback'),
(309, 43, 'boothtitle', 'Gianhang'),
(310, 43, 'vcoin', '18'),
(311, 43, 'chooseuser', 'camback'),
(312, 43, 'birthdate', '23/12/1989'),
(313, 43, 'bank', 'BANK'),
(314, 43, 'atm', 'STK'),
(315, 43, 'phone', 'DT'),
(316, 43, 'noio', 'NO'),
(317, 43, 'dctt', 'DCTT'),
(318, 43, 'cmt', 'CMT'),
(319, 43, 'sex', '1'),
(320, 44, 'group', 'hoivien'),
(321, 44, 'parent', 'camback'),
(322, 44, 'boothtitle', 'Gianhang'),
(323, 44, 'vcoin', '18'),
(324, 44, 'chooseuser', 'camback'),
(325, 44, 'birthdate', '23/12/1989'),
(326, 44, 'bank', 'BANK'),
(327, 44, 'atm', 'STK'),
(328, 44, 'phone', 'DT'),
(329, 44, 'noio', 'NO'),
(330, 44, 'dctt', 'DCTT'),
(331, 44, 'cmt', 'CMT'),
(332, 44, 'sex', '1'),
(333, 45, 'group', 'hoivien'),
(334, 45, 'parent', 'vinhnt'),
(335, 45, 'boothtitle', 'Gianhang'),
(336, 45, 'vcoin', '18'),
(337, 45, 'chooseuser', 'vinhnt'),
(338, 45, 'birthdate', '23/12/1989'),
(339, 45, 'bank', 'BANK'),
(340, 45, 'atm', 'STK'),
(341, 45, 'phone', 'DT'),
(342, 45, 'noio', 'NO'),
(343, 45, 'dctt', 'DCTT'),
(344, 45, 'cmt', 'CMT'),
(345, 45, 'sex', '1'),
(346, 46, 'group', 'hoivien'),
(347, 46, 'parent', 'vinhnt'),
(348, 46, 'boothtitle', 'Gianhang'),
(349, 46, 'vcoin', '18'),
(350, 46, 'chooseuser', 'vinhnt'),
(351, 46, 'birthdate', '23/12/1989'),
(352, 46, 'bank', 'BANK'),
(353, 46, 'atm', 'STK'),
(354, 46, 'phone', 'DT'),
(355, 46, 'noio', 'NO'),
(356, 46, 'dctt', 'DCTT'),
(357, 46, 'cmt', 'CMT'),
(358, 46, 'sex', '1'),
(359, 47, 'group', 'hoivien'),
(360, 47, 'parent', 'vanhung90_hd'),
(361, 47, 'boothtitle', 'LongLD'),
(362, 47, 'vcoin', '18'),
(363, 47, 'chooseuser', 'cuccungq'),
(364, 47, 'birthdate', '02/08/1987'),
(365, 47, 'bank', 'Vietcombank'),
(366, 47, 'atm', '989898987'),
(367, 47, 'phone', '0989877876'),
(368, 47, 'noio', 'Hà Nội'),
(369, 47, 'dctt', 'Hà Nội'),
(370, 47, 'cmt', '090987878'),
(371, 47, 'sex', '1'),
(372, 47, 'capdodiemthuong', '0'),
(373, 47, 'ongheo', '0'),
(374, 48, 'group', 'thanhvien'),
(375, 48, 'parent', NULL),
(376, 48, 'boothtitle', NULL),
(377, 48, 'vcoin', '18'),
(378, 48, 'chooseuser', NULL),
(379, 48, 'birthdate', NULL),
(380, 48, 'bank', NULL),
(381, 48, 'atm', NULL),
(382, 48, 'phone', NULL),
(383, 48, 'noio', NULL),
(384, 48, 'dctt', NULL),
(385, 48, 'cmt', NULL),
(386, 48, 'sex', NULL),
(387, 48, 'capdodiemthuong', '0'),
(388, 48, 'ongheo', '0'),
(389, 49, 'group', 'thanhvien'),
(390, 49, 'parent', NULL),
(391, 49, 'boothtitle', NULL),
(392, 49, 'vcoin', '18'),
(393, 49, 'chooseuser', NULL),
(394, 49, 'birthdate', NULL),
(395, 49, 'bank', NULL),
(396, 49, 'atm', NULL),
(397, 49, 'phone', NULL),
(398, 49, 'noio', NULL),
(399, 49, 'dctt', NULL),
(400, 49, 'cmt', NULL),
(401, 49, 'sex', NULL),
(402, 49, 'capdodiemthuong', '0'),
(403, 49, 'ongheo', '0');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'admin', 'vinhnt@tasvis.com.vn', '', '2012-06-12 15:26:34', 'administrator', 0, 'Nguyễn Tất Vinh'),
(2, '', '', 'Viết Thịnh', '', '', '0000-00-00 00:00:00', '', 0, 'Viết Thịnh'),
(3, '', '', 'Anh Thư', '', '', '0000-00-00 00:00:00', '', 0, 'Anh Thư'),
(4, '', '', 'Lê Phi', '', '', '0000-00-00 00:00:00', '', 0, 'Lê Phi'),
(5, '', '', 'Vạn Bảo', '', '', '0000-00-00 00:00:00', '', 0, 'Vạn Bảo'),
(6, '', '', 'Hoàng Giang', '', '', '0000-00-00 00:00:00', '', 0, 'Hoàng Giang'),
(7, 'vanhung90_hd', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Văn Hưng', 'phamvanhung0818@gmail.com', '', '0000-00-00 00:00:00', '', 0, 'HungPV'),
(8, 'vinhnt', 'vinhnt', 'Nguyễn Tất Vinh', 'vinhnt333@yahoo.com', '', '0000-00-00 00:00:00', '', 0, 'Nguyễn Tất Vinh'),
(9, 'minhhv', '', 'Hà Văn Minh', 'minhhv@yahoo.com.vn', '', '2012-06-23 08:41:02', '', 0, 'Hà Văn Minh'),
(25, 'hoangminh', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-21 03:17:21', '', 0, 'Mr.Minh'),
(14, 'vanhung90', '', 'vanhung90', 'vanhung90_hd@yahoo.com', '', '2012-06-23 04:51:01', '', 0, 'Phạm Văn Hưng'),
(26, 'hoangminh123', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-21 03:20:53', '', 0, 'Mr.Minh'),
(27, 'hoangminh1234', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-21 03:21:59', '', 0, 'Mr.Minh'),
(28, 'cuccung', 'fcea920f7412b5da7be0cf42b8c93759', 'da', 'vanminh@gmail.com', '', '2012-07-25 02:24:15', '', 0, 'Mr.Minh'),
(29, 'cuccungq', 'fcea920f7412b5da7be0cf42b8c93759', 'da', 'vanminh@gmail.com', '', '2012-07-25 02:26:22', '', 0, 'Mr.Minh'),
(30, 'cuccungqsss', 'fcea920f7412b5da7be0cf42b8c93759', 'da', 'vanminh@gmail.com', '', '2012-07-25 02:27:57', '', 0, 'Mr.Minh'),
(31, 'cuccungqsssa', 'fcea920f7412b5da7be0cf42b8c93759', 'da', 'vanminh@gmail.com', '', '2012-07-25 02:35:13', '', 0, 'Mr.Minh'),
(32, 'abckdhdh', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 02:39:51', '', 0, 'Mr.Minh'),
(33, 'hoangminh1123', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 02:46:00', '', 0, 'Mr.Minh'),
(34, 'sddreád', 'fcea920f7412b5da7be0cf42b8c93759', 'd', 'vanminh@gmail.com', '', '2012-07-25 02:47:27', '', 0, 'Mr.Minh'),
(35, 'cuchuoi', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:37:07', '', 0, 'Mr.Minh'),
(36, 'cuchuoiq', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:38:19', '', 0, 'Mr.Minh'),
(37, 'cuchuoiq1', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:40:43', '', 0, 'Mr.Minh'),
(38, 'cuchuoiq12', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:41:26', '', 0, 'Mr.Minh'),
(39, 'cuchuoiq123', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:42:36', '', 0, 'Mr.Minh'),
(40, 'abc', 'fcea920f7412b5da7be0cf42b8c93759', 'ặd', 'vanminh@gmail.com', '', '2012-07-25 07:51:13', '', 0, 'Mr.Minh'),
(41, 'mmmm', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 07:57:23', '', 0, 'Mr.Minh'),
(42, 'camback', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 08:01:19', '', 0, 'Mr.Minh'),
(43, 'camback1', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 08:02:46', '', 0, 'Mr.Minh'),
(44, 'camback2', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 08:03:54', '', 0, 'Mr.Minh'),
(45, 'camback22', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 08:07:08', '', 0, 'Mr.Minh'),
(46, 'camback223', 'fcea920f7412b5da7be0cf42b8c93759', 'Hà Văn Minh', 'vanminh@gmail.com', '', '2012-07-25 08:07:25', '', 0, 'Mr.Minh'),
(47, 'duclong', 'fcea920f7412b5da7be0cf42b8c93759', 'Long', 'longld@gmail.com', '', '2012-07-28 02:18:44', '', 0, 'LongLD'),
(48, 'namnam', 'fcea920f7412b5da7be0cf42b8c93759', 'LÊ NAM', 'nam@gmail.com', '', '2012-07-28 06:41:10', '', 0, 'LÊ NAM'),
(49, 'nmanmamamana', 'fcea920f7412b5da7be0cf42b8c93759', 'LÊ NAM', 'namg@Gmai.com', '', '2012-07-28 06:41:35', '', 0, 'Lê Nam');

-- --------------------------------------------------------

--
-- Table structure for table `ci_yeucauquydoi`
--

DROP TABLE IF EXISTS `ci_yeucauquydoi`;
CREATE TABLE IF NOT EXISTS `ci_yeucauquydoi` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `vcoin` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_process` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=armscii8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ci_yeucauquydoi`
--

