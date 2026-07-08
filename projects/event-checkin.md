---
title: Event Check-In
slug: event-checkin
icon: clipboard-check.svg
featured: false
order: 5
summary: >
  A real-time event check-in app with multi-device sync, role-based access,
  and roster import, live on the iOS App Store.
hero_image: projects/event-checkin-hero.png
tags:
  - mobile
  - react-native
  - events
---

## The Challenge

Event organizers were still running guest check-ins at galas, conferences, and private events off paper lists and manual coordination. Multiple staff working the door had no way to see each other's progress in real time, which led to duplicate check-ins, confusion about who had actually arrived, and zero live attendance visibility for the managers inside the venue.

## Our Approach

We built a cross-platform check-in application using Expo and React Native, with Supabase handling real-time synchronization across every connected device. The moment one staff member checks in a guest, every other device sees the update instantly. Role-based access control keeps door staff limited to checking in guests, while managers can import rosters, invite team members, and view analytics.

## Key Features

- **Real-Time Multi-Device Sync**: Check-ins appear instantly across every connected device, no refresh required, no duplicate entries
- **Intuitive Check-In Interface**: Swipe gestures and tap interactions for rapid guest processing; bulk check-in entire tables or groups with one action
- **Roster Import System**: Upload CSV files or connect Google Sheets directly, with smart column mapping that handles varied file formats
- **Role-Based Access Control**: A five-tier permission system (Owner, Admin, Manager, Checker, Member) keeps access appropriate at every level
- **Magic Link Authentication**: Secure, passwordless sign-in via email; invite team members who can start checking in guests within minutes

## The Results

- Eliminated paper check-in lists and manual reconciliation
- Gave event managers real-time attendance visibility
- Reduced door congestion with faster, multi-station check-in
- Currently live on the iOS App Store, with web access via Vercel

## Technologies Used

Expo, React Native, TypeScript, Supabase (PostgreSQL + Realtime), iOS App Store, Vercel
