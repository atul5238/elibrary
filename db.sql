CREATE TABLE users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL

);
CREATE TABLE has_book (
    user_id INT(6) NOT NULL,
    book_id INT(6) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (book_id) REFERENCES books(id)
);

CREATE TABLE books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    book_cover VARCHAR(500) NOT NULL,
    ook_url VARCHAR(500) NOT NULL,
    author_id INT(6),
    description TEXT,
    count INT (6) NOT NULL,
    created_at datetime,
    modified_at datetime

);







