DROP DATABASE IF EXISTS eventsy;
CREATE DATABASE eventsy;

USE eventsy;

DROP TABLE IF EXISTS events;
CREATE TABLE events (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  email varchar(255) NOT NULL,
  date date NOT NULL
);

INSERT INTO events (id, title, email, date) VALUES
(1, 'Real Scene Services', 'tabathariddle@aquasseur.com', '2024-04-19'),
(2, 'Everything Everything', 'jennasellers@aquasseur.com', '2024-02-09'),
(3, 'Celebrate Expressions', 'cervantesharrell@aquasseur.com', '2024-04-21'),
(4, 'Sculpted Charming Functions', 'hopkinsfuller@aquasseur.com', '2023-11-09'),
(5, 'Meeting Hands', 'nguyenford@aquasseur.com', '2024-01-23'),
(6, 'Smart Celebrations', 'fredapark@aquasseur.com', '2024-05-21'),
(7, 'Dazzling of Evermore', 'floresmerritt@aquasseur.com', '2024-04-15'),
(8, 'Super Shindigger', 'annettebowen@aquasseur.com', '2023-10-01'),
(9, 'Manage It Mountain', 'headcervantes@aquasseur.com', '2024-06-22'),
(10, 'Superb Spectacular Planning', 'guthrierollins@aquasseur.com', '2024-11-06');