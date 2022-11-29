-- 备份时间：2021-06-18 09:48:02 域名：www.t2.tx.com 备份者：admin 程序版本：v1.1_build20210517 电脑端：t4 手机端：t9 --;
DROP TABLE IF EXISTS `sl_address`;
CREATE TABLE IF NOT EXISTS `sl_address` (
  `A_id` int(11) NOT NULL AUTO_INCREMENT,
  `A_mid` int(11) NOT NULL DEFAULT '0',
  `A_address` text NOT NULL,
  `A_name` text NOT NULL,
  `A_phone` text NOT NULL,
  `A_del` int(11) NOT NULL DEFAULT '0',
  `A_default` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
insert into `sl_address`(`A_id`,`A_mid`,`A_address`,`A_name`,`A_phone`,`A_del`,`A_default`) values('1','3','北京市XX区XX路XX小区XX号楼XX单元XXXX号','张三','15555555555','0','0');
insert into `sl_address`(`A_id`,`A_mid`,`A_address`,`A_name`,`A_phone`,`A_del`,`A_default`) values('2','3','上海市XX区XX路XX小区XX号楼XX单元XXXX号','李四','13333333333','0','1');
insert into `sl_address`(`A_id`,`A_mid`,`A_address`,`A_name`,`A_phone`,`A_del`,`A_default`) values('3','12','555','555','555','0','0');
insert into `sl_address`(`A_id`,`A_mid`,`A_address`,`A_name`,`A_phone`,`A_del`,`A_default`) values('4','12','5345345aa','435345aa','34534aa','0','1');
DROP TABLE IF EXISTS `sl_admin`;
CREATE TABLE IF NOT EXISTS `sl_admin` (
  `A_id` int(11) NOT NULL AUTO_INCREMENT,
  `A_login` text NOT NULL,
  `A_pwd` text NOT NULL,
  `A_del` int(11) NOT NULL DEFAULT '0',
  `A_head` text NOT NULL,
  `A_part` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `sl_admin`(`A_id`,`A_login`,`A_pwd`,`A_del`,`A_head`,`A_part`) values('1','admin','e10adc3949ba59abbe56e057f20f883e','0','201911192123112i.jpg','A0_0:1,A1_0:1,A1_1:1,A1_2:1,A1_3:1,A1_4:1,A1_5:1,A2_0:1,A2_1:1,A2_2:1,A2_3:1,A2_4:1,A3_0:1,A3_1:1,A3_2:1,A3_3:1,A3_4:1,A4_0:1,A4_1:1,A4_2:1,A5_0:1,A5_1:1,A5_2:1,A5_3:1,A6_0:1,');
DROP TABLE IF EXISTS `sl_card`;
CREATE TABLE IF NOT EXISTS `sl_card` (
  `C_id` int(11) NOT NULL AUTO_INCREMENT,
  `C_content` text NOT NULL,
  `C_use` int(11) NOT NULL DEFAULT '0',
  `C_sort` int(11) NOT NULL DEFAULT '0',
  `C_del` int(11) NOT NULL DEFAULT '0',
  `C_mid` int(11) DEFAULT '0',
  `C_type` int(11) DEFAULT '0',
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8;
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('35','Ei70HZQs0n4ifHdZuIR0rxdk97dEFIkz','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('36','h3X88BkTMvD0ZPaJxJtEgKWOukfstRwr','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('37','2oD2zsIQf9ESD75qrT7UsHBfVWaDTmht','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('38','xifMiFcPTPxncHiaMsp4DW87sgJkIDMh','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('39','lklbrQNHLnmQIV57t8HSSkQgFRwh9lui','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('40','5ENZUlmhqb3aFyblLDE4Xr65KznzoBa5','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('41','FTNptKMNaPOfNBIJszcQvm47LuDbDD3m','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('42','LUnlWS4keCYfVkIvH8a99Fu4CHbatP3N','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('43','55kAcFQvAkoUdi3ZCKgVbmJJt1gopve2','1','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('44','EPxxRrLWieabGkbZAUvwTZ2Ald7GG7Sp','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('45','OsbORCneoXmqoXKXXdmxBy0xX8839gMk','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('46','ztPLx6A15QkX1qBlDc4c5XlS5WII2oRU','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('47','NXrkObI4h1M05BCtSOPADpNMUBP5zONc','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('48','Q7yh2WeuRY0WQz3VKhubwNizhZXiKJdl','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('49','i8LN0ZK0qzpDX7Iga0KdpBvqpyyoqZKC','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('50','2m85mKNseRb12jKZ30FjgRViSB0ucyrd','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('51','ept9NraQeVGvsodAFOcH7L7aH5wXpWRP','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('52','2epfQ1xPJuHFK4pRxAv7ehgHKKFCh1Mq','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('53','HIeuWDrRoSp4OoVUE87uNKeiqRYxA2z7','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('54','9HMYyAIwYAdEH1YHp1qcdfwaIQeTrPFV','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('55','6qaZMLD7zTnzkOUEgbZrk9OqrD49uCwB','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('56','Y73ZuQxhm1weUGMUnTYchtQ3dGz5TRaP','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('57','bs2JlA1cfijk4lakYQBzz3PG96kKBKFj','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('58','dD0XOexrzQnBVB3SFd0bfxkx7QijoBTY','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('59','pdmglJucJBIka2r5EivlLhDQ2Ouqvv3o','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('60','6vmMaLF5mkRhZW5epl548vOo49wSf0en','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('61','wtR5MyQKIkFVArRx6F3UjjE79oF88bvQ','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('62','WSZYCjEavxJvreHc8OiUDgLFzm60kfci','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('63','OwrK7twkm31uP7YRUflS2BxU5DGGgNLe','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('64','DrDbERTuc237qD0WIDvJP6hiXM9VAhXc','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('65','TUmsMyO0hTm555xtPoK3EBuJkqbBYrGg','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('66','0xH8cQk3IFS9SIqOG0xpDHT1C6GkrmUv','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('67','xbyDmfHhF9mni84lCQuoaR0x9mnk96lr','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('68','hi0mQEwSxOkJd4uyyja59WNd4ee22Ids','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('69','jAlH9790FvZ2F6Y4Cnq9NOpc70XJ68DY','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('70','lXgXNxPeIybXLpzqjfozCJleEpn89339','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('71','QJQmoqrZg55oRUGIJTZFqPmF4MKr8Tez','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('72','30Pr1rcQFhOuFpyhWu8iJupN4tytSW3q','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('73','qNOBFLgxJgIOM9KsP2xTqgVXPnzQR8p0','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('74','1kt4iYMeqyPsnr5h2kUViXLFhiJpgBYk','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('75','AND0TyqmN72DcYW4tTMgnAc8nh1FJ7of','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('76','SpRah8H3lKYTQS4VwWezq5kk18GnMX0N','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('77','ngB5aNTwVYFUsv6mCnXJBNQFyKwLRUfX','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('78','qLL3nn0V1niZOi3PlZougCSQFjO23c4o','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('79','0DEcA84SJ6JKJkKk5eppSs1OdiYblzue','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('80','GwuRqh8evj82Lt4XQDcdlMCaQvRRUIMt','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('81','kvyoLXBuPZvCuZDe8HmD43ZUlaLsf5iL','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('82','Ua3Qcdefwk14AtHy9dhRNcaGq6YpFR82','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('83','W0dEs9yISIOyJPo4HXmd71HKcXquA7vh','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('84','sWbQBlfIPCEH0HrrL9csT62997KMtGPs','0','3','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('85','oVPgZWdYACjf7ZKakiFh1yXwJzMCW905','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('86','7gb7Ioc6mgm9eYzfpSkuCeOrrrOyZqrr','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('87','dahNGuyWwSFjX4edJTnZCzVy1BdPJweV','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('88','0pweC2ElblmcCViFvmDjH3faVz2jBMcg','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('89','kKjaGjg6NZ2UulpxEblikTGYs3d5fygU','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('90','dv0vzSzuCPMmZem2xZyGOWE9L2aKT3Il','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('91','2Y9YJu27z4ktnJ2i7QV6k0b5Knxvj3tY','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('92','1JRlHZfycRUE4HFEPgv8yjAMy52nCtKM','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('93','ryvwVgZ3AGU1Ui5n6enWG7V4Fzew3RrH','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('94','9KcbHOx96l4hs6d35rBq26jM8pCb71CN','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('95','5sfpYKvGBxeW69nDJInqrt9RzwQ9vjMs','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('96','Uu0fADyYy0GXneFgyQ1TV97Tkjap6Y0X','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('97','Qsp35SKXcNoEzfUnVAOkb0iwUNrhpoo4','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('98','tsF7XuWAIFgsfoV6O1FR9Ej1i33PTE2q','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('99','wCpELl3PuQws6LjnxSCH7VOkKPiJ5WpT','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('100','zRMghA0Gr5yLX9Zoa8GUOKgxWWPsCdDf','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('101','V5sbCFeAYjMEcoSKekUqoHeo7FxQRWM0','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('102','CYMVoph97nqtRisjAO5eeMqnxF7d0Kgt','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('103','NtBLVuqKaOb8Yh4GggZbB7cG6iC1HFv5','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('104','7ZJl60t75WqSeDKNz5I41YZkeILBzwUM','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('105','OKBfSl7fHGTDEot08s6pVGJvNMKG1CgG','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('106','M808RfpDwhBRetckog2V9KqFoxEuapS9','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('107','pwQv6XCCdJDVf43hdjN2MWohSYv3c7v8','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('108','uFIdTfgMy04IyqqvZYFVfadV1YrkVi2C','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('109','B5yfu4SbyidmC71Hqj40CyzM9vHFo5Fy','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('110','7iHlgsN8P7QuPYz9lS8cOQVYEA9L0wRl','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('111','cdAZf9dhcIKKCqbeKJ1hBVUxDQls6KMz','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('112','acQ0BBYQhVRD2ttGO32hGzAsKgtzn5cp','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('113','bOZ6hhWpiJnc65MVa0uKaVGB7553wBx1','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('114','zksbjG0sgynReym1Iuk3td7PSpMMaMJs','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('115','tEdVLueHTj9SoebBQNksKN5F74vIKxKR','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('116','bmSG0yq4ytekqlH86gItJIWk3lzb2g7X','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('117','JqDH5WRcx0gsgAkWAaJut8mibOLa8XEd','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('118','rqTdh5vZQfqrSJApsC3xxbZFFjF2GdUM','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('119','uuO8rBLgStOVU8yize3suucJ8aTfvqCR','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('120','YBvcUrXI3dw52dZ15hP7opko31XWmRqO','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('121','naWYgS2hGqZeQcv6NsCAWrGwuxWsIpsY','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('122','MzzigFCpvj4pIRR8rVMZI1canDmXKyZb','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('123','GQT9SXllYuSzNzM6jOE6RGyItiTM6DOu','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('124','tHPjSGYAH642sbd5rlSifAzYlfQaCo3j','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('125','G98GBsTuiUwKeACKfx2JwipyOsEWA7CQ','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('126','Wg9AcU6ButQhgvBlOp8XLoBPEgnEC4Wg','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('127','GyxjWCAUZi6Zh6uNi56QER402Gwl3wF3','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('128','HkRhLNPUWePJBAir6OubDfnpZ7nEYiM1','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('129','rJigda2CXSF4LNVQ6CHfOKegPdZQx9Ee','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('130','035epq4rZY0DiiUJq3F6Rh3FgO2LRoGQ','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('131','9JGhhgy9mtZ3qyI5jdPy3qzFAF46UXHW','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('132','mdqPfTrb54LepdqdgVwp7SytkF1K8en1','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('133','wueKXr9fYshcD9QDEwQ9OVxDl6V48cwO','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('134','WDs0apJWMBgkGP0zGSKEKLhZvMVzmm9P','0','2','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('135','lwDhLEpjqVWF0NRzvnyWbS5htNfzb6ff','1','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('136','TXkQnW5zzvbw0q8saweCOdDBV1ZdfBqz','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('137','79WIWRHYHod8g1XhDpEIMviYHFw0OPXl','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('138','tU5sIDPsyIgHzro1IGQEG1ejGfy5JQ0x','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('139','O71AS64w1KjLSxAPMz5p78b4uv3Q2flK','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('140','mZiONYCptyroOY5CJQSvfuAGnSEmK1BH','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('141','kjKiH8C3pDoIfPNYJQjdobJQQSDISYkN','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('142','YONlyUTWdJShHR5l4DvVhEGbQ4APkVow','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('143','IWDdIeB19pYtO77k0pKKfpV4uRbsuMcS','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('144','VyuzLW6aLNmlHEi4mPb9GQn4eP8WA1Kk','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('145','uWUtck9lrQT0UOXmYxF8lWX6PzNfux18','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('146','oiezOfduDxqTt4IaMfClX0LgFz9tHNLl','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('147','AyNqDMCVJr01hwziz5MdOSbLVNb4qHPB','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('148','IdZHsKnk4wLH4JdDEM31zUFGYXH1k7G1','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('149','eG4QrNO60L9LVr0MznwjUyQtDfqOffwc','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('150','jqpb6PKxFl8rk9j8pHu5cKXNJJXn5kYP','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('151','QDuVPqNpJpieHuF9C2ygQUJiUQgAyXzs','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('152','lEnmvD0aZRifPigSTE68l7aCE3eLBBL6','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('153','Rh9HdjoUtA3AmZwhhsGOaSLW8MqKQhJ4','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('154','9eyauqQ8dF1T3o2cSvqbPK72yVrfpgM9','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('155','DJpYdUlPlphzXGWIJMnLAzNCARsIrZXk','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('156','hUTyUz5PUYJvNZLnTWyXtPllWXyxLskN','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('157','SFnPw7ZRG9pE6fhfKurjHfh0cu8aWXiK','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('158','P4RuddnfhFVkQUEhVf1YqpoCFBet1ggc','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('159','28Fcv21lp7rS6Sb8Q90kFt4IDWcbdtC0','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('160','K4MJbMieShWTiBQs9mThhb33qn9ZVVRm','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('161','HJb4mJx8S2FvHNOjw3gHkVgasutDpyJ4','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('162','UslnRpOwiPw2A3d7CwK2rcvPE0jzB8QD','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('163','jnRoNwhqj0nhvaQGNqEtMUIBsNRBTKki','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('164','I4j7RXWh9931UNHWCPliqzFcUVBagZs5','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('165','zJapiWXiCvQW5da5IzIMJT87Rk9QQ1cw','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('166','rgMSXAWesfA6HOyenUOoLGw2ytMJdygL','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('167','etxdnOK2HytdHUyLe7Nu4aYxAheaYf24','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('168','uhVuVSsvlD8AKQfdpQsAaPKdsySuXFg3','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('169','X2I1hN1bfgtX1284Km0QkDNw4xyUgAF6','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('170','5joWzCgpcPJZmfW75OzweJ3jgD9lOHbW','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('171','7YRwcZyXJ5A9bRy5UKa9h6VDvrmb6q3n','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('172','DNUe5cAxnT1uHsdNWlZ6SVe47dthxIy0','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('173','DICKIBJZGy4y3kI5IvgGVC21rcu23BTh','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('174','zKPGRyk8VYZ9YHEXs3pj9U8YiYOQB46u','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('175','ukOr9tBiHjQFcEGienEFdvEQxSghj5Tw','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('176','5QeUGYOFkMN62EzAXUfeAUNHh85Z6fep','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('177','XnE4MGCy3lwcXf1NoK531l0gOnu87Ife','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('178','Dv4K4l0JTdRyeVlsVRG3kH91Yq8xNj3t','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('179','u1siu5FCgIpPmTgcitzmmMI37lRIdwqX','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('180','TZmylJPJKMIVhff53KQdXI52cZdOX9Ma','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('181','bqO9hMyBcSIqtFNnIee1UDXOXi3dEKLf','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('182','6mCsvZ4tqfYJOzEzYJkVuesuOgg9fW5m','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('183','OtwgZdXh5DT7xvOQlLESvPPzafQdzxMu','0','1','0','0','0');
insert into `sl_card`(`C_id`,`C_content`,`C_use`,`C_sort`,`C_del`,`C_mid`,`C_type`) values('184','Ruj4kqjXvHTVPdXtOEYoTb5gcVXqiY1O','0','1','0','0','0');
DROP TABLE IF EXISTS `sl_colletion`;
CREATE TABLE IF NOT EXISTS `sl_colletion` (
  `C_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `C_type` int(10) DEFAULT '0',
  `C_cid` int(10) DEFAULT '0',
  `C_mid` int(10) DEFAULT '0',
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_config`;
CREATE TABLE IF NOT EXISTS `sl_config` (
  `C_id` int(11) NOT NULL AUTO_INCREMENT,
  `C_title` text NOT NULL,
  `C_keyword` text NOT NULL,
  `C_description` text NOT NULL,
  `C_copyright` text NOT NULL,
  `C_code` text NOT NULL,
  `C_alipay_pid` text NOT NULL,
  `C_alipay_pkey` text NOT NULL,
  `C_wx_appid` text NOT NULL,
  `C_wx_appsecret` text NOT NULL,
  `C_wx_mchid` text NOT NULL,
  `C_wx_key` text NOT NULL,
  `C_7pay_pid` text NOT NULL,
  `C_7pay_pkey` text NOT NULL,
  `C_logo` text NOT NULL,
  `C_ico` text NOT NULL,
  `C_vip1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_vip2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_vip3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_vip6` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_vip12` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_vip0` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_p_discount` decimal(10,2) DEFAULT NULL,
  `C_n_discount` decimal(10,2) DEFAULT NULL,
  `C_alipayon` int(11) NOT NULL DEFAULT '0',
  `C_wxpayon` int(11) NOT NULL DEFAULT '0',
  `C_alicodeon` int(11) NOT NULL DEFAULT '0',
  `C_wxcodeon` int(11) NOT NULL DEFAULT '0',
  `C_kefu` text NOT NULL,
  `C_template` text NOT NULL,
  `C_qrcode` text NOT NULL,
  `C_email` text NOT NULL,
  `C_phone` text NOT NULL,
  `C_beian` text NOT NULL,
  `C_alicode` text NOT NULL,
  `C_wxcode` text NOT NULL,
  `C_qqid` text NOT NULL,
  `C_qqkey` text NOT NULL,
  `C_qqon` int(11) NOT NULL DEFAULT '0',
  `C_wxon` int(11) NOT NULL DEFAULT '0',
  `C_authcode` text NOT NULL,
  `C_7payon` int(11) DEFAULT '0',
  `C_rzon` int(11) DEFAULT '0',
  `C_fee` int(11) DEFAULT '0',
  `C_html` int(11) DEFAULT '0',
  `C_mailtype` int(11) DEFAULT '0',
  `C_mailcode` varchar(200) DEFAULT NULL,
  `C_smtp` varchar(200) DEFAULT NULL,
  `C_wxapp_id` varchar(200) DEFAULT NULL,
  `C_wxapp_key` varchar(200) DEFAULT NULL,
  `C_aliapp_id` varchar(200) DEFAULT NULL,
  `C_aliapp_key` varchar(200) DEFAULT NULL,
  `C_aliapp_key2` varchar(200) DEFAULT NULL,
  `C_bdapp_id` varchar(200) DEFAULT NULL,
  `C_bdapp_key` varchar(200) DEFAULT NULL,
  `C_bdapp_key2` varchar(200) DEFAULT NULL,
  `C_qqapp_id` varchar(200) DEFAULT NULL,
  `C_qqapp_key` varchar(200) DEFAULT NULL,
  `C_zjapp_id` varchar(200) DEFAULT NULL,
  `C_zjapp_key` varchar(200) DEFAULT NULL,
  `C_appt` varchar(200) DEFAULT NULL,
  `C_fx1` int(11) DEFAULT '0',
  `C_fx2` int(11) DEFAULT '0',
  `C_fx3` int(11) DEFAULT '0',
  `C_codepayon` int(11) DEFAULT '0',
  `C_codepay_id` varchar(200) DEFAULT NULL,
  `C_codepay_key` varchar(200) DEFAULT NULL,
  `C_p_discount2` decimal(10,2) DEFAULT NULL,
  `C_n_discount2` decimal(10,2) DEFAULT NULL,
  `C_memberon` int(11) DEFAULT '0',
  `C_rzfee` decimal(10,2) DEFAULT NULL,
  `C_wap` varchar(200) DEFAULT NULL,
  `C_zd` decimal(10,2) DEFAULT NULL,
  `C_rzfeetype` int(11) DEFAULT '0',
  `C_pwdcode` varchar(200) DEFAULT NULL,
  `C_twice` int(11) DEFAULT '0',
  `C_uncopy` int(11) DEFAULT '0',
  `C_slide` int(11) DEFAULT '0',
  `C_backup` int(11) DEFAULT '0',
  `C_mobile` varchar(200) DEFAULT NULL,
  `C_smssign` varchar(200) DEFAULT NULL,
  `C_userid` varchar(200) DEFAULT NULL,
  `C_codeid` varchar(200) DEFAULT NULL,
  `C_codekey` varchar(200) DEFAULT NULL,
  `C_payjson` int(11) DEFAULT '0',
  `C_payjs_id` varchar(200) DEFAULT NULL,
  `C_payjs_key` varchar(200) DEFAULT NULL,
  `C_kefuon` int(11) DEFAULT '0',
  `C_punsh` int(11) DEFAULT '0',
  `C_nunsh` int(11) DEFAULT '0',
  `C_dxon` int(11) DEFAULT '0',
  `C_notice` varchar(500) DEFAULT NULL,
  `C_admin` varchar(200) DEFAULT NULL,
  `C_dx1` int(11) DEFAULT '0',
  `C_dx2` int(11) DEFAULT '0',
  `C_dx3` int(11) DEFAULT '0',
  `C_dx4` int(11) DEFAULT '0',
  `C_dx5` int(11) DEFAULT '0',
  `C_hotwords` varchar(200) DEFAULT NULL,
  `C_dmfon` int(11) DEFAULT '0',
  `C_dmf_id` varchar(200) DEFAULT NULL,
  `C_dmf_key` varchar(2000) DEFAULT NULL,
  `C_dmf_key2` varchar(2000) DEFAULT NULL,
  `C_osson` int(11) DEFAULT '0',
  `C_oss_id` varchar(200) DEFAULT NULL,
  `C_oss_key` varchar(200) DEFAULT NULL,
  `C_bucket` varchar(200) DEFAULT NULL,
  `C_region` varchar(200) DEFAULT NULL,
  `C_m_logo` varchar(200) DEFAULT NULL,
  `C_m_position` int(11) DEFAULT '0',
  `C_m_width` int(11) DEFAULT '0',
  `C_m_height` int(11) DEFAULT '0',
  `C_m_transparent` int(11) DEFAULT '0',
  `C_regon` int(11) DEFAULT '0',
  `C_oss_domain` varchar(200) DEFAULT NULL,
  `C_fzon` int(11) DEFAULT '0',
  `C_fdomain` varchar(200) DEFAULT NULL,
  `C_fzk` int(11) DEFAULT '0',
  `C_format` varchar(500) DEFAULT NULL,
  `C_codepay_type` varchar(200) DEFAULT NULL,
  `C_bd_token` varchar(200) DEFAULT NULL,
  `C_fzvip` int(11) DEFAULT '0',
  `C_qpayon` int(11) DEFAULT '0',
  `C_qpay_appid` varchar(200) DEFAULT NULL,
  `C_qpay_mchid` varchar(200) DEFAULT NULL,
  `C_qpay_key` varchar(200) DEFAULT NULL,
  `C_ttpay_appid` varchar(200) DEFAULT NULL,
  `C_ttpay_mchid` varchar(200) DEFAULT NULL,
  `C_ttpay_secret` varchar(200) DEFAULT NULL,
  `C_epay_url` varchar(200) DEFAULT NULL,
  `C_epay_id` varchar(200) DEFAULT NULL,
  `C_epay_key` varchar(200) DEFAULT NULL,
  `C_epay_type` varchar(200) DEFAULT NULL,
  `C_kd` varchar(200) DEFAULT NULL,
  `C_zzk` int(11) DEFAULT '0',
  `C_c_discount` decimal(10,2) DEFAULT '0.00',
  `C_c_discount2` decimal(10,2) DEFAULT '0.00',
  `C_regr` varchar(200) DEFAULT NULL,
  `C_fen1` int(11) DEFAULT '0',
  `C_fen2` int(11) DEFAULT '0',
  `C_fen3` decimal(10,2) DEFAULT '0.00',
  `C_baoyou` decimal(10,2) DEFAULT '0.00',
  `C_postage` decimal(10,2) DEFAULT '0.00',
  `C_qqon2` int(11) DEFAULT '0',
  `C_wxon2` int(11) DEFAULT '0',
  `C_newsds` text,
  `C_buylimit` int(11) DEFAULT '0',
  `C_viplimit` int(11) DEFAULT '0',
  `C_cache` int(11) DEFAULT '0',
  `C_hupay_id` text,
  `C_hupay_key` text,
  `C_hupay_type` text,
  `C_jipay_id` text,
  `C_jipay_key` text,
  `C_jipay_type` text,
  `C_payjs_type` text,
  `C_payjs_id2` text,
  `C_payjs_key2` text,
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `sl_config`(`C_id`,`C_title`,`C_keyword`,`C_description`,`C_copyright`,`C_code`,`C_alipay_pid`,`C_alipay_pkey`,`C_wx_appid`,`C_wx_appsecret`,`C_wx_mchid`,`C_wx_key`,`C_7pay_pid`,`C_7pay_pkey`,`C_logo`,`C_ico`,`C_vip1`,`C_vip2`,`C_vip3`,`C_vip6`,`C_vip12`,`C_vip0`,`C_p_discount`,`C_n_discount`,`C_alipayon`,`C_wxpayon`,`C_alicodeon`,`C_wxcodeon`,`C_kefu`,`C_template`,`C_qrcode`,`C_email`,`C_phone`,`C_beian`,`C_alicode`,`C_wxcode`,`C_qqid`,`C_qqkey`,`C_qqon`,`C_wxon`,`C_authcode`,`C_7payon`,`C_rzon`,`C_fee`,`C_html`,`C_mailtype`,`C_mailcode`,`C_smtp`,`C_wxapp_id`,`C_wxapp_key`,`C_aliapp_id`,`C_aliapp_key`,`C_aliapp_key2`,`C_bdapp_id`,`C_bdapp_key`,`C_bdapp_key2`,`C_qqapp_id`,`C_qqapp_key`,`C_zjapp_id`,`C_zjapp_key`,`C_appt`,`C_fx1`,`C_fx2`,`C_fx3`,`C_codepayon`,`C_codepay_id`,`C_codepay_key`,`C_p_discount2`,`C_n_discount2`,`C_memberon`,`C_rzfee`,`C_wap`,`C_zd`,`C_rzfeetype`,`C_pwdcode`,`C_twice`,`C_uncopy`,`C_slide`,`C_backup`,`C_mobile`,`C_smssign`,`C_userid`,`C_codeid`,`C_codekey`,`C_payjson`,`C_payjs_id`,`C_payjs_key`,`C_kefuon`,`C_punsh`,`C_nunsh`,`C_dxon`,`C_notice`,`C_admin`,`C_dx1`,`C_dx2`,`C_dx3`,`C_dx4`,`C_dx5`,`C_hotwords`,`C_dmfon`,`C_dmf_id`,`C_dmf_key`,`C_dmf_key2`,`C_osson`,`C_oss_id`,`C_oss_key`,`C_bucket`,`C_region`,`C_m_logo`,`C_m_position`,`C_m_width`,`C_m_height`,`C_m_transparent`,`C_regon`,`C_oss_domain`,`C_fzon`,`C_fdomain`,`C_fzk`,`C_format`,`C_codepay_type`,`C_bd_token`,`C_fzvip`,`C_qpayon`,`C_qpay_appid`,`C_qpay_mchid`,`C_qpay_key`,`C_ttpay_appid`,`C_ttpay_mchid`,`C_ttpay_secret`,`C_epay_url`,`C_epay_id`,`C_epay_key`,`C_epay_type`,`C_kd`,`C_zzk`,`C_c_discount`,`C_c_discount2`,`C_regr`,`C_fen1`,`C_fen2`,`C_fen3`,`C_baoyou`,`C_postage`,`C_qqon2`,`C_wxon2`,`C_newsds`,`C_buylimit`,`C_viplimit`,`C_cache`,`C_hupay_id`,`C_hupay_key`,`C_hupay_type`,`C_jipay_id`,`C_jipay_key`,`C_jipay_type`,`C_payjs_type`,`C_payjs_id2`,`C_payjs_key2`) values('1','博大世界','付费阅读','博大世界','Copyright © 2021 博大世界','','','','','','1610803459','BoDaWenHuaKeJiyouxiangongsi12345','','','202106021736483a.png','20191208113035eM.ico','11.00','20.00','30.00','60.00','120.00','999.00','9.00','5.00','1','1','0','0','_qq_','t4','','','010-10086','吉ICP备2021004195号','','','','','0','0','v3BmItkm47P4AmWSSoFKv9a8oOFUYhQT','0','0','10','0','0','','','','','','','','','','','','','','','shop','0','0','0','0','','','1.00','1.00','1','100.00','t9','100.00','0','','0','0','0','1','','','0','','','0','','','0','0','0','0','','admin','0','0','0','0','0','点卡,教程,源码','0','','','','0','','','','','20191202214409zX.png','0','100','0','50','1','','0','www.t2.tx.com','0','jpg,jpeg,png,gif,bmp,ico,xls,xlsx,txt,sql,csv,mp4,rar,apk,doc','','','30','0','','','','','','','','','','','','0','8.00','2.00','email','1','1','0.01','0.00','0.00','0','0','','0','0','0','','','wxpay','','','alipay,wxpay','alipay,wxpay','','');
DROP TABLE IF EXISTS `sl_course`;
CREATE TABLE IF NOT EXISTS `sl_course` (
  `C_id` int(11) NOT NULL AUTO_INCREMENT,
  `C_title` text NOT NULL,
  `C_pic` text NOT NULL,
  `C_lesson` text NOT NULL,
  `C_time` datetime NOT NULL,
  `C_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `C_content` text NOT NULL,
  `C_order` int(11) NOT NULL DEFAULT '0',
  `C_del` int(11) NOT NULL DEFAULT '0',
  `C_sort` int(11) NOT NULL,
  `C_top` int(11) NOT NULL DEFAULT '0',
  `C_view` int(11) NOT NULL DEFAULT '0',
  `C_author` text NOT NULL,
  `C_mid` int(11) NOT NULL DEFAULT '0',
  `C_sh` int(11) NOT NULL DEFAULT '1',
  `C_shuxing` text NOT NULL,
  PRIMARY KEY (`C_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_csort`;
CREATE TABLE IF NOT EXISTS `sl_csort` (
  `S_id` int(11) NOT NULL AUTO_INCREMENT,
  `S_title` text NOT NULL,
  `S_del` int(11) NOT NULL DEFAULT '0',
  `S_content` text NOT NULL,
  `S_mid` int(11) DEFAULT '0',
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
insert into `sl_csort`(`S_id`,`S_title`,`S_del`,`S_content`,`S_mid`) values('1','点卡充值','0','','0');
insert into `sl_csort`(`S_id`,`S_title`,`S_del`,`S_content`,`S_mid`) values('2','VIP会员帐号','0','121212','0');
insert into `sl_csort`(`S_id`,`S_title`,`S_del`,`S_content`,`S_mid`) values('3','激活码','0','12','0');
DROP TABLE IF EXISTS `sl_evaluate`;
CREATE TABLE IF NOT EXISTS `sl_evaluate` (
  `E_id` int(11) NOT NULL AUTO_INCREMENT,
  `E_mid` int(11) NOT NULL DEFAULT '0',
  `E_content` text NOT NULL,
  `E_oid` int(11) NOT NULL DEFAULT '0',
  `E_time` datetime NOT NULL,
  `E_reply` text NOT NULL,
  `E_del` int(11) NOT NULL DEFAULT '0',
  `E_star` int(11) NOT NULL DEFAULT '5',
  PRIMARY KEY (`E_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
insert into `sl_evaluate`(`E_id`,`E_mid`,`E_content`,`E_oid`,`E_time`,`E_reply`,`E_del`,`E_star`) values('1','3','产品非常好','28','2019-12-10 10:49:16','谢谢您的购买','0','5');
insert into `sl_evaluate`(`E_id`,`E_mid`,`E_content`,`E_oid`,`E_time`,`E_reply`,`E_del`,`E_star`) values('2','3','调然后柔荑花的个人复合弓的鬼地方','29','2019-12-10 11:27:37','2222','0','5');
insert into `sl_evaluate`(`E_id`,`E_mid`,`E_content`,`E_oid`,`E_time`,`E_reply`,`E_del`,`E_star`) values('3','3','123123','28','2019-12-10 15:00:34','现在的保罗打球进入了另一个境界，身体状态的下滑已无法避免，可保罗对场上局势的判断和清晰的头脑一直没变，在击败森林狼的比赛中保罗抓住对手延误比赛的机会帮助球队加上取胜，在对阵开拓者的比赛中同样指了安东尼一个技术犯规，在进攻端或许保罗已经无法攻城拔寨，但只要他在场就一定会给球队做出贡献。','0','5');
DROP TABLE IF EXISTS `sl_guestbook`;
CREATE TABLE IF NOT EXISTS `sl_guestbook` (
  `G_id` int(11) NOT NULL AUTO_INCREMENT,
  `G_name` text NOT NULL,
  `G_title` text NOT NULL,
  `G_phone` text NOT NULL,
  `G_msg` text NOT NULL,
  `G_sh` int(11) NOT NULL DEFAULT '0',
  `G_mail` text NOT NULL,
  `G_del` int(11) NOT NULL DEFAULT '0',
  `G_time` datetime NOT NULL,
  `G_reply` text NOT NULL,
  PRIMARY KEY (`G_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_history`;
CREATE TABLE IF NOT EXISTS `sl_history` (
  `H_id` int(11) NOT NULL AUTO_INCREMENT,
  `H_hid` int(11) NOT NULL DEFAULT '0',
  `H_hid2` int(11) NOT NULL DEFAULT '0',
  `H_type` int(11) NOT NULL DEFAULT '0',
  `H_mid` int(11) NOT NULL DEFAULT '0',
  `H_time` datetime DEFAULT NULL,
  PRIMARY KEY (`H_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
insert into `sl_history`(`H_id`,`H_hid`,`H_hid2`,`H_type`,`H_mid`,`H_time`) values('1','153','0','1','13','2021-06-04 14:04:26');
DROP TABLE IF EXISTS `sl_link`;
CREATE TABLE IF NOT EXISTS `sl_link` (
  `L_id` int(11) NOT NULL AUTO_INCREMENT,
  `L_title` text NOT NULL,
  `L_link` text NOT NULL,
  `L_pic` text NOT NULL,
  `L_order` int(11) NOT NULL DEFAULT '0',
  `L_del` int(11) NOT NULL DEFAULT '0',
  `L_content` text NOT NULL,
  PRIMARY KEY (`L_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('1','百度','http://www.baidu.com','20191120222544D2.png','5','1','');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('2','腾讯','http://www.qq.com','20191120222606G6.png','1','1','');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('4','新浪','http://www.sina.com','20191120223409Ld.png','3','1','');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('5','淘宝网','http://www.taobao.com','20191203142808Og.png','2','1','淘宝网');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('6','360搜索','http://www.so.com','201912031428507G.png','4','1','360搜索');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('7','企业建站系统','https://shanling.top','scms.png','4','1','企业建站系统');
insert into `sl_link`(`L_id`,`L_title`,`L_link`,`L_pic`,`L_order`,`L_del`,`L_content`) values('8','发货100','http://fahuo100.cn','20191203142923qI.png','6','1','发货100');
DROP TABLE IF EXISTS `sl_list`;
CREATE TABLE IF NOT EXISTS `sl_list` (
  `L_id` int(11) NOT NULL AUTO_INCREMENT,
  `L_mid` int(11) NOT NULL DEFAULT '0',
  `L_no` text NOT NULL,
  `L_title` text NOT NULL,
  `L_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `L_del` int(11) NOT NULL DEFAULT '0',
  `L_time` datetime NOT NULL,
  `L_genkey` text NOT NULL,
  `L_sh` int(11) DEFAULT '1',
  `L_no2` varchar(200) DEFAULT NULL,
  `L_type` int(11) DEFAULT '0',
  PRIMARY KEY (`L_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('14','3','2019120116130010694885','购买商品-windows10正版激活码','-50.00','0','2019-12-01 16:13:00','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('15','3','2019120116165372396850','购买商品-windows10正版激活码','-180.00','0','2019-12-01 16:16:53','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('16','3','2019120119375484393920','阅读付费文章-斥资3.5亿 亨得利首次布局XX钟表2','-1.00','0','2019-12-01 19:37:54','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('17','3','2019120200230970206084','阅读付费文章-共享单车的印度崛起：东方不亮西方亮？','-0.02','0','2019-12-02 00:23:09','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('18','3','2019120200232641988067','购买商品-windows10正版激活码','-100.00','0','2019-12-02 00:23:26','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('19','3','2019120208300140523467','购买商品-windows10正版激活码','-100.00','0','2019-12-02 08:30:01','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('20','9','4200000465201912020604164980','帐号充值','0.10','0','2019-12-02 10:49:54','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('21','11','2019120222001418110526796245','帐号充值','0.10','0','2019-12-02 12:14:45','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('22','11','4200000465201912020137933601','帐号充值','0.10','0','2019-12-02 12:30:30','2','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('23','11','4200000468201912023846155876','帐号充值','0.10','0','2019-12-02 12:32:50','tMBgP9KufsylFkwAUcxW','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('24','11','2019120308004425117963','阅读付费文章-共享单车的印度崛起：东方不亮西方亮？','-0.02','0','2019-12-03 08:00:44','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('25','3','2019120509135987579956','阅读付费文章-滴滴“官宣”巨亏——是卖惨，还是真难','-1.00','0','2019-12-05 09:13:59','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('26','3','2019120509154543750000','阅读付费文章-抖音运营团队：抖音运营思维攻略','-1.00','0','2019-12-05 09:15:45','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('27','3','2019120518454468798828','积分转余额','1.00','0','2019-12-05 18:45:44','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('28','3','2019120519570612757568','阅读付费文章-咪蒙关停，靠“伪女权”挣钱还能撑多久','-1.00','0','2019-12-05 19:57:06','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('29','3','2019120519590588370971','购买商品-短域名、缩短网址生成网站系统源码 可自行广告位','-50.00','0','2019-12-05 19:59:05','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('30','3','2019120713381638050842','阅读付费文章-区块链未死！2019区块链+农业或将浴火重生','-1.00','0','2019-12-07 13:38:16','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('31','3','2019120721551987231140','购买商品-梦幻西游2点卡100元梦幻西游点卡1000点网易一卡通100元自动充值','-196.00','0','2019-12-07 21:55:19','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('32','3','2019120721563641261596','购买商品-梦幻西游2点卡100元梦幻西游点卡1000点网易一卡通100元自动充值','-196.00','0','2019-12-07 21:56:36','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('33','3','2019120811395526946411','购买商品-photoshop教程 教你玩转photoshop教程|ps教程含色彩系统','-9.80','0','2019-12-08 11:39:55','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('34','3','2019121021184993490600','购买商品-photoshop教程 教你玩转photoshop教程|ps教程含色彩系统','-9.80','0','2019-12-10 21:18:49','','1','','0');
insert into `sl_list`(`L_id`,`L_mid`,`L_no`,`L_title`,`L_money`,`L_del`,`L_time`,`L_genkey`,`L_sh`,`L_no2`,`L_type`) values('35','3','2019121111082086596679','阅读付费文章-短视频的彷徨与退让：积蓄力量，正待春暖花开','-1.00','0','2019-12-11 11:08:20','','1','','0');
DROP TABLE IF EXISTS `sl_log`;
CREATE TABLE IF NOT EXISTS `sl_log` (
  `L_id` int(11) NOT NULL AUTO_INCREMENT,
  `L_time` text NOT NULL,
  `L_add` text NOT NULL,
  `L_ip` text NOT NULL,
  `L_title` text NOT NULL,
  `L_del` int(11) NOT NULL DEFAULT '0',
  `L_aid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`L_id`)
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('260','2019-12-11 21:29:56','山东省','::1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('261','2019-12-11 21:30:07','山东省','::1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('262','2019-12-11 21:30:34','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('263','2019-12-11 21:30:55','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('264','2019-12-11 21:31:09','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('265','2019-12-11 21:31:16','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('266','2019-12-11 21:31:23','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('267','2019-12-11 21:31:48','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('268','2019-12-11 21:32:15','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('269','2019-12-11 21:32:26','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('270','2019-12-11 21:32:39','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('271','2019-12-11 21:32:47','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('272','2019-12-11 21:32:56','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('273','2019-12-11 21:33:09','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('274','2019-12-11 21:34:12','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('275','2019-12-11 21:35:09','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('276','2019-12-11 21:36:18','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('277','2019-12-11 21:36:40','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('278','2019-12-11 21:37:03','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('279','2019-12-11 21:37:27','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('280','2019-12-11 21:37:44','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('281','2019-12-11 21:38:01','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('282','2019-12-11 21:38:12','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('283','2019-12-11 21:38:29','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('284','2019-12-11 21:38:50','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('285','2019-12-11 21:39:06','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('286','2019-12-11 21:39:22','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('287','2019-12-11 21:39:43','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('288','2019-12-11 21:39:57','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('289','2019-12-11 21:40:13','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('290','2019-12-11 21:40:28','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('291','2019-12-11 21:40:40','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('292','2019-12-11 21:40:44','山东省','::1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('293','2019-12-11 21:41:05','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('294','2019-12-11 21:41:27','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('295','2019-12-11 21:41:48','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('296','2019-12-11 21:42:02','山东省','::1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('297','2019-12-11 21:42:36','山东省','::1','编辑焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('298','2019-12-11 21:42:43','山东省','::1','编辑焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('299','2019-12-11 21:42:49','山东省','::1','编辑焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('300','2020-03-02 09:57:19','山东省淄博市','::1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('301','2020-03-02 21:57:36','山东省淄博市','::1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('302','2020-04-03 09:04:41','山东省','::1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('303','2020-04-08 22:31:27','山东省淄博市','::1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('304','2020-10-11 17:21:00','山东省','::1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('305','2020-11-30 14:29:13','山东省','::1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('306','2020-12-18 10:18:14','山东省淄博市','::1','新增单页','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('307','2021-05-31 13:57:55','','127.0.0.1','后台登录成功','0','0');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('308','2021-05-31 13:58:41','CHINA','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('309','2021-06-02 17:36:15','CHINA','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('310','2021-06-02 17:36:54','CHINA','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('311','2021-06-02 17:47:29','CHINA','127.0.0.1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('312','2021-06-02 17:50:21','CHINA','127.0.0.1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('313','2021-06-02 17:53:05','CHINA','127.0.0.1','批量删除焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('314','2021-06-02 17:54:18','CHINA','127.0.0.1','新增焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('315','2021-06-04 10:26:09','CHINA','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('316','2021-06-04 10:29:19','CHINA','127.0.0.1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('317','2021-06-04 10:34:52','CHINA','127.0.0.1','切换模板','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('318','2021-06-04 10:58:41','CHINA','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('319','2021-06-04 10:58:46','CHINA','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('320','2021-06-04 10:59:03','CHINA','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('321','2021-06-04 11:12:27','CHINA','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('322','2021-06-04 14:49:15','CHINA','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('323','2021-06-04 14:49:22','CHINA','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('324','2021-06-04 14:49:32','CHINA','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('325','2021-06-05 14:25:20','CHINA','127.0.0.1','编辑焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('326','2021-06-07 19:38:01','北京市','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('327','2021-06-07 19:43:53','北京市','127.0.0.1','编辑焦点图','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('328','2021-06-07 19:50:31','北京市','127.0.0.1','编辑菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('329','2021-06-07 19:54:25','北京市','127.0.0.1','新增新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('330','2021-06-07 19:54:32','北京市','127.0.0.1','新增新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('331','2021-06-07 19:54:39','北京市','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('332','2021-06-07 19:54:58','北京市','127.0.0.1','新增新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('333','2021-06-07 19:55:16','北京市','127.0.0.1','新增新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('334','2021-06-07 19:55:23','北京市','127.0.0.1','编辑新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('335','2021-06-07 19:55:38','北京市','127.0.0.1','新增新闻分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('336','2021-06-07 19:56:10','北京市','127.0.0.1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('337','2021-06-07 19:56:35','北京市','127.0.0.1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('338','2021-06-07 19:57:08','北京市','127.0.0.1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('339','2021-06-07 19:57:26','北京市','127.0.0.1','新增菜单','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('340','2021-06-07 19:58:22','北京市','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('341','2021-06-07 19:59:34','北京市','127.0.0.1','批量删除友链','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('342','2021-06-07 21:03:09','北京市','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('343','2021-06-10 13:36:35','CHINA','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('344','2021-06-10 15:01:56','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('345','2021-06-10 15:06:57','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('346','2021-06-10 15:17:09','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('347','2021-06-10 15:20:21','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('348','2021-06-10 15:20:35','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('349','2021-06-10 15:22:15','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('350','2021-06-10 15:25:16','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('351','2021-06-10 15:26:18','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('352','2021-06-10 15:28:15','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('353','2021-06-10 15:28:56','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('354','2021-06-10 15:29:46','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('355','2021-06-10 15:30:37','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('356','2021-06-10 15:38:16','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('357','2021-06-10 15:39:03','CHINA','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('358','2021-06-10 15:40:07','CHINA','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('359','2021-06-10 15:42:02','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('360','2021-06-10 15:43:04','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('361','2021-06-10 15:44:59','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('362','2021-06-10 15:48:36','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('363','2021-06-10 15:50:00','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('364','2021-06-10 15:50:44','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('365','2021-06-10 15:51:34','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('366','2021-06-10 16:03:09','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('367','2021-06-10 16:03:47','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('368','2021-06-10 16:04:44','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('369','2021-06-10 16:08:22','CHINA','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('370','2021-06-11 11:11:28','辽宁省大连市','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('371','2021-06-11 12:31:42','辽宁省大连市','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('372','2021-06-11 12:33:24','辽宁省大连市','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('373','2021-06-11 12:38:55','辽宁省大连市','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('374','2021-06-12 20:31:48','北京市','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('375','2021-06-12 21:20:52','北京市','127.0.0.1','编辑管理员','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('376','2021-06-12 21:21:21','北京市','127.0.0.1','编辑管理员','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('377','2021-06-12 21:21:49','北京市','127.0.0.1','编辑管理员','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('378','2021-06-12 21:22:35','北京市','127.0.0.1','编辑管理员','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('379','2021-06-16 09:27:32','辽宁省大连市','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('380','2021-06-16 09:59:24','辽宁省大连市','127.0.0.1','删除文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('381','2021-06-16 10:33:30','辽宁省大连市','127.0.0.1','新增文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('382','2021-06-16 10:50:12','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('383','2021-06-16 10:53:42','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('384','2021-06-16 10:54:02','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('385','2021-06-16 10:58:17','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('386','2021-06-16 11:00:29','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('387','2021-06-16 11:01:26','辽宁省大连市','127.0.0.1','编辑文章','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('388','2021-06-16 11:22:46','辽宁省大连市','127.0.0.1','设置VIP','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('389','2021-06-16 11:26:46','辽宁省大连市','127.0.0.1','设置VIP','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('390','2021-06-16 11:32:52','辽宁省大连市','127.0.0.1','设置VIP','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('391','2021-06-16 11:33:19','辽宁省大连市','127.0.0.1','设置VIP','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('392','2021-06-16 11:35:33','辽宁省大连市','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('393','2021-06-16 11:35:40','辽宁省大连市','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('394','2021-06-16 13:28:02','辽宁省大连市','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('395','2021-06-16 14:32:30','辽宁省大连市','127.0.0.1','编辑基本设置','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('396','2021-06-17 10:28:56','CHINA','127.0.0.1','后台登录成功','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('397','2021-06-17 10:35:45','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('398','2021-06-17 10:35:47','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('399','2021-06-17 10:35:48','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('400','2021-06-17 10:35:50','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('401','2021-06-17 10:35:51','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('402','2021-06-17 10:35:53','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('403','2021-06-17 10:35:55','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('404','2021-06-17 10:35:57','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('405','2021-06-17 10:36:02','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('406','2021-06-17 10:36:04','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('407','2021-06-17 10:36:06','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('408','2021-06-17 10:36:09','CHINA','127.0.0.1','删除文章分类','0','1');
insert into `sl_log`(`L_id`,`L_time`,`L_add`,`L_ip`,`L_title`,`L_del`,`L_aid`) values('409','2021-06-18 09:47:25','CHINA','127.0.0.1','后台登录成功','0','1');
DROP TABLE IF EXISTS `sl_member`;
CREATE TABLE IF NOT EXISTS `sl_member` (
  `M_id` int(11) NOT NULL AUTO_INCREMENT,
  `M_login` text NOT NULL,
  `M_pwd` text NOT NULL,
  `M_head` text NOT NULL,
  `M_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `M_regtime` datetime NOT NULL,
  `M_email` text NOT NULL,
  `M_del` int(11) NOT NULL DEFAULT '0',
  `M_viptime` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  `M_viplong` int(11) NOT NULL DEFAULT '0',
  `M_fen` int(11) NOT NULL DEFAULT '0',
  `M_pwdcode` text NOT NULL,
  `M_openid` text NOT NULL,
  `M_shop` varchar(200) DEFAULT NULL,
  `M_from` int(11) DEFAULT '0',
  `M_wxid` varchar(200) DEFAULT NULL,
  `M_type` int(11) DEFAULT '0',
  `M_sellertime` datetime DEFAULT NULL,
  `M_sellerlong` int(11) DEFAULT '0',
  `M_qq` varchar(200) DEFAULT NULL,
  `M_notice` varchar(500) DEFAULT NULL,
  `M_mobile` varchar(200) DEFAULT NULL,
  `M_webtitle` varchar(200) DEFAULT NULL,
  `M_keyword` varchar(200) DEFAULT NULL,
  `M_description` varchar(500) DEFAULT NULL,
  `M_logo` varchar(200) DEFAULT NULL,
  `M_ico` varchar(200) DEFAULT NULL,
  `M_domain` varchar(200) DEFAULT NULL,
  `M_priceup` int(11) DEFAULT '0',
  `M_beian` varchar(200) DEFAULT NULL,
  `M_copyright` varchar(500) DEFAULT NULL,
  `M_qrcode` varchar(500) DEFAULT NULL,
  `M_contact` varchar(1000) DEFAULT NULL,
  `M_kefu` varchar(1000) DEFAULT NULL,
  `M_code` varchar(5000) DEFAULT NULL,
  `M_template` varchar(200) DEFAULT NULL,
  `M_wap` varchar(200) DEFAULT NULL,
  `M_show` int(11) DEFAULT '0',
  `M_stop` int(11) DEFAULT '0',
  `M_stopinfo` varchar(500) DEFAULT NULL,
  `M_product` varchar(2000) DEFAULT NULL,
  `M_news` varchar(2000) DEFAULT NULL,
  `M_postage` decimal(10,2) DEFAULT '0.00',
  `M_baoyou` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`M_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
insert into `sl_member`(`M_id`,`M_login`,`M_pwd`,`M_head`,`M_money`,`M_regtime`,`M_email`,`M_del`,`M_viptime`,`M_viplong`,`M_fen`,`M_pwdcode`,`M_openid`,`M_shop`,`M_from`,`M_wxid`,`M_type`,`M_sellertime`,`M_sellerlong`,`M_qq`,`M_notice`,`M_mobile`,`M_webtitle`,`M_keyword`,`M_description`,`M_logo`,`M_ico`,`M_domain`,`M_priceup`,`M_beian`,`M_copyright`,`M_qrcode`,`M_contact`,`M_kefu`,`M_code`,`M_template`,`M_wap`,`M_show`,`M_stop`,`M_stopinfo`,`M_product`,`M_news`,`M_postage`,`M_baoyou`) values('1','未登录帐号','7fef6171469e80d32c0559f88b377245','head.jpg','0.00','2019-11-16 13:02:41','222@qq.com','0','1970-01-01 00:00:00','0','0','','','店铺名称','0','','0','2000-01-01 00:00:00','0','','店铺公告','','网站名称','SEO网站关键词','SEO网站描述','nopic.png','','','10','','','','','','','','','0','0','','','','0.00','0.00');
insert into `sl_member`(`M_id`,`M_login`,`M_pwd`,`M_head`,`M_money`,`M_regtime`,`M_email`,`M_del`,`M_viptime`,`M_viplong`,`M_fen`,`M_pwdcode`,`M_openid`,`M_shop`,`M_from`,`M_wxid`,`M_type`,`M_sellertime`,`M_sellerlong`,`M_qq`,`M_notice`,`M_mobile`,`M_webtitle`,`M_keyword`,`M_description`,`M_logo`,`M_ico`,`M_domain`,`M_priceup`,`M_beian`,`M_copyright`,`M_qrcode`,`M_contact`,`M_kefu`,`M_code`,`M_template`,`M_wap`,`M_show`,`M_stop`,`M_stopinfo`,`M_product`,`M_news`,`M_postage`,`M_baoyou`) values('9','Q_闪灵Anchen','e2376380336559eb7f8a538ffe3c3827','20191201225749pw9.jpg','0.30','2019-12-01 22:57:49','@qq.com','0','1970-01-01 00:00:00','0','0','','DAAE6D665D3931C6C7A61145C97C7BF5','店铺名称','0','','0','2000-01-01 00:00:00','0','','店铺公告','','网站名称','SEO网站关键词','SEO网站描述','nopic.png','','','10','','','','','','','','','0','0','','','','0.00','0.00');
insert into `sl_member`(`M_id`,`M_login`,`M_pwd`,`M_head`,`M_money`,`M_regtime`,`M_email`,`M_del`,`M_viptime`,`M_viplong`,`M_fen`,`M_pwdcode`,`M_openid`,`M_shop`,`M_from`,`M_wxid`,`M_type`,`M_sellertime`,`M_sellerlong`,`M_qq`,`M_notice`,`M_mobile`,`M_webtitle`,`M_keyword`,`M_description`,`M_logo`,`M_ico`,`M_domain`,`M_priceup`,`M_beian`,`M_copyright`,`M_qrcode`,`M_contact`,`M_kefu`,`M_code`,`M_template`,`M_wap`,`M_show`,`M_stop`,`M_stopinfo`,`M_product`,`M_news`,`M_postage`,`M_baoyou`) values('11','W_闪灵网络','bbd32490d09a1ef553e6d94c12772de0','20191202121243niR.jpg','0.00','2019-12-02 12:12:43','未设置邮箱@qq.com','0','2019-12-03 10:46:59','31','0','EnLAgDf25t57p69ftwAm','o9DdM0ffTbm_vecejmTJs4cBId9E','店铺名称','0','','0','2000-01-01 00:00:00','0','','店铺公告','','网站名称','SEO网站关键词','SEO网站描述','nopic.png','','','10','','','','','','','','','0','0','','','','0.00','0.00');
insert into `sl_member`(`M_id`,`M_login`,`M_pwd`,`M_head`,`M_money`,`M_regtime`,`M_email`,`M_del`,`M_viptime`,`M_viplong`,`M_fen`,`M_pwdcode`,`M_openid`,`M_shop`,`M_from`,`M_wxid`,`M_type`,`M_sellertime`,`M_sellerlong`,`M_qq`,`M_notice`,`M_mobile`,`M_webtitle`,`M_keyword`,`M_description`,`M_logo`,`M_ico`,`M_domain`,`M_priceup`,`M_beian`,`M_copyright`,`M_qrcode`,`M_contact`,`M_kefu`,`M_code`,`M_template`,`M_wap`,`M_show`,`M_stop`,`M_stopinfo`,`M_product`,`M_news`,`M_postage`,`M_baoyou`) values('12','qqq','b2ca678b4c936f905fb82f2733f5297f','head.jpg','0.00','2019-12-07 17:56:40','435345ewt@qq.com','0','1970-01-01 00:00:00','0','0','','','店铺名称','0','','0','2000-01-01 00:00:00','0','','店铺公告','','网站名称','SEO网站关键词','SEO网站描述','nopic.png','','','10','','','','','','','','','0','0','','','','0.00','0.00');
insert into `sl_member`(`M_id`,`M_login`,`M_pwd`,`M_head`,`M_money`,`M_regtime`,`M_email`,`M_del`,`M_viptime`,`M_viplong`,`M_fen`,`M_pwdcode`,`M_openid`,`M_shop`,`M_from`,`M_wxid`,`M_type`,`M_sellertime`,`M_sellerlong`,`M_qq`,`M_notice`,`M_mobile`,`M_webtitle`,`M_keyword`,`M_description`,`M_logo`,`M_ico`,`M_domain`,`M_priceup`,`M_beian`,`M_copyright`,`M_qrcode`,`M_contact`,`M_kefu`,`M_code`,`M_template`,`M_wap`,`M_show`,`M_stop`,`M_stopinfo`,`M_product`,`M_news`,`M_postage`,`M_baoyou`) values('13','admin63.com','e10adc3949ba59abbe56e057f20f883e','head.jpg','0.00','2021-06-04 10:50:08','admin@1','0','1970-01-01 00:00:00','0','0','c29ZoHaSaPQvUPnK1PIB','','','0','','0','','0','','','','','','','','','','0','','','','','','','','','0','0','','','','0.00','0.00');
DROP TABLE IF EXISTS `sl_menu`;
CREATE TABLE IF NOT EXISTS `sl_menu` (
  `U_id` int(11) NOT NULL AUTO_INCREMENT,
  `U_title` text NOT NULL,
  `U_type` text NOT NULL,
  `U_typeid` int(11) NOT NULL DEFAULT '0',
  `U_order` int(11) NOT NULL DEFAULT '0',
  `U_sub` int(11) NOT NULL DEFAULT '0',
  `U_link` text NOT NULL,
  `U_del` int(11) NOT NULL DEFAULT '0',
  `U_hide` int(11) DEFAULT '0',
  `U_icon` text,
  PRIMARY KEY (`U_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('1','首页','index','0','1','0','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('2','娱乐','news','3','4','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('3','电影','news','1','2','2','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('4','明星','news','2','1','2','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('5','新闻','news','4','3','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('6','国际','news','5','1','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('7','联系','text','3','15','0','http://www.baidu.com','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('8','官方微博','link','1','6','0','http://weibo.com','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('9','关于','text','2','12','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('10','品牌故事','text','2','1','9','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('11','隐私申明','text','1','2','9','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('12','社会','news','6','2','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('13','加盟合作','text','4','3','9','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('14','电视','news','9','3','2','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('15','综艺','news','8','4','2','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('16','网络安全','product','17','5','2','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('17','在线留言','text','5','2','7','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('18','联系方式','text','3','1','7','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('19','军事','news','7','3','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('20','评论','news','19','4','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('21','教育','news','12','5','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('22','时尚','news','13','6','5','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('23','科技','news','10','5','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('24','财经','news','11','6','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('25','教育','news','12','7','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('26','时尚','news','13','8','0','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('27','数码','news','15','1','23','','1','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('28','手机','news','16','2','23','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('29','探索','news','17','3','23','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('30','互联网','news','18','4','23','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('31','股票','news','26','1','24','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('32','基金','news','27','2','24','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('33','外汇','news','28','3','24','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('34','理财','news','29','4','24','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('35','出国','news','30','1','25','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('36','公益','news','31','2','25','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('37','高考','news','32','3','25','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('38','EMBA','news','33','4','25','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('39','女性','news','34','1','26','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('40','健康','news','35','2','26','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('41','育儿','news','36','3','26','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('42','时装','news','37','4','26','','0','0','nopic.png');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('43','艺术','news','46','2','0','','1','0','');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('44','文化','news','42','2','0','','0','0','');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('45','服务','news','48','2','0','','0','0','');
insert into `sl_menu`(`U_id`,`U_title`,`U_type`,`U_typeid`,`U_order`,`U_sub`,`U_link`,`U_del`,`U_hide`,`U_icon`) values('46','营销','news','50','2','0','','0','0','');
DROP TABLE IF EXISTS `sl_news`;
CREATE TABLE IF NOT EXISTS `sl_news` (
  `N_id` int(11) NOT NULL AUTO_INCREMENT,
  `N_title` text NOT NULL,
  `N_content` longtext,
  `N_pic` text NOT NULL,
  `N_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `N_sort` int(11) NOT NULL DEFAULT '0',
  `N_del` int(11) NOT NULL DEFAULT '0',
  `N_order` int(11) NOT NULL DEFAULT '0',
  `N_long` int(11) NOT NULL DEFAULT '0',
  `N_date` datetime NOT NULL,
  `N_author` text NOT NULL,
  `N_view` int(11) NOT NULL DEFAULT '0',
  `N_preview` int(11) NOT NULL DEFAULT '0',
  `N_mid` int(11) DEFAULT '0',
  `N_sh` int(11) DEFAULT '1',
  `N_tag` varchar(500) DEFAULT NULL,
  `N_fx` int(11) DEFAULT '0',
  `N_video` varchar(500) DEFAULT NULL,
  `N_top` int(11) DEFAULT '0',
  `N_tpl` int(11) DEFAULT '0',
  `N_shuxing` varchar(500) DEFAULT NULL,
  `N_keywords` varchar(200) DEFAULT NULL,
  `N_description` varchar(500) DEFAULT NULL,
  `N_price2` decimal(10,2) DEFAULT '0.00',
  `N_vshow` int(11) DEFAULT '0',
  `N_ds` int(11) DEFAULT '0',
  `N_dsintro` text,
  `N_uncopy` int(11) DEFAULT '0',
  `N_sort2` int(11) DEFAULT '0',
  `N_viponly` int(11) DEFAULT '0',
  `N_content_en` longtext,
  `N_content_jp` longtext,
  `N_content_kor` longtext COMMENT '韩语',
  `N_content_ru` longtext COMMENT '俄语',
  `N_content_de` longtext COMMENT '德语',
  `N_content_spa` longtext COMMENT '西班牙语',
  `N_content_fra` longtext COMMENT '法语',
  `N_content_ara` longtext COMMENT '阿拉伯语',
  PRIMARY KEY (`N_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;
insert into `sl_news`(`N_id`,`N_title`,`N_content`,`N_pic`,`N_price`,`N_sort`,`N_del`,`N_order`,`N_long`,`N_date`,`N_author`,`N_view`,`N_preview`,`N_mid`,`N_sh`,`N_tag`,`N_fx`,`N_video`,`N_top`,`N_tpl`,`N_shuxing`,`N_keywords`,`N_description`,`N_price2`,`N_vshow`,`N_ds`,`N_dsintro`,`N_uncopy`,`N_sort2`,`N_viponly`,`N_content_en`,`N_content_jp`,`N_content_kor`,`N_content_ru`,`N_content_de`,`N_content_spa`,`N_content_fra`,`N_content_ara`) values('186','测试标题','<span style=\"color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:14px;background-color:#FFFFFF;\">通用翻译API通过 HTTP 接口对外提供多语种互译服务。您只需要通过调用通用翻译API，传入待翻译的内容，并指定要翻译的源语言（支持源语言语种自动检测）和目标语言种类，就可以得到相应的翻译结果。</span>','nopic.png','0.00','5','1','0','0','2021-06-11 12:38:31','admin','0','0','0','1','','0','','0','0','','','','0.00','0','0','','0','4','0','<span style=\"color:#333333; font- family:Helvetica , Arial, sans-serif; font- size:14px; background-color:#FFFFFF;\"> General translation API provides multilingual translation services through HTTP interface. You only need to call the general translation API, pass in the content to be translated, and specify the source language to be translated (support the automatic detection of source language) and the target language, then you can get the corresponding translation results</ span>','','','','','','','');
insert into `sl_news`(`N_id`,`N_title`,`N_content`,`N_pic`,`N_price`,`N_sort`,`N_del`,`N_order`,`N_long`,`N_date`,`N_author`,`N_view`,`N_preview`,`N_mid`,`N_sh`,`N_tag`,`N_fx`,`N_video`,`N_top`,`N_tpl`,`N_shuxing`,`N_keywords`,`N_description`,`N_price2`,`N_vshow`,`N_ds`,`N_dsintro`,`N_uncopy`,`N_sort2`,`N_viponly`,`N_content_en`,`N_content_jp`,`N_content_kor`,`N_content_ru`,`N_content_de`,`N_content_spa`,`N_content_fra`,`N_content_ara`) values('187','收费文章','<p>
	<span style=\"color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:14px;background-color:#FFFFFF;\">欢迎使用通用翻译API，本文档将指导您如何快速接入。</span> 
</p>','20210616103319eh.jpg','0.00','5','1','0','0','2021-06-16 10:07:38','admin','1','0','0','1','','0','','0','0','','','','0.00','0','0','','0','4','0','<p><span style=\"color:#333333; font- family:Helvetica , Arial, sans-serif; font- size:14px; background-color:#FFFFFF;\"> Welcome to the general translation API, this document will guide you how to quickly access</ span> </p>','<p>＜span style=\\_;font-family:HelveticaArial，sans-seriffont-size:14px;background-カラー:\"汎用翻訳APIをご利用ください。この文書はどのように迅速にアクセスするかを指導します。span></p>','','','','','','');
DROP TABLE IF EXISTS `sl_nsort`;
CREATE TABLE IF NOT EXISTS `sl_nsort` (
  `S_id` int(11) NOT NULL AUTO_INCREMENT,
  `S_title` text NOT NULL,
  `S_content` text NOT NULL,
  `S_pic` text NOT NULL,
  `S_del` int(11) NOT NULL DEFAULT '0',
  `S_sub` int(11) NOT NULL DEFAULT '0',
  `S_order` int(11) NOT NULL DEFAULT '0',
  `S_show` int(11) DEFAULT '1',
  `S_keywords` varchar(200) DEFAULT NULL,
  `S_icon` text,
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_orders`;
CREATE TABLE IF NOT EXISTS `sl_orders` (
  `O_id` int(11) NOT NULL AUTO_INCREMENT,
  `O_mid` int(11) NOT NULL DEFAULT '0',
  `O_pid` int(11) NOT NULL DEFAULT '0',
  `O_num` int(11) NOT NULL DEFAULT '0',
  `O_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `O_time` datetime NOT NULL,
  `O_del` int(11) NOT NULL DEFAULT '0',
  `O_type` int(11) NOT NULL DEFAULT '0',
  `O_nid` int(11) NOT NULL DEFAULT '0',
  `O_content` longtext,
  `O_title` text NOT NULL,
  `O_pic` text NOT NULL,
  `O_address` text NOT NULL,
  `O_state` int(11) NOT NULL DEFAULT '0',
  `O_genkey` varchar(200) DEFAULT NULL,
  `O_sellmid` int(11) DEFAULT '0',
  `O_wl` varchar(200) DEFAULT NULL,
  `O_wlno` varchar(200) DEFAULT NULL,
  `O_gg` varchar(200) DEFAULT NULL,
  `O_paytype` varchar(200) DEFAULT NULL,
  `O_wlinfo` varchar(5000) DEFAULT NULL,
  `O_cid` int(11) DEFAULT '0',
  `O_wlinfotime` datetime DEFAULT NULL,
  `O_time2` datetime DEFAULT NULL,
  `O_today` datetime DEFAULT NULL,
  `O_qid` int(11) DEFAULT '0',
  `O_quan` decimal(10,2) DEFAULT '0.00',
  `O_postage` decimal(10,2) DEFAULT '0.00',
  `O_city` text,
  `O_ip` text,
  `O_bz` text,
  `O_client` text,
  PRIMARY KEY (`O_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('14','3','52','1','50.00','2019-12-01 16:13:00','0','0','0','Ei70HZQs0n4ifHdZuIR0rxdk97dEFIkz','windows10正版激活码','20191201161206eo.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('15','3','52','2','90.00','2019-12-01 16:16:53','0','0','0','h3X88BkTMvD0ZPaJxJtEgKWOukfstRwr||2oD2zsIQf9ESD75qrT7UsHBfVWaDTmht','windows10正版激活码','20191201161206eo.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('16','3','0','1','1.00','2019-12-01 19:37:54','0','1','2','','斥资3.5亿 亨得利首次布局XX钟表2','20191117134303C6.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('17','3','0','1','0.02','2019-12-02 00:23:09','0','1','3','','共享单车的印度崛起：东方不亮西方亮？','20191117134418m4.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('18','3','52','1','100.00','2019-12-02 00:23:26','0','0','0','xifMiFcPTPxncHiaMsp4DW87sgJkIDMh','windows10正版激活码','20191201161206eo.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('19','3','52','1','100.00','2019-12-02 08:30:01','0','0','0','lklbrQNHLnmQIV57t8HSSkQgFRwh9lui','windows10正版激活码','20191201161206eo.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('20','11','0','1','0.02','2019-12-03 08:00:44','0','1','3','','共享单车的印度崛起：东方不亮西方亮？','20191117134418m4.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('21','3','0','1','1.00','2019-12-05 09:13:59','0','1','20','','滴滴“官宣”巨亏——是卖惨，还是真难','20191203142307Ts.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('22','3','0','1','1.00','2019-12-05 09:15:45','0','1','6','','抖音运营团队：抖音运营思维攻略','20191203140832NZ.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('23','3','0','1','1.00','2019-12-05 19:57:06','0','1','18','','咪蒙关停，靠“伪女权”挣钱还能撑多久','20191203142126a2.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('24','3','69','1','50.00','2019-12-05 19:59:05','0','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','短域名、缩短网址生成网站系统源码 可自行广告位','20191202220109pf.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('25','3','0','1','1.00','2019-12-07 13:38:16','0','1','11','','区块链未死！2019区块链+农业或将浴火重生','201912031413561o.jpg','','0','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('26','3','97','2','98.00','2019-12-07 21:55:19','0','0','0','实物商品，由商家手动发货','梦幻西游2点卡100元梦幻西游点卡1000点网易一卡通100元自动充值','20191203094443cv.jpg','  ','1','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('27','3','97','2','98.00','2019-12-07 21:56:36','0','0','0','实物商品，由商家手动发货','梦幻西游2点卡100元梦幻西游点卡1000点网易一卡通100元自动充值','20191203094443cv.jpg','山东省淄博市张店区柳泉路296号 亚太假日花园4号楼1603室 赵臣 15550344010','1','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('28','3','54','1','9.80','2019-12-08 11:39:55','0','0','0','发货内容（测试数据）','photoshop教程 教你玩转photoshop教程|ps教程含色彩系统','20191202212321aS.jpg','anchen0000159@vip.qq.com','1','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('29','3','54','1','9.80','2019-12-10 21:18:49','0','0','0','发货内容（测试数据）','photoshop教程 教你玩转photoshop教程|ps教程含色彩系统','20191202212321aS.jpg','anchen0000159@vip.qq.com','1','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('30','3','0','1','1.00','2019-12-11 11:08:20','0','1','19','','短视频的彷徨与退让：积蓄力量，正待春暖花开','20191203142156Sn.jpg','','1','','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('31','1','0','1','1.00','2021-05-31 13:58:21','0','1','139','20210531135812487636833315','抖音运营团队：抖音运营思维攻略','20191203140832NZ.jpg','','0','20210531135812487636833315','0','','','','微信支付','','0','','','','0','0.00','0.00','CHINA','127.0.0.1','','电脑端');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('32','1','0','1','1.00','2021-05-31 14:10:26','0','1','153','20210531141023780840525618','美国一公司送员工1000万美元奖金 平均一人拿5万','20191203142307Ts.jpg','','0','20210531141023780840525618','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('33','1','0','1','1.00','2021-06-02 17:51:58','0','1','134','20210602175156889728871612','普氏野马数量恢复至400余匹 历史比大熊猫还悠久','20191203142156Sn.jpg','','0','20210602175156889728871612','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('34','13','0','1','1.00','2021-06-04 10:51:00','0','1','153','20210604105051494296264655','美国一公司送员工1000万美元奖金 平均一人拿5万','20191203142307Ts.jpg','','0','20210604105051494296264655','0','','','','','','0','','','','0','0.00','0.00','','','','');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('35','13','0','1','1.00','2021-06-04 14:04:09','0','1','153','20210604140407226614795510','美国一公司送员工1000万美元奖金 平均一人拿5万','20191203142307Ts.jpg','admin@1','0','20210604140407226614795510','0','','','','支付宝','','0','','','','0','0.00','0.00','辽宁省大连市','127.0.0.1','','电脑端');
insert into `sl_orders`(`O_id`,`O_mid`,`O_pid`,`O_num`,`O_price`,`O_time`,`O_del`,`O_type`,`O_nid`,`O_content`,`O_title`,`O_pic`,`O_address`,`O_state`,`O_genkey`,`O_sellmid`,`O_wl`,`O_wlno`,`O_gg`,`O_paytype`,`O_wlinfo`,`O_cid`,`O_wlinfotime`,`O_time2`,`O_today`,`O_qid`,`O_quan`,`O_postage`,`O_city`,`O_ip`,`O_bz`,`O_client`) values('36','13','0','1','1.00','2021-06-04 14:04:23','0','1','153','20210604140419201753555038','美国一公司送员工1000万美元奖金 平均一人拿5万','20191203142307Ts.jpg','','0','20210604140419201753555038','0','','','','','','0','','','','0','0.00','0.00','','','','');
DROP TABLE IF EXISTS `sl_oss`;
CREATE TABLE IF NOT EXISTS `sl_oss` (
  `O_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `O_name` text,
  `C_md5` text,
  `O_md5` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`O_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_price`;
CREATE TABLE IF NOT EXISTS `sl_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipprice1` decimal(10,2) DEFAULT NULL,
  `timelong1` int(10) DEFAULT NULL,
  `vipprice2` decimal(10,2) DEFAULT NULL,
  `timelong2` int(10) DEFAULT NULL,
  `vipprice3` decimal(10,2) DEFAULT NULL,
  `timelong3` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
insert into `sl_price`(`id`,`vipprice1`,`timelong1`,`vipprice2`,`timelong2`,`vipprice3`,`timelong3`) values('1','20.00','20','0.00','0','0.00','0');
DROP TABLE IF EXISTS `sl_product`;
CREATE TABLE IF NOT EXISTS `sl_product` (
  `P_id` int(11) NOT NULL AUTO_INCREMENT,
  `P_title` text NOT NULL,
  `P_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `P_content` longtext,
  `P_sort` int(11) NOT NULL DEFAULT '0',
  `P_pic` text NOT NULL,
  `P_del` int(11) NOT NULL DEFAULT '0',
  `P_order` int(11) NOT NULL DEFAULT '0',
  `P_sell` longtext,
  `P_selltype` int(11) NOT NULL DEFAULT '0',
  `P_rest` int(11) NOT NULL DEFAULT '100',
  `P_view` int(11) DEFAULT '0',
  `P_sold` int(11) DEFAULT '0',
  `P_time` datetime DEFAULT NULL,
  `P_mid` int(11) DEFAULT '0',
  `P_sh` int(11) DEFAULT '0',
  `P_unlogin` int(11) DEFAULT '0',
  `P_tag` varchar(500) DEFAULT NULL,
  `P_fx` int(11) DEFAULT '0',
  `P_shuxing` varchar(500) DEFAULT NULL,
  `P_video` varchar(500) DEFAULT NULL,
  `P_taobao` varchar(500) DEFAULT NULL,
  `P_vip` int(11) DEFAULT '0',
  `P_top` int(11) DEFAULT '0',
  `P_tpl` int(11) DEFAULT '0',
  `P_keywords` varchar(200) DEFAULT NULL,
  `P_description` varchar(500) DEFAULT NULL,
  `P_price2` decimal(10,2) DEFAULT '0.00',
  `P_vshow` int(11) DEFAULT '0',
  `P_address` varchar(200) DEFAULT NULL,
  `P_price3` decimal(10,2) DEFAULT '0.00',
  `P_gg` varchar(5000) DEFAULT NULL,
  `P_ggsell` text,
  `P_viponly` int(11) DEFAULT '0',
  `P_code` text,
  `P_sort2` int(11) DEFAULT '0',
  `P_bz` text,
  `P_msg` text,
  `P_viponly2` int(11) DEFAULT '0',
  PRIMARY KEY (`P_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('53','PR ae速成视频教程抖音快手火山微视特效视频教程PR剪辑剪片AE教程','29.00','<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191128/1574922441564169.png\" title=\"1574922441564169.png\" /> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191128/1574922441815482.png\" title=\"1574922441815482.png\" /> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>','22','20191202212005yd.jpg','0','1','这里是发货内容（演示数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','29.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('54','photoshop教程 教你玩转photoshop教程|ps教程含色彩系统','9.80','<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">Photoshop素材.rar&nbsp;&nbsp;320.4MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps01开场白-开场白.怎么学.mp4&nbsp;&nbsp;34.1MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps02分辨率.矢量和位图.像素.dpi.mp4&nbsp;&nbsp;64.1MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps03hsi色彩模型.色相饱和度.人眼模型.mp4&nbsp;&nbsp;86.7MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps04RGB.光的成像原理.红绿蓝.加色混色法.mp4&nbsp;&nbsp;49.5MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps05CMYK.印刷成像原理.青品黄黑.减色混色法.mp4&nbsp;&nbsp;110.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps06Lab.Lab.灰度.位图.色彩空间.mp4&nbsp;&nbsp;51.1MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps07摄影技术.光圈与精神.曝光时间.闪光灯.摄影.mp4&nbsp;&nbsp;127.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps08窗口菜单.调板.调板井.全屏模式.工作区.mp4&nbsp;&nbsp;37.8MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps09视图菜单.显示比例.放大缩小.抓手工具.标尺参考线.mp4&nbsp;&nbsp;27.7MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps10图像与画布大小.图像大小.证件照.分辨率.像素画.mp4&nbsp;&nbsp;40.7MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps11旋转与翻转.旋转.翻转.角度.标尺.信息调板.mp4&nbsp;&nbsp;14.4MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps12裁切.旋转裁切.透视裁切.proposter.裁切工具.mp4&nbsp;&nbsp;29.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps13图片合并.人工广角.图层.不透明度.photomerge.画布大小.mp4&nbsp;&nbsp;47.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps14选区入门.矩形选区.椭圆选区.图层合并.选区复制.mp4&nbsp;&nbsp;64.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps15选区加减.选区相加.选区相减.选区相交.太极图.mp4&nbsp;&nbsp;25.6MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps16各种套索.自由套索.磁性套索.直线套索.边对比度.频率.mp4&nbsp;&nbsp;34.9MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps17魔术棒.快速选择.容差.对所有图层连续.mp4&nbsp;&nbsp;42.3MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps18羽化.羽化.羽化半径.选区.半透明.mp4&nbsp;&nbsp;46.3MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps19选区综合练习.色彩范围.抽出.选区运算.综合选取.选区综合练习.mp4&nbsp;&nbsp;58.3MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps20图片合成练习.打开思路.天马行空.mp4&nbsp;&nbsp;44.4MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps21图片的描边和填充.描边.填充.历史记录.撤销多步.mp4&nbsp;&nbsp;43.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps22变形工具.斜切.透视.扭曲.变形.mp4&nbsp;&nbsp;70.1MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps23螺旋结构.相互覆盖.遮盖.环环相扣.mp4&nbsp;&nbsp;38.6MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps24选取操作.扩大选区.缩小选取.选区平滑.mp4&nbsp;&nbsp;54.6MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps25色板和油漆桶.mp4&nbsp;&nbsp;29.6MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps26图案.油漆桶.填充图案.自定义图案.mp4&nbsp;&nbsp;85MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps27渐变.线性渐变.径向.角度.水晶恩扭.mp4&nbsp;&nbsp;72.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps28直方图.曝光过度.冲洗照片.反差不足.mp4&nbsp;&nbsp;172.8MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">PS29色阶基础.黑场.白场.输入.输出.mp4&nbsp;&nbsp;60.2MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps30色阶上色.修改颜色通道.mp4&nbsp;&nbsp;78.1MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps31曲线基础.黑场白场.曲线调整.明暗.直方图.mp4&nbsp;&nbsp;61.5MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps32曲线上色.rgb.修改曲线.美容化妆.彩虹头髮.mp4&nbsp;&nbsp;93.6MB</span><br />
<span style=\"color:#444444;font-family:Tahoma, Helvetica, SimSun, sans-serif;background-color:#FFFFFF;\">ps33各种色彩调整命令.通道混合器.变化.色彩平衡.替换颜色.mp4&nbsp;&nbsp;58.8MB</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\"><br />
</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\"> 本店承诺学不会不要钱&nbsp; &nbsp; 每个教程都有详细是视频文字解说 </span> 
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\"><br />
</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">教程太多有一些没有放上去&nbsp; 需要什么教程说下 有任何疑问随时联系我</span> 
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\"><br />
</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\"> 祝您学会技术 开店创业&nbsp; 赚大钱</span> 
</p>','6','20191202212321aS.jpg','0','3','发货内容（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.80','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('55','photoshop基础入门教程视频全集 73课','50.00','<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">photoshop基础入门教程视频全集 73课</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">ps入门教程零基础视频、photoshop基础入门教程频全集入门教程、ps初学者基础教程</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">ps教程最新版ps学习教程价值800元（73课）</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">魔术棒抠图方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">色彩范围抠图牛奶杯案例</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">多边形抠图电脑广告案例</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">课后作业椅子主图</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">裁剪工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">修改图形大小</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">使用变换命令</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">内容识别比例缩放与自由变换</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">操控变形</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">通过变形为雨伞贴图</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">认识Photoshop</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">作品给墙面换背景</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">认识图层介绍</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">对齐工具与分布对齐的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">图层样式的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">金属文字制作</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">文字叠加纹理方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">蒙版抠图方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">矢量路径的使用方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">剪贴蒙版的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">通道抠图头发丝</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">常用设置</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">作业手机广告</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">画笔介绍</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">画笔的导入与自定义画笔</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">邮票制作图案</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">渐变工具案例</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">仿制图章工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">用修补工具去除人物</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">污点修复工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">用内容感知移动工具修复照片</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">用液化滤镜瘦脸</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">文档的新建</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">用液化滤镜修出完美身材</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">消失点工具</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">文字工具和段落的使用方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">文字变形及水印添加方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">路劲文字印章图案制作</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">宣传单排版制作</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">宣传单排版案例</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">钢笔工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">形状工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">路径的运算</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">常用工具</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">钢笔抠图方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">图标绘制</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">制作高对比度的黑白人像照片</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">给衣服换色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">亮度对比度色阶曲线</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">色彩平衡调色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">通道混合器调色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">可选颜色调色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">照片调色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">婚纱照片的调色</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">旧版切换</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">认识滤镜库</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">成角线条水墨效果</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">风格化的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">模糊工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">扭曲工具的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">锐化效果</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">马赛克的使用方法</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">镜头光晕效果</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">杂色的使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">动作介绍</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">选区的基本操作</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">照片调色动作使用</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">合成场景抠图</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">抠图场景合成</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">合作完成</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">图形选区抠图案例</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">多边形抠图</span> 
	</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"><br />
</p>
<p style=\"color:#333333;font-family:\" font-size:14px;\"=\"\"> <span style=\"font-size:16px;\">快速选择工具抠图</span> 
	</p>','6','20191202212501L3.jpg','0','2','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','50.00','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('56','自学PS淘宝美工 平面设计培训班视频教程','49.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">淘宝美工/平面设计培训班PS教程 自学淘宝美工视频教程 速成班哪里学</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Ps淘宝美工教程视频全集 自学淘宝美工视频教程_培训淘宝美工基础教程初级视频</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">淘宝美工培训/Ps淘宝美工教程视频全集目录截图</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/83951506613433.jpg\" title=\"淘宝美工教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/48891506613433.jpg\" title=\"淘宝美工视频教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/55681506613434.jpg\" title=\"淘宝美工教程\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/92401506613434.jpg\" title=\"淘宝美工视频教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/75371506613434.jpg\" title=\"淘宝美工教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/3801506613435.jpg\" title=\"淘宝美工视频教程\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/66131506613435.jpg\" title=\"淘宝美工教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/47421506613435.jpg\" title=\"淘宝美工视频教程\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/15441506613436.jpg\" title=\"淘宝美工教程\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/75431506613436.jpg\" title=\"淘宝美工视频教程\" />
</p>','6','20191202212655um.jpg','0','4','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','49.80','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('57','淘宝开店 小本生意 摆地摊进货渠道、厂商批发货源大全 快速创业','9.90','<strong><span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;font-size:18px;\">具体内容如下：</span></strong><br />
<span style=\"color:#333333;font-family:&quot;font-size:16px;\"><span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">1.《1420家最新实用致富机械产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">2.《920家新奇特产品产销厂家》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">3.《1030家玩具产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">4.《740家新奇小家电产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">5.《610家娱乐用品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">6.《1060家文教体育用品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">7.《620家安防、防盗报警产品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">8.《550家性保健品、计生用品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">9.《1150家皮革、服装、鞋帽产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">10.《580家孕婴、儿童用品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">11.《830家工艺美术品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">12.《600家全国各地残疾人用品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">13.《900家图书报刊、音像制品发行商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">14.《950家各类模具产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">15.《970家塑料制品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">16.《780家橡胶制品产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">17.《680家生化产品收购加工单位》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">18.《2008最新网上开店进货渠道大全及开店方案》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">19.《870家化工原料产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">20.《600家全国各地香料、香精产销厂商》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">21.《650家全国各地中药材收购厂家》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">22.《600家全国特种养殖业供种基地》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">23.《800家全国食用菌种植业供种基地》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">24.《680家全国食用菌种植、供种、回收加工厂》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">25.《650家全国各地土特产收购单位》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">26.《600家全国药材、花草、畜禽优良种苗邮购单位》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">27.《中国小商品城货源大全》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">28.《广州第一手批发市场详情》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">29.《最新实用热门致富技术大汇编》</span><br />
<span style=\"color:#444444;font-family:Tahoma, &quot;background-color:#FFFFFF;\">30.《20种生化产品生产技术大全》</span></span>','7','201912022128104q.jpg','0','1','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.90','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('58','300款淘宝海报设计psd分层模板 广告艺术字文字源文件素材模版','9.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">本店全自动发货 只要您拍下教程马上到手</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; &nbsp; 本店承诺学不会不要钱&nbsp; &nbsp; 每个教程都有详细是视频文字解说&nbsp;</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">教程太多有一些没有放上去&nbsp; 需要什么教程说下 有任何疑问随时联系我</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 祝您学会技术 开店创业&nbsp; 赚大钱</span>
</p>','7','20191202212901ie.jpg','0','2','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.80','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('59','淘宝博士网VIP教程全套10部分完整下载高清版（价值399元）','19.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	淘宝博士网VIP教程全套10部分完整下载高清版（价值399元）
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	本店承诺学不会不要钱 每个教程配方精准到克&nbsp; 详细的视频教程文字解说&nbsp;
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	教程太多有一些没有放上去&nbsp; 需要什么教程说下 有任何疑问随时联系我
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;祝您学会技术 开店创业&nbsp; 赚大钱
</p>','7','20191202213032Ad.jpg','0','3','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','19.80','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('60','新手如何开网店 怎样开网店赚钱的详细步骤视频教程','66.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">新手<strong>如何开网店</strong>&nbsp;怎样<strong>开网店赚钱</strong>的详细步骤流程视频教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">先导课-从买买买到卖卖卖&nbsp;新手如何开网店 怎样开网店赚钱的详细步骤</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">开网店比你想象的更简单、更赚钱-从月薪4千到月流水百万，我只用了2年</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店的详细步骤、新手怎么样在淘宝上开网店详细步骤</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第1课-选对平台开店—平台那么多，选择要看这3点</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第2课-清晰店铺定位-不做什么都有的杂货铺</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第3课-极简店铺设计-省钱有效的视觉促销</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第4课-选对爆款货品—供货渠道以及选品的诀窍</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第5课-爆款商品文案—看了就想买的文案这样写</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第6课-搞定初期客源—开店第一个月3招让你的客源增增增</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第7课-条条大路能卖货-你的朋友圈、微博、公众号都很值钱</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第8课-树口碑服务—好产品加好方法，让你的顾客主动刷好评</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第9课-提升客户粘性—增加回头客和复购率的实用妙招</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第10课-目标设定和拆解——月入10W+的营收法则</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第11课-从分销到代理—销量的指数型增长</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何开网店视频教程 第12课-这些血泪经验让你不走弯路，成功的做自己的老板</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">。。。。。。如何开网店的详细步骤、新手怎么样在淘宝上开网店详细步骤</span>
</p>','7','20191202213301v2.jpg','0','5','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','66.00','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('61','传课SEO网站优化 seo系统培训精讲 进阶','50.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 seo系统培训精讲 进阶
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 seo系统培训 课程目录&nbsp;
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 00-<a href=\"http://www.jztuan.net/product/search_j7v_k54v.html\" target=\"_blank\">seo优化</a>课程介绍及综述
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 01-网站优化基础知识
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 02-网站基本结构
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 03-关键词
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 04-网站内容建设
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 05-用户体验
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 06-网站改版
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	传课SEO网站优化 07-常用网络推广方法精讲
</p>','8','20191202213408Ni.jpg','0','1','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','50.00','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('62','网站刷权重技巧 如何快速提高百度权重优化方法','19.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:16px;\">网站刷权重</span></strong><span style=\"font-size:16px;\">技巧 如何快速提高百度权重优化方法+全套代码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何提高百度权重，刷百度权重，这个已经不是什么新东西了，属于</span><a href=\"http://www.jztuan.net/product/search_j7v_k54v_m83v.html\" target=\"_blank\"><span>黑帽seo技术</span></a><span style=\"font-size:16px;\">的一种；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">怎么刷网站权重？上年有段时间刷百度权重刷的很火，很多人把一些冷门的词刷上去</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">然后获得很高的百度权重，骗了不少不懂行情的人。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何提高百度权重，其实原理还是很简单的，但百度官方并没有\"权重\"这一说</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">权重只是第三方平台，如站长工具、爱站网通过他们自己的算法，算出来的一个参考值而已。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何提高百度权重 刷百度权重指数&nbsp;原理<br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">首先，写一个页面，页面内嵌框架，通过访问这个页面，实现百度搜索某个关键词的行为<br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">一直访问这个页面就实现了n多人搜索某个关键词的假象，最终实现某个关键词的搜索指数。。。。。</span>
</p>','8','20191202213514Mm.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','19.80','0','name,mobile,address','0.00','','','0','','5','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('63','仿淘宝网上商城系统 淘宝网站源码 带教程','150.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">云商城源码 类似于淘宝商城系统 附教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">仿淘宝网上商城系统源码 搭建简略步骤：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1.上传源码，解压源码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.访问域名，进行安装，按照提示输入数据库账号和密码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3.安装完成后默认账号admin 密码是你自己填写的</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">仿淘宝网上商城系统源码&nbsp;效果截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191202/1575281162780438.jpg\" title=\"仿淘宝商城源码\" alt=\"仿淘宝商城源码\" width=\"700\" height=\"1132\" border=\"0\" style=\"width:700px;height:1132px;\" />
</p>','10','20191202215253Wb.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','150.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('64','仿趣网ecshop成人用品商城系统模板源码 分销/秒杀','68.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">仿趣网ecshop成人用品商城系统模板源码 微分销/秒杀/预售</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ecshop成人用品仿趣网微分销秒杀预售商城源码模板</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">风格类型: 电子商务</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">源码类型: PHP源码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">服务类型: 网页/页面设计</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">PHP版本: 5.2-5.6程序: ecshop2.7.3</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">微信公众号: 认证公众号</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">类型: 整站带数据</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">MYSQL版本: MYSQL5</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">运行系统环境要求推荐配置：Linux + Apache + Mysql + PHP</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">操作系统：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Linux （支持Unix/FreeBSD/Solaris/Windows NT（2000/2003）等操作系统）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">WEB服务器：Apache （支持httpd, Zeus, IIS 等WEB服务器）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">数据库：Mysql （3.23 或者更高版本）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">程序支持：PHP 4.3.0及以上版本 （推荐使用5.2~5.3系列最新版本）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">最高支持5.6版本，如需支持更高版本请自行二开升级。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">仿趣网ecshop成人用品商城系统模板源码 微分销/秒杀/预售截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20181115/1542277778302341.jpg\" title=\"成人用品商城源码\" alt=\"成人用品商城源码\" width=\"640\" height=\"2424\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20181115/1542277797796991.jpg\" title=\"成人用品商城系统\" alt=\"成人用品商城系统\" width=\"800\" height=\"1695\" />
</p>','10','20191202215412Ei.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','68.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('65','Thinkphp仿拼多多微信拼团商城源代码 带教程','150.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	Thinkphp仿拼多多微信拼团商城源代码 带教程
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	仿拼多多微信拼团源码完美运营版带详细配置教程多商家入驻+出码平台Thinkphp内核
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	拼多多是比较火的拼团商城系统，今天分享的仿拼多多微信拼团源码
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	主要是基于ThinkPHP框架后台管理系统制作，是目前来说最新微信拼团系统。
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	完美运营版，带详细配置教程！
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	源仿拼多多程序完整源码导入数据库后台，修改config/database.php的数据库配置文件即可。
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	仿拼多多微信拼团商城源代码 后台访问地址：域名/admin.php
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	账号：admin密码：123456亲测可用
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	测试环境：php7.2+apache
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	运行环境：php+mysql
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	仿拼多多微信拼团商城源代码&nbsp;效果截图：
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191115/1573813975573598.jpg\" title=\"微信拼团源代码\" alt=\"微信拼团源代码\" width=\"500\" height=\"1059\" border=\"0\" style=\"width:500px;height:1059px;\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191115/1573813992421173.jpg\" title=\"拼团源码\" alt=\"拼团源码\" width=\"500\" height=\"1161\" border=\"0\" style=\"width:500px;height:1161px;\" />
</p>','10','20191202215511iM.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','150.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('66','2019新淘宝客源码程序|淘客源码三合一四合一源码程序送防封发单软件','198.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF0000;\"><strong><span style=\"font-size:24px;\">本店源码均经过测试，并提供售后服务！可放心购买！有疑问请咨询客服！</span></strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF0000;font-size:24px;\"><strong>写在前面的话：我劝你看一看</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><span style=\"color:#FF0000;\">这套源码的好处就是 ,只要你搭建好了，网站你几乎不用管，你可以完全从网站运营解脱出来，而去注重更重要的东西，那就是</span><strong><span style=\"color:#FF00FF;\">流量</span></strong><span style=\"color:#FF0000;\">，流量是一切生意的根本，很多小淘客，完全错了，网站一天IP就几个，整天都在鼓捣网站，这里看着不好，改改，那里看着不行改改，然后一个月过去，账户里收入几十块！不知道你是要干嘛，网站他只是一个程序，都是大同小异的&nbsp;最根本的还是流量，以前你工作8小时，每天要花3个小时优化调整网站，而现在你工作只需要做4个字那就是</span><strong><span style=\"color:#FF00FF;\">专注引流</span></strong><span style=\"color:#FF0000;\">，其他交给第三方的专业平台，你就是一个破网站&nbsp;&nbsp;只要有流量一个月淘客大几万也是很轻松！</span></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:24px;\"><span style=\"color:#FF0000;\">号外号外，走过路过不要错过</span><span style=\"color:#FF00FF;\">【</span></span></strong><strong><span style=\"font-size:24px;color:#FF00FF;\">四合一源码</span></strong><strong><span style=\"font-size:24px;\"><span style=\"color:#FF00FF;\">双十一特惠】</span></span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;color:#0000FF;\"><strong>本源码不同于市面上的辣鸡源码，界面老旧，链接打不开，后台功能少，要手动选品，手动发单，人工维护成本高！这种源码现在可以丢了！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF0000;font-size:18px;\"><strong>本淘客源码优势：</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;color:#FF00FF;\"><strong>1、全天24小时无需管理，配合发单软件更是完成全自动的发单功能！&nbsp;</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;color:#FF00FF;\"><strong>2、无需手动选品，我们看到页面上的宝贝是国内老牌大淘客平台人工筛选出来的优质爆款！以及其他平台上的精选宝贝。</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;color:#FF00FF;\"><strong>3、数据自动同步，无需更新，完全解放双手！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;color:#FF00FF;\"><strong>4、页面新意、兼容性强，页面全面兼容市面上所有设备PC+pad+手机不会因为显示问题让客户烦劳！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF00FF;font-size:16px;\"><strong>5、一键完美生成Androd APP&nbsp; 以及IOS 让用户粘性更强！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong>本程序完全开源 无授权！</strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:18px;color:#FF0000;\">双十一即将来临 小白也可以搭建属于自己的淘宝客网站啦！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:18px;color:#FF00FF;\">动动手指把页面分享到朋友圈既有面子又能赚钱！岂不人生乐事！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:24px;color:#FFCC00;\"><strong>198元=</strong><strong>淘宝+京东+拼多多+VIP影院四合一源码！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"color:#FF0000;\">另外还有APP+小白安装视频教程+超Nice的客服！你就可以全部拥有带回家！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:18px;color:#FF00FF;\">QQ随时响应！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF00FF;\"><span style=\"font-size:18px;\"><strong>注意：此程序借助三个官方联盟精选产品库，无需数据库支持、</strong></span><strong>无后台 ！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF00FF;font-size:18px;\"><strong>【本源码优点】：</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF00FF;font-size:18px;\"><strong>此程序无后台，完全依赖第三方平台，做过技术优化，加载速度超快！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF0000;font-size:18px;\"><strong>本程序完美支持淘宝客，JD联盟，以及拼多多的多多进宝！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"color:#FF0000;font-size:18px;\">本源码为</span><span style=\"color:#FF0000;font-size:24px;\">24小时自动发货！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"color:#FF0000;font-size:24px;\"><strong>下单前请访问演示站测试</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;color:#008000;\"><strong>是自己想要的再拍以免产生不必要的纠纷谢谢！</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:16px;color:#FF0000;\">不会安装请购买安装服务！所有问题都尽量一一解答！</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<strong><span style=\"font-size:16px;color:#FF0000;\"><br />
</span></strong>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;color:#800080;\"><strong>好评送淘宝客引流教程+网页APP打包技术+</strong><strong>防封发单软件</strong></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191113/1573621803763997.jpg\" title=\"1573621803763997.jpg\" alt=\"QQ图片20191113130931.jpg\" /><img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191113/1573621766746394.jpg\" title=\"1573621766746394.jpg\" alt=\"QQ截图20191113130901.jpg\" />
</p>','10','20191202215625KG.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','198.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('67','即用WIFI小程序源码v2.3.3 前后端 微擎模块','50.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI小程序源码v2.3.3 前后端 微擎模块</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">更新动态：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、修改提现页面空白问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、修复其它客户反馈问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、修复拼团页空白问题</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、修复个别页面苹果手机不显示图标问题</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、修复代理中心看不到审核状态区长问题</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">6、首页新增流量主插屏广告功能</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">7、修复后台关闭wifi入驻无效问题</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">8、优化后台各栏目众多数据显示问题</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI主要整合线下门店WIFI、热点新闻、代理商代理、广告营收等综合性平台，旨在为用户提供免费网络之余，平台与代理商及门店可以赚取广告分成，达到多赢效果。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI红包营销插件，主要是为了沉淀客户，让用户留下来浏览广告领取红包，商家可以通过用户点击广告有提成赚钱。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI社区拼团插件，是借助我们这个平台，把小区邻里的拉入这个平台来一起参与拼团，通过线上优惠活动销售商品，然后在通过线下门店配送或者用户自提。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI自媒体插件，主要是为了吸引自媒体的人来发布文章。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">即用WIFI小程序源码截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20190929/1569714889957638.jpg\" title=\"WIFI小程序\" alt=\"WIFI小程序\" width=\"600\" height=\"515\" border=\"0\" style=\"width:600px;height:515px;\" />
</p>','11','201912022158112T.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','50.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('68','大气游戏辅助出售推广网站源码','50.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	大气游戏辅助出售推广网站源码
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	游戏辅助推广网站，大气吃鸡辅助推广源码，穿越火线，绝地求生，软件销售推广
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	把源码上传到根目录,把数据库文件导入数据库
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	修改数据库配置文件：/data/config/database.ini.php
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	然后登陆后台：/admin
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	账户：admin
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	密码：admin888
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	先把设置-站点管理里面的绝地求生信息改成自己的，然后刷新下页面。
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	首页文字修改 数据库 表 xiao_block 首页文字 更新缓存
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	大气游戏辅助出售推广网站源码&nbsp;效果截图：
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191102/1572660167987183.jpg\" title=\"游戏推广网站源码\" alt=\"游戏推广网站源码\" width=\"800\" height=\"1491\" border=\"0\" style=\"width:800px;height:1491px;\" />
</p>','11','201912022159253o.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','50.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('69','短域名、缩短网址生成网站系统源码 可自行广告位','50.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">短域名、缩短网址生成网站系统</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">木鱼网址缩短服务 短域名生成网站源码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">一个网址缩短服务的网站</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">页面简洁，可自行添加广告位</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">所用的源码基于php、SQLite进行开发</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">总大小仅10K左右，十分轻巧</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">搭建教程免费主机三楼一大堆</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">上传源码到根目录解压出来即可</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">短域名、缩短网址生成网站系统源码截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191111/1573484589105480.jpg\" title=\"短网址生成源码\" alt=\"短网址生成源码\" width=\"700\" height=\"361\" border=\"0\" style=\"width:700px;height:361px;\" />
</p>','11','20191202220109pf.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','50.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('70','[爱站]网址导航网站源码 帝国cms模板 带数据库','60.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[爱站]网址导航网站源码 帝国cms模板 带数据库</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">今天给大家带来的是一套帝国cms的导航系统非常nice</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[爱站]网址导航网站源码和数据我会打包&nbsp;</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[爱站]网址导航网站源码安装说明，购买后里面更详细</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">&nbsp;删除e/install/install.off<br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">访问域名e/install</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">表名前缀 zmb</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">然后 系统 /备份与恢复数据/恢复数据 /选择目录 选择第一个/开始恢复</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">然后来到数据更新/全部更新一遍 这边首页数据写入恢复会比较慢可以在等一会&nbsp;</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">恢复完的首页就是这样了 还可以&nbsp; 还有其他功能自己可以慢慢去研究就不多说了</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[爱站]网址导航网站源码 帝国cms模板截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/ueditor/php/upload/image/20190514/1557808121925828.jpg\" title=\"网址导航源码\" alt=\"网址导航源码\" width=\"961\" height=\"648\" border=\"0\" style=\"width:961px;height:648px;\" />
</p>','11','20191202220226F5.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','60.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('71','原生呆萌直播系统源码 带游戏+IOS+安卓+PC端','399.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌在线直播系统原生</span><span style=\"font-size:16px;\">&nbsp;三端开源版 带游戏+IOS+安卓端+PC端</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌直播系统是一款集在线直播、社交互动、分享传播、数据分析等于一体，助您快速搭建自己直播平台的流媒体系统，支持主播和用户随时发起直播、观看直播、连麦互动、送礼打赏等功能…</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌直播系统包括手机直播APP（安卓、苹果）客户端，PC管理后台。手机端安卓开发语言采用Java，IOS 苹果采用obje-ct c 原生开发，后台管理采用PHP 语言开发，所有服务提供横向扩展。系统支持分布式部署，可以负载大数据运营，抗击千万高并发，保障直播高清稳定流畅进行。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌直播提供系统源代码，可二次开发，支持花椒、映客直播平台搭建，同时也可提供类似于淘宝直播、聚美优品直播的直播+购物等的嵌入系统源码。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌在线直播系统原生源码 - 适用范围</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌直播系统源码|直播程序源码|仿映客花椒直播源码广泛应用于： 购物直播 美女秀场直播 教育直播 嵌入式直播 游戏直播 社交直播 o2o直播 众筹路演直播等多领域，提供多行业互动直播应用解决方案</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌直播系统重点功能展示</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">直播手机app端（安卓+ios）：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌在线直播系统原生源码 -&nbsp; 打赏送礼：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">礼物多样可供选择，多重礼物连发为你支持心目中喜爱的他</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">在线交流互动+关注主播：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持弹幕、在线交流、私信消息、</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">关注主播、查看观众席列表信息</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">连麦+分享：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">用户可以向主播申请连麦，用户的声音可以在直播房间显示，最多支持一个主播同时连麦三个用户。用户还可分享当前视频到微博、微信、朋友圈、QQ等社交平台 美颜+镜头设置+音质调节：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">强大的美颜效果，瞬间变身白富美!支持镜头翻转、闪光灯等功能，还可以调节麦克风音量，带来最佳的直播效果。此外，主播开可以自由设置房间名字，查看观众数量，接受礼物并提现，以及将直播房间进行社会化分享</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌在线直播系统原生源码 -&nbsp; 直播系统PC管理后台</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">主播+视频+道具管理：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持审核认证主播资料，设置主播等级，添加礼物道具，视频监控管理、设置机器人充当观众等功能</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">呆萌在线直播系统原生源码&nbsp;效果截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191126/1574781949189070.jpg\" title=\"直播系统\" alt=\"直播系统\" width=\"458\" height=\"750\" border=\"0\" style=\"width:458px;height:750px;\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191126/1574781967193213.jpg\" title=\"在线直播系统\" alt=\"在线直播系统\" width=\"390\" height=\"789\" border=\"0\" style=\"width:390px;height:789px;\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191126/1574781980554096.jpg\" title=\"直播系统\" alt=\"直播系统\" width=\"456\" height=\"781\" border=\"0\" style=\"width:456px;height:781px;\" />
</p>','12','20191202220425r4.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','399.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('72','小智微直播平台小程序源码v3.5.2 微擎功能模块','60.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">小智微直播平台小程序源码v3.5.2 开源版 微擎功能模块</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">更新动态：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">版本号：小智微直播平台小程序源码v3.5.2 - 超级平台版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1.新增批量删除评论 和付费重置</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">小智微直播平台小程序源码截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191006/1570338549559943.jpg\" title=\"微直播平台小程序\" alt=\"微直播平台小程序\" width=\"800\" height=\"715\" border=\"0\" style=\"width:800px;height:715px;\" />
</p>','12','201912022205292o.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','60.00','0','name,mobile,address','0.00','','','0','','9','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('73','QQ空间全能王批量发布大师 QQ空间全能王软件','9.98','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">营销<span><strong>QQ空间全能王</strong></span>批量发布大师 全新QQ空间全能王神器/QQ空间全能王软件</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">QQ空间全能王神器营销软件示一：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">留言内容，评论内容，发布内容，这些都是使用///进行分隔</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">QQ空间全能王提示二：随机变量</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">软件支持：随机字母，随机汉字，随机字符，随机数字，随机表情</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">随机变量示范如：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机字母5] 这个的意思就是 随机用5个字母的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机字母2] 这个的意思就是 随机用2个字母的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机表情5] 这个的意思就是 随机用5个表情的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机表情2] 这个的意思就是 随机用2个表情的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机表情x] 这个的意思就是 随机用(1-20)个表情的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">[随机字母x] 这个的意思就是 随机用(1-20)个字母的意思</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持多帐号，支持帐号模式，支持cookies模式，全部采用多线程，同时支持单线程，支持宽带拨号换IP，支持单帐号，多帐号循环或单一</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能一：批量发布说说，说说支持带图片，支持自定义图片</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能二：批量发布日志，支持多篇日志循环发布</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能三：批量分布分享，支持多链接，支持网页，支持视频，支持原始网页链接，软件能自动分辨</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能四：说说互动功能，支持指定QQ点赞软件或者指定说说批量互动，互动功能：评论说说，转载说说，收藏说说，赞说说</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能五：日志互动功能，支持指定QQ说说点赞软件或者指定日志批量互动，互动功能：评论日志，转载日志，收藏日志，赞日志，分享日志</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能六：分享互动功能，支持指定QQ或者指定分享批量互动，互动功能：评论分享，转载分享，收藏分享，赞分享</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能七：分享互动功能，支持指定QQ或者指定相片批量互动，互动功能：评论相片，赞相片，同时支持相册模式</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能八：群发留言功能，支持指定QQ或者批量QQ群发留言，支持图片表情等等多功能群发留言</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能九：批量赞空间主页，多帐号循环赞，批量赞</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能十：批量给认证空间加关注(加粉)</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能11：批量修改空间权限，空间资料，空间头像，开通空间</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能12：空间清理大师，批量清理空间访客，空间日志，空间留言，空间相册等等，空间清理</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">功能13：批量QQ空间留痕，QQ空间批量访问，留痕，跑堂助手</span>
</p>','14','20191202220747zE.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.98','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('74','IA智能机器人','1588.00','<span style=\"color:#333333;font-family:&quot;font-size:14px;\">IA智能机器人包括；微信智能回复机器人，QQ智能机器人等</span>','14','20191202220911BH.gif','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','1588.00','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('75','豪迪qq消息群发器 群发信息软件工具完美破解版','39.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">豪迪qq消息群发器 豪迪qq群发信息软件工具完美破解版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><strong>豪迪QQ群发器</strong>完美已注册版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">解压直接使用里面的破解补丁启动即可</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">向QQ好友、群、群成员发送文字、图片、文件、离线文件。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">可以选择发送的好友分组。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">豪迪qq消息群发器软件特点：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">快速、稳定、操作简单</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">豪迪qq消息群发器支持多个内容自动轮换发送。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">豪迪qq消息群发器支持添加随机字母、数字、文字。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">群发的消息中可自动添加对方昵称以及QQ表情，增加亲切感；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你只想对某些好友组群发消息，只将这些组展开即可；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你不想让某些用户收到群发的消息，只需将他们的QQ昵称加入禁止发送名单；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">豪迪qq消息群发器自动记录每次发送的详细情况。</span>
</p>','14','20191202220956bk.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','39.80','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('76','第五代qqplus机器人_酷qqplus群自动回复机器人破解版注册机+词库','9.98','<div class=\"viewtxt\" id=\"bqdiv1\" style=\"margin:0px auto;padding:5px 15px 15px;font-size:14px;\">
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\">第五代qqplus机器人破解版_免费酷qqplus群自动回复机器人破解版注册机</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\">+词库大全套下载（易语言</span><span style=\"font-size:16px;\">编写）</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\"><span style=\"font-size:14px;line-height:24px;\">第五代qqplus机器人破解版</span>QQ机器人安装方法<br />
1．选择与您论坛一致的插件编码，将upload内目录上传至您的论坛根目录；<br />
2．进入后台，插件——安装新插件，按照步骤安装即可；<br />
3．启用插件，进入插件设置面板按需设置相关参数或选项；<br />
4．进入插件高级设置，点击登陆QQ即可；</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\"><span style=\"font-size:14px;line-height:24px;\">第五代qqplus机器人破解版</span>与网站</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\">虚拟主机QQ机器人的诞生，更好的加强了QQ与网站的联系。<br />
1．绑定QQ到网站或者论坛，加QQ机器人为好友，验证QQ的真实有效性。<br />
2．当你咨询QQ机器人一些问题的时候，QQ机器人会在数据库里找到相应的回答，并答复你。当然有答非所问，或者不知道回答什么的时候，所以必须要建立强大的数据库。<br />
3．当论坛或网站，留言回复或有新帖子发布，QQ机器人会给你发个消息说明，并引导你去查看。<br />
4．虚拟主机QQ机器人，更好的把访客从QQ引导到网站，增加了网站粘度，并增加了互动性。</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\"><span style=\"font-size:14px;line-height:24px;\">第五代qqplus机器人破解版</span>是一种对QQ进行功能扩展的程序，在机器人服务端登录QQ号码后可以按照预先设定的一些指令自动完成某些任务，例如与好友进行交谈，如腾讯的叨客机器人，也可以执行一些数据交互任务，如滔滔和得瑟的机器人，就是将好友发来的消息推送的网站，实现qq与网站的交互。<br />
由于腾讯暂未公开qq</span><span style=\"font-size:16px;\">接口，大部分非腾讯官方的机器人都是采用lumaqq等开源qq协议进行编写。目前还没有开源的qq机器人，部分网站提供webservice.<br />
QQ机器人其实就是把常用的数据录入到数据库中，当你提交不同的数据就会自动从数据库中调用不同的数据反馈给你，完全就是一个搜索查找功能，和百度的搜索没有什么两样，完全是一问一答，有的时候还是答非所问。数据中的数据还有待大量的搜集和完善。QQ机器人的发展前景是非常广阔的。</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<a href=\"http://www.hyyxsoft.cn/wp-content/uploads/2015/12/2015121716132070.jpg\"><img class=\"alignnone size-full wp-image-618\" src=\"http://www.jztuan.net/config/ueditor/php/upload/71431450571586.jpg\" alt=\"QQ机器人\" style=\"height:auto;\" /></a>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\"><span style=\"font-size:14px;line-height:24px;\">第五代qqplus机器人破解版</span>特点</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\">1．可以和各类插件web接口与各类程序完美整合，并与官方同步更新，不用担心代码失效。<br />
2．不必拥有自己的独立服务器或VPS，挂机服务器提供并维护。<br />
3．QQ机器人远程检测功能，就算有验证码，也能智能登陆，属于国内首创。<br />
4．web接口多样化</span><span style=\"font-size:16px;\">推广：Discuz!X、DedeCMS、PHPCMS、记事狗微博系统、shopex、微信系统等主流PHP应用。<br />
5．采用独创触发式通知QQ机器人发消息，彻底避免了常见qq机器人每隔1．2秒就刷新一次数据库来查找通知内容的缺陷，效率提高多达几十倍。<br />
6．实现与网站会员绑定；实现取消绑定功能；实现查询绑定会员的基本信息等功能。<br />
7．可以安装插件，插件被封装为QPlug格式。[2]<br />
8.情迁机器人通过情迁系统,手机QQ等各种终端实现远程命令行操作您的电脑<br />
</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\"><span style=\"font-size:14px;line-height:24px;\">第五代qqplus机器人破解版</span>优势</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"line-height:24px;font-size:16px;\">QQ机器人其实就是把常用的数据录入到数据库中，当你提交不同的数据就会自动从数据库中调用不同的数据反馈给你，完全就是一个搜索查找功能，和百度的搜索没有什么两样，完全是一问一答，有的时候还是问非所答。数据中的数据还有待大量的搜集和完善。QQ机器人的发展前景是非常广阔的。</span>
	</p>
	<p style=\"color:#333333;font-family:&quot;\">
		<span style=\"font-size:16px;\">QQ机器人的优势在于：强大的QQ用户支持，且操作简单！所以QQ机器人注定会成为同步微博、同步论坛、同步网站的一种趋势！<br />
，就是将好友发来的消息推送的网站，实现qq与网站的交互。由于腾讯暂未公开qq接口。大部分非腾讯官方的机器人都是采用lumaqq等开源qq协议进行编写。已有少量的机器人已经开源，部分网站提供webservice。</span>
	</p>
</div>','14','20191202221052KN.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.98','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('77','最好的百度网盘搜索神器/115网盘资源搜索软件','29.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">【正版】最好的百度网盘搜索神器/115网盘资源搜索<a href=\"http://www.jztuan.net/product/search_j1v.html\" target=\"_blank\">营销软件</a></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">此网盘搜索神器非常给力，目前所有主流网盘资源网站源码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">网赚项目、商业源码、武术视频、PS教程。。搜索软件几乎全部网盘完美收录</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">有了此网盘搜索神器没有找不到的资源，只有想不到的。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">购买网盘搜索神器包永久功能升级</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">有需要网盘搜索神器的朋友请直接在线购买，自助购买，自助在线提取即可</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:18px;\">购买并好评后赠送网盘搜索神器相关豪华赠品一枚！</span>
</p>','15','20191202221318LH.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','29.80','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('78','沙盘Sandboxie5.26破解版','9.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><strong>沙盘Sandboxie</strong>5.26破解版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">沙盘Sandboxie5.26直装破解版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">破解驱动文件，直接安装即为已注册激活版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">老毛子最新制作的破解版，无内存溢出现象</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">沙盘sandboxie注意：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">使用前关闭杀毒软件，否则会拦截，火绒的话不用。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload1/20180714/15315769653020.jpg\" title=\"沙盘sandboxie\" />
</p>','15','20191202221411su.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.80','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('79','石青在线seo伪原创工具软件破解版v2.1','98.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青在线伪原创工具破解版v2.1 好用的seo伪原创文章生成器工具软件</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">好用的seo伪原创文章生成器工具软件、无限制完美破解&nbsp;和正版一样</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青在线伪原创工具简介：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青伪原创工具是一款SEO高级工具，专门用来生成原创及伪原创文章</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">使用此工具可以制作出互联网上具有唯一性的伪原创文章。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">本石青伪原创工具软件是一款免费的专业伪原创文章生成器</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">其专门针对百度和google的爬虫习惯以及分词算法而开发</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">通过本石青伪原创工具软件优化的文章，将更被搜索引擎所青睐。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">本软件是网络写手，群发用户，SEO者不可多得的利器</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青伪原创工具也是网站推广者必备工具。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">“伪原创工具”具有以下优点：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、伪原创工具在世界范围内首创了：本地和网络2种不同伪原创方式；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、支持中文和英文伪原创；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、采用独有的分词引擎，完全匹配baidu和google的习惯.同时我们提供免费的开发参数嗲用接口，使用-help查看.</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、独有的同义词和反义词引擎，可以适当改变文章语义，特有算法进行控制.</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、石青伪原创工具独有段落和段内迁移功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">6、伪原创内容支持导入导出为txt或html等格式，方便客户迁移数据；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">7、独家支持在线自能伪原创动易、新云、老丫、dede、帝国、PHPCMS、zblog等主流大型CMS系统；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">8、绿色软件免安装，容量小，软件下载包只有1M多，占系统资源少，是同类软件的1/3；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">9、可以制作包含html标签的伪原创文章；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">10、可以制作包含图片，flash等多媒体格式的伪原创文章；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">11、在线升级，全免费，每月定时为您升级程序，保证同步baidu和google的更新算法；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">12、提供“替换链接”的贴心功能，有效增加SEO外链；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">13、原生编译代码，通吃win2000以上的所有平台，包括winxp,win2003,vista等等；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">14、多内核系统，制作上万字的伪原创文章，速度极快；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">谁应该使用“石青伪原创工具”?</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你已经维护网站很久，但是排名一直不好。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你用过了邮件群发，QQ群发等不同方法，但是效果都极差。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你苦于刚建好网站，想要很快使网站知名。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你群发了大量文章，但是效果一般。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青伪原创工具破解版部分截图如下：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/72211536642857.png\" title=\"石青伪原创\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/76221536642857.png\" title=\"石青伪原创工具\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">石青伪原创工具官方升级历史：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2017年07月06号伪原创工具 2.1.9.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.9.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、更新了系统词库；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、网络模式做了更新；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、对打乱拼接模式做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2017年05月25号伪原创工具 2.1.8.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.8.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、对测试文章替换了配图；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、对新版火车头做了支持；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、更新了自定义词库功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2017年03月29号伪原创工具 2.1.7.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.7.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、加入了新工具的提示；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、关闭了对很老版本火车头采集的的直接伪原创；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、更新了网络伪原创功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2017年02月03号伪原创工具 2.1.6.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.6.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、修复了综合采集中的一些问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、改进了内存管理；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、再次修改标题抬头；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年12月29号伪原创工具 2.1.5.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.5.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、对综合采集模式做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、对测试版无法更新火车头做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、标题抬头做了更新；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年11月01号伪原创工具 2.1.4.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.4.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、更新了部分词库；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、更新了网络伪原创模式；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、对cpu算法做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年9月21号伪原创工具 2.1.3.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.3.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、更新了一部分地址；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、修复了关键词替换；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、加快速度；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年8月5号伪原创工具 2.1.2.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.2.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、修复了网络模式伪原创失效；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、修复了综合采集失效的问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、加快速度；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年7月12号伪原创工具 2.1.1.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.1.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、对拼接文字功能做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、对网络伪原创做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、对新cms版本做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年5月26号伪原创工具 2.1.0.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.1.0.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、对词库做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、提示了批量伪原创后导出；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、对新火车头接口做了升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年4月20号伪原创工具 2.0.9.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.0.9.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、更新了客服联系方式；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、修复了网络伪原创的一个接口错误问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、修复了关闭后再打开随机错误的问题；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年3月3号伪原创工具 2.0.8.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.0.8.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、更新了最新词库；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、做了新版支付宝推广大师提示；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、升级了几个cms接口；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2016年1月24号伪原创工具 2.0.7.10更新最新功能！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2.0.7.10</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、对win10支持后的一个BUG做了修复；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、改进了采集模式；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、对dedecms的最新版做了支持；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">。。。。。。</span>
</p>','16','20191202221548Rr.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','98.00','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('80','天天seo伪原创工具软件破解版','29.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天seo<strong>伪原创工具</strong>软件破解版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天伪原创工具 天天(泊君)seo伪原创工具/在线文章伪原创工具</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">而天天伪原创工具此举对于很多生产不了原创内容的网站来说，无疑只能进一步的提升伪原创的力度。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如果你也有这个需要的话，那么不妨试试这款天天伪原创工具。<br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天伪原创工具，又名，天天SEO伪原创工具，是一款免费的专业seo伪原创工具</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天伪原创工具专门针对谷歌、百度、雅虎、ASK等大型搜索引擎收录设计</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">通过伪原创工具生成的文章，会更好的被搜索引擎收录和索引到。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天SEO伪原创工具是一款SEOER实用工具，是专门生成原创及伪原创文章的工具</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">用伪原创工具可以把在互联网上复制的文章瞬间变成原创文章。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">本伪原创软件是网络编辑，群发用户以及SEOER的利器，也是网站优化工具中不可多得的利器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天伪原创工具&nbsp;功能介绍：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、本软件采用引擎独有的分析规则和算法分割文章，能很好的匹配所有的搜索引擎。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、独有的同义词替换词库，可以在不改变文章语义的前提下生成原创文章。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、独有文章段落打乱和重组功能，支持生成繁体文章。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、纯绿色软件免安装，软件体积小，大小不足2M，运行时占用系统资源极少。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、可以制作纯网页格式的伪原创文章，支持HTML超文本标识语言。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">6、支持文章中的连接互换以及关键词的批量替换。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">7、自带在线升级程序，完全免费。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">8、提供批量链接替换的强大功能，更加有效增加网站优化的外链效果；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">9、兼容性好，可以运行于win2000、winxp、win2003、vista等多种操作系统；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">10、多线程超强伪原创工具，瞬间生成万字的伪原创文章，速度快而且稳定。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">更新日志：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天SEO伪原创工具3.0版更新如下：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、增加了句子打乱功能。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、解决部分杀毒软件误报问题。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天伪原创工具怎么用？</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、新建一个空白文字，将复制的文字粘贴到文本编辑区域。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、点击制作替换内容，输入被替换的内容以及替换的内容，设置需要添加的链接。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、选择替换内容。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、自由选择打乱、生成繁体等方式。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、点击生成伪原创，文章即可使用了。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">天天(泊君)seo伪原创工具截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/88731522928211.png\" title=\"天天伪原创工具\" />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/75791522928211.png\" title=\"伪原创工具\" />
</p>','16','20191202221702wY.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','29.80','0','name,mobile,address','0.00','','','0','','13','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('81','web服务器安全配置 网站服务器安全策略','39.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">web服务器安全配置视频教程 网站服务器安全策略 从入门到精通</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">服务器安全维护&nbsp;web服务器安全配置视频教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">从广义上讲，服务器是指网络中能对其它机器提供某些服务的计算机系统</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">（如果一个PC对外提供ftp服务，也可以叫服务器）。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">web服务器安全配置视频教程 网站服务器安全策略 从入门到精通</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">从狭义上讲，服务器是专指某些高性能计算机，能通过网络，对外提供服务。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">相对于普通PC来说，稳定性、安全性、性能等方面都要求更高</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">因此在CPU、芯片组、内存、磁盘系统、网络等硬件和普通PC有所不同。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">教程很全面，在这里就不一一列出，有需要的朋友直接购买即可。</span>
</p>','18','20191202221931Wg.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','39.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('82','【计算机网络】清华大学计算机网络技术专业课程','60.00','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">【<strong>计算机网络</strong>】清华大学<strong>计算机网络技术</strong>专业课程全套</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">清华大学计算机网络技术专业课程全套</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">计算机网络技术基础知识、清华大学计算机网络技术专业课程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><img src=\"http://www.jztuan.net/config/ueditor/php/upload/image/20191128/1574928618575024.jpg\" title=\"计算机网络技术\" alt=\"计算机网络技术\" width=\"864\" height=\"492\" border=\"0\" style=\"width:864px;height:492px;\" /></span>
</p>','18','201912022221002y.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','60.00','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('83','Linux系统入门就该这么学习视频教程书籍+配套软件资料 在哪买全套','29.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Linux系统入门就该这么学习视频教程书籍+配套软件资料全套+linux就该这么学在哪买</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Linux系统入门就该这么学习视频教程书籍截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload1/20170901/15042754906371.jpg\" title=\"linux就该这么学\" />
</p>','18','20191202222211dI.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','29.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('84','批处理教程 攻防批处理视频教程 网络攻防必备批处理教程','9.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><strong><span style=\"font-size:18px;\">批处理教程</span></strong><span style=\"font-size:18px;\">&nbsp;攻防批处理视频教程 网络攻防必备批处理教程</span></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">IceRain作品Windows批处理视频教程（1-18全）flash格式</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第1讲 Windows批处理之介绍。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第2讲 介绍Windows批处理的基本知识。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第3讲 承接第一讲 继续介绍Windows批处理的基本知识。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第4讲 介绍如何用批处理操纵Windows的telnet服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第5讲 介绍如何用批处理操纵Windows的DHCP服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第6讲 继续介绍如何用批处理操纵Windows的DHCP服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第7讲 继续介绍如何用批处理操纵Windows的DHCP服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第8讲 介绍如何用批处理操纵Windows的Web服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第9讲 继续介绍如何用批处理操纵Windows的Web服务器IIS。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第10讲 介绍如何用批处理操纵Windows的FTP服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第11讲 介绍如何用批处理操纵Windows的Web服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第12讲 介绍如何用批处理操纵Windows的DNS服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第13讲 继续介绍如何用批处理操纵Windows的DNS服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第14讲 介绍如何用批处理操纵Windows的活动目录服务。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第15讲 继续介绍如何用批处理操纵Windows的活动目录服务。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第16讲 介绍如何用批处理操纵Windows的CA证书服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第17讲 继续介绍如何用批处理操纵Windows的CA证书服务器。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">第18讲 也是本系列视频的最后一讲 给大家介绍了一些经典的批处理脚本 供大家钻研和提高所用。</span>
</p>','18','20191202222312Lu.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','9.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('85','软件破解教程全套 OLLYDBG破解软件VIP方法入门视频教程+工具包','19.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><strong>软件破解教程</strong>全套 OLLYDBG破解软件VIP方法入门视频教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"background-color:#FFFFFF;font-family:微软雅黑;font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"background-color:#FFFFFF;font-family:微软雅黑;font-size:16px;\">电脑软件破解教程全套 od软件破解注册码视频教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"background-color:#FFFFFF;font-family:微软雅黑;font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"background-color:#FFFFFF;font-family:微软雅黑;font-size:16px;\">+软件破解工具包（黑鹰VIP/天草/小生我怕怕）<br />
</span>
</p>
<p style=\"color:#333333;background-color:#FFFFFF;font-family:微软雅黑;\">
	<span style=\"font-size:16px;\">软件破解教程视频包含：+软件破解工具包</span>
</p>
<p style=\"color:#333333;background-color:#FFFFFF;font-family:微软雅黑;\">
	<span style=\"font-size:16px;\">最新黑鹰vip破解教程、天草破解全集视频教程、小生我怕怕破解教程</span>
</p>
<p style=\"color:#333333;background-color:#FFFFFF;font-family:微软雅黑;\">
	<span style=\"font-size:16px;\">及小生我怕怕软件破解教程视频工具包<span style=\"font-size:18px;\"><br />
</span></span>
</p>
<p style=\"color:#333333;background-color:#FFFFFF;font-family:微软雅黑;\">
	<span style=\"font-size:16px;\"><img title=\"软件破解教程\" src=\"http://www.jztuan.net/config/ueditor/php/upload/33761522226493.png\" /></span>
</p>
<p style=\"color:#333333;background-color:#FFFFFF;font-family:微软雅黑;\">
	<span style=\"background-color:#FF0000;font-family:simhei;color:#FFFFFF;font-size:16px;\"></span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img title=\"软件破解工具\" border=\"0\" src=\"http://www.jztuan.net/config/ueditor/php/upload/64821522226493.png\" width=\"486\" height=\"469\" style=\"width:486px;height:469px;\" />
</p>','19','20191202222408Io.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','19.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('86','Burpsuite抓包使用教程 burpsuite详细视频教程','49.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Burpsuite抓包使用教程 burpsuite详细视频教程</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\"><br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Burpsuite教程视频 Burpsuite抓包改包教程+实例教程讲解</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">Burpsuite抓包改包使用教程视频+实例截图：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<img src=\"http://www.jztuan.net/config/ueditor/php/upload/84231519887569.jpg\" width=\"795\" height=\"753\" border=\"0\" title=\"burpsuite使用教程\" alt=\"burpsuite使用教程\" style=\"width:795px;height:753px;\" />
</p>','19','20191202222507vr.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','49.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('87','WINRAR/ZIP密码破解工具 RAR/ZIP密码破解器','19.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">WINRAR/ZIP密码破解工具 RAR/ZIP密码破解器</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ZIP/RAR压缩文件密码破解工具器 压缩包密码破解软件 含注册码</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ZIP/RAR压缩文件密码破解工具软件主要特点如下：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持所有版本的ZIP/PKZip/WinZip、RAR/WinRAR</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">以及ARJ/WinARJ 和 ACE/WinACE (1.x)；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ZIP/RAR压缩文件密码破解工具完美汉化，简单易用；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">最大支持4G压缩文件；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持WinRAR和WinZip采用的强加密算法AES的破解；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ZIP/RAR压缩文件密码破解工具是当前最快的rar、zip破解软件；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">ZIP/RAR压缩文件密码破解工具支持已知明文方式快速破解zip和ARJ；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">支持暴力破解、字典破解、掩码破解等多种破解方式。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">如何更快的破解压缩文件密码?</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">选择正确的密码字符组合、密码长度，可以缩短破解时间。</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">一台电脑开两个或两个以上程序破解（例如四核CPU电脑可以同时打开4个程序分段破解）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">利用多台电脑同时破解（大型数据恢复中心等也是采用此方法）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">软件为后台自动操作，并且是破解软件，绝无病毒，对用户不会任何伤害，可放心使用。</span>
</p>','20','20191202223113wr.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','19.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('88','飓风视频加密软件工具 一机一码v10.4专业版','39.80','<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风<strong>视频加密软件</strong>工具 一机一码v10.4专业版</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风视频加密软件工具【高清解码】- 视频加密，飓风来袭！</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">avi加密,rm/rmvb加密,wmv加密，mpeg/mpg,mp3,mp4,flv等视频文件加密首选推荐<br />
</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风视频加密软件工具支持各种视频的高速编码加密与高速解码播放</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">加密后的文件自带解码器和播放器；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">可以加密各种视频音频格式文件（wmv,avi,mpg,rm,rmvb,mp4,flv,vob等）</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">加密后的文件可以通过离线方式授权播放，也可以通过网络方式授权播放；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风视频加密软件工具只需要加密一次，就可以实现一机一码授权；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">本飓风视频加密软件工具系统主要特色包括：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、灵活的认证授权模式</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">比如：一机一码加密，video2exe，一码通授权等；可以指定播放次数、播放时间和截止日期等；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、可以设置播放时断开网络，禁止用户通过远程共享或者远程翻录；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、可以设置播放时禁止开启其他窗口，以便学员可以专心学习；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、您可以设置提示语，以便告知用户通过何种途径与您联系获得播放密码；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、可以设置视频播放尺寸和拉伸效果；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">6、可以防止流行的屏幕录像和拷屏；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">7、可以禁止在流行的虚拟机中播放；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">8、可以指定防翻录跟踪水印，水印可以是固定位置也可以随机浮动，用户无法覆盖水印；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">9、本飓风视频加密软件工具系统也可以结合网络应用</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">通过网络向客户发放播放密码，结合会员验证等方式进行播放授权，无需人工参与；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风视频加密工具软件详情：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">飓风视频加密软件工具 重要更新：</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">1、增加超高清解码库，高清模式下图像放大播放边缘依然平滑，没有锯齿，颜色不失真；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">2、酷炫水印功能，真正透明水印，可以调整透明度、颜色、大小、浮动范围、旋转；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">3、增加快进功能，快进时不影响音质，依然是高保真原声效果；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">4、增加了硬件加速功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">5、增加了自动绑定用户电脑功能，无需用户机器码；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">6、灵活的绑定选项，加密视频可以绑定主板、硬盘，显卡、网卡、U盘等；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">7、灵活的试播文件制作功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">8、灵活的业务接口，可以结合您的网站、结合网银、结合支付宝，淘宝、结合Discuz! 论坛；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">9、加密后的视频无法用OD等破解调试工具加载；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">10、增加了配置保存功能，可以保存多种配置；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">11、增加了播放授权导入和导出功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">12、增加了已授权播放密码日志记录功能；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">13、播放器界面做了重大美化设计，整个界面美观大方；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">14、增加了播放菜单功能，播放时可以右键显示功能菜单；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">15、可以在播放时设置显示或隐藏播放控制条；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">16、重大安全性升级；</span>
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<br />
</p>
<p style=\"color:#333333;font-family:&quot;font-size:14px;\">
	<span style=\"font-size:16px;\">17、其他各种小改进；</span>
</p>','20','20191202223152wL.jpg','0','0','发货内容下载地址：http://www.aaa.com/bbb.zip（测试数据）','0','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','39.80','0','name,mobile,address','0.00','','','0','','17','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('89','微软office 365个人版家庭版office2019家庭学生激活码office365','299.00','<img src=\"https://img.alicdn.com/imgextra/i4/2662762851/O1CN01Opt8fR1WvnfVCyCEx_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i1/2662762851/O1CN011WvndtLivoOqWd3_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i3/2662762851/O1CN011WvndtLj8IjuDfs_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i2/2662762851/O1CN011WvndtLiWuoYwiJ_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i1/2662762851/O1CN01NDRPIu1WvnkruQWjR_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i4/2662762851/O1CN01ihJDel1Wvnkr68vxL_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i3/2662762851/O1CN01HTN8C31Wvnhtgakry_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i3/2662762851/O1CN01gXkAkb1Wvnkpsclh7_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i4/2662762851/O1CN01e3Dwg71Wvnkq5a1Mm_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i2/2662762851/O1CN01VtJtqL1WvnktCfzxc_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i4/2662762851/O1CN01DssEAm1Wvnksf3frX_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i1/2662762851/O1CN01uHSCok1Wvnksf59I1_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i1/2662762851/O1CN01sN5NLj1WvnknwODaI_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i3/2662762851/O1CN014bA7Mi1WvnkqMebz6_!!2662762851.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" />
<div>
	<br />
</div>','22','20191203093355HJ.jpg','0','0','3','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','299.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('90','官网正版 卡巴斯基安全软件2020版杀毒软件激活码序列号 3用户3年','398.00','<img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/108599249/O1CN01Rp075j2IC5lqqVLcB_!!108599249.jpg\" />','22','20191203093453VS.jpg','0','0','3','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','398.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('91','正版window10专业版 win10家庭版 w10pro 支持重装 纯净版','198.00','<img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/133855724/O1CN01bSDFM91s9deTXCDzR_!!133855724.jpg\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/133855724/O1CN01pVcUH61s9dePgBYKB_!!133855724.jpg\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i3/133855724/O1CN01Kqq8eY1s9deQtVlm9_!!133855724.jpg\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i2/133855724/O1CN01TobPm21s9deRi9JmK_!!133855724.jpg\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/133855724/O1CN01AmL4tS1s9deQtV6FI_!!133855724.jpg\" class=\"\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i1/133855724/O1CN01L11meo1s9deRXKIuT_!!133855724.jpg\" class=\"\" /><img align=\"absmiddle\" src=\"https://img.alicdn.com/imgextra/i4/133855724/O1CN010WNTLa1s9deQ9d4l3_!!133855724.jpg\" class=\"\" />','22','20191203093600Ax.jpg','0','0','3','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','198.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('92','雷神加速器cdkey折扣码充值卡100小时激活码steam吃鸡网游加速uu加速器cdkey折扣码充值卡100小时激活码steam吃鸡网游加速uu','16.00','<div style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<a target=\"_blank\" href=\"https://leishenchongzhi.tmall.com/campaign-10830-0.htm\"><span style=\"font-size:10px;\"><img src=\"https://img.alicdn.com/imgextra/i2/2201474524429/O1CN011MFjgD1iaWjlMM5In_!!2201474524429.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /></span></a>
</div>
<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<img src=\"https://img.alicdn.com/imgextra/i1/2201474524429/O1CN011Ss28K1iaWjA9oPnN_!!2201474524429.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i1/2201474524429/O1CN01oJ8FdA1iaWj5hXRHU_!!2201474524429.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i4/2201474524429/O1CN01chdiT11iaWj6erOse_!!2201474524429.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i4/2201474524429/O1CN01K8Ls461iaWj5hXJ1y_!!2201474524429.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" />
</p>','22','20191203093722dC.jpg','0','0','3','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','16.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('93','腾讯视频VIP会员 12个月 一年卡好莱坞vip视屏会员年费 直充填QQ','190.00','<img src=\"https://img.alicdn.com/imgextra/i3/374544688/O1CN01taHub71kV9KNQeBvX_!!374544688.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i1/374544688/O1CN011YCaID1kV9KRc7dWj_!!374544688.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i4/374544688/O1CN01i5ho9L1kV9KPlskGp_!!374544688.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" /><img src=\"https://img.alicdn.com/imgextra/i2/374544688/O1CN01hSVhd81kV9KRc6MYc_!!374544688.jpg\" class=\"img-ks-lazyload\" style=\"width:790px;\" />
<div>
	<br />
</div>','23','201912030938355X.jpg','0','0','2','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','190.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('94','【下单再减10%】喜马拉雅FM会员12个月VIP年卡听书自动充值','108.00','<img src=\"https://img.alicdn.com/imgextra/i3/3182354004/O1CN01gk1sRk1fRsOagrEUk_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i3/3182354004/O1CN013n5eQo1fRsOReUz7I_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i4/3182354004/O1CN01Hz8px01fRsORBVFp8_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i2/3182354004/O1CN01SXuZEX1fRsOP6zBlg_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i3/3182354004/O1CN01QWznkf1fRsOGj7fmN_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i3/3182354004/O1CN01DsqcfB1fRsOMCWPWU_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i1/3182354004/O1CN01MUtbIA1fRsOGj954k_!!3182354004.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" />','23','20191203094041Xp.png','0','0','2','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','108.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('95','【填手机号极速充值】网易云音乐会员年卡黑胶VIP会员音乐会员1年','138.00','<img src=\"https://img.alicdn.com/imgextra/i1/3954853577/O1CN01RRfFQf1cIJHRr5p1n_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i1/3954853577/O1CN01z7wufB1cIJHmyjDGI_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i3/3954853577/O1CN01Yf9tO91cIJHH7Qyn6_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i4/3954853577/O1CN01fJnul61cIJHQu0UZ9_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i2/3954853577/O1CN01XrkdNq1cIJHQ1o8vo_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i4/3954853577/O1CN01TevGCT1cIJHPUiVmq_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i2/3954853577/O1CN010ua4O51cIJHQBvRt8_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i1/3954853577/O1CN01a0s94u1cIJHSIRqBY_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i1/3954853577/O1CN01dGrNXA1cIJHLitPkq_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i2/3954853577/O1CN01XFeHSy1cIJHRPX2uj_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" /><img src=\"https://img.alicdn.com/imgextra/i3/3954853577/O1CN016i2rv71cIJHiXU9pZ_!!3954853577.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" />','23','2019120309415254.jpg','0','0','2','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','138.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('96','爱奇艺VIP黄金会员12个月 爱奇艺vip会员1年卡自动充值即时到账','190.00','<img src=\"https://img.alicdn.com/imgextra/i4/374544688/O1CN01nnYd7h1kV9KZ3WJcl_!!374544688.jpg\" align=\"absmiddle\" class=\"img-ks-lazyload\" />','23','20191203094308S6.jpg','0','0','2','1','100','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','190.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('97','梦幻西游2点卡100元梦幻西游点卡1000点网易一卡通100元自动充值','98.00','<div class=\"J_TModule\" id=\"shop16459831615\" style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 微软雅黑, sans-serif;\">
	<div class=\"skin-box tb-module tshop-pbsm tshop-pbsm-shop-self-defined\" style=\"margin:0px 0px 10px;padding:0px;\">
		<div class=\"skin-box-bd clear-fix\" style=\"margin:0px;padding:0px;background:none 0px 0px no-repeat #FFFFFF;color:#2953A6;\">
			<span> 
			<p>
				<img src=\"https://gdp.alicdn.com/imgextra/i2/1849643991/TB2_WeAo88lpuFjSspaXXXJKpXa-1849643991.jpg\" alt=\"\" class=\"img-ks-lazyload\" /> 
			</p>
</span> 
		</div>
<s class=\"skin-box-bt\"><b></b></s> 
	</div>
</div>
<div class=\"J_TModule\" id=\"shop16459935228\" style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 微软雅黑, sans-serif;\">
	<div class=\"skin-box tb-module tshop-pbsm tshop-pbsm-shop-self-defined\" style=\"margin:0px 0px 10px;padding:0px;\">
		<s class=\"skin-box-tp\"><b></b></s> 
		<div class=\"skin-box-bd clear-fix\" style=\"margin:0px;padding:0px;background:none 0px 0px no-repeat #FFFFFF;color:#2953A6;\">
			<span> 
			<p>
				<img src=\"https://gdp.alicdn.com/imgextra/i4/1849643991/TB2u0AFrORnpuFjSZFCXXX2DXXa-1849643991.jpg\" alt=\"\" class=\"img-ks-lazyload\" /> 
			</p>
</span> 
		</div>
<s class=\"skin-box-bt\"><b></b></s> 
	</div>
</div>
<div class=\"J_TModule\" id=\"shop16459913130\" style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 微软雅黑, sans-serif;\">
	<div class=\"skin-box tb-module tshop-pbsm tshop-pbsm-shop-self-defined\" style=\"margin:0px 0px 10px;padding:0px;\">
		<s class=\"skin-box-tp\"><b></b></s> 
		<div class=\"skin-box-bd clear-fix\" style=\"margin:0px;padding:0px;background:none 0px 0px no-repeat #FFFFFF;color:#2953A6;\">
			<span> 
			<p>
				<img src=\"https://gdp.alicdn.com/imgextra/i2/1849643991/TB2scK8o9JjpuFjy0FdXXXmoFXa-1849643991.jpg\" alt=\"\" class=\"img-ks-lazyload\" /> 
			</p>
</span> 
		</div>
<s class=\"skin-box-bt\"><b></b></s> 
	</div>
</div>
<div class=\"J_TModule\" id=\"shop16459807734\" style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 微软雅黑, sans-serif;\">
	<div class=\"skin-box tb-module tshop-pbsm tshop-pbsm-shop-self-defined\" style=\"margin:0px 0px 10px;padding:0px;\">
		<s class=\"skin-box-tp\"><b></b></s> 
		<div class=\"skin-box-bd clear-fix\" style=\"margin:0px;padding:0px;background:none 0px 0px no-repeat #FFFFFF;color:#2953A6;\">
			<span> 
			<p>
				<img src=\"https://gdp.alicdn.com/imgextra/i4/1849643991/TB2wjizhXXXXXa3XpXXXXXXXXXX-1849643991.gif\" alt=\"\" class=\"img-ks-lazyload\" /> 
			</p>
</span> 
		</div>
<s class=\"skin-box-bt\"><b></b></s> 
	</div>
</div>
<div class=\"J_TModule\" id=\"shop12745182395\" style=\"margin:0px;padding:0px;color:#404040;font-family:tahoma, arial, 微软雅黑, sans-serif;\">
	<div class=\"skin-box tb-module tshop-pbsm tshop-pbsm-shop-self-defined\" style=\"margin:0px 0px 10px;padding:0px;\">
		<s class=\"skin-box-tp\"><b></b></s> 
		<div class=\"skin-box-bd clear-fix\" style=\"margin:0px;padding:0px;background:none 0px 0px no-repeat #FFFFFF;color:#2953A6;\">
			<span> 
			<p>
				<br />
			</p>
			<p>
				<br />
			</p>
			<p>
				<br />
			</p>
			<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"750\" style=\"margin:0px auto;padding:0px;border-collapse:separate;\" class=\"ke-zeroborder\">
				<tbody>
					<tr>
						<td width=\"35\">
						</td>
						<td width=\"650\">
							<table border=\"0\" width=\"100%\" style=\"margin:0px auto;padding:0px;border-collapse:separate;\" class=\"ke-zeroborder\">
								<tbody>
									<tr>
										<td colspan=\"4\">
											<p style=\"color:#FF0000;\">
												客服咨询及意见反馈：
											</p>
										</td>
									</tr>
									<tr>
										<td>
											<span>售前客服：</span> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%A5%BF%E6%96%BD&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:西施\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%A5%BF%E6%96%BD&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:西施</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%98%AD%E5%90%9B&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:昭君\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%98%AD%E5%90%9B&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:昭君</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%B2%82%E8%9D%89&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:貂蝉\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%B2%82%E8%9D%89&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:貂蝉</a> 
										</td>
									</tr>
									<tr>
										<td>
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%B0%8F%E4%B9%94&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%B0%8F%E4%B9%94&site=cntaobao&s=2&charset=utf-8\" alt=\"红海点卡专营店:小乔\" class=\"img-ks-lazyload\" />红海点卡专营店:小乔</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%A4%A7%E4%B9%94&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%A4%A7%E4%B9%94&site=cntaobao&s=2&charset=utf-8\" alt=\"红海点卡专营店:大乔\" class=\"img-ks-lazyload\" />红海点卡专营店:大乔</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%B4%B5%E5%A6%83&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E8%B4%B5%E5%A6%83&site=cntaobao&s=2&charset=utf-8\" alt=\"红海点卡专营店:贵妃\" class=\"img-ks-lazyload\" />红海点卡专营店:贵妃</a> 
										</td>
									</tr>
									<tr>
										<td>
											<span>售后客服：</span> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%B4%9B%E9%98%B3&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:洛阳\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%B4%9B%E9%98%B3&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:洛阳</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%88%90%E9%83%BD&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:成都\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%88%90%E9%83%BD&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:成都</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%BB%BA%E4%B8%9A&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:建业\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%BB%BA%E4%B8%9A&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:建业</a> 
										</td>
									</tr>
									<tr>
										<td>
											<span>商务合作：</span> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%90%95%E4%B8%8D%E9%9F%A6&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:吕不韦\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E5%90%95%E4%B8%8D%E9%9F%A6&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:吕不韦</a> 
										</td>
										<td>
											<a target=\"_blank\" href=\"https://amos.im.alisoft.com/msg.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%B2%88%E4%B8%87%E4%B8%89&site=cntaobao&s=2&charset=utf-8&scene=taobao_shop\"><img border=\"0\" alt=\"红海点卡专营店:沈万三\" src=\"https://amos.alicdn.com/online.aw?v=2&uid=%E7%BA%A2%E6%B5%B7%E7%82%B9%E5%8D%A1%E4%B8%93%E8%90%A5%E5%BA%97%3A%E6%B2%88%E4%B8%87%E4%B8%89&site=cntaobao&s=2&charset=utf-8\" class=\"img-ks-lazyload\" />红海点卡专营店:沈万三</a> 
										</td>
										<td>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
						<td width=\"35\">
						</td>
					</tr>
				</tbody>
			</table>
			<p align=\"center\">
				<img width=\"665\" height=\"240\" src=\"https://gdp.alicdn.com/imgextra/i1/1849643991/T2VF1KXtBXXXXXXXXX-1849643991.gif\" class=\"img-ks-lazyload\" /> 
			</p>
			<p align=\"center\">
				<img src=\"https://gdp.alicdn.com/imgextra/i3/1849643991/T2HqaIXAxXXXXXXXXX-1849643991.gif\" class=\"img-ks-lazyload\" /> 
			</p>
</span> 
		</div>
	</div>
</div>','22','20191203094443cv.jpg','0','0','','2','98','0','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','98.00','0','name,mobile,address','0.00','','','0','','21','','','0');
insert into `sl_product`(`P_id`,`P_title`,`P_price`,`P_content`,`P_sort`,`P_pic`,`P_del`,`P_order`,`P_sell`,`P_selltype`,`P_rest`,`P_view`,`P_sold`,`P_time`,`P_mid`,`P_sh`,`P_unlogin`,`P_tag`,`P_fx`,`P_shuxing`,`P_video`,`P_taobao`,`P_vip`,`P_top`,`P_tpl`,`P_keywords`,`P_description`,`P_price2`,`P_vshow`,`P_address`,`P_price3`,`P_gg`,`P_ggsell`,`P_viponly`,`P_code`,`P_sort2`,`P_bz`,`P_msg`,`P_viponly2`) values('98','骏网一卡通1000元卡密骏网卡游戏充值点卡通宝MG手游本店不刷单','910.00','<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span><span style=\"color:#990000;\"><span style=\"font-weight:700;\"><span>使用范围：</span></span></span><br />
</span>
</p>
<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span style=\"color:#990000;\"><span><span><span style=\"font-weight:700;\">游戏充值页面内有骏网一卡通充值选项的部分手机游戏、接口游戏，易宝等。</span></span></span></span>
</p>
<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span><span><span style=\"font-weight:700;\"><span style=\"color:#FF0000;\"><span>此为骏网一卡通接口专充卡，</span>因非通用卡，建议首次购买咨询。不能充话费，不能充腾讯，不能充值www.junka.com上的所有产品</span></span></span></span>
</p>
<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span><span><span style=\"font-weight:700;\"><span style=\"color:#FF0000;\"><span style=\"color:#990000;\">VIVO OPPO手游请购买店内专用骏卡。</span><br />
</span></span></span></span>
</p>
<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span style=\"color:#990000;\"><span><span style=\"font-weight:700;\">兑换面值：以游戏官方为准</span></span></span>
</p>
<p style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span><span style=\"font-weight:700;\"><span style=\"color:#990000;\">取卡方法：</span></span></span>
</p>
<span style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;color:#990000;\"><span style=\"font-weight:700;\"><span>
<p>
	1.电脑版：点“已买到宝贝”找到该笔订单“提取卡密”
</p>
</span></span></span><span style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;font-weight:700;\"><span style=\"color:#FF0000;\">
<p>
	<span style=\"color:#990000;\">2.手机端：在我的淘宝中，找到该笔订单“提取卡密”</span>
</p>
</span></span><span style=\"color:#404040;font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\"></span>
<p style=\"font-family:tahoma, arial, 宋体, sans-serif;font-size:14px;background-color:#FFFFFF;\">
	<span><span style=\"font-weight:700;\"><span style=\"color:#FF0000;\">因点卡商品为特殊商品，非卡问题无法退换。请购买前看清商品图片及商品介绍，或咨询店主。</span></span></span>
</p>','24','20191203094633GA.jpg','0','0','1','1','100','4','0','2020-01-01 00:00:00','0','1','1','','1','','','','1','0','0','','','910.00','0','name,mobile,address','0.00','','','0','','21','','','0');
DROP TABLE IF EXISTS `sl_psort`;
CREATE TABLE IF NOT EXISTS `sl_psort` (
  `S_id` int(11) NOT NULL AUTO_INCREMENT,
  `S_title` text NOT NULL,
  `S_pic` text NOT NULL,
  `S_content` text NOT NULL,
  `S_del` int(11) NOT NULL DEFAULT '0',
  `S_sub` int(11) NOT NULL DEFAULT '0',
  `S_order` int(11) NOT NULL DEFAULT '0',
  `S_show` int(11) DEFAULT '1',
  `S_keywords` varchar(200) DEFAULT NULL,
  `S_icon` text,
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('5','技能培训','20191202210208Dz.jpg','技能培训','0','0','1','1','','20191202210208Dz.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('6','PS教程视频','20191202210713wj.jpg','PS教程视频','0','5','1','1','','20191202210713wj.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('7','淘宝开店教程','20191202210806rS.jpg','淘宝开店教程','0','5','2','1','','20191202210806rS.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('8','SEO培训教程','20191202210935Yr.jpg','SEO培训教程','0','5','3','1','','20191202210935Yr.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('9','源码交易','20191202211009yS.jpg','源码交易','0','0','2','1','','20191202211009yS.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('10','淘客/网店/商城','201912022111528M.jpg','淘客/网店/商城','0','9','1','1','','201912022111528M.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('11','导航/网址/查询','201912022112327V.jpg','导航/网址/查询','0','9','2','1','','201912022112327V.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('12','聊天/交友/直播','201912022113041Y.jpg','聊天/交友/直播','0','9','3','1','','201912022113041Y.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('13','营销软件','201912022113549k.jpg','营销软件','0','0','3','1','','201912022113549k.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('14','群发营销软件','201912022114272W.jpg','群发营销软件','0','13','1','1','','201912022114272W.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('15','搜索软件工具','201912022115062W.jpg','搜索软件工具','0','13','2','1','','201912022115062W.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('16','SEO工具软件','20191202211545Ib.jpg','SEO工具软件','0','13','3','1','','20191202211545Ib.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('17','网络安全','20191202211639JI.jpg','网络安全','0','0','4','1','','20191202211639JI.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('18','黑客技术教程','201912022117180j.jpg','黑客技术教程','0','17','1','1','','201912022117180j.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('19','软件破解教程','20191202211759lo.jpg','软件破解教程','0','17','2','1','','20191202211759lo.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('20','视频加密破解','20191202211841p2.jpg','视频加密破解','0','17','3','1','','20191202211841p2.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('21','卡密发码','20191203092306rJ.jpg','卡密发码','0','0','1','1','','20191203092306rJ.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('22','软件激活码','20191203092340RK.jpg','软件激活码','0','21','1','1','','20191203092340RK.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('23','视频VIP','20191203092429yP.jpg','视频VIP','0','21','2','1','','20191203092429yP.jpg');
insert into `sl_psort`(`S_id`,`S_title`,`S_pic`,`S_content`,`S_del`,`S_sub`,`S_order`,`S_show`,`S_keywords`,`S_icon`) values('24','点卡充值','201912030925410Y.jpg','点卡充值','0','21','3','1','','201912030925410Y.jpg');
DROP TABLE IF EXISTS `sl_quan`;
CREATE TABLE IF NOT EXISTS `sl_quan` (
  `Q_id` int(11) NOT NULL AUTO_INCREMENT,
  `Q_mid` int(11) NOT NULL DEFAULT '0',
  `Q_title` text,
  `Q_code` text,
  `Q_pid` int(11) NOT NULL DEFAULT '0',
  `Q_money` decimal(10,0) NOT NULL DEFAULT '0',
  `Q_discount` decimal(10,0) NOT NULL DEFAULT '0',
  `Q_minuse` decimal(10,0) NOT NULL DEFAULT '0',
  `Q_usetime` datetime NOT NULL,
  `Q_gettime` datetime NOT NULL,
  `Q_del` int(11) NOT NULL DEFAULT '0',
  `Q_use` int(11) NOT NULL DEFAULT '0',
  `Q_fid` int(11) DEFAULT '0',
  `Q_order` int(11) DEFAULT '0',
  `Q_hide` int(11) DEFAULT '0',
  PRIMARY KEY (`Q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_rcard`;
CREATE TABLE IF NOT EXISTS `sl_rcard` (
  `R_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `R_content` text,
  `R_money` decimal(10,2) DEFAULT '0.00',
  `R_use` int(10) DEFAULT '0',
  `R_mid` int(10) DEFAULT '0',
  `R_del` int(10) DEFAULT '0',
  `R_time` datetime DEFAULT NULL,
  `R_usetime` datetime DEFAULT NULL,
  `R_type` int(11) DEFAULT '0',
  PRIMARY KEY (`R_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `sl_slide`;
CREATE TABLE IF NOT EXISTS `sl_slide` (
  `S_id` int(11) NOT NULL AUTO_INCREMENT,
  `S_pic` text NOT NULL,
  `S_title` text NOT NULL,
  `S_content` text NOT NULL,
  `S_link` text NOT NULL,
  `S_del` int(11) NOT NULL DEFAULT '0',
  `S_order` int(11) NOT NULL DEFAULT '0',
  `S_mid` int(11) DEFAULT '0',
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
insert into `sl_slide`(`S_id`,`S_pic`,`S_title`,`S_content`,`S_link`,`S_del`,`S_order`,`S_mid`) values('1','20191203141949OV.jpg','焦点图3777','图片12','#2','1','3','0');
insert into `sl_slide`(`S_id`,`S_pic`,`S_title`,`S_content`,`S_link`,`S_del`,`S_order`,`S_mid`) values('2','20191203140832NZ.jpg','焦点图2','图片255','#55','1','2','0');
insert into `sl_slide`(`S_id`,`S_pic`,`S_title`,`S_content`,`S_link`,`S_del`,`S_order`,`S_mid`) values('3','20191203110230IO.jpg','焦点图1','ff','#','1','1','0');
insert into `sl_slide`(`S_id`,`S_pic`,`S_title`,`S_content`,`S_link`,`S_del`,`S_order`,`S_mid`) values('4','202106071943524J.jpg','地球村','','#','0','1','0');
DROP TABLE IF EXISTS `sl_text`;
CREATE TABLE IF NOT EXISTS `sl_text` (
  `T_id` int(11) NOT NULL AUTO_INCREMENT,
  `T_title` text NOT NULL,
  `T_content` text NOT NULL,
  `T_pic` text NOT NULL,
  `T_del` int(11) NOT NULL DEFAULT '0',
  `T_order` int(11) NOT NULL DEFAULT '0',
  `T_type` int(11) NOT NULL DEFAULT '0',
  `T_zb` text NOT NULL,
  `T_address` text NOT NULL,
  `T_keywords` varchar(200) DEFAULT NULL,
  `T_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`T_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('1','隐私申明','<span style=\"color:#222222;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\">欢迎访问进口零食网商城！我们以本隐私声明对访问者隐私保护许诺。以下文字公开我站对信息收集和使用的情况。本站的隐私申明正在不断改进中，随着我站服务范围的扩大，我们会随时更新我们的隐私声明。</span> <p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	在同意进口零食网商城服务协议之时，你已经同意我们按照本隐私申明来使用和披露您的个人信息。本隐私申明的全部条款属于该协议的一部份。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	未成年人的特别注意事项
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	如果您未满18周岁，您无权使用公司服务，因此我们希望您不要向我们提供任何个人信息。如果您未满18周岁，您只能在父母或监护人的陪同下才可以使用公司服务。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	用户名和密码
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	当您打算注册成用户后，我们要求您选择一个用户名和密码，还要提供密码提示问题及其答案以便在您丢失密码后我们可以确认您的身份。您只能通过您的密码来使用您的帐号。如果您泄漏了密码，您可能丢失了您的个人识别信息，并且有可能导致对您不利的司法行为。因此不管任何原因使您的密码安全受到危及，您应该立即通过service@lppz.com和我们取得联系。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	注册信息
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	当您在注册为用户时，我们要求您填写一张注册表。注册表要求提供您的真实姓名，地址，国籍，电话号码，和电子邮件地址。如果您是公司客户，您还被要求提供您的公司的地址，电话号码和贵公司的服务和产品的简短说明。您还有权选择来填写附加信息。这些信息可能包括您公司所在的省份和城市，时区和邮政编码，传真号码，主页和您的职务。我们使用注册信息来获得用户的统计资料。我们将会用这些统计数据来给我们的用户分类，以便有针对性地向我们的用户提供新的服务。我们会通过您的邮件地址来通知您这些新的服务。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	您的交易行为
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	我们跟踪IP地址仅仅只是为了安全的必要。如果我们没有发现任何安全问题，我们会及时删除我们收集到的IP地址。我们还跟踪全天的页面访问数据。全天页面访问数据被用来反映网站的流量，一是我们可以为未来的发展制定计划（例如，增加服务器）。
	</p>','20191126200722i3.jpg','0','3','0','','','','');
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('2','品牌故事','<span style=\"color:#222222;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\">进口零食食品有限公司是一家集休闲食品研发、加工分装、零售服务的专业品牌连锁运营公司。2006年8月28日在湖北省武汉市武汉广场对面开立第一家门店，至2014年3月拥有门店数约1200家，涉及湖北、湖南、江西、四川四省，员工人数达到4000余人。</span> <p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	进口零食食品有限公司秉承着品质·快乐·家的企业核心价值观，坚持研发高品质产品，不断引进先进的经营管理思想。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	进口零食食品有限公司注重员工的培养与成长，努力给所有员工营造家的归属感。公司倡导尊重人、培养人、成就人的用人理念，激情共创、快乐分享的团队精神，在优秀的企业文化氛围中培养了一支 年轻且具活力与创造力的团队。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	进口零食食品有限公司秉承着品质·快乐·家的企业文化本源，以提供高品质食品，传递快乐，为提高全球华人健康幸福生活而努力奋斗为企业使命。坚持研发高品质产品，不断引进先进的经营管理思想，立志成为全球休闲食品零售服务业的领导品牌。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	进口零食食品有限公司注重员工的培养与成长，努力给所有员工营造家的归属感。公司倡导尊重人、培养人、成就人的用人理念，激情共创、快乐分享的团队精神，在优秀的企业文 化氛围中培养了一支年轻且极具活力与创造力的团队。在良品铺子快速发展之际，热忱欢迎充满朝气，勇于挑战自己的年轻人加入。
</p>','20191203103723GF.jpg','0','2','0','','','','');
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('3','联系我们','<span style=\"color:#222222;font-family:\" font-size:18px;background-color:#ffffff;\"=\"\">地址：北京市xx区xx路xx广场x号</span><br />
<span style=\"color:#222222;font-family:\" font-size:18px;background-color:#ffffff;\"=\"\">电话：86-010-xxxxxxxx</span><br />
<span style=\"color:#222222;font-family:\" font-size:18px;background-color:#ffffff;\"=\"\">传真：86-010-xxxxxxxxxxxxxxxx</span><br />
<span style=\"color:#222222;font-family:\" font-size:18px;background-color:#ffffff;\"=\"\">邮箱：xxxxxxxxx@qq.com</span><br />
<span style=\"color:#222222;font-family:\" font-size:18px;background-color:#ffffff;\"=\"\">网址：www.xxxxxx.com</span>','20191203103700aY.jpg','0','1','1','116.376098,39.966935','北京市xx区xx路xx广场x号楼xx号','','');
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('4','加盟合作','<span style=\"color:#222222;font-family:\" font-size:14px;background-color:#ffffff;\"=\"\">商城秉承“诚信第一，客户至上”，倡导“崇尚健康，绿色食品”的原则，保证所有食品绝对正货，有“产品质量保证保险”保障。请放心食用，如在售后过程中感到不满，请与客服联系，可以办理换货或退货事宜，详情如下：</span> <p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	1、包装破损处理
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	商城保证发货时的食品外包装的完好无缺。请您收到食品时当场验货，如果发现食品包装破损，请当场与快递人员核实，用户可以当场拒收，并拍下照片发送给我们客服确认，我们将为您重新发货或退款。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	2、收到货物与所订购货物不符
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	商城寄送食品时，会把发票、送货清单、赠品等一同寄出，请您逐一检查。如您发现收到的食品与定购的食品不符合，请您在签收后的24小时内联系商城客服。如有漏发情况，我们会为您补发食品（或补回所缺差价的代金券面值），运费由我方承担。如有错发情况，商城将为您补偿差价或办理退货/换货，运费由我们承担。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	3、食品质量问题
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	若收到的食品出现过期问题，请立即与商城客服联系，把食品、赠品、发票等一起寄回我司，商城将为您退货/换货。如用户故意在保质期外食用，造成身体机能受损，我方不承担任何责任。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	4、退货/换货流程
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	如您要求退/换货，请您先与客服中心联系，核实后请您将要退换的商品、发票、送货单、赠品等一起寄至我司，然后进行重寄食品或退款事宜，我们同时收回您购买此食品所获的相应积分或返利。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	5、如发生以下情况，我们将不予办理退/换货
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	&nbsp; 5.1 我们没有收到您要退换的商品。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	&nbsp; 5.2 退回的食品不齐全。
	</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	&nbsp; 5.3 食品已被拆封食用。
</p>
<p style=\"color:#222222;font-family:\" font-size:14px;\"=\"\">
	&nbsp; 5.4 个人主观原因要求退货/换货（例如：个人觉得所购不符合自己口味，食品颜色不漂亮）。
	</p>','20191203103823Zd.jpg','0','4','0','','','','');
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('5','在线留言','欢迎给我们留言！','20191207111909xo.jpg','0','5','2','','','','');
insert into `sl_text`(`T_id`,`T_title`,`T_content`,`T_pic`,`T_del`,`T_order`,`T_type`,`T_zb`,`T_address`,`T_keywords`,`T_description`) values('6','订单查询','','nopic.png','0','6','4','','','','');
DROP TABLE IF EXISTS `sl_usort`;
CREATE TABLE IF NOT EXISTS `sl_usort` (
  `S_id` int(11) NOT NULL AUTO_INCREMENT,
  `S_title` text NOT NULL,
  `S_pic` text NOT NULL,
  `S_sub` int(11) NOT NULL DEFAULT '0',
  `S_order` int(11) NOT NULL DEFAULT '0',
  `S_del` int(11) NOT NULL DEFAULT '0',
  `S_content` text NOT NULL,
  `S_show` int(11) NOT NULL DEFAULT '0',
  `S_keywords` text NOT NULL,
  PRIMARY KEY (`S_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
