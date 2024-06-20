# Taxi Booking System

## Project Overview

The Taxi Booking System is a PHP-based project designed to facilitate direct communication between passengers and drivers, eliminating the need for intermediaries and their commissions. This system is intended specifically for long-distance travel, with a minimum journey requirement of 40 kilometers.

## Features

1. **Direct Interaction**: The system acts as an intermediary between passengers and drivers, eliminating middle agents and their commissions.
2. **Long-Distance Travel**: Designed specifically for long-distance travel with a minimum distance requirement of 40 kilometers.
3. **Ride Requests**: Passengers can post their ride details, including source, destination, and preferred time.
4. **Driver Access**: Drivers from the same city as the requesting passenger can view the ride requests.
5. **Cost Estimation**: Multiple drivers can send their cost estimations for the ride. The system calculates and displays the minimum fare.

## How It Works

### For Passengers

1. **Create a Ride Request**: Passengers need to provide the following details:
   - Source Address
   - Destination Address
   - Preferred Time of Travel
2. **View Offers**: After posting the ride details, passengers can view cost estimations from multiple drivers.
3. **Select Offer**: Passengers can choose the best offer based on the provided estimations.

### For Drivers

1. **View Requests**: Drivers can view ride requests posted by passengers from the same city.
2. **Send Estimation**: Drivers can send their cost estimations for the ride requests they are interested in.
3. **Competitive Pricing**: Drivers can see the minimum fare calculated by the system, allowing them to adjust their offers competitively.

## Technical Details

- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL

## Installation and Setup

1. Clone the repository to your local machine.
   ```bash
   git clone https://github.com/TRUMPiler/Taxi-Booking-System.git
