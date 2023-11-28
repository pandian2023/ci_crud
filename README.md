# ci_crud
php codeigniter MVC

local url : http://localhost/ci_crud/
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'ci_crud',
	'dbdriver' => 'mysqli',
 #username : test
 #password : test

#cron
cron url : http://localhost/ci_crud/index.php/CoinCron/update_coins

#postman using the coin name update
curl --location 'http://localhost/ci_crud/index.php/Auth/update_coin_name' \
--header 'Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.e30.TvK7VZFFf_8hMrQKPp_dDalIf348QVf_edU_za_wKsQ' \
--form 'coin_id="1"' \
--form 'new_name="NewCoinName"'

jwt secret key : 1234567890qwertyuiopmnbvcxzasdfghjkl
