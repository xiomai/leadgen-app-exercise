# Lead Generation App

```shell
## After cloning the repo

$ > composer install

## compiling the assets
$ > npm install
$ > npm run prod

## or using yarn
$ > yarn
$ > yarn prod
```

Set the environment variables accordingly after copying the example env file with:

```shell
$ > cp .env.example .env
```

Once all dev assets are installed and compiled, run the migration and seeder for the default users.

Setting the default users can be found at `/AAG/database/seeds/DefaultUsersSeeder.php:21`

then run this command:

```shell
$ > php artisan migrate:fresh --seed
```
