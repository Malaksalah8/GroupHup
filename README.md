🧑‍💻 Project Overview – GroupHup

GroupHup is a web-based system built using Laravel Framework to help instructors manage courses, sections, and student groups in an organized and automated way.

🎯 Idea of the Project

The system allows:

Instructors to create courses and divide them into sections

Students to join courses and be assigned to groups

Flexible group formation methods:

Manual
Student choice
Random generation

👨‍🏫 Instructor Features

Create and manage courses

Add sections to each course

Define group size (min/max students)

View all students and groups inside each course

Generate random groups automatically

Generate detailed reports for each course

Manage notifications 

👩‍🎓 Student Features
View enrolled courses
View and join available groups
Create groups (if allowed by section rules)
Leave groups (based on rules)
See group members and details
Receive notifications when:
joining a group
being added to a group
creating a group
⚙️ Key System Logic
Each course contains multiple sections
Each section has its own group rules
Students can belong to only one group per section
Many-to-many relationships are used:
course_user
section_user
group_user
Random group generation automatically distributes students evenly
🗄️ Database Design (Important)

Main tables:

users
courses
sections
groups
course_user (pivot)
section_user (pivot)
group_user (pivot)
notifications
🔔 Notifications System

The system automatically sends notifications when:

A group is created
A student joins or leaves a group
A student is added to a group by instructor
🧠 Technologies Used
Laravel (PHP Framework)
MySQL Database
Blade Templates
HTML / CSS / JavaScript
Eloquent ORM

🚀 Project Goal
The goal of GroupHup is to simplify group management in academic environments and reduce manual work for instructors while giving students flexibility in group participation.
The goal of GroupHup is to simplify group management in academic environments and reduce manual work for instructors while giving students flexibility in group participation.
