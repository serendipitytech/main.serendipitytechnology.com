---
title: Community Resource Locator
slug: community-resource-locator
icon: maps-arrow-diagonal.svg
featured: false
order: 2
summary: >
  This project centralized scattered data into a clean, user-friendly system
  for public visibility. The goal was to surface physical access points and
  support services in underserved areas.
hero_image: projects/community-resource-locator-hero.png
tags:
  - public-facing
  - mapping
  - community
---

## The Challenge

Life-saving harm reduction resources were effectively invisible to the people who needed them most. Narcan vending machine locations existed in internal documents, but residents facing overdose emergencies had no quick way to find the nearest access point. Information was trapped in spreadsheets and PDF flyers that quickly became outdated as new locations opened.

## Our Approach

We built a React-based public map application using Leaflet with OpenStreetMap tiles. Addresses are automatically geocoded via the Nominatim API with 30-day caching to minimize external calls. The interface prioritizes simplicity—residents can immediately see all available resources on an interactive map without creating accounts or navigating complex menus.

## Key Features

- **Public Map Interface**: No login required—residents can immediately see all Narcan vending machines and overdose support services
- **Resource Type Filtering**: Toggle visibility of different resource categories with color-coded markers (blue for Narcan, red for support services)
- **Mobile-First Design**: Responsive layout with collapsible sidebar works seamlessly on smartphones—critical for users who may only have mobile access
- **Geographic Context**: County and city boundary overlays via GeoJSON help users understand which resources are nearest to their location

## The Results

- Centralized previously siloed data from 5+ sources
- Increased resource discoverability for underserved populations
- Reduced staff time spent answering "where can I find..." calls

## Technologies Used

React, TypeScript, Vite, Leaflet.js with React-Leaflet, Nominatim geocoding API, GeoJSON
