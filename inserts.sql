
INSERT INTO `members` (`mail`,`name`,`expiry_date`) VALUES ('jdoe@jub.de',' John Doe','2020-11-01');
INSERT INTO `members` (`mail`,`name`,`expiry_date`) VALUES ('abo@jub.de','Aoge Bo','2020-11-16');
INSERT INTO `members` (`mail`,`name`,`expiry_date`) VALUES ('nibragimov@jub.de','Nodirbek Ibragimov','2020-08-09');
INSERT INTO `members` (`mail`,`name`,`expiry_date`) VALUES ('mtyson@jub.de','Mike Tyson','2020-12-12');
INSERT INTO `members` (`mail`,`name`,`expiry_date`) VALUES ('rmizrak@jub.de','Roza  Mizrak','2021-01-31');

INSERT INTO `staff` (`mail`,`name`,`hours_worked`) VALUES ('hrieder@jub.de','Heike Rieder',8);
INSERT INTO `staff` (`mail`,`name`,`hours_worked`) VALUES ('pren@jub.de','Pia Ren',7);
INSERT INTO `staff` (`mail`,`name`,`hours_worked`) VALUES ('rome@jub.de','Ro me',6);


INSERT INTO `event` (`id`,`date`,`content`) VALUES (1,'2020-09-12','Swimming competetion!');
INSERT INTO `event` (`id`,`date`,`content`) VALUES (2,'2020-09-21','Leg day!');
INSERT INTO `event` (`id`,`date`,`content`) VALUES (3,'2020-10-01','Arm day!');


INSERT INTO `oversees` (`members_mail`,`staff_mail`) VALUES ('nibragimov@jub.de','rome@jub.de');
INSERT INTO `oversees` (`members_mail`,`staff_mail`) VALUES ('abo@jub.de','rome@jub.de');


INSERT INTO `gym_members` (`members_mail`) VALUES ('abo@jub.de');
INSERT INTO `gym_members` (`members_mail`) VALUES ('nibragimov@jub.de');
INSERT INTO `gym_members` (`members_mail`) VALUES ('jdoe@jub.de');


INSERT INTO `pool_members` (`members_mail`) VALUES ('rmizrak@jub.de');
INSERT INTO `pool_members` (`members_mail`) VALUES ('jdoe@jub.de');
INSERT INTO `pool_members` (`members_mail`) VALUES ('mtyson@jub.de');


INSERT INTO `pool_staff` (`staff_mail`) VALUES ('pren@jub.de');


INSERT INTO `gym_staff` (`staff_mail`) VALUES ('rome@jub.de');


INSERT INTO `manager` (`staff_mail`) VALUES ('hrieder@jub.de');


INSERT INTO `organizes` (`staff_mail`,`event_id`) VALUES ('hrieder@jub.de',1);
INSERT INTO `organizes` (`staff_mail`,`event_id`) VALUES ('hrieder@jub.de',2);
INSERT INTO `organizes` (`staff_mail`,`event_id`) VALUES ('hrieder@jub.de',3);


INSERT INTO `timetable` (`mail`, `id`) VALUES ('abo@jub.de',1);
INSERT INTO `timetable` (`mail`, `id`) VALUES ('nibragimov@jub.de',2);
INSERT INTO `timetable` (`mail`, `id`) VALUES ('jdoe@jub.de',3);
INSERT INTO `timetable` (`mail`, `id`) VALUES ('mtyson@jub.de',4);


INSERT INTO `sign in` (`members_mail`,`timetable_id`) VALUES ('abo@jub.de',1);
INSERT INTO `sign in` (`members_mail`,`timetable_id`) VALUES ('mtyson@jub.de',4);
INSERT INTO `sign in` (`members_mail`,`timetable_id`) VALUES ('jdoe@jub.de',3);

INSERT INTO `booking` (`book_time`,`timetable_id`) VALUES ('2020-09-10 14:00:01',3);

INSERT INTO `came_in_date` (`start_time`,`end_time`,`status`,`id_came_in_date`) VALUES ('2020-09-10 12:00:01','2020-09-10 13:00:01',0,1);
INSERT INTO `came_in_date` (`start_time`,`end_time`,`status`,`id_came_in_date`) VALUES ('2020-09-10 12:00:01','2020-09-10 13:00:01',0,4);

