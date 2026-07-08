---
title: Crowd Counter
slug: crowd-counter
icon: group.svg
featured: false
order: 12
summary: >
  A self-contained AI tool for estimating crowd sizes from video or photos
  using YOLOv8 object detection, with automated reporting and GPS grouping
  built in.
hero_image: projects/crowd-counter-hero.png
tags:
  - ai
  - computer-vision
  - docker
---

## The Challenge

Estimating crowd sizes from event footage is tedious and error-prone when it's done by hand. Whether you're documenting a public gathering, analyzing event attendance, or reviewing security footage, counting people frame by frame just doesn't scale. Organizations needed a way to quickly process video clips or photo sets and get defensible crowd estimates without hiring specialized computer vision expertise.

## Our Approach

We built a self-contained, Docker-based tool powered by YOLOv8, a state-of-the-art object detection model. Drop video files or photos into a folder, run a single command, and get back annotated images with bounding boxes around every detected person, plus summary reports with counts, averages, and peak-crowd frames. The entire pipeline runs locally with no cloud dependencies, so footage stays private.

## Key Features

- **Video Processing Mode**: Extracts frames at configurable intervals (every 2nd, 3rd, 5th frame, and so on), balancing accuracy against processing speed
- **Photo Processing Mode**: Analyzes still images with automatic GPS-based grouping from EXIF metadata, so photos from the same location get clustered together
- **YOLOv8 Detection**: Uses the lightweight `yolov8n` model for fast, accurate person detection with bounding box visualization
- **Auto-Rotation**: Automatically corrects portrait-orientation footage to landscape for consistent processing
- **Rich Reporting**: Generates an HTML summary with per-video statistics, clickable peak-frame thumbnails, and CSV exports for further analysis

## The Results

- Reduced crowd estimation time from hours of manual review to minutes of automated processing
- Provided defensible, reproducible counts backed by visual evidence (annotated frames)
- Let non-technical users run analysis with simple Docker commands
- Kept all processing local, with no footage uploaded to external services

## Technologies Used

Python, YOLOv8 (Ultralytics), OpenCV, Docker, Pandas, EXIF/GPS extraction (piexif)
