ERREUR SQL : 13 Sep 2019 - 9:36:45.000000 --> INSERT INTO tournee(TRNNUM, VEHIMMAT, CHFID, TRNCOMMENTAIRE, TRNDTE) 
				VALUES (9+1,'AO454DL',0,'','2019/09/13 09:36:00') : (Duplicate entry '10' for key 'PRIMARY') 
ERREUR SQL : 13 Sep 2019 - 9:44:10.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","18", "2019-09-13", "2019-09-14", "fgtrtr"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 9:48:06.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","19", "2019-09-13", "2019-09-14", "test"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 9:56:18.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 13 Sep 2019 - 9:59:09.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 13 Sep 2019 - 10:27:16.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 13 Sep 2019 - 10:36:19.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 13 Sep 2019 - 10:56:35.000000 --> SELECT TRNDTE, TRNNUM, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM = 
					AND ?? =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ?? =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 10:57:49.000000 --> SELECT TRNDTE, TRNNUM, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:01:33.000000 --> SELECT TRNDTE, TRNNUM, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:06:31.000000 --> SELECT TRNDTE, TRNNUM, ETPCOMMENTAIRE, LIEUNOM
					FROM etape, lieu, commune
					WHERE commune.VILID = lieu.VILID 
					AND etape.LIEUID = lieu.LIEUID 
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:17:25.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","14", "2019-09-19", "2019-09-05", "bhhn"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 11:22:34.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","14", "2019-09-19", "2019-09-05", "bhhn"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 11:25:44.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","14", "2019-09-19", "2019-09-05", "bhhn"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 11:25:52.000000 --> INSERT INTO etape(TRNNUM, ETPID, LIEUID, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE)
			VALUES ("", "1","14", "2019-09-19", "2019-09-05", "bhhn"); : (Cannot add or update a child row: a foreign key constraint fails (`mlr2`.`etape`, CONSTRAINT `etape_ibfk_1` FOREIGN KEY (`TRNNUM`) REFERENCES `tournee` (`TRNNUM`))) 
ERREUR SQL : 13 Sep 2019 - 11:30:32.000000 --> SELECT LIEU, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu, commune
					WHERE commune.VILID = lieu.VILID 
					AND etape.LIEUID = lieu.LIEUID 
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:30:42.000000 --> SELECT LIEU, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu, commune
					WHERE commune.VILID = lieu.VILID 
					AND etape.LIEUID = lieu.LIEUID 
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:39:35.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:41:04.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:42:02.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:42:49.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:42:56.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:51:10.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:52:08.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:56:52.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 13 Sep 2019 - 11:58:26.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 8:16:53.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 8:18:52.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 8:27:04.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 8:31:37.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 20 Sep 2019 - 8:37:45.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 20 Sep 2019 - 8:46:42.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 8:46:45.000000 --> SELECT LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPCOMMENTAIRE
					FROM etape, lieu
					WHERE etape.LIEUID = lieu.LIEUID 
					AND TRNNUM = 
					AND ETPID =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND ETPID =' at line 5) 
ERREUR SQL : 20 Sep 2019 - 9:55:32.000000 --> SELECT ETPID, LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPNBPALCHARGEUR, ETPCOMMENTAIRE 
						FROM commune, lieu, etape 
						WHERE commune.VILID = lieu.VILID 
						AND etape.LIEUID = lieu.LIEUID 
						AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5) 
ERREUR SQL : 20 Sep 2019 - 10:00:10.000000 --> SELECT ETPID, LIEUNOM, ETPHREDEBUT, ETPHREFIN, ETPNBPALCHARGEUR, ETPCOMMENTAIRE 
						FROM commune, lieu, etape 
						WHERE commune.VILID = lieu.VILID 
						AND etape.LIEUID = lieu.LIEUID 
						AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 5) 
ERREUR SQL : 20 Sep 2019 - 10:32:17.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 20 Sep 2019 - 10:32:26.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 20 Sep 2019 - 10:33:55.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
ERREUR SQL : 20 Sep 2019 - 10:36:03.000000 --> SELECT VEHIMMAT, CHFNOM, TRNCOMMENTAIRE, TRNDTE
					FROM tournee, chauffeur
					WHERE tournee.CHFID = chauffeur.CHFID
					AND TRNNUM =  : (You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 4) 
