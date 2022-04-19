# Simple Subscription Platform

Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required). This is the main requirments of the company.

## Must/Requirments in details 
MUST:-
- Use PHP 7.* (i.e. use Laravel 8 as Laravel 9 requires PHP 8.0)
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers.
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.


## Installation

```bash
git colone 
composer install
```

Setup environment

```bash
cp .env.example .env
```


## Database Migration & Seed 
Create Your database by the name of subscription

```bash
php artisan migrate
php artisan db:seed
```

## Running

Send Notification for all subscribers via command line

```bash
 php artisan sendmail:generate
```


In order to excute queue process use 

```bash
 artisan make:job
```
