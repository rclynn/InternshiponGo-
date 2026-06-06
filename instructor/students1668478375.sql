

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `studentnumber` varchar(50) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `datecreated` varchar(20) NOT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `colleges` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `esignature` varchar(100) DEFAULT NULL,
  `classyear` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO student VALUES("3","Mark Joseph","S.","Raoet","Lingayen","2020-10-17","Male","16-LN-00768","16-LN-00768","null.png","","","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("5","Viah","N.","Caburnay","Bugallon","2020-10-18","Female","17-LN-00214","17-LN-00214","null.png","","","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("6","Vincent","Reyes","Perez","Estanza, Lingayen, Pangasinan","January 11, 2022","Male","vince","15-LN-00522","null.png","09155882430","12/05/2020 05:33:40 ","Vets Choice Radiology","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("7","Jessa Mae","Flores","Delos Reyes","Binmaley","1996-11-30","Female","jess","17-LN-00122","null.png","09771029025","12/05/2020 06:36:48 ","","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","jessamaedreyes30@gmail.com","null.png","2022");
INSERT INTO student VALUES("14","Lorraine","Maurillo","Ramos","LINGAYEN","1998-10-23","Female","frey","17-LN-00008","null.png","09567822221","12/24/2020 09:21:29 ","","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","loraineramos@gmail.com","null.png","2022");
INSERT INTO student VALUES("15","Maurene","Delos Santos","Caldito","Dagupan","2020-12-19","Female","15-LN-0001","15-LN-0001","null.png","","12/26/2020 01:25:58 ","","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("16","Rospebel","G.","Meneses","","0000-00-00","Female","17-LN-00158","17-LN-00158","null.png","","02/06/2021 10:28:52 ","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("17","Vernie","","Micua","","0000-00-00","Female","17-LN-00147","17-LN-00147","null.png","","02/06/2021 10:30:24 ","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("18","Rassasi Lexie","A.","Oreta","","0000-00-00","Male","17-LN-00147","17-LN-00147","null.png","","02/06/2021 10:31:56 ","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("19","Kimberly","C.","Bolasoc","","0000-00-00","Female","17-LN-00030","17-LN-00030","null.png","","02/06/2021 10:34:41 ","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("20","Alejandro","T.","Abad Jr.","","0000-00-00","Male","17-LN-00233","17-LN-00233","null.png","","02/06/2021 10:36:11 ","","Section 2","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("21","Jairus Ezekiel","A.","Velasquez","","0000-00-00","Male","17-LN-00148","17-LN-00148","null.png","","02/06/2021 10:37:44 ","","Section 1","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("22","Maricar","D.","Ico","","0000-00-00","Male","17-LN-00081","17-LN-00081","null.png","09155882430","02/06/2021 10:40:25 ","","Section 1","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("23","Julie","S","Manuel","","0000-00-00","Female","17-LN-00177","17-LN-00177","null.png","09771029025","02/06/2021 10:41:15 ","","Section 1","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("24","Marjorie","C.","Soriano","Mangaldan","1996-10-30","Female","17-LN-00029","17-LN-0029","null.png","09518765068","02/07/2021 10:04:08 ","","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");
INSERT INTO student VALUES("25","Alberto","D.","Cancino Jr.","Binmaley","1994-11-14","Male","17-LN-00208","17-LN-00208","null.png","09369625910","02/07/2021 10:05:57 ","","Section 3","Bachelor of Science in Information and Technology","Pangasinan State University","","null.png","2022");



