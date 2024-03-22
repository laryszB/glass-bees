<p align="center">
    <img src="https://github.com/laryszB/glass-bees/blob/788e248bd9d2becc0f5cc7352eaeddcfdad77bf3/screenshots/logo.png" alt="drawing"/>
</p>

# Overview

Glass Bees is a web application based on the Laravel framework, the aim of which is to support beekeepers in managing apiaries.

## Technologies used

- Laravel 10
- MySQL
- Tailwind.css
- Alpine.js
- jQuery

## Key Features

- Geolocation of apiaries on a map using OpenStreetMap, Nominatim API and Leaflet JS
- Weather information in apiaries using OpenWaether API
- Bee disease and feeding control
- Statistical tools for controlling honey harvests
- Generating PDF reports on honey harvests

## Interface

The frontend is implemented mainly using tailwind.css, alpine.js and jQuery.

**The main page contains a map with apiary locations:**

<img src="https://github.com/laryszB/glass-bees/blob/0df885a1534b441c6bc5dcc09b91d19c8409cf1e/screenshots/maine_page.png" alt="drawing"/>


**The disease register stores information about bee diseases registered by the beekeeper. You can freely edit these events and filter by event status:**

<img src="https://github.com/laryszB/glass-bees/blob/0df885a1534b441c6bc5dcc09b91d19c8409cf1e/screenshots/bee_diseases.png" alt="drawing"/>


**The honey harvest register stores information about the honey harvest made by the beekeeper. From the register level, it is possible to generate a PDF with detailed data from the apiary and view charts showing graphically the efficiency of bees and apiaries as well as profits:**

<img src="https://github.com/laryszB/glass-bees/blob/0df885a1534b441c6bc5dcc09b91d19c8409cf1e/screenshots/honey_harvests_1.png" alt="drawing"/>
<img src="https://github.com/laryszB/glass-bees/blob/0df885a1534b441c6bc5dcc09b91d19c8409cf1e/screenshots/honey_harvests_2.png" alt="drawing"/>


**Each hive in the apiary can be assigned a queen bee. The application calculates the life of the queen bee based on the date of her birth and displays a graphic life bar to the beekeeper. Also based on the queen's date of birth, she is assigned a specific color opalite:**

<p align="center">
    <img src="https://github.com/laryszB/glass-bees/blob/0df885a1534b441c6bc5dcc09b91d19c8409cf1e/screenshots/queen.png" alt="drawing"/>
</p>


## Development

The application is constantly being developed and adapted for public deployment.
