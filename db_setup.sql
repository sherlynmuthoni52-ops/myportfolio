-- Create the portfolio database
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- Create the contacts table
CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  message LONGTEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert 10 sample contacts
INSERT INTO contacts (name, email, phone, message) VALUES
('John Smith', 'john.smith@example.com', '0712345678', 'I am interested in web development services for my business website.'),
('Mary Johnson', 'mary.johnson@example.com', '0723456789', 'Can you help me learn web programming? I am a beginner.'),
('Peter Kariuki', 'peter.kariuki@example.com', '0734567890', 'I need a website redesign for my e-commerce store.'),
('Sarah Omondi', 'sarah.omondi@example.com', '0745678901', 'Interested in your computing lessons. What are the fees?'),
('David Kipchoge', 'david.kipchoge@example.com', '0756789012', 'Great portfolio! Let\'s collaborate on a project.'),
('Anna Mwangi', 'anna.mwangi@example.com', '0767890123', 'I need help with my website. Can we discuss pricing?'),
('Michael Ngata', 'michael.ngata@example.com', '0778901234', 'Your services look amazing. I want to hire you for a website project.'),
('Lisa Kemunto', 'lisa.kemunto@example.com', '0789012345', 'I have a question about your web development process.'),
('Robert Ochieng', 'robert.ochieng@example.com', '0790123456', 'Looking for a tech mentor. Are you available for consultations?'),
('Grace Nyambura', 'grace.nyambura@example.com', '0801234567', 'I need a mobile-responsive website for my photography business.');
