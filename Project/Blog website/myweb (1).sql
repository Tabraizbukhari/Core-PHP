-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 04:17 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `abtid` int(11) NOT NULL,
  `abtimage` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `abthead` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `abttxt` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`abtid`, `abtimage`, `abthead`, `abttxt`) VALUES
(1, '../admin/uploads/about/blog-4.jpg', 'my1st', 'asdgfasd'),
(2, '../admin/uploads/about/bg_3.jpg', 'About', 'A story is the tA story is the telling offsd true or  A story is the telling offsd true or  A story is the telling offsd true or  A story is the telling offsd true or  elling offsd true or    '),
(3, '../admin/uploads/about/blog-3.jpg', 'About stories', 'A story is the telling of an event, either true or fictional, in such a way that the listener experiences or learns something just by the fact that he heard the story.'),
(4, '../admin/uploads/about/bg_1.jpg', 'my1st', 'asdfs');

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(6) UNSIGNED NOT NULL,
  `head` varchar(30) NOT NULL,
  `backimg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `head`, `backimg`) VALUES
(4, 'aa', '../admin/uploads/background/blog-6.jpg'),
(5, 'dfsgs', '../admin/uploads/backgroundimage_1.jpg'),
(6, 'dfas', '../admin/uploads/backgroundcategory-2.jpg'),
(7, 'fdg', '../admin/uploads/backgroundcategory-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `adminreply`
--

CREATE TABLE `adminreply` (
  `adminid` int(11) NOT NULL,
  `aname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `aemail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `atext` varchar(5000) CHARACTER SET utf8 DEFAULT NULL,
  `adate` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `atime` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminreply`
--

