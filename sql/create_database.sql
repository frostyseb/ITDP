SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";


CREATE DATABASE itdp;

CREATE TABLE ref_event_status(
    event_status_code INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_status_description VARCHAR(256) NOT NULL
);

CREATE TABLE ref_event_types(
    event_type_code INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_type_description VARCHAR(256) NOT NULL
);

CREATE TABLE events(
    event_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    event_status_code VARCHAR(256) NOT NULL FOREIGN KEY REFERENCES ref_event_status(event_status_code),
    event_type_code VARCHAR(256) NOT NULL FOREIGN KEY REFERENCES ref_event_types(event_type_code),
    event_start_date DATETIME NOT NULL,
    event_end_date DATETIME NOT NULL,
    number_of_participants INT(11) NOT NULL,
    discount INT(11) NOT NULL,
    total_cost FLOAT NOT NULL,
    comments TEXT NOT NULL,
    other_details TEXT NOT NULL,
    event_name VARCHAR(256) NOT NULL
);

CREATE TABLE ref_user_roles(
    user_role INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_role_name VARCHAR(256) NOT NULL,
    user_role_description TEXT NOT NULL
);

CREATE TABLE ref_attendance_status(
    attendance_status_code int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    attendance_status_name VARCHAR(256) NOT NULL,
    attendance_status_description TEXT NOT NULL
);

CREATE TABLE users(
    user_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(256) NOT NULL PRIMARY KEY,
    user_first_name VARCHAR(256) NOT NULL,
    user_last_name TEXT NOT NULL,
    user_password VARCHAR (256) NOT NULL,
    user_email VARCHAR(256) NOT NULL,
    user_gender VARCHAR(256) NOT NULL,
    user_role_code int(11) NOT NULL FOREIGN KEY REFERENCES ref_user_roles(user_role_code)
);

CREATE TABLE ref_team_roles(
    team_role_code INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    team_role_description VARCHAR(256) NOT NULL
);

CREATE TABLE teams(
    team_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    team_name VARCHAR(256) NOT NULL
);

CREATE TABLE has_teams(
    team_id INT(11) NOT NULL FOREIGN KEY REFERENCES teams(team),
    participant_id INT(11) NOT NULL FOREIGN KEY REFERENCES users(user_id)
    team_role_code INT(11) NOT NULL FOREIGN KEY REFERENCES ref_team_roles(team_role_code)
);

CREATE TABLE attendances(
    attendance_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL FOREIGN KEY REFERENCES Users(user_id),
    attendance_status_code INT(11) NOT NULL FOREIGN KEY REFERENCES ref_attendance_status(attendance_status_code)
);

CREATE TABLE feedbacks(
    feedback_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    team_id INT(11) NOT NULL FOREIGN KEY REFERENCES team(team_id),
    event_id INT(11) NOT NULL FOREIGN KEY REFERENCES team(team_id),
    committee_lead_id INT(11) NOT NULL FOREIGN KEY REFERENCES Users(user_id),
    participant_id INT(11) NOT NULL FOREIGN KEY REFERENCES Users(user_id),
    feedback TEXT NOT NULL
);


INSERT INTO itdp.ref_event_status(event_status_description)
VALUES ("Completed", "In Progress", "Coming soon");

INSERT INTO itdp.ref_event_types(event_types)
VALUES ("Training", "Social Hangouts", "Volunteer");

INSERT INTO itdp.events(event_status_code, event_type_code, event_start_date, event_end_date, number_of_participants, total_cost, comments, other_details, event_name)
VALUES ("1", "2", "2020-11-08 23:59:59","2020-11-09 23:59:59", 52, 0.0, "It is a fun event", 
"Hack2Hire is a holistic hiring process which allows to observe students on their problem solving skills, learnability, collaboration, empathy, team work and articulation. ",
"Hack2Hire 2020");

INSERT INTO itdp.ref_user_roles(user_role_name, user_role_description)
VALUES ('Attendened ', "a person who takes part in something in ITDP"),
VALUES ('Program Manager', "work with ITDP Committe Leads to plan trainings, social hangouts, and volunteer events");

INSERT INTO itdp.ref_attendance_status(attendance_status_name,attendance_status_description)
VALUES ('ATTENDED', "no call-no show for three or more consecutive days it will be considered a job abandonment, or termination without notice."),
VALUES ('Unforeseen absences', "no call-no show for three or more consecutive days it will be considered a job abandonment, or termination without notice."),
VALUES ('Excused absences', "can be granted for funerals, jury duty, bereavement, childbirth, a car accident, medical appointment, and unavoidable emergencies. In these cases, employees must provide documentation to prove a reason for the absence.");

INSERT INTO itdp.users(user_name, user_first_name, user_last_name, user_password, user_email, user_gender, user_role_code)
VALUES ("ming123", "Tan", "Zhong Ming", "itdp", "mingblog0520@gmail.com", 'M', '0'),
VALUES ("jason123", "Lee", "Jian Sheng", "itdp", "jason123@gmail.com", 'M', '1'),
VALUES ("seb123", "Ho", "Jing Heng", "itdp", "seb123@gmail.com", 'M', '2'),
VALUES ("resh123", "Reshmi", "Ravindran", "itdp", "resh123@gmail.com", 'F', '1');

INSERT INTO itdp.attendances(user_id, attendance_status_code)
VALUES (1,1);

INSERT INTO itdp.ref_team_roles(team_role_description)
VALUES ("Participant"),
VALUES ("Committe Lead");

INSERT INTO itdp.teams(team_name)
VALUES ("New Blood");

INSERT INTO itdp.has_team(team_ID, participant_id, team_role_code)
VALUES (0,1,1);
