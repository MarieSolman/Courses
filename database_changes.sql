INSERT INTO courses VALUES ('585', 'Big Data Management', '', '000-01-0005', ''); 

ALTER TABLE courses
ADD Registered INT;

ALTER TABLE courses
ADD Capacity INT;

ALTER TABLE courses
ADD Waitlisted INT DEFAULT 0;

ALTER TABLE wait_list
ADD Cname VARCHAR(20);

UPDATE courses SET Capacity = 4 WHERE cid = '501';
UPDATE courses SET Capacity = 4 WHERE cid = '542';
UPDATE courses SET Capacity = 2 WHERE cid = '573';
UPDATE courses SET Capacity = 3 WHERE cid = '585';

UPDATE courses SET Registered = (SELECT COUNT(*) FROM enrolled_in WHERE courses.cid = enrolled_in.cid);

UPDATE wait_list SET Cname = (SELECT Cname FROM courses WHERE courses.cid = enrolled_in.cid);

INSERT INTO enrolled_in VALUES ('000-01-0001', '585', 2017, 'Fall'); 
INSERT INTO enrolled_in VALUES ('000-01-0003', '585', 2017, 'Fall');
INSERT INTO enrolled_in VALUES ('000-01-0004', '585', 2017, 'Fall');

CREATE TRIGGER enrolled_in_check BEFORE INSERT IN enrolled_in
FOR EACH ROW 
BEGIN
    SET @max_val = (SELECT MAX(Wait_Position) FROM wait_list WHERE Cid = NEW.Cid);
    SET @course_name = (SELECT Cname FROM courses WHERE Cid = NEW.Cid);
    IF(@max_val IS NULL) THEN
		SET @max_val = 0;
	END IF;
    SET @count_students = (SELECT COUNT(*) FROM enrolled_in WHERE Cid = NEW.Cid);
    SET @cap_course = (SELECT Capacity FROM courses WHERE Cid = NEW.Cid);
    IF(@count_students = @cap_course) THEN
    	INSERT INTO wait_list VALUES (NEW.Sid, NEW.Cid, @max_val + 1, @course_name);
        UPDATE courses SET Waitlisted = Waitlisted + 1 WHERE Cid = NEW.Cid;
    END IF;
END
