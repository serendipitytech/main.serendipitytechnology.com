---
title: Client Portal & Project Hub
slug: client-portal-project-hub
icon: clipboard-check.svg
featured: false
order: 7
summary: >
  One system with two faces: clients see status, files, and invoices, while
  the team runs projects, tickets, and payments behind the same screen.
hero_image: projects/client-portal-project-hub-hero.png
tags:
  - portal
  - project-management
  - payments
---

## The Challenge

Running client work across scattered email threads, spreadsheets, and a separate invoicing tool means things fall through the cracks eventually. Clients have no single place to check where their project stands, so the team ends up spending time answering "any update?" instead of doing the actual work.

## Our Approach

We built a single application that serves two audiences from one codebase and one database. Clients get a clean portal for files, live project status, and invoices. The team gets an internal hub with a kanban board, ticketing, and project tracking. Payments run through Stripe and Zelle, and invoices generate as PDFs, so the money lives right alongside the work.

## Key Features

- Client-facing portal: shared files, live project status, and invoices
- Internal kanban board, ticketing, and project tracking
- Stripe Connect onboarding plus Zelle, with PDF invoicing
- Automated daily digests and task workflows to keep everyone current

## The Results

- One source of truth for both the client and the team
- Payments and invoicing sit alongside the actual project work
- Less time spent on status updates, more time spent on delivery

## Technologies Used

PHP, SQLite, Stripe, Docker, Traefik
