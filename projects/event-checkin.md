---
title: Event Check-In
slug: event-checkin
icon: clipboard-check.svg
featured: true
order: 9
summary: >
  Real-time event check-in app with multi-device sync, role-based access,
  and roster import—live on the iOS App Store.
hero_image: projects/event-checkin-hero.png
tags:
  - mobile
  - react-native
  - events
---

## The Challenge

Event organizers relied on paper lists and manual coordination for guest check-ins at galas, conferences, and private events. Multiple staff members working the door had no way to see each other's progress in real-time, leading to duplicate check-ins, confusion about who had arrived, and no live attendance visibility for event managers inside the venue.

## Our Approach

We built a cross-platform check-in application using Expo and React Native, with Supabase providing real-time synchronization across all connected devices. The moment one staff member checks in a guest, every other device sees the update instantly. Role-based access control ensures door staff can only check in guests while managers can import rosters, invite team members, and view analytics.

## Key Features

- **Real-Time Multi-Device Sync**: Check-ins appear instantly across all connected devices—no refresh required, no duplicate entries
- **Intuitive Check-In Interface**: Swipe gestures and tap interactions for rapid guest processing; bulk check-in entire tables or groups with one action
- **Roster Import System**: Upload CSV files or connect Google Sheets directly; smart column mapping handles varied file formats
- **Role-Based Access Control**: Five-tier permission system (Owner, Admin, Manager, Checker, Member) ensures appropriate access at every level
- **Magic Link Authentication**: Secure, passwordless sign-in via email—invite team members who can start checking in guests within minutes

## The Results

- Eliminated paper check-in lists and manual reconciliation
- Enabled real-time attendance visibility for event managers
- Reduced door congestion with faster, multi-station check-in capability
- Currently live on the iOS App Store with web access via Vercel

## Technologies Used

Expo, React Native, TypeScript, Supabase (PostgreSQL + Realtime), iOS App Store, Vercel
