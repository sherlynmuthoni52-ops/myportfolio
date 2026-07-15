CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE IF NOT EXISTS services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  category VARCHAR(50) NOT NULL,
  description TEXT NOT NULL
);

INSERT INTO services (title, category, description) VALUES
('Portfolio Websites', 'web', 'Clean and responsive personal websites for students, creatives, and small organizations.'),
('Database Integration', 'database', 'Connect webpages to MySQL using PHP and display records with a basic SELECT query.'),
('Computing Lessons', 'teaching', 'Beginner-friendly computer lessons for children who are learning basic digital skills.'),
('Cybersecurity Awareness', 'learning', 'Simple safety tips and learning support for people who want to understand online protection.');
