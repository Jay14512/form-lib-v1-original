# Form Library (PHP OOP Practice)

A small PHP-based project created to practice **object-oriented programming**, **dynamic form generation**, and **basic form validation**.

Module: PHP  
Goal: Understanding OOP, inheritance & form validation  
Status: ✅ Completed  
Version: 1.0  
Tech: PHP 8+, Composer, Bootstrap 5  

---

## 📌 Project Overview

The goal of this project was to build a dynamic HTML form using **pure PHP**, without frameworks.

All form fields are defined in a configuration array and instantiated dynamically using object-oriented principles.  
Each form element is responsible for rendering itself, while validation logic is handled separately.

The project focuses on clean structure, reusability, and separation of concerns.

Validation errors are displayed using a global alert message for simplicity.  
A refactored version (v2) improves user experience by showing validation errors directly at the corresponding form fields.


---

## ✨ Features

- Dynamic form generation via configuration array
- Object-oriented form elements
- Individual render logic per input type
- Separate validation logic
- Clean and readable code structure

---

## 🧱 Implemented Form Elements

- Input (base class)
- Textarea
- Select
- Checkbox
- Radiobutton
- Submit

Each element extends a base input class and implements its own `render()` method.

---

## ✅ Validation

Validation is handled by a dedicated `Validation` class.

Implemented checks:
- Required fields
- Email format validation
- Required checkbox validation
- Error collection in an array

Validation logic is fully separated from rendering logic.

---

## 🧠 What I Learned

- Applying OOP concepts in PHP
- Working with inheritance and constructors
- Building dynamic forms from configuration data
- Separating logic, structure, and presentation
- Implementing basic validation without frameworks
- Writing cleaner and more maintainable PHP code

This project helped me better understand how backend logic can be structured in a scalable and reusable way.
