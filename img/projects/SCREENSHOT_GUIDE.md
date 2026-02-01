# Portfolio Screenshot Guide

Replace placeholder images with real screenshots. All images should be **1200×800px** (gallery) or **600×400px** (thumbnails).

## Image Specifications
- **Format**: PNG preferred (crisp UI), JPG acceptable for photos
- **Gallery images**: 1200×800px (3:2 ratio)
- **Thumbnails**: 600×400px (3:2 ratio)
- **Quality**: High resolution, no compression artifacts

---

## Event Check-In
**Files**: `checkin-thumb.png`, `checkin-list.png`, `checkin-dashboard.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `checkin-list.png` | Main attendee list with some checked-in (green) and pending (gray) guests |
| `checkin-dashboard.png` | Event selection modal or admin dashboard showing multiple events |
| `checkin-thumb.png` | Cropped version of list view showing the clean UI |

**Source**: Run web version locally (`npx expo start --web`) or capture from iOS app

---

## Interactive Mapping Utility
**Files**: `mapping-thumb.png`, `mapping-overview.png`, `mapping-detail.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `mapping-overview.png` | Full map view with colored markers and sidebar filters |
| `mapping-detail.png` | Zoomed view with route optimization or marker popups visible |
| `mapping-thumb.png` | Map section showing markers clustered in an area |

**Source**: Run locally via PHP server or Docker

---

## Community Resource Locator
**Files**: `resource-locator-thumb.png`, `resource-locator-map.png`, `resource-locator-list.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `resource-locator-map.png` | Public map with resource markers and category legend |
| `resource-locator-list.png` | List/sidebar view of resources with filtering |
| `resource-locator-thumb.png` | Map section with visible markers |

**Source**: Run locally (`npm run dev`) from od_map project

---

## Custom Membership Platform
**Files**: `membership-thumb.png`, `membership-dashboard.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `membership-dashboard.png` | Member list or dashboard showing dues status, member count |
| `membership-thumb.png` | Dashboard header area or summary cards |

**Source**: Run locally from membership_database project

---

## Email Marketing Integration (Mautic)
**Files**: `email-thumb.png`, `email-workflow.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `email-workflow.png` | Mautic segment list, campaign builder, or VAN Segment Creator interface |
| `email-thumb.png` | Dashboard or segment creation screen |

**Source**: Access running Mautic instance or dev environment

---

## Dynamic Inventory Catalog
**Files**: `inventory-thumb.png`, `inventory-grid.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `inventory-grid.png` | Product catalog grid with images, search bar visible |
| `inventory-thumb.png` | Section of catalog showing product cards |

**Source**: Open HTML files directly in browser

---

## Production Asset Management
**Files**: `crm-thumb.png`, `crm-upload.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `crm-upload.png` | File upload interface or asset review screen |
| `crm-thumb.png` | Dashboard or file list view |

**Source**: Run locally via PHP server from client_files project

---

## Craft Inventory
**Files**: `craft-inventory-thumb.png`, `craft-inventory-scan.png`, `craft-inventory-list.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `craft-inventory-scan.png` | Barcode scanner interface active |
| `craft-inventory-list.png` | Inventory list with product images and quantities |
| `craft-inventory-thumb.png` | List view section |

**Source**: Run locally (`npm run dev`) from inventory project

---

## Local Email Management
**Files**: `email-management-thumb.png`, `email-management-dashboard.png`

| Screenshot | What to Capture |
|------------|-----------------|
| `email-management-dashboard.png` | Generated HTML report showing email triage results |
| `email-management-thumb.png` | Header section of report with urgency breakdown |

**Source**: Run analysis script and capture generated HTML output

---

## Tips for Great Screenshots

1. **Use sample/demo data** — avoid real names, emails, or sensitive info
2. **Full browser width** — capture at 1200px+ width, then crop to 1200×800
3. **Light mode preferred** — unless the app is dark-mode-only
4. **Hide browser chrome** — use browser's "responsive design mode" or fullscreen
5. **Consistent styling** — same browser, no extensions visible
