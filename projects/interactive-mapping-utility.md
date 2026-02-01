---
title: Interactive Mapping Utility
slug: interactive-mapping-utility
icon: map-pin-plus.svg
featured: false
order: 1
summary: >
  A custom-built tool to visualize location-based data and connect it to
  relational datasets. Designed to simplify complex queries and support
  real-time lookups through an intuitive map-based interface.
hero_image: projects/interactive-mapping-utility-hero.png
tags:
  - mapping
  - data-visualization
  - real-time
---

## The Challenge

Field teams needed to locate and visit specific constituents within geographic areas, but their workflow was painfully manual. Finding people within a target radius meant running complex database queries, cross-referencing spreadsheets with addresses, and manually plotting routes on paper maps. A simple "who's within half a mile of this intersection?" question could take 20 minutes to answer—time that field operatives didn't have.

## Our Approach

We built a custom web-based mapping interface with MySQL spatial indexing at its core. The map serves as the primary navigation tool—enter an address and radius, and the system instantly displays all matching records as color-coded markers. A multi-source geocoding pipeline (local cache first, Census API fallback) ensures reliable address-to-coordinate conversion, while intelligent caching reduces repeated lookups.

## Key Features

- **Radius-Based Search**: Enter any address with a customizable radius (0.1 to 5+ miles) to find all records in that area using spatial queries
- **Route Optimization**: Nearest-neighbor algorithm generates efficient walking/driving routes; click any marker to reorder from that starting point
- **Multi-Criteria Filtering**: Filter by county, party affiliation, or custom categories with results updating in real-time
- **Multiple Output Formats**: Interactive map, sortable data table, CSV export, and print-optimized landscape view for field use

## The Results

- Reduced lookup time from minutes to seconds
- Eliminated manual cross-referencing errors
- Enabled non-technical staff to query complex datasets independently

## Technologies Used

Leaflet.js, PHP, MySQL with spatial indexing, US Census Geocoding API, Docker
