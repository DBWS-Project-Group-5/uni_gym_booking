
-- query 1
SELECT * FROM `members`;
-- query 2
SELECT COUNT(*) FROM `came_in_date`;
-- query 3
SELECT `start_time` FROM `came_in_date`;
-- query 4
SELECT * FROM event;
-- query 5
SELECT staff.name, gym_staff.staff_mail FROM gym_staff INNER JOIN staff
ON gym_staff.staff_mail=staff.mail;
-- query 6
SELECT staff.name, pool_staff.staff_mail FROM pool_staff INNER JOIN staff
ON pool_staff.staff_mail=staff.mail;
-- query 7
SELECT start_time, COUNT(id_came_in_date) From came_in_date 
GROUP BY start_time ORDER BY COUNT(id_came_in_date) ASC;
-- query 8 
SELECT s.name, e.date, e.content FROM staff as s
RIGHT JOIN Organizes as o ON s.mail=o.staff_mail
RIGHT JOIN EVENT as e ON o.event_id=e.id;
-- query 9
SELECT m.name, m.mail, c.start_time, c.end_time FROM members as m
LEFT JOIN `sign in` as s ON m.mail=s.members_mail
LEFT JOIN timetable as t ON s.timetable_id=t.id
LEFT JOIN came_in_date as c ON c.id_came_in_date=s.timetable_id;
-- query 10
SELECT m.members_name, s.staff_name FROM members as m
LEFT JOIN oversees as o ON m.mail=o.members_mail
LEFT JOIN staff as s ON s.mail=o.staff_mail;