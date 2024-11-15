## Shape Area Calculator (TekJuice)

### About
* This is a symfony based application that provides an API to calculate the Area and Diameter of circle and triangle

### Installation
Run `git clone https://github.com/allandereal/shape-area-calculator.git`  
Run ` cd shape-area-calculator && cp .env.example .env`
Run `composer install`

### Endpoints
- `/circle/{radius}`
- `/triangle/{a}/{b}/{c}` where `a,b & c` are sides of a triangle

### Start the Server
Run `sumfony server:start` and visit `http://127.0.0.1:8000/circle/2` and `http://127.0.0.1:8000/triangle/2.6/3/5.2` to view sample data

### Testing
`php bin/phpunit`

### Developer
Github: [Allan Ahumuza](https://github.com/allandereal)  
Phone: [+256773020863](tel:+256773020863)  
Email: [ahullan@gmail.com](mail:to:ahullan@gmail.com)