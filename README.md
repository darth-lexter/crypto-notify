Crypro-notify is an application writen on Laravel for maintaining statistics about your favorite coins actual price.

Use next commands for run application

```bash
docker-compose up -d --build
docker-compose exec app composer install
```

Update prices for your favorite coins list:

```
docker-compose exec app artisan favorites:update
```

Now you can export list of favorite coins with current prices to Excel file, by local adress

http://127.0.0.1:8099/favorites

Also you can use console command, which compared current BTC price to your trade rules and notifies you:

```
docker-compose exec app artisan signals:check
```
