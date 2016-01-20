<?php
class PtpVideoDB
{
	static $wpdb = null;
	static $video_table = "video";
	static $category_table = "video_category";

	static function init()
	{
		if(!self::$wpdb){
			global $wpdb;
			self::$wpdb = $wpdb;
			self::$video_table = $wpdb->prefix . self::$video_table;
			self::$category_table = $wpdb->prefix . self::$category_table;
		}
	}	
		
	//---------------------------------- init Setup
	static function setup()
	{
		self::init();
		$table = self::$video_table;
		$sql = "SHOW TABLES LIKE '%$table'";
		$rs = self::$wpdb->query($sql);
		if(!$rs) self::createVideoTable();	
		
		$table = self::$category_table;
		$sql = "SHOW TABLES LIKE '%$table'";
		$rs = self::$wpdb->query($sql);
		if(!$rs) self::createCategoryTable();
	}
	
	static function createVideoTable()
	{
		$table = self::$video_table;
		//$sql = "DROP TABLE IF EXISTS `$table`";
		//$wpdb->query($sql);
		$sql = "
		CREATE TABLE `$table` (
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			`title` varchar(100) NOT NULL,
			`href` varchar(200) NOT NULL,
			`pic` varchar(100) NOT NULL,
			`category_id` tinyint(4) unsigned NOT NULL,
			`sort` int(10) NOT NULL DEFAULT '0',
			`display` char(1) NOT NULL DEFAULT '1',
			PRIMARY KEY (`id`),
			KEY `sort` (`sort`),
			KEY `display` (`display`),
			KEY `category_id` (`category_id`) USING BTREE,
			KEY `title` (`title`)
		) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8
		";
		self::$wpdb->query($sql);
	}
	
	static function createCategoryTable()
	{
		$table = self::$category_table;
		$sql = "
		CREATE TABLE IF NOT EXISTS `$table` (
			`id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(30) NOT NULL,
			`sort` tinyint(3) NOT NULL,
			`display` char(1) NOT NULL,
			PRIMARY KEY (`id`),
			KEY `sort` (`sort`),
			KEY `display` (`display`),
			KEY `name` (`name`)
		) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8
		";
		self::$wpdb->query($sql);
	}
	
	//------------------------------------------- video query
	static function videoCheck($title)
	{
		if(!$title) return false;
		self::init();
		$table = self::$video_table;
		$select = 'id';
		$where = "title='$title'";
		return DBExt::getRow($where, $table, $select);
	}
	
	static function getVideoRow($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "id='$where'";
		$table = self::$video_table;
		return DBExt::getRow($where, $table);
	}
	
	static function getVideoRows($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "display='$where'";
		$table = self::$video_table;
		$order = "sort DESC";
		return DBExt::getRows($where, $table, "*", $order);
	}
	
	static function saveVideo($data, $id=0)
	{
		if(!$data) return false;
		self::init();
		if(!$id){
			if(!isset($data['title'])) return false;
			return DBExt::insertByArray(self::$video_table, $data);
		}else{
			$condition = array("id"=>$id);
			return DBExt::updateByArray(self::$video_table, $condition, $data);
		}
	}
	
	static function delVideo($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "id='$where'";
		$table = self::$video_table;
		return DBExt::del($where, $table);
	}
	
	//------------------------------------------- category query
	static function categoryCheck($title)
	{
		if(!$title) return false;
		self::init();
		$table = self::$category_table;
		$select = 'id';
		$where = "title='$title'";
		return DBExt::getRow($where, $table, $select);
	}
	
	static function getCategoryRow($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "id='$where'";
		$table = self::$category_table;
		return DBExt::getRow($where, $table);
	}
	
	static function getCategoryRows($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "display='$where'";
		$table = self::$category_table;
		$order = "sort DESC";
		return DBExt::getRows($where, $table, "*", $order);
	}
	
	static function saveCategory($data, $id=0)
	{
		if(!$data) return false;
		self::init();
		if(!$id){
			if(!isset($data['name'])) return false;
			return DBExt::insertByArray(self::$category_table, $data);
		}else{
			$condition = array("id"=>$id);
			return DBExt::updateByArray(self::$category_table, $condition, $data);
		}
	}
	
	static function delCategory($where)
	{
		if(!$where) return false;
		self::init();
		if(!is_array($where) && !strpos($where, '=')) $where = "id='$where'";
		$table = self::$category_table;
		return DBExt::del($where, $table);
	}
	
	//----------------------------------------- page
	static function allCount($tableName, $con = null, $col = null)
	{
		return DBExt::allCount($tableName, $con, $col);
	}
	
	static function pageRows($start = 0, $end = 0, $tableName = null, $where = null)
	{
		return DBExt::pageRows($start, $end, $tableName, $where);
	}
	
}

?>