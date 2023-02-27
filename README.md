<h1>Kiwify required api list for given 2 pages</h1>
<h3><b>Demo:</b><a href="https://demo.altaf.softnursery.com/" target="_blank">https://demo.altaf.softnursery.com/</a></h3>
<p> </p>


<h2>How to Install</h2>

Install the script
 ```
git clone https://github.com/devlimon/kiwify.git
```
go to the project directory in terminal
```
cd kiwify
```
install vendors [note: make sure you installed <a href="https://getcomposer.org" target="_blank">composer</a>, and run mysql and apache]
```
composer install
```
configure database in .env and then migrate database:
```
php artisan migrate
```
Run the application:
```
php artisan serve
```
now go to served url (<a href="http://127.0.0.1:8000" target="_blank">http://127.0.0.1:8000/</a>)





