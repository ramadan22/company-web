
### 1. Application

| App Name    | Laravel |
| ----------- | ------- |
| App Version | 8.x     |
| PHP Version | 7.4.x   |

### 2. Installation
 - after clone or download from gitlab, run **composer install**
 - copy env from .env.example
 - run **php artisan key:generate**
 - run **php artisan storage:link**
 - set credential database in .env
 - run **php artisan migrate:fresh --seed**

 **The default of setup has store in .env.example**

### 3. Login to CMS Credential
|      Email      | password |     Role    |
| --------------- | -------- | ----------- |
| admin@email.com | 123456   | Super Admin |


### 4. Postman collection
 - https://www.getpostman.com/collections/75341a57cb958c2a148b
