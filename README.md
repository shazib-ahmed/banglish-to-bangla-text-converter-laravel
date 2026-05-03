# Banglish to Bangla Phonetic Converter

A modern, fast, and elegant web application built with Laravel to convert Banglish (English letters) into Bangla phonetically. This project features a seamless user experience with real-time conversion and a premium card-based UI.

![Project Screenshot](public/images/screenshot.png)

## 🚀 Features

- **Real-time Phonetic Conversion:** Instant Banglish to Bangla conversion as you type using the Avro Phonetic engine.
- **Modern Card Layout:** Responsive grid-based display for saved translations.
- **Modal-based CRUD:** Create, Edit, and Delete translations without leaving the page for a smooth SPA-like experience.
- **Premium UI/UX:** Built with Tailwind CSS v4 and the "Outfit" typography for a state-of-the-art look.
- **Component-based Architecture:** Modular Blade components for better maintainability.

## 🛠️ Tech Stack

- **Backend:** Laravel 11 / PHP 8.2+
- **Frontend:** Tailwind CSS v4, Vite, Blade Components
- **Phonetic Engine:** [nodejs-avro-phonetic](https://github.com/maheshmuragali/nodejs-avro-phonetic)
- **Database:** SQLite (default) / MySQL

## 📦 Installation

1. **Clone the repository:**
   ```bash
   https://github.com/shazib-ahmed/banglish-to-bangla-text-converter-laravel.git
   cd banglish-to-bangla-text-converter-laravel
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install NPM dependencies:**
   ```bash
   npm install
   ```

4. **Setup Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

6. **Build Assets:**
   ```bash
   npm run build
   ```

7. **Start the Server:**
   ```bash
   php artisan serve
   ```

## 📖 How it Works

- **Phonetic Mapping:** The application uses a phonetic mapping system where English characters are translated into their Bengali phonetic equivalents in real-time.
- **Eloquent Storage:** Translated pairs are saved to the database for future reference and history management.
- **Reactive UI:** Modals handle all interactions, ensuring the user stays in context while managing their translations.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
