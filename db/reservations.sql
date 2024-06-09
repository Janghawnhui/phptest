CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `board_num` int(11) NOT NULL,
  `reserve_date` date NOT NULL,
  PRIMARY KEY (`id`)
)