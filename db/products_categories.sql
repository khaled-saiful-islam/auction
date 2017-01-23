CREATE TABLE products_categories (
    product_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (product_id, category_id),
    FOREIGN KEY category_key(category_id) REFERENCES categories(id),
    FOREIGN KEY product_key(product_id) REFERENCES products(id)
);