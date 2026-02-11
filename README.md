# Running Shoes Lifespan Calculator / Local Website Preview

This repository includes:

- `running-shoes-calculator.php` (WordPress shortcode plugin)
- `local-preview.php` (calculator-only WP-style preview harness)
- Static local website preview pages aligned to the live site structure:
  - `index.html`
  - `about.html`
  - `blog.html`
  - `faq.html`
  - `contact.html`
  - `privacy.html`
  - `terms.html`
  - `guides.html`
  - `reviews.html`

## What's improved in this iteration

- Improved `index.html` with:
- Expanded shoe library coverage in `index.html` and shortcode data with additional brands/models (On, Puma, Salomon, Altra plus added flagship models across existing brands).
  - enhanced visual design (full-page running background image, glassmorphism cards, richer navigation and contrast),
  - enhanced status-aware recommendation cards,
  - model-vs-model comparison block,
  - recent scenario history (last 5 runs),
  - better status coloring and cleaner factor logic,
  - existing persisted settings + ETA + dark mode kept intact.
- Improved `contact.html` with a matching visual refresh plus lightweight frontend validation and newsletter opt-in to prepare monetizable retention loops.
- Kept the WordPress shortcode plugin improvements in `running-shoes-calculator.php` for safer CTA rendering and stronger input/state handling.

## Monetization opportunities (next)

1. Replace recommendation placeholders with a real affiliate feed (Amazon/REI/Running Warehouse) and track clicks.
2. Connect contact/newsletter capture to an ESP (ConvertKit/Mailchimp/Brevo) and send automated replacement reminders.
3. Add paid user accounts for shoe-rotation tracking, mileage sync, and reminders.
4. Add sponsored placements for brand/model pages and premium featured comparison slots.

## Run locally

```bash
./start-local-preview.sh
```

Then open:

- Main site preview: `http://127.0.0.1:8080/index.html`
- Calculator harness: `http://127.0.0.1:8080/local-preview.php`

## WordPress shortcode

```text
[calculator]
```

Optional attributes:

```text
[calculator default_km="650" default_miles="400" cta_url="https://example.com/shoes" cta_label="Shop replacement shoes"]
```

## Important note

This is a local reconstruction aligned to the public site’s visible layout and navigation. It is not a full export of the production backend (CMS data, hosting config, auth-gated assets, and runtime APIs).
