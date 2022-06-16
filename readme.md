# Travors tractors spare parts emporium
Trevor being a tracktor enthusiast buys and sells spare parts for tractors

## Demo
To run unit tests only, run `docker compose run test`

Run `docker compose up -d` followed by `docker exec -it trevors-tracktors bash` to access terminal with php access. `./test.php` will run a demo that builds some different baskets and outputs the contents.

## Task
Create a cart engine that will auto apply discounts based on a set of rules

### Products
Four products are sold
* Front wheels - £109.99
* Rear wheels - £527.03
* Second hand stank seat - £395.99
* Bouncing Balls Gear Box Protector - 49.99

### Rules
* Buy two front wheels get two free
* Buy a second hand stank seat get a free air freshner
* VAT is charged at 15% for everything apart from the bouncing balls gear box protector which is VAT free
* Shipping is £150 per order unless the order is over £700
