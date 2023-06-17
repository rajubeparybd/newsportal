# About News Portal

News Portal project is a Laravel application designed for the purpose of managing and displaying news articles on a website. It provides a platform for publishing, organizing, and presenting news content to a wide audience. The project aims to simplify the process of managing news articles, enhancing the overall user experience for both content creators and readers.



## Key Features
- User Authentication
- Role Management
- Article Publishg & Management
- Search and Filtering
- Commenting and Sharing
- Responsive Design


## Tech Stack

**Client:** Laravel Blade, TailwindCSS

**Server:** Laravel, MySQL


## Run Locally

Clone the project

```bash
  git clone https://github.com/rajubeparybd/newsportal.git
```

Go to the project directory

```bash
  cd newsportal
```

Install node dependencies

```bash
  npm install
  
  npm run build
```

Install composer dependencies

```bash
  composer install
```

Create **`.env`** file

```bash
  cp .env.example .env
```

Change database information in **`.env`** file

```env
  DB_CONNECTION=
  DB_HOST=
  DB_PORT=
  DB_DATABASE=
  DB_USERNAME=
  DB_PASSWORD=
```

Run migration

```bash
  php artisan migrate
```

Run server

```bash
  php artisan serve
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
