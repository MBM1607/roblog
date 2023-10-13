<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/images/logo.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## ✍️ About Roblog

Roblog is a blogging platform built for modern, AI powered
fast paced content vulnerabilities will be promptly addressed.

## 🧰 Tech Stack

Roblog is built using:

-   **[Laravel version# 9](https://laravel.com/docs/9.x).**
-   **[Tailwind](https://tailwindcss.com/docs)**
-   **[Alpine.js](https://alpinejs.dev/)**

## 🚀 Deployment

-   Roblog is deployed to [Fly.io](https://fly.io/>) at <https://roblog.fly.dev/>.
-   The database is managed using [PlanetScale](https://planetscale.com/).

## 💻 Installation

The pre-requisites that require installation are:

### **MySQL**

Install using the tutorial at: <https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-22-04>

### **PHP8**

```bash
sudo apt install php php-curl php-dom php-mysql
```

### **Node v18**

Install nvm and then install node lts/hydrogen using it.

```bash
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash
nvm install lts/hydrogen
```

### **Composer**

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

## 🖥️ Development

Run `php artisan serve` to start the server listing at port:8000

You will need to run migrations using `php artisan migrate`

and you can populate seed data using `php artisan db:seed`

## 📃 License

Roblog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
