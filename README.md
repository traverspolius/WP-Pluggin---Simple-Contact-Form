# Simple Contact Form Plugin

A lightweight, beginner-friendly WordPress plugin that adds a simple contact form with **Name, Email, and Message** fields. The form uses WordPress's native `wp_mail()` function to send submissions to the admin email address.

---

## ✨ Features

- 📩 **Simple Contact Form** — Name, Email, Message
- 📨 **Emails sent to WordPress admin email**
- ✅ **Form validation** (required fields, valid email)
- 🖼️ **Minimal inline styling** for easy customization
- 🧩 **Shortcode support** — place the form anywhere
- 🔒 Uses WordPress `sanitize_*()` functions for security

---

## 🚀 Installation

1. Download the ZIP file from this repository.
2. In your WordPress dashboard, go to **Plugins → Add New → Upload Plugin**.
3. Select the ZIP file and click **Install Now**.
4. Click **Activate Plugin**.

---

## 🖊️ Usage

Add the shortcode `[simple_contact_form]` to any page, post, or widget where you want the form to appear.

Example:

```html
[simple_contact_form]
