###################
CodeIgniter Rest API
###################

Simple rest api source code for learning backend service.
inspired by `moemoe89 <https://github.com/moemoe89>`_

*******************
Setup
*******************

Download or clone this repository into your web server.
do some config and import mysql.

You can use `POSTMAN <https://codeigniter.com/docs>`_ to simulate frontend.

**************************
List API
**************************

Test the API by including header in every request
- Content-Type => application/json
- Client-Service => frontend-client
- Auth-Key => simplerest

Include The header for both look like this User-ID & Authorization for every API request except Login.

user API can be access by user with Admin level except update password. 

List of the API :

[POST] /auth/login json { "username" : "admin", "password" : "admin123$"}

[GET] /users

[POST] /users/create json { "username" : "x", "password" : "xx", "fullname" : "xxx"}

[PUT] /users/update/:id json { "username" : "y", "fullname" : "yyy"}

[DELETE] /uses/delete/:id

[GET] /users/:id

[PUT] /users/update/pass json { "old_pass" : "y", "new_pass" : "yy", "conf_pass" : "yyy"}

[GET] /book

[POST] /book/create json { "title" : "x", "author" : "xx"}

[PUT] /book/update/:id json { "title" : "y", "author" : "yy"}

[GET] /book/:id

[DELETE] /book/delete/:id

[POST] /auth/logout

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.
