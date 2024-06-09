CREATE TABLE `message` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `send_id` char(20) NOT NULL,
  `rv_id` char(20) NOT NULL,
  `subject` char(200) NOT NULL,
  `content` text NOT NULL,
  `regist_day` char(20) DEFAULT NULL,
  PRIMARY KEY (`num`)
)