## Quick Start:

Clone this repository and install the dependencies.

    $ git clone https://github.com/ozdemirburak/laravel-8-simple-cms.git && cd laravel-8-simple-cms
    $ composer install

Run the command below to initialize. Do not forget to configure your .env file. 

    $ php artisan cms:initialize --seed

Install node and npm following one of the techniques explained in 
this [link](https://gist.github.com/isaacs/579814) to create and compile the assets of the 
application.
    
    $ npm install
    $ npm run production

Finally, serve the application.

    $ php artisan serve