INSERT INTO `adminreply` (`adminid`, `aname`, `aemail`, `atext`, `adate`, `atime`, `userid`, `blogid`) VALUES
(124, 'Admin', 'hello@gmail.coms', 'letterletterletterletter', '19-12-27', '02:29:10am', 95, 49),
(127, 'Admin', 'hello@gmail.coms', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth', '19-12-27', '02:33:25am', 95, 49),
(128, 'Admin', '', 'letterletterletterletter', '19-12-27', '02:33:41am', 98, 49),
(129, 'Admin', 'hello@gmail.coms', 'sd', '19-12-27', '03:03:01am', 98, 49),
(130, 'Admin', 'hello@gmail.coms', 'sdff', '19-12-27', '03:03:16am', 95, 49),
(131, 'Admin', 'hello@gmail.coms', 'fdf', '19-12-27', '03:03:31am', 98, 49);

-- --------------------------------------------------------

--
-- Table structure for table `admin_message`
--

CREATE TABLE `admin_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `head` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `messages` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `back_img` varchar(5000) CHARACTER SET utf8 DEFAULT NULL,
  `message_date` date NOT NULL,
  `writer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articalpage`
--

CREATE TABLE `articalpage` (
  `arid` int(11) NOT NULL,
  `head` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `background` varchar(5000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articalpage`
--

INSERT INTO `articalpage` (`arid`, `head`, `background`) VALUES
(2, 'MY', '../admin/uploads/background/blog-4.jpg'),
(4, 'my2ndblogdfdgfg', '../admin/uploads/background/blog-5.jpg'),
(5, 'sdf dfs', '../admin/uploads/backgroundblog-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `blogpara` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `bloghead` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `blogcategory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `blogtag` varchar(200) NOT NULL,
  `blogimg` varchar(1000) NOT NULL,
  `blog_date_time` varchar(50) DEFAULT NULL,
  `Blogauthor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `blogpara`, `bloghead`, `blogcategory`, `blogtag`, `blogimg`, `blog_date_time`, `Blogauthor`) VALUES
(48, 'my1stmy1stmy1stmy1st my1stmy1st my1st my1st my1st', 'my1st', 'foods', '', '../admin/uploads/blogs/screenshot.JPG', '2019-12-26', 'Tabraiz'),
(49, 'etter', 'my1st l', 'holiday', '', '../admin/uploads/blogs/screenshot.JPG', '2019-12-26', 'Tabraiz'),
(50, 'feafeafeafea', 'my feature', 'feature', '', '../admin/uploads/blogs/screenshot.JPG', '2019-12-26', 'Tabraiz');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(6) UNSIGNED NOT NULL,
  `head` varchar(50) NOT NULL,
  `categories_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pagelink` varchar(500) CHARACTER SET utf8 NOT NULL,
  `cate_img` varchar(5000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `head`, `categories_name`, `pagelink`, `cate_img`) VALUES
(34, 'Categories', 'features', 'https://www.foods.com/', '../admin/uploads/sliderbg_4.jpg'),
(35, 'Categories', 'holiday', 'https://www.foods.com/', '../admin/uploads/sliderbg_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clientcontacts`
--

CREATE TABLE `clientcontacts` (
  `id` int(11) NOT NULL,
  `client_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `client_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `client_sub` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `client_text` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactpage`
--

CREATE TABLE `contactpage` (
  `id` int(11) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `back_img` varchar(5000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactpage`
--

INSERT INTO `contactpage` (`id`, `head`, `back_img`) VALUES
(5, 'contact', '../admin/uploads/backgroundcategory-1.jpg'),
(8, 'co', '../admin/uploads/backgroundcategory-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `footerabt`
--

CREATE TABLE `footerabt` (
  `id` int(6) UNSIGNED NOT NULL,
  `head` varchar(50) CHARACTER SET utf8 NOT NULL,
  `para` varchar(500) CHARACTER SET utf8 NOT NULL,
  `facebook_link` varchar(500) CHARACTER SET utf8 NOT NULL,
  `instagram_link` varchar(500) CHARACTER SET utf8 NOT NULL,
  `twitter_link` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footerabt`
--

INSERT INTO `footerabt` (`id`, `head`, `para`, `facebook_link`, `instagram_link`, `twitter_link`) VALUES
(4, 'Tasty & Delicious Foods', 'inside the control (as if it were the value) only while the control has no real value. When the user starts typing, the placeholder text will be removed from the control.', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/');

-- --------------------------------------------------------

--
-- Table structure for table `helpinfo`
--

CREATE TABLE `helpinfo` (
  `id` int(11) NOT NULL,
  `head` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `page_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `page_link` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helpinfo`
--

INSERT INTO `helpinfo` (`id`, `head`, `page_name`, `page_link`) VALUES
(7, 'Informations', 'Terms', 'https://www.w3schools.com/'),
(8, 'Informations', 'conditions', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo` varchar(5000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo`) VALUES
(1, '../admin/uploads/logoscreenshot.JPG'),
(2, '../admin/uploads/logotumblr_p80o130NIX1u1s5pfo2_250.jpg'),
(3, 'Stories');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `pagename` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(5000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `pagename`, `link`) VALUES
(4, 'Home', 'index.php'),
(5, 'Foods', 'foods.php?page=1'),
(6, 'About', 'about.php'),
(7, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `letterid` int(6) UNSIGNED NOT NULL,
  `letterhead` varchar(30) CHARACTER SET utf8 NOT NULL,
  `letterpara` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`letterid`, `letterhead`, `letterpara`) VALUES
(2, 'letter', 'letterletterletterletter'),
(3, 'NEWSLETTER ', 'A small river named Duden flows by their place and sd'),
(4, 'my2ndblog', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth');

-- --------------------------------------------------------

--
-- Table structure for table `pageinfo`
--

CREATE TABLE `pageinfo` (
  `id` int(6) UNSIGNED NOT NULL,
  `head` varchar(100) NOT NULL,
  `page_address` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `page_mail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pageinfo`
--

INSERT INTO `pageinfo` (`id`, `head`, `page_address`, `phone_number`, `page_mail`) VALUES
(11, 'Page informations', 'house A8 phase 1', '03062145235', 'm.tabraizbukhari@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `singlepage`
--

CREATE TABLE `singlepage` (
  `id` int(6) UNSIGNED NOT NULL,
  `head` varchar(30) NOT NULL,
  `backimg` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singlepage`
--

INSERT INTO `singlepage` (`id`, `head`, `backimg`) VALUES
(5, 'my2ndblogsd', '../admin/uploads/background/blog-5.jpg'),
(6, 'Tasty & Delicious Foods', '../admin/uploads/backgroundcategory-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderid` int(11) NOT NULL,
  `sliderimage` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `shead` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `scategory` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `stext` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sliderid`, `sliderimage`, `shead`, `scategory`, `stext`) VALUES
(105, '../admin/uploads/sliderbg_2.jpg', 'MY', 'asd', 'sdfdf'),
(108, '../admin/uploads/sliderbg_4.jpg', 'MY FOODS', 'feature post', 'fav foods'),
(109, '../admin/uploads/sliderbg_4.jpg', 'MY FOODS', 'Foodie', 'asdfdf'),
(110, '../admin/uploads/sliderblog-7.jpg', '2nd slider', 'feature post', 'fav foods');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(2, 'hello@gmail.coms'),
(3, 'hello@gmail.coms'),
(4, 'facebook@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `userimage` varchar(6000) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `useremail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `userpassword` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `passcom` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `userage` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `useraddress` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `usercity` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `userphone` int(50) DEFAULT NULL,
  `userabout` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `userimage`, `username`, `useremail`, `userpassword`, `passcom`, `userage`, `useraddress`, `usercity`, `userphone`, `userabout`) VALUES
(1, '../admin/uploads/blogs/person_4.jpg', 'Tabraiz', 'hello@gmail.coms', 'sd', 'sd', '', '', '', 0, '                                                                                                                                                                                    '),
(15, '../admin/uploads/icon/reg.jpg', 'hello', 'hello@gmail.com', '12', '12', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `usercomment`
--

CREATE TABLE `usercomment` (
  `userid` int(11) NOT NULL,
  `blogid` int(11) DEFAULT NULL,
  `uname` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `uemail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `uweb` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `utext` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `udate` date NOT NULL,
  `utime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercomment`
--

INSERT INTO `usercomment` (`userid`, `blogid`, `uname`, `uemail`, `uweb`, `utext`, `udate`, `utime`) VALUES
(95, 49, 'Tabraiz Bukhari', 'm.tabraizbukhari@gmail.com', 'https://www.jquery-az.com/php-string-uppercase-low', 'sdsd', '2019-12-26', '11:25:44'),
(98, 49, 'foodes', 'm.tabraizbukhari@gmail.com', 'https://www.jquery-az.com/php-string-uppercase-low', 'sdsd', '2019-12-26', '11:25:44'),
(99, 49, 'Foodie', 'm.tabraizbukhari@gmail.com', 'https://www.jquery-az.com/php-string-uppercase-low', 'foodie foodie', '2019-12-27', '02:49:18'),
(100, 49, 'my blogs', 'blog@gmail.com', 'https://www.google.com/', 'today my 1st blog', '2019-12-27', '03:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`abtid`);

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminreply`
--
ALTER TABLE `adminreply`
  ADD PRIMARY KEY (`adminid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `admin_message`
--
ALTER TABLE `admin_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articalpage`
--
ALTER TABLE `articalpage`
  ADD PRIMARY KEY (`arid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientcontacts`
--
ALTER TABLE `clientcontacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactpage`
--
ALTER TABLE `contactpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerabt`
--
ALTER TABLE `footerabt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helpinfo`
--
ALTER TABLE `helpinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`letterid`);

--
-- Indexes for table `pageinfo`
--
ALTER TABLE `pageinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singlepage`
--
ALTER TABLE `singlepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderid`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `usercomment`
--
ALTER TABLE `usercomment`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `abtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `adminreply`
--
ALTER TABLE `adminreply`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `admin_message`
--
ALTER TABLE `admin_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `articalpage`
--
ALTER TABLE `articalpage`
  MODIFY `arid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `clientcontacts`
--
ALTER TABLE `clientcontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactpage`
--
ALTER TABLE `contactpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `footerabt`
--
ALTER TABLE `footerabt`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `helpinfo`
--
ALTER TABLE `helpinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `letterid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pageinfo`
--
ALTER TABLE `pageinfo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `singlepage`
--
ALTER TABLE `singlepage`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usercomment`
--
ALTER TABLE `usercomment`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminreply`
--
ALTER TABLE `adminreply`
  ADD CONSTRAINT `adminreply_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `usercomment` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
