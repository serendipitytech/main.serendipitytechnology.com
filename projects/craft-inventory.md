---
title: Craft Inventory
slug: craft-inventory
icon: barcode.svg
featured: false
order: 7
summary: >
  Mobile-first inventory app for hobbyists—scan barcodes, track quantities,
  and share materials with crafting groups.
hero_image: projects/craft-inventory-hero.png
tags:
  - mobile
  - react
  - inventory
---

## The Challenge

Crafters and hobbyists accumulate supplies across multiple projects—yarn, fabric, beads, paints—but rarely know what they already own. Duplicate purchases pile up, projects stall waiting for materials that are actually buried in a closet, and sharing supplies with friends requires endless "do you have any...?" text chains.

## Our Approach

We built a mobile-first React application centered on barcode scanning for rapid inventory entry. Point your phone at any product's UPC code, and the app automatically looks up product details from multiple APIs, caches the results, and adds it to your library. The offline-first architecture means you can catalog supplies anywhere—craft stores, estate sales, your garage—and sync when you're back online.

## Key Features

- **Instant Barcode Scanning**: Real-time UPC/EAN detection using your phone's camera with automatic product lookup from multiple databases
- **Smart API Fallback**: Queries UPCItemDB, UPC Database, and OpenFoodFacts in sequence with 24-hour caching to minimize API calls and speed up repeated scans
- **Quantity Tracking**: Know exactly how many skeins, sheets, or bottles you have—intelligent duplicate detection prompts to increment quantity or create separate entries
- **Photo Capture**: For unlabeled items, snap a photo with built-in cropping before adding to your inventory
- **Offline-First Sync**: Catalog items without network connectivity; changes sync automatically to Supabase when you're back online

## The Results

- Eliminated duplicate craft supply purchases by providing instant "do I already have this?" answers
- Enabled inventory cataloging anywhere—no Wi-Fi required
- Reduced project planning time by making material availability instantly searchable
- Created foundation for group sharing features to coordinate supplies across crafting circles

## Technologies Used

React, TypeScript, Vite, Tailwind CSS, ZXing (barcode detection), Supabase, Dexie.js (IndexedDB)
