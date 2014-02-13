DROP TABLE IF EXISTS `form_details`;
CREATE TABLE IF NOT EXISTS `form_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `father_or_husband_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `permanent_address` text NOT NULL,
  `correspondence_address` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `university_or_college` varchar(255) NOT NULL,
  `course_selection` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)