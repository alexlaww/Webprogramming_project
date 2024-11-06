create database student_information;
use student_information;

create table student(
Student_id int NOT NULL AUTO_INCREMENT,
Student_name varchar(40),
Student_email varchar(50),
Contact_Num varchar(20),
Username varchar(40),

PRIMARY KEY(Student_id)
)