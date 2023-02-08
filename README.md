<p  align="center"><a  href="https://laravel.com"  target="_blank"><img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"  width="400"  alt="Laravel Logo"></a></p>

  

<p  align="center">

<a  href="https://github.com/laravel/framework/actions"><img  src="https://github.com/laravel/framework/workflows/tests/badge.svg"  alt="Build Status"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/dt/laravel/framework"  alt="Total Downloads"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/v/laravel/framework"  alt="Latest Stable Version"></a>

<a  href="https://packagist.org/packages/laravel/framework"><img  src="https://img.shields.io/packagist/l/laravel/framework"  alt="License"></a>

</p>

  

## CRUD FULL  REST API

  ## Cara Install 

  
- Required PHP 8.0.2.
- Clone repository dari github.
- Jalankan `composer install`
- buat copy file .env.example dan rename menjadi .env.
- Setting database di file .env.
- Jalankan `php artisan key:generate` di teriminal /cmd.
- Jalankan `php artisan migrate --seed` di terminal/cmd.
- Jalankan server `php artisan serve`, keluaran `http://127.0.0.1:8000/`

Untuk test api silahkan menggunakan Postman.

**Route Category ;**
 - GET -> http://127.0.0.1:8000/api/categories 
 - POST -> http://127.0.0.1:8000/api/categories 
 - GET -> http://127.0.0.1:8000/api/categories/{id} 
 - PUT -> http://127.0.0.1:8000/api/categories/{id} 
 - DELETE -> http://127.0.0.1:8000/api/categories/{id}

**Route Product**
 - GET -> http://127.0.0.1:8000/api/products
 - POST -> http://127.0.0.1:8000/api/products
 - GET -> http://127.0.0.1:8000/api/products/{id}
 - PUT -> http://127.0.0.1:8000/api/products/{id}
 - DELETE -> http://127.0.0.1:8000/api/products/{id}

**Route Category Product**
 - GET -> http://127.0.0.1:8000/api/category-products
 - POST -> http://127.0.0.1:8000/api/category-products
 - GET -> http://127.0.0.1:8000/api/category-products/{id}
 - PUT -> http://127.0.0.1:8000/api/category-products/{id}
 - DELETE -> http://127.0.0.1:8000/api/category-products/{id}

  **Route Image**
 - GET -> http://127.0.0.1:8000/api/images
 - POST -> http://127.0.0.1:8000/api/images
 - GET -> http://127.0.0.1:8000/api/images/{id}
 - PUT -> http://127.0.0.1:8000/api/images/{id}
 - DELETE -> http://127.0.0.1:8000/api/images/{id}
 
  **Route Product Image**
 - GET -> http://127.0.0.1:8000/api/product-images
 - POST -> http://127.0.0.1:8000/api/product-images
 - GET -> http://127.0.0.1:8000/api/product-images/{id}
 - PUT -> http://127.0.0.1:8000/api/product-images/{id}
 - DELETE -> http://127.0.0.1:8000/api/product-images/{id}