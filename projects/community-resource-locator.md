---
title: Community Resource Locator
slug: community-resource-locator
icon: maps-arrow-diagonal.svg
featured: false
order: 8
summary: >
  A clean, public-facing map that pulls scattered data into one place,
  surfacing physical access points and support services in underserved
  areas.
hero_image: projects/community-resource-locator-hero.png
tags:
  - public-facing
  - mapping
  - community
---

## The Challenge

Life-saving harm reduction resources were effectively invisible to the people who needed them most. Narcan vending machine locations existed in internal documents, but residents facing an overdose emergency had no quick way to find the nearest access point. The information was trapped in spreadsheets and PDF flyers that went stale the moment a new location opened.

## Our Approach

We built a React-based public map application using Leaflet with OpenStreetMap tiles. Addresses are geocoded automatically via the Nominatim API, with 30-day caching to keep external calls to a minimum. The interface prioritizes simplicity: residents can immediately see all available resources on an interactive map, no account and no complex menus required.

## Key Features

- **Public Map Interface**: No login required. Residents can immediately see all Narcan vending machines and overdose support services
- **Resource Type Filtering**: Toggle visibility of different resource categories with color-coded markers (blue for Narcan, red for support services)
- **Mobile-First Design**: A responsive layout with a collapsible sidebar works seamlessly on smartphones, which matters most for users who may only have mobile access
- **Geographic Context**: County and city boundary overlays via GeoJSON help people understand which resources are nearest to them

## The Results

- Centralized previously siloed data from five-plus sources
- Increased resource discoverability for underserved populations
- Reduced staff time spent answering "where can I find..." calls

## Technologies Used

React, TypeScript, Vite, Leaflet.js with React-Leaflet, Nominatim geocoding API, GeoJSON
