CREATE TABLE IF NOT EXISTS `player_stats_log` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `time_stamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `user_hash` char(40) character set utf8 collate utf8_bin NOT NULL,
  `html5_video_enabled` tinyint(1) default NULL,
  `java_enabled` tinyint(1) default NULL,
  `flash_enabled` tinyint(1) default NULL,
  `quicktime_enabled` tinyint(1) default NULL,
  `vlc_enabled` tinyint(1) default NULL,
  `mplayer_enabled` tinyint(1) default NULL,
  `totem_enabled` tinyint(1) default NULL,
  `b_user_agent` varchar(254) character set utf8 collate utf8_bin NOT NULL,
  `b_name` enum('Chrome','OmniWeb','Safari','Opera','iCab','Konqueror','Mozilla','Firefox','Camino','Netscape','Explorer') character set utf8 collate utf8_bin NOT NULL,
  `b_version` varchar(20) character set utf8 collate utf8_bin NOT NULL,
  `b_os` enum('Linux','Windows','Mac') character set utf8 collate utf8_bin NOT NULL,
  `flash_version` varchar(128) character set utf8 collate utf8_bin default NULL,
  `java_version` varchar(128) character set utf8 collate utf8_bin default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_hash` (`user_hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
