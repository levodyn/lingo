#Installation

composer install

#database

Create a lingo database

Fill in your database information (username,password, db-name) in the env file [root] 

#sql commands to install dictionary

LOAD DATA LOCAL INFILE '@pathToLingo/storage/app/[dictfile]' INTO TABLE `dicts`(word)

DELETE FROM `dicts` WHERE LENGTH(word) !=5 

#storage

create a app/public/cover_images directory in storage

Make sure the storage is linked

php artisan storage:link

add a noimage.jpg and the navbar (view(inc/navbar) contains  an image
