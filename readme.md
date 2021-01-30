# Questions & Answers

Project powered by laravel about Q&A similar to stackoverflow

## Status

![db](https://img.shields.io/badge/database-passing-brightgreen.svg) ![status](https://img.shields.io/badge/status-wip-brightgreen.svg) ![bs](https://img.shields.io/badge/version-0.2.7-brightgreen.svg) ![issues](https://img.shields.io/badge/issues-2-orange.svg) ![commits](https://img.shields.io/badge/commits-27-blue.svg)

---

## About project

To launch the project, you need next components:

- [PHP](http://php.net/manual/es/install.php)
- [Composer](https://getcomposer.org/download/) 
- [Node.js](https://nodejs.org/es/)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)

---
In terminal, go the folder where you will host the porject and use:

```git clone https://github.com/AdryDev92/Q-A-webApp.git```

## Project's configuration

In `/Homestead`, modify `homestead.yaml` doing `vi homestead.yaml` and add the **folder**, **sites** and **database**'s routes:

![Imgur](https://i.imgur.com/1XzrZFH.png)



Go to the `etc/` folder, open `hosts` file and add `homestead.yaml`'s ip.

Ya con todo modificado, ponemos el servidor en marcha, dependiendo del que usemos (Vagrant, Mamp, etc...)

**_If we use vagrant, in the `Homestead/` folder, type `vagrant up --provision`._**

---

Once done, rename `.env.example` to `.env` and add your own credentials about your DB.

Use the next command to generate the APP_KEY:

`php artisan key:generate`

## Component installation

Type the next commands to install all necessary components:

`composer install`

`npm install`

`php artisan migrate --seed`


## Features

**As logged user**:

- Create and answer questions.
- Vote best answers.
- See other profiles.
- Quick version create and answer.
- Search questions by categories or hashtags.
- Modify personal data in your profile.
- Edit and delete your questions.
- Role **user** and **admin**.

**As unlogged user**:

- Register.
- Login (if you are registered).
- See main page with questions.
