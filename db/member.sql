CREATE TABLE `member` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `id` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `age` int(11) NOT NULL,
  `passwd` char(15) NOT NULL,
  `gender` char(10) DEFAULT NULL,
  `phonenum` char(20) DEFAULT NULL,
  `address` char(80) DEFAULT NULL,
  `hobby` char(20) DEFAULT NULL,
  `introduce` char(255) DEFAULT NULL,
  `level` int(5) DEFAULT NULL,
  `point` int(10) DEFAULT NULL,
  `filename` char(40) DEFAULT NULL,
  `musician` char(40) DEFAULT NULL,
  PRIMARY KEY (`num`)
)