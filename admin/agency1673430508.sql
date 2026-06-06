

CREATE TABLE `agency` (
  `agencyNAME` varchar(100) NOT NULL,
  `agencyPERSONEL` varchar(110) NOT NULL,
  `agencyIMG` varchar(100) DEFAULT NULL,
  `agencyUSERNAME` varchar(100) DEFAULT NULL,
  `agencyPASSWORD` varchar(100) DEFAULT NULL,
  `agencyCONTACT` varchar(100) DEFAULT NULL,
  `agencyLOCATION` varchar(110) DEFAULT NULL,
  `agencyID` int(10) NOT NULL AUTO_INCREMENT,
  `agencyWORKAVAILID` varchar(100) DEFAULT NULL,
  `agencySTATUS` varchar(100) DEFAULT NULL,
  `code` int(100) DEFAULT NULL,
  PRIMARY KEY (`agencyID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO agency VALUES("Vets Choice Radiology","Lyza Cruz","1672340839.jpg","sample","sample","09000000001","Sample","1","","Active","1989141361");
INSERT INTO agency VALUES("PHILIPPINE INFORMATION AGENCY","MS. VENUS MAY SARMIENTO","null.png","sample4","sample4","09000000004","Poblacion, Lingayen, Pangasinan","2","","Active","");
INSERT INTO agency VALUES("GIRL SCOUTS OF THE PHILIPPINES","Sample 1","null.png","sample3","sample3","09000000003","Sample","3","","Active","");
INSERT INTO agency VALUES("PHILIPPINE HEALTH INSURANCE CORPORATION","ATTY. RODOLFO B. DEL ROSARIO, JR.","null.png","sample5","sample5","09000000004","Sample","4","","Active","");
INSERT INTO agency VALUES("YES FM","Sample 2","null.png","sample6","sample6","09000000005","Sample","5","","Active","");
INSERT INTO agency VALUES("RTC LINGAYEN","Sample 3","null.png","sample7","sample7","09000000006","Sample","6","","Active","");
INSERT INTO agency VALUES("Provincial Library","mark lacson","null.png","","","09123456788","Lingayen","9","","","");
INSERT INTO agency VALUES("Provincial Library","Mark lacson","null.png","Library ","Library ","09123456788","Lingayen","12","","","");



