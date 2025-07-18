# Course Progress Tracker Plugin

A simple WordPress plugin to allow logged-in users to submit the name of a course they're taking and track their progress. This data is stored in a custom database table and can be viewed by administrators from the WordPress dashboard.

---

## 🚀 Features

- Frontend form via shortcode `[course_tracker]`
- Secure form submission using nonces
- Saves user data into a custom database table (`wp_course_progress`)
- Admin dashboard view of all progress entries
- Follows modern PHP & WordPress coding standards

---

## 🛠️ Installation

1. Download or clone this repository.
2. Move the `course-progress-tracker` folder into `/wp-content/plugins/`
3. Activate the plugin from the WordPress admin panel.
4. Add `[course_tracker]` to any page to display the form.

---

## 💡 Usage

### Shortcode:
Paste the following in any WordPress post or page:


### Admin:
Go to the **Dashboard > Course Tracker** to view user progress entries.

---

## 📦 File Structure

course-progress-tracker/
├── includes/
│ └── class-course-tracker.php
├── templates/
│ └── form.php
├── course-progress-tracker.php
├── README.md


---

## 👨‍💻 Author

Sudhir Gaikwad  
Built as part of a 6-week hands-on WordPress plugin development challenge targeting [rtCamp's](https://rtcamp.com/) Associate Software Engineer role.

---

## 📄 License

GPL v2 or later — open to contributions and extensions.
