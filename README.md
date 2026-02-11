# Running Shoes Lifespan Calculator

This repository contains a WordPress shortcode plugin file:

- `running-shoes-calculator.php`

Use shortcode:

```text
[calculator]
```

Optional monetization-oriented attributes:

```text
[calculator default_km="650" default_miles="400" cta_url="https://example.com/shoes" cta_label="Shop replacement shoes"]
```

## Improvements in this version

- Restored and expanded shoe brand/model lifespan reference list.
- Added filter hooks:
  - `rsl_brand_data`
  - `rsl_factor_data`
- Improved maintainability by shipping calculator data through a single config object.
- Added stronger fallback behavior for missing model data.
- Added shortcode attributes for default lifespan tuning and affiliate CTA URL/label.
- Preserved responsive UI, result meter, health status, replacement ETA, and local persistence.

## Suggested monetization + product roadmap

- Add affiliate links in “replace soon” output cards.
- Add user shoe logs and reminders (email/push) with premium tiers.
- Add optional Strava import to auto-update mileage.
- Add personalized recommendation engine for replacement shoes.
