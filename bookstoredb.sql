-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 20, 2022 at 12:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `book_author` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` text COLLATE latin1_general_ci DEFAULT NULL,
  `book_descr` text COLLATE latin1_general_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisherid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisherid`) VALUES
('978-0-321-94786-4', 'Learning Mobile App Development', 'Jakob Iversen, Michael Eierman', 'mobile_app.jpg', 'Now, one book can help you master mobile app development with both market-leading platforms: Apple iOS and Google Android. Perfect for both students and professionals, Learning Mobile App Development is the only tutorial with complete parallel coverage of both iOS and Android. With this guide, you can master either platform, or both - and gain a deeper understanding of the issues associated with developing mobile apps.\r\n\r\nYou will develop an actual working app on both iOS and Android, mastering the entire mobile app development lifecycle, from planning through licensing and distribution.\r\n\r\nEach tutorial in this book has been carefully designed to support readers with widely varying backgrounds and has been extensively tested in live developer training courses. If you are new to iOS, you will also find an easy, practical introduction to Objective-C, Apple native language.', '250.00', 6),
('978-0-7303-1484-4', 'Doing Good By Doing Good', 'Peter Baines', 'doing_good.jpg', 'Doing Good by Doing Good shows companies how to improve the bottom line by implementing an engaging, authentic, and business-enhancing program that helps staff and business thrive. International CSR consultant Peter Baines draws upon lessons learnt from the challenges faced in his career as a police officer, forensic investigator, and founder of Hands Across the Water to describe the Australian CSR landscape, and the factors that make up a program that benefits everyone involved. Case studies illustrate the real effect of CSR on both business and society, with clear guidance toward maximizing involvement, engaging all employees, and improving the bottom line. The case studies draw out the companies that are focusing on creating shared value in meeting the challenges of society whilst at the same time bringing strong economic returns.\r\n\r\nConsumers are now expecting that big businesses with ever-increasing profits give back to the community from which those profits arise. At the same time, shareholders are demanding their share and are happy to see dividends soar. Getting this right is a balancing act, and Doing Good by Doing Good helps companies delineate a plan of action for getting it done.', '520.00', 2),
('978-1-118-94924-5', 'Programmable Logic Controllers', 'Dag H. Hanssen', 'logic_program.jpg', 'Widely used across industrial and manufacturing automation, Programmable Logic Controllers (PLCs) perform a broad range of electromechanical tasks with multiple input and output arrangements, designed specifically to cope in severe environmental conditions such as automotive and chemical plants.Programmable Logic Controllers: A Practical Approach using CoDeSys is a hands-on guide to rapidly gain proficiency in the development and operation of PLCs based on the IEC 61131-3 standard. Using the freely-available* software tool CoDeSys, which is widely used in industrial design automation projects, the author takes a highly practical approach to PLC design using real-world examples. The design tool, CoDeSys, also features a built in simulator / soft PLC enabling the reader to undertake exercises and test the examples.', '400.00', 2),
('978-1-1180-2669-4', 'Professional JavaScript for Web Developers, 3rd Edition', 'Nicholas C. Zakas', 'pro_js.jpg', 'If you want to achieve JavaScript full potential, it is critical to understand its nature, history, and limitations. To that end, this updated version of the bestseller by veteran author and JavaScript guru Nicholas C. Zakas covers JavaScript from its very beginning to the present-day incarnations including the DOM, Ajax, and HTML5. Zakas shows you how to extend this powerful language to meet specific needs and create dynamic user interfaces for the web that blur the line between desktop and internet. By the end of the book, you will have a strong understanding of the significant advances in web development as they relate to JavaScript so that you can apply them to your next website.', '650.00', 1),
('978-1-44937-019-0', 'Learning Web App Development', 'Semmy Purewal', '\r\nweb_app_dev.jpg', 'Grasp the fundamentals of web application development by building a simple database-backed app from scratch, using HTML, JavaScript, and other open source tools. Through hands-on tutorials, this practical guide shows inexperienced web app developers how to create a user interface, write a server, build client-server communication, and use a cloud-based service to deploy the application.\r\n\r\nEach chapter includes practice problems, full examples, and mental models of the development workflow. Ideal for a college-level course, this book helps you get started with web app development by providing you with a solid grounding in the process.', '370.00', 3),
('978-1-44937-075-6', 'Beautiful JavaScript', 'Anton Kovalyov', 'beauty_js.jpg', 'JavaScript is arguably the most polarizing and misunderstood programming language in the world. Many have attempted to replace it as the language of the Web, but JavaScript has survived, evolved, and thrived. Why did a language created in such hurry succeed where others failed?\r\n\r\nThis guide gives you a rare glimpse into JavaScript from people intimately familiar with it. Chapters contributed by domain experts such as Jacob Thornton, Ariya Hidayat, and Sara Chipps show what they love about their favorite language - whether it is turning the most feared features into useful tools, or how JavaScript can be used for self-expression.', '510.00', 3),
('978-1-4571-0402-2', 'Professional ASP.NET 4 in C# and VB', 'Scott Hanselman', 'pro_asp4.jpg', 'ASP.NET is about making you as productive as possible when building fast and secure web applications. Each release of ASP.NET gets better and removes a lot of the tedious code that you previously needed to put in place, making common ASP.NET tasks easier. With this book, an unparalleled team of authors walks you through the full breadth of ASP.NET and the new and exciting capabilities of ASP.NET 4. The authors also show you how to maximize the abundance of features that ASP.NET offers to make your development process smoother and more efficient.', '220.00', 1),
('978-1-48217-11-1', 'Fundamentals of Android App Development', 'Sujit Kumar Mishra', 'android_app.jpg', 'This book will introduce you to all the fundamentals concepts of Android programming. This book consists of three real-world apps and 40 mini-apps to learn android. It actually provides the project-based approach and designed to teach you the concept of android by thoroughly describing the process of app development.', '355.00', 8),
('978-1-48217-11-3', 'Raspberry Pi Cookbook, 3rd Edition', 'Simon Monk', 'raspberry.jpg', 'With millions of new users and several new models, the Raspberry Pi ecosystem continues to expand—along with many new questions about the Pi capabilities. The third edition of this popular cookbook provides more than 200 hands-on recipes that show you how to run this tiny low-cost computer with Linux; program it with Python; hook it up to sensors, motors, and Arduino boards; and even use it with the internet of things (IoT).', '999.00', 3),
('978-1-48217-31-4', 'Learn Web Development with Python', 'Fabrizio Romano, Gaston C. Hillar, Arun Ravindran', 'web_dev_py.jpg', 'A comprehensive guide to Python programming for web development using the most popular Python web framework - Django.\r\nKey Features:\r\nLearn the fundamentals of programming with Python and building web apps.\r\nBuild web applications from scratch with Django.\r\nCreate real-world RESTful web services with the latest Django framework.', '1000.00', 5),
('978-1-48217-31-6', 'Hands-On Machine Learning with Scilkit-Learn, Keras & Tensor', 'Aurelien Geron', 'machine.jpg', 'You keep hearing about machine learning and artificial intelligence and how they revolutionize the world we live in. You want to learn more. You are in the right place.\r\nYou have basic understanding of Python and you are decent in math. Better!\r\nYou are going to learn hands-on machine learning with scikit-learn, a Python library for machine learning. Since this is a hands-on course, you will be working your way through with Python and Jupyter notebooks.', '1170.00', 3),
('978-1-48217-56-8', 'Computer Networking-A top down approach', 'James F. Kurose, Keith W. Ross', 'com_network.jpg', 'Features Principles and Practice Boxes. Throughout Demonstrate Real-world Applications of the Principles Studied. Case History Boxes Are Sprinkled in to Help Tell the Story of the History And Development of Computer Networking. Material on Application Programming Development Is Included, Along With Numerous Programming Assignments. Market Undergraduate Students of Computer Science.', '925.00', 7),
('978-1-48217-56-9', 'Artificial Intelligence and Machine Learning Fundamentals', 'Zsolt Nagy', 'ai.jpg', 'Machine learning and neural networks are pillars on which you can build intelligent applications. Artificial Intelligence and Machine Learning Fundamentals begins by introducing you to Python and discussing AI search algorithms. You will cover in-depth mathematical topics, such as regression and classification, illustrated by Python examples. As you make your way through the book, you will progress to advanced AI techniques and concepts, and work on real-life datasets to form decision trees and clusters. You will be introduced to neural networks, a powerful tool based on Moore law.', '1200.00', 5),
('978-1-48217-78-2', 'Javascript For Modern Web Development', 'Alok Ranjan, Abhilasha Sinha, Ranjit Battewad', 'js_modern.jpg', 'This book will take you on a complete journey of learning web development, starting right with the basics. The book begins with the history of web development and JavaScript, how it has evolved over these years, and how it still keeps growing with new features.\r\nThis book can be used by people who are completely new to software development and want to get into front-end web development by starting from basics. This book can also be used by JavaScript users for a quick reference to the fundamentals of HTML, CSS, JS, and learn ReactJS with Redux, as well as the new features in JavaScript ES2019.', '634.00', 8),
('978-1-48217-78-7', 'Think Python, 2nd Edition', 'Allen B. Downey', 'think_py.jpg', 'Think Python is an introduction to Python programming for beginners. It starts with basic concepts of programming, and is carefully designed to define all terms when they are first used and to develop each new concept in a logical progression. Larger pieces, like recursion and object-oriented programming are divided into a sequence of smaller steps and introduced over the course of several chapters.\r\nSome examples and exercises are based on Swampy, a Python package written by the author to demonstrate aspects of software design, and to give readers a chance to experiment with simple graphics and animation.', '525.00', 3),
('978-1-48217-96-8', 'Learning with Python', 'Allen Downey, Jeffrey Elkner, Chris Meyers', 'python.jpg', 'Learning with Python  is an introduction to computer science using the Python programming language. It covers the basics of computer programming, including variables and values, functions, conditionals and control flow, program development and debugging.', '286.00', 9),
('978-1-484216-40-8', 'Android Studio New Media Fundamentals', 'Wallace Jackson', 'android_studio.jpg', 'Android Studio New Media Fundamentals is a new media primer covering concepts central to multimedia production for Android including digital imagery, digital audio, digital video, digital illustration and 3D, using open source software packages such as GIMP, Audacity, Blender, and Inkscape. These professional software packages are used for this book because they are free for commercial use. The book builds on the foundational concepts of raster, vector, and waveform (audio), and gets more advanced as chapters progress, covering what new media assets are best for use with Android Studio as well as key factors regarding the data footprint optimization work process and why new media content and new media data optimization is so important.', '450.00', 4),
('978-1-484217-26-9', 'C++ 14 Quick Syntax Reference, 2nd Edition', 'Mikael Olsson', 'c_14_quick.jpg', 'This updated handy quick C++ 14 guide is a condensed code and syntax reference based on the newly updated C++ 14 release of the popular programming language. It presents the essential C++ syntax in a well-organized format that can be used as a handy reference.\r\n\r\nYou would not find any technical jargon, bloated samples, drawn out history lessons, or witty stories in this book. What you will find is a language reference that is concise, to the point and highly accessible. The book is packed with useful information and is a must-have for any C++ programmer.\r\n\r\nIn the C++ 14 Quick Syntax Reference, Second Edition, you will find a concise reference to the C++ 14 language syntax. It has short, simple, and focused code examples. This book includes a well laid out table of contents and a comprehensive index allowing for easy review.', '270.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `book_isbn` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `genre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`book_isbn`, `category`, `genre`) VALUES
('978-0-321-94786-4', 'Best seller', 'Web/App development'),
('978-0-7303-1484-4', 'Best seller', 'Others'),
('978-1-118-94924-5', 'Recommended', 'Hardware/Networking'),
('978-1-1180-2669-4', 'Recommended', 'Coding'),
('978-1-44937-019-0', 'Recommended', 'Web/App development'),
('978-1-484216-40-8', 'Limited edition', 'Web/App Development'),
('978-1-44937-075-6', 'None', 'Coding'),
('978-1-4571-0402-2', 'None', 'Web/App development'),
('978-1-484217-26-9', 'Best Seller', 'Coding'),
('978-1-48217-31-4', 'Best seller', 'Web/App development'),
('978-1-48217-11-1', 'Recommended', 'Web/App development'),
('978-1-48217-96-8', 'Recommended', 'Coding'),
('978-1-48217-78-2', 'Recommended', 'Coding'),
('978-1-48217-11-3', 'Limited edition', 'Hardware/Networking'),
('978-1-48217-56-8', 'Best seller', 'Hardware/Networking'),
('978-1-48217-56-9', 'Limited edition', 'Machine learning'),
('978-1-48217-31-6', 'Best seller', 'Machine learning'),
('978-1-48217-78-7', 'Best seller', 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `zip_code` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `country` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `zip_code`, `country`) VALUES
(30, 'Trinity', '37 Lane, Parkstreet, Kolkata', 'Kolkata', '700067', 'India'),
(31, 'Tanu', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(32, 'Asmita', 'Boral, Kolkata', 'Kolkata', '700154', 'India'),
(33, 'Stuart', '14/A Bose lane, Kolkata', 'Kolkata', '700042', 'India'),
(34, 'Peter', '1,3 Pink Square, Kolkata', 'Kolkata', '700023', 'India'),
(35, 'Harry', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(36, 'Ron', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(37, 'Disha', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(38, 'Suman', 'Boral Lake Pally', 'Kolkata', '700154', 'India'),
(39, 'Aditi', 'Boral Lake Pally', 'Kolkata', '700154', 'India'),
(40, 'Raunak', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(41, 'Arka', 'Chatra, North 24 Parganas', 'Midnapore', '745329', 'Bangladesh'),
(42, 'Sharanya', 'Phoolbagan, Kolkata', 'Kolkata', '700023', 'India'),
(43, 'Asmita', 'Boral Lake Pally', 'Kolkata', '700154', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `feedback`) VALUES
('Suman', 'suman@yahoo.com', 'Placed order for 2 books and delivery is quite fast. Received them within a week. Totally satisfied and would recommend to my friends also. Good job!'),
('Arka', 'arka_misra@gmail.com', 'Just amazing! I am not going back to amazon to buy books. The interface is so clean and easy to use. The process of ordering books and payment is smooth as butter. You can even pay through UPI. 100/100. '),
('Sharanya', 'sharanya_8@gmail.com', 'Loved the experience! The collection of books is varied and I could choose from a wide range of genres. The payment took longer than expected but it was overall easy to use.'),
('Aditi', 'aditi_30@gmail.com', 'Was looking for such a site for a long time, every technical book under one roof. Received the the ordered books on time. \r\nThe experience was awesome except the functionality of tracking books is still not available on the site. Hope the functionality will be available soon. 4/5'),
('Disha', 'disha30@yahoo.com', 'Very user friendly and loved the collection. Would love to continue buy books from here.<3'),
('Trinity', 'trinity@gmail.com', 'Good service. Will use this website again. <3');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_city` char(30) COLLATE latin1_general_ci NOT NULL,
  `ship_zip_code` char(10) COLLATE latin1_general_ci NOT NULL,
  `ship_country` char(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `date`, `ship_name`, `ship_address`, `ship_city`, `ship_zip_code`, `ship_country`) VALUES
(77, 30, '1950.00', '2022-07-18 09:55:53', 'Trinity', '37 Lane, Parkstreet, Kolkata', 'Kolkata', '700067', 'India'),
(78, 31, '740.00', '2022-07-18 11:09:05', 'Tanu', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(79, 30, '940.00', '2022-07-18 11:14:01', 'Trinity', '37 Lane, Parkstreet, Kolkata', 'Kolkata', '700067', 'India'),
(80, 32, '2030.00', '2022-07-18 11:18:14', 'Asmita', 'Boral, Kolkata', 'Kolkata', '700154', 'India'),
(81, 31, '440.00', '2022-07-18 11:23:56', 'Tanu', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(82, 33, '720.00', '2022-07-18 11:40:32', 'Stuart', '14/A Bose lane, Kolkata', 'Kolkata', '700042', 'India'),
(83, 34, '1200.00', '2022-07-18 11:49:29', 'Peter', '1,3 Pink Square, Kolkata', 'Kolkata', '700023', 'India'),
(84, 33, '370.00', '2022-07-18 11:52:02', 'Stuart', '14/A Bose lane, Kolkata', 'Kolkata', '700042', 'India'),
(85, 34, '1090.00', '2022-07-18 11:54:41', 'Peter', '1,3 Pink Square, Kolkata', 'Kolkata', '700023', 'India'),
(86, 35, '640.00', '2022-07-18 12:01:37', 'Harry', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(87, 36, '400.00', '2022-07-18 12:05:51', 'Ron', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(88, 36, '1270.00', '2022-07-18 12:09:38', 'Ron', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(89, 35, '740.00', '2022-07-18 12:13:15', 'Harry', '5/B Hogwarts Street, Delhi', 'Delhi', '110004', 'India'),
(90, 31, '710.00', '2022-07-20 05:35:49', 'Tanu', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(91, 37, '1170.00', '2022-07-20 05:39:21', 'Disha', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(92, 38, '2000.00', '2022-07-20 05:41:07', 'Suman', 'Boral Lake Pally', 'Kolkata', '700154', 'India'),
(93, 39, '925.00', '2022-07-20 05:42:46', 'Aditi', 'Boral Lake Pally', 'Kolkata', '700154', 'India'),
(94, 40, '1200.00', '2022-07-20 05:45:27', 'Raunak', 'Belur, Howrah', 'Howrah', '573115', 'India'),
(95, 41, '1050.00', '2022-07-20 05:51:08', 'Arka', 'Chatra, North 24 Parganas', 'Midnapore', '745329', 'Bangladesh'),
(96, 42, '1268.00', '2022-07-20 05:53:50', 'Sharanya', 'Phoolbagan, Kolkata', 'Kolkata', '700023', 'India'),
(97, 43, '858.00', '2022-07-20 05:55:30', 'Asmita', 'Boral Lake Pally', 'Kolkata', '700154', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_isbn` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(77, '978-1-1180-2669-4', '650.00', 3),
(78, '978-1-44937-019-0', '370.00', 2),
(77, '978-1-118-94924-5', '400.00', 1),
(77, '978-1-484217-26-9', '270.00', 2),
(80, '978-0-321-94786-4', '250.00', 2),
(80, '978-1-44937-075-6', '510.00', 3),
(78, '978-1-4571-0402-2', '220.00', 2),
(82, '978-1-484217-26-9', '270.00', 1),
(82, '978-1-484216-40-8', '450.00', 1),
(83, '978-1-118-94924-5', '400.00', 3),
(82, '978-1-44937-019-0', '370.00', 1),
(83, '978-1-1180-2669-4', '650.00', 1),
(83, '978-1-4571-0402-2', '220.00', 2),
(86, '978-1-484217-26-9', '270.00', 1),
(86, '978-1-44937-019-0', '370.00', 1),
(87, '978-1-118-94924-5', '400.00', 1),
(87, '978-0-321-94786-4', '250.00', 3),
(87, '978-0-7303-1484-4', '520.00', 1),
(86, '978-1-44937-019-0', '370.00', 2),
(78, '978-1-48217-11-1', '355.00', 2),
(91, '978-1-48217-31-6', '1170.00', 1),
(92, '978-1-48217-31-4', '1000.00', 2),
(93, '978-1-48217-56-8', '925.00', 1),
(94, '978-1-48217-56-9', '1200.00', 1),
(95, '978-1-48217-78-7', '525.00', 2),
(96, '978-1-48217-78-2', '634.00', 2),
(97, '978-1-48217-96-8', '286.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherid` int(10) UNSIGNED NOT NULL,
  `publisher_name` varchar(60) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherid`, `publisher_name`) VALUES
(1, 'Wrox'),
(2, 'Wiley'),
(3, 'O\'Reilly Media'),
(4, 'Apress'),
(5, 'Packt Publishing'),
(6, 'Addison-Wesley'),
(7, 'Pearson'),
(8, 'BPB Publications'),
(9, 'Dreamtech Press');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('tanu', 'tanu@scc.com', 'tanu'),
('asmita', 'asmita@scc.com', 'asmita'),
('Trinity', 'trinity@gmail.com', 'lucas123'),
('Stuart', 'stuart@gmail.com', 'lee123'),
('Peter', 'peter@gmail.com', '~peter'),
('Harry', 'harry@gmail.com', 'harryP'),
('Ron', 'ron@gmail.com', '~ron'),
('Tanu', 'tanuroy542001@gmail.com', '1234'),
('Asmita', 'asmita@gmail.com', 'asmita'),
('Disha', 'disha30@yahoo.com', 'disha'),
('Suman', 'suman@yahoo.com', '1234'),
('Aditi', 'aditi_30@gmail.com', 'aditi'),
('Raunak', 'raunak765@gmail.com', 'raunak'),
('Arka', 'arka_misra@gmail.com', 'arka'),
('Sharanya', 'sharanya_8@gmail.com', 'sharon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`,`pass`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_isbn`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
