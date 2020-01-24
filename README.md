## UNITED REMOTE CODING CHALLENGE

I'm in charge to build a REST microservice that list the languages used by the top trending public repos on GitHub.

## Problem

Github API doesn't include anyway to get top 100 trending repos, they have a web page that can be found [here](https://github.com/trending) and it only return 25 repos.

## Solution

we could use scrapping and get elements from the web page but Luckily after some search i found a nice article 🥳 that can be found [here](https://medium.com/@max.day/how-to-detect-github-trending-repo-api-using-githubarchive-heroku-mongodb-and-github-api-b3489efd9f3e).
 The solution use [Github Archive](https://www.gharchive.org) database and query all repositories which had being stared three times over all the records of the archive in one hour, after that to detect the main language of each result they fetch the repo using Github API and get the information needed.
Finally they provide an [endpoint](https://maxday.github.io/trending/data.json) that i will use in this project 😍

## Structure

This project built using PHP [Lumen](https://lumen.laravel.com) Micro Framework and follow [PSR](https://www.php-fig.org/psr/)

## Features

The features currently implemented:

- [x] list of languages used by the trending public repos on GitHub.
- [x] Number of repos using this language.
- [x] The list of repos using the language.
- [ ] Framework popularity over the 100 repos.
- [ ] Secure the microservice.

## Installation

Clone reposotiry:
    
    git clone https://github.com/malohtie/URT.git
    
Navigate to folder then install the dependencies using composer:

    composer install

Start the local development server:

    php -S localhost:8000 -t public
    
Navigate to `http://localhost:8000/api/trending` and you should see your result.

