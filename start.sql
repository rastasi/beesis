# phpMyAdmin SQL Dump
# version 2.5.7
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Dec 30, 2005 at 10:01 PM
# Server version: 4.0.24
# PHP Version: 4.3.10-16
# 
# Database : `tangram_forum`
# 

# --------------------------------------------------------

#
# Table structure for table `admins`
#

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `passwd` varchar(30) NOT NULL default '',
  `cat` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);

# --------------------------------------------------------

#
# Table structure for table `forums`
#

DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `forumnev` varchar(100) default NULL,
  `forumleiras` varchar(100) default NULL,
  `forumtulaj` varchar(100) default NULL,
  `datum` int(11) NOT NULL default '0',
  `cat` int(11) NOT NULL default '0'
);

# --------------------------------------------------------

#
# Table structure for table `forums_cat`
#

DROP TABLE IF EXISTS `forums_cat`;
CREATE TABLE `forums_cat` (
  `id` int(11) NOT NULL auto_increment,
  `cat` varchar(100) NOT NULL default '',
  `leiras` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

# --------------------------------------------------------

#
# Table structure for table `nicks`
#

DROP TABLE IF EXISTS `nicks`;
CREATE TABLE `nicks` (
  `nicknev` varchar(100) default NULL,
  `nickjelszo` varchar(100) default NULL,
  `nickemail` varchar(100) default NULL,
  `nickalair` varchar(100) default NULL,
  `nickavatar` varchar(100) default NULL,
  `nick7` varchar(100) default NULL,
  `nick8` varchar(100) default NULL,
  `nick9` varchar(100) default NULL,
  `nick10` varchar(100) default NULL
);

# --------------------------------------------------------

#
# Table structure for table `privats`
#

DROP TABLE IF EXISTS `privats`;
CREATE TABLE `privats` (
  `id` int(11) NOT NULL auto_increment,
  `bekuldo` varchar(50) NOT NULL default '',
  `cimzett` varchar(50) NOT NULL default '',
  `datum` varchar(200) NOT NULL default '',
  `tartalom` text NOT NULL,
  `status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);
