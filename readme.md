## TelecCard Do-Not-Call

1. Install via git into web root
```bash
cd /var/www/html
git clone https://github.com/91Abdullah/dnc.githttps://github.com/91Abdullah/dnc.git
```
2. Install composer dependencies
```bash
composer install
```
3. Copy .env file
```bash
cp .env.example .env
```
4. Create SHA2 key
```bash
php artisan key:generate
```
5. Create MySQL databased named "dnc"
6. Edit .env file and update database credentials
7. Run migrations
```bash
php artisan migrate --seed
```

