<?php
/**
 * Plugin Name: Running Shoes Lifespan Calculator
 * Description: Adds a shortcode [calculator] to estimate remaining running shoe lifespan.
 * Version: 1.2.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Returns shoe lifespan reference data.
 *
 * @return array<string,array<string,array<string,int>>>
 */
function rsl_get_brand_data() {
    $brand_data = [
        'Nike' => [
            'Air Zoom Pegasus' => ['miles' => 350, 'km' => 563],
            'React Infinity Run Flyknit' => ['miles' => 400, 'km' => 650],
            'Free RN' => ['miles' => 300, 'km' => 483],
            'ZoomX Vaporfly Next%' => ['miles' => 300, 'km' => 483],
            'Air Zoom Structure' => ['miles' => 400, 'km' => 650],
            'ZoomX Invincible Run' => ['miles' => 400, 'km' => 650],
            'Joyride Run Flyknit' => ['miles' => 350, 'km' => 563],
            'Air Zoom Vomero' => ['miles' => 400, 'km' => 650],
            'Air Zoom Winflo' => ['miles' => 400, 'km' => 650],
            'Flex Runner' => ['miles' => 400, 'km' => 650],
        ],
        'Adidas' => [
            'Ultraboost' => ['miles' => 350, 'km' => 563],
            'Adizero Adios Pro' => ['miles' => 300, 'km' => 483],
            'Solar Boost' => ['miles' => 400, 'km' => 650],
            'Boston' => ['miles' => 400, 'km' => 650],
            'Adizero Boston' => ['miles' => 400, 'km' => 650],
            '4D Run' => ['miles' => 400, 'km' => 650],
            'Pulseboost HD' => ['miles' => 400, 'km' => 650],
            'Pureboost' => ['miles' => 400, 'km' => 650],
            'Energy Boost' => ['miles' => 400, 'km' => 650],
            'Supernova' => ['miles' => 400, 'km' => 650],
        ],
        'Asics' => [
            'Gel-Kayano' => ['miles' => 350, 'km' => 563],
            'Gel-Nimbus' => ['miles' => 320, 'km' => 515],
            'GT-2000' => ['miles' => 300, 'km' => 483],
            'Gel-Cumulus' => ['miles' => 400, 'km' => 650],
            'Gel-DS Trainer' => ['miles' => 400, 'km' => 650],
            'Gel-Quantum 360' => ['miles' => 400, 'km' => 650],
            'Novablast' => ['miles' => 400, 'km' => 650],
            'Gel-Resolution' => ['miles' => 400, 'km' => 650],
            'Dynaflyte' => ['miles' => 400, 'km' => 650],
            'MetaRide' => ['miles' => 400, 'km' => 650],
        ],
        'Brooks' => [
            'Ghost' => ['miles' => 350, 'km' => 563],
            'Adrenaline GTS' => ['miles' => 400, 'km' => 650],
            'Launch' => ['miles' => 400, 'km' => 650],
            'Glycerin' => ['miles' => 400, 'km' => 650],
            'Levitate' => ['miles' => 400, 'km' => 650],
            'Hyperion Elite' => ['miles' => 400, 'km' => 650],
            'Addiction' => ['miles' => 400, 'km' => 650],
            'Revel' => ['miles' => 400, 'km' => 650],
            'Transcend' => ['miles' => 400, 'km' => 650],
            'Caldera' => ['miles' => 400, 'km' => 650],
        ],
        'New Balance' => [
            'Fresh Foam 1080' => ['miles' => 400, 'km' => 650],
            '860' => ['miles' => 400, 'km' => 650],
            'FuelCell Prism' => ['miles' => 400, 'km' => 650],
            '890' => ['miles' => 400, 'km' => 650],
            '880' => ['miles' => 400, 'km' => 650],
            '990' => ['miles' => 400, 'km' => 650],
            '1500' => ['miles' => 400, 'km' => 650],
            '1400' => ['miles' => 400, 'km' => 650],
            '327' => ['miles' => 400, 'km' => 650],
            '574' => ['miles' => 400, 'km' => 650],
        ],
        'Saucony' => [
            'Kinvara' => ['miles' => 300, 'km' => 483],
            'Ride' => ['miles' => 400, 'km' => 650],
            'Triumph' => ['miles' => 400, 'km' => 650],
            'Endorphin Speed' => ['miles' => 400, 'km' => 650],
            'Peregrine' => ['miles' => 400, 'km' => 650],
            'Guide' => ['miles' => 400, 'km' => 650],
            'Hurricane' => ['miles' => 400, 'km' => 650],
            'Freedom ISO' => ['miles' => 400, 'km' => 650],
            'Shadow' => ['miles' => 400, 'km' => 650],
            'Excel' => ['miles' => 400, 'km' => 650],
        ],
        'Hoka' => [
            'Clifton' => ['miles' => 400, 'km' => 650],
            'Bondi' => ['miles' => 350, 'km' => 563],
            'Speedgoat' => ['miles' => 400, 'km' => 650],
            'Arahi' => ['miles' => 400, 'km' => 650],
            'Rincon' => ['miles' => 400, 'km' => 650],
            'Evo Mafate' => ['miles' => 400, 'km' => 650],
            'Torrent' => ['miles' => 400, 'km' => 650],
            'Mach' => ['miles' => 400, 'km' => 650],
            'Stinson ATR' => ['miles' => 400, 'km' => 650],
            'Elevon' => ['miles' => 400, 'km' => 650],
        ],
        'Mizuno' => [
            'Wave Rider' => ['miles' => 350, 'km' => 563],
            'Wave Inspire' => ['miles' => 400, 'km' => 650],
            'Wave Sky' => ['miles' => 400, 'km' => 650],
            'Wave Mujin' => ['miles' => 400, 'km' => 650],
            'Wave Equate' => ['miles' => 400, 'km' => 650],
            'Wave Ultima' => ['miles' => 400, 'km' => 650],
            'Wave Lightning' => ['miles' => 400, 'km' => 650],
            'Wave Alpha' => ['miles' => 400, 'km' => 650],
            'Wave Exalt' => ['miles' => 400, 'km' => 650],
            'Wave Horizon' => ['miles' => 400, 'km' => 650],
        ],
        'Under Armour' => [
            'HOVR Phantom' => ['miles' => 400, 'km' => 650],
            'HOVR Machina' => ['miles' => 400, 'km' => 650],
            'HOVR Infinite' => ['miles' => 400, 'km' => 650],
            'Charged Assert' => ['miles' => 400, 'km' => 650],
            'Micro G Assert' => ['miles' => 400, 'km' => 650],
            'HOVR Sonic' => ['miles' => 400, 'km' => 650],
            'Project Rock' => ['miles' => 400, 'km' => 650],
            'HOVR Rise' => ['miles' => 400, 'km' => 650],
            'HOVR Apex' => ['miles' => 400, 'km' => 650],
            'Charged Commit TR' => ['miles' => 400, 'km' => 650],
        ],
        'Reebok' => [
            'Floatride Run Fast' => ['miles' => 300, 'km' => 483],
            'Forever Floatride Energy' => ['miles' => 400, 'km' => 650],
            'Zig Kinetica' => ['miles' => 400, 'km' => 650],
            'Nano X1' => ['miles' => 400, 'km' => 650],
            'DMX Series' => ['miles' => 400, 'km' => 650],
            'Run Supreme' => ['miles' => 400, 'km' => 650],
            'Aero Run' => ['miles' => 400, 'km' => 650],
            'Runner X' => ['miles' => 400, 'km' => 650],
            'FlexRun' => ['miles' => 400, 'km' => 650],
            'Speed Series' => ['miles' => 400, 'km' => 650],
        ],
    ];

    return apply_filters('rsl_brand_data', $brand_data);
}

/**
 * Default factor configuration.
 *
 * @return array<string,array<string,float>>
 */
function rsl_get_factor_data() {
    $factors = [
        'weight' => ['below-average' => 1.08, 'average' => 1.0, 'above-average' => 0.9],
        'pronation' => ['neutral' => 1.0, 'mild-over-supination' => 0.95, 'severe-over-supination' => 0.9, 'dont-know' => 1.0],
        'footstrike' => ['forefoot' => 1.0, 'midfoot' => 0.98, 'heel' => 0.95, 'dont-know' => 1.0],
        'terrain' => ['treadmill' => 1.05, 'road' => 1.0, 'trail' => 0.9, 'mixed' => 0.95],
        'shoeType' => ['daily-trainer' => 1.0, 'race-day' => 0.78, 'trail-specific' => 0.93, 'minimalist' => 0.9],
    ];

    return apply_filters('rsl_factor_data', $factors);
}

/**
 * Renders the running shoes lifespan calculator.
 *
 * @return string
 */
function running_shoes_calculator_shortcode() {
    static $instance_count = 0;
    $instance_count++;

    $atts = shortcode_atts(
        [
            'default_km' => '650',
            'default_miles' => '400',
            'cta_url' => '',
            'cta_label' => 'Find replacement shoes',
        ],
        [],
        'calculator'
    );

    $default_km = max(1, (int) $atts['default_km']);
    $default_miles = max(1, (int) $atts['default_miles']);
    $cta_url = esc_url_raw($atts['cta_url']);
    $cta_label = sanitize_text_field($atts['cta_label']);

    $id_suffix = 'rsl-' . $instance_count;
    $config = [
        'id' => $id_suffix,
        'brandData' => rsl_get_brand_data(),
        'factorData' => rsl_get_factor_data(),
        'defaults' => ['km' => $default_km, 'miles' => $default_miles],
        'cta' => [
            'url' => $cta_url,
            'label' => $cta_label ?: 'Find replacement shoes',
            'minSeverity' => 'watchlist',
        ],
    ];

    ob_start();
    ?>
    <style>
      #<?php echo esc_attr($id_suffix); ?>{width:100%;max-width:780px;margin:1rem auto;border:1px solid #e5e7eb;border-radius:12px;background:#fff;padding:1rem;font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;box-shadow:0 10px 20px rgba(0,0,0,.04)}
      #<?php echo esc_attr($id_suffix); ?> .rsl-grid{display:grid;gap:.75rem;grid-template-columns:repeat(2,minmax(0,1fr))}@media (max-width:640px){#<?php echo esc_attr($id_suffix); ?> .rsl-grid{grid-template-columns:1fr}}
      #<?php echo esc_attr($id_suffix); ?> label{font-weight:600;font-size:.9rem;margin-bottom:.25rem;display:block}
      #<?php echo esc_attr($id_suffix); ?> select,#<?php echo esc_attr($id_suffix); ?> input,#<?php echo esc_attr($id_suffix); ?> button{width:100%;border:1px solid #cbd5e1;border-radius:8px;padding:.65rem;font-size:.95rem;box-sizing:border-box}
      #<?php echo esc_attr($id_suffix); ?> .radio-group{display:flex;gap:1rem;align-items:center;flex-wrap:wrap}
      #<?php echo esc_attr($id_suffix); ?> .radio-group label{font-weight:500;display:inline-flex;align-items:center;gap:.35rem}
      #<?php echo esc_attr($id_suffix); ?> .actions{display:flex;gap:.5rem}
      #<?php echo esc_attr($id_suffix); ?> button[type="submit"]{background:#0369a1;color:#fff;border-color:#0369a1;cursor:pointer}
      #<?php echo esc_attr($id_suffix); ?> .btn-ghost{background:#f8fafc;color:#0f172a}
      #<?php echo esc_attr($id_suffix); ?> .result{margin-top:1rem;border-top:1px solid #e2e8f0;padding-top:1rem}
      #<?php echo esc_attr($id_suffix); ?> .result-number{font-size:2rem;margin:0}
      #<?php echo esc_attr($id_suffix); ?> .meter{height:10px;border-radius:999px;background:#e2e8f0;overflow:hidden;margin:.5rem 0 .75rem}
      #<?php echo esc_attr($id_suffix); ?> .meter>span{display:block;height:100%;background:linear-gradient(90deg,#16a34a,#f59e0b,#dc2626)}
      #<?php echo esc_attr($id_suffix); ?> .alert{border-left:4px solid #0ea5e9;background:#f0f9ff;padding:.65rem .75rem;margin-top:.5rem}
      #<?php echo esc_attr($id_suffix); ?> .muted{color:#475569;font-size:.88rem}
      #<?php echo esc_attr($id_suffix); ?> .hidden{display:none}
      #<?php echo esc_attr($id_suffix); ?> details{margin-top:.5rem}
      #<?php echo esc_attr($id_suffix); ?> .cta{display:inline-block;margin-top:.65rem;padding:.55rem .8rem;border-radius:8px;background:#0f766e;color:#fff;text-decoration:none;font-weight:600}
    </style>

    <div id="<?php echo esc_attr($id_suffix); ?>" class="running-shoes-calculator">
      <form class="shoe-form" novalidate>
        <div class="radio-group" role="radiogroup" aria-label="Unit selection">
          <label><input type="radio" name="unit-<?php echo esc_attr($id_suffix); ?>" value="metric" checked> Metric (km)</label>
          <label><input type="radio" name="unit-<?php echo esc_attr($id_suffix); ?>" value="imperial"> Imperial (miles)</label>
        </div>

        <div class="rsl-grid">
          <div>
            <label for="brand-<?php echo esc_attr($id_suffix); ?>">Brand</label>
            <select id="brand-<?php echo esc_attr($id_suffix); ?>"></select>
          </div>
          <div>
            <label for="series-<?php echo esc_attr($id_suffix); ?>">Model/Series</label>
            <select id="series-<?php echo esc_attr($id_suffix); ?>"></select>
          </div>
          <div>
            <label for="distance-<?php echo esc_attr($id_suffix); ?>">Distance already run</label>
            <input type="number" id="distance-<?php echo esc_attr($id_suffix); ?>" min="0" step="0.1" placeholder="Enter distance in km">
          </div>
          <div>
            <label for="weekly-<?php echo esc_attr($id_suffix); ?>">Weekly training distance (optional)</label>
            <input type="number" id="weekly-<?php echo esc_attr($id_suffix); ?>" min="0" step="0.1" placeholder="Average weekly distance">
          </div>
          <div>
            <label for="weight-<?php echo esc_attr($id_suffix); ?>">Weight category</label>
            <select id="weight-<?php echo esc_attr($id_suffix); ?>"><option value="below-average">Below average</option><option value="average" selected>Average</option><option value="above-average">Above average</option></select>
          </div>
          <div>
            <label for="pronation-<?php echo esc_attr($id_suffix); ?>">Pronation</label>
            <select id="pronation-<?php echo esc_attr($id_suffix); ?>"><option value="neutral">Neutral</option><option value="mild-over-supination">Mild overpronation/supination</option><option value="severe-over-supination">Severe overpronation/supination</option><option value="dont-know" selected>Don't know</option></select>
          </div>
          <div>
            <label for="footstrike-<?php echo esc_attr($id_suffix); ?>">Footstrike</label>
            <select id="footstrike-<?php echo esc_attr($id_suffix); ?>"><option value="forefoot">Forefoot</option><option value="midfoot">Midfoot</option><option value="heel">Heel</option><option value="dont-know" selected>Don't know</option></select>
          </div>
          <div>
            <label for="terrain-<?php echo esc_attr($id_suffix); ?>">Terrain</label>
            <select id="terrain-<?php echo esc_attr($id_suffix); ?>"><option value="treadmill">Treadmill</option><option value="road" selected>Road (asphalt/concrete)</option><option value="trail">Trail</option><option value="mixed">Mixed</option></select>
          </div>
          <div>
            <label for="shoe-type-<?php echo esc_attr($id_suffix); ?>">Shoe type</label>
            <select id="shoe-type-<?php echo esc_attr($id_suffix); ?>"><option value="daily-trainer" selected>Daily trainer</option><option value="race-day">Race-day / carbon</option><option value="trail-specific">Trail-specific</option><option value="minimalist">Minimalist</option></select>
          </div>
        </div>

        <p class="muted">Estimate only. Replace sooner if cushioning feels flat, traction is poor, or pain appears.</p>

        <div class="actions">
          <button type="submit">Calculate lifespan</button>
          <button type="button" class="btn-ghost js-reset">Reset</button>
        </div>
      </form>

      <div class="result hidden" aria-live="polite"></div>
    </div>

    <script>
      (() => {
        const config = <?php echo wp_json_encode($config); ?>;
        const root = document.getElementById(config.id);
        if (!root) return;

        const { brandData, factorData, defaults, cta } = config;
        const form = root.querySelector('.shoe-form');
        const resultDiv = root.querySelector('.result');
        const storageKey = `rsl-state-${config.id}`;

        const brandSelect = root.querySelector('[id^="brand-"]');
        const seriesSelect = root.querySelector('[id^="series-"]');
        const distanceInput = root.querySelector('[id^="distance-"]');
        const weeklyInput = root.querySelector('[id^="weekly-"]');
        const weightSelect = root.querySelector('[id^="weight-"]');
        const pronationSelect = root.querySelector('[id^="pronation-"]');
        const footstrikeSelect = root.querySelector('[id^="footstrike-"]');
        const terrainSelect = root.querySelector('[id^="terrain-"]');
        const shoeTypeSelect = root.querySelector('[id^="shoe-type-"]');

        const sortWithOtherLast = (items) => items.slice().sort((a, b) => a === 'Other' ? 1 : b === 'Other' ? -1 : a.localeCompare(b));
        const unit = () => root.querySelector('input[name^="unit-"]:checked')?.value || 'metric';

        const populateBrands = () => {
          brandSelect.innerHTML = '';
          const options = ['Select a brand', ...sortWithOtherLast([...Object.keys(brandData), 'Other'])];
          options.forEach((name, idx) => {
            const option = document.createElement('option');
            option.value = idx === 0 ? '' : name;
            option.textContent = name;
            brandSelect.appendChild(option);
          });
          populateSeries('');
        };

        const populateSeries = (brand) => {
          seriesSelect.innerHTML = '';
          const series = !brand || brand === 'Other' || !brandData[brand]
            ? ['Select model/series', 'Other']
            : ['Select model/series', ...sortWithOtherLast([...Object.keys(brandData[brand]), 'Other'])];

          series.forEach((name, idx) => {
            const option = document.createElement('option');
            option.value = idx === 0 ? '' : name;
            option.textContent = name;
            seriesSelect.appendChild(option);
          });
        };

        const setUnitPlaceholder = () => {
          const unitLabel = unit() === 'metric' ? 'km' : 'miles';
          distanceInput.placeholder = `Enter distance in ${unitLabel}`;
          weeklyInput.placeholder = `Average weekly ${unitLabel}`;
        };

        const getBase = (brand, series, unitKey) => {
          if (brand && brandData[brand] && series && brandData[brand][series]) {
            return brandData[brand][series][unitKey];
          }
          return defaults[unitKey] || 400;
        };

        const getMultiplier = (group, key) => (factorData[group] && factorData[group][key]) || 1;

        const getHealth = (remainingPct) => {
          if (remainingPct > 0.5) return { key: 'healthy', label: 'Healthy', tip: 'Cushion life looks good. Keep monitoring wear patterns.' };
          if (remainingPct > 0.2) return { key: 'watchlist', label: 'Watchlist', tip: 'Start planning a replacement pair and rotate if possible.' };
          return { key: 'replace-soon', label: 'Replace Soon', tip: 'Low life left. Replace now if impact or instability increases.' };
        };

        const shouldRenderCta = (healthKey) => {
          if (!cta || !cta.url) return false;
          if (cta.minSeverity === 'replace-soon') return healthKey === 'replace-soon';
          return healthKey === 'watchlist' || healthKey === 'replace-soon';
        };

        const saveState = () => {
          localStorage.setItem(storageKey, JSON.stringify({
            unit: unit(),
            brand: brandSelect.value,
            series: seriesSelect.value,
            distance: distanceInput.value,
            weekly: weeklyInput.value,
            weight: weightSelect.value,
            pronation: pronationSelect.value,
            footstrike: footstrikeSelect.value,
            terrain: terrainSelect.value,
            shoeType: shoeTypeSelect.value,
          }));
        };

        const restoreState = () => {
          try {
            const state = JSON.parse(localStorage.getItem(storageKey) || '{}');
            root.querySelector(`input[name^="unit-"][value="${state.unit || 'metric'}"]`)?.click();
            brandSelect.value = state.brand || '';
            populateSeries(brandSelect.value);
            seriesSelect.value = state.series || '';
            distanceInput.value = state.distance || '';
            weeklyInput.value = state.weekly || '';
            weightSelect.value = state.weight || 'average';
            pronationSelect.value = state.pronation || 'dont-know';
            footstrikeSelect.value = state.footstrike || 'dont-know';
            terrainSelect.value = state.terrain || 'road';
            shoeTypeSelect.value = state.shoeType || 'daily-trainer';
          } catch (e) {
            console.warn('Unable to restore saved state.', e);
          }
        };

        populateBrands();
        setUnitPlaceholder();
        restoreState();

        root.querySelectorAll('input[name^="unit-"]').forEach((radio) => radio.addEventListener('change', () => {
          setUnitPlaceholder();
          saveState();
        }));

        [brandSelect, seriesSelect, distanceInput, weeklyInput, weightSelect, pronationSelect, footstrikeSelect, terrainSelect, shoeTypeSelect]
          .forEach((el) => el.addEventListener('change', saveState));

        brandSelect.addEventListener('change', () => {
          populateSeries(brandSelect.value);
          saveState();
        });

        form.addEventListener('submit', (event) => {
          event.preventDefault();

          const unitKey = unit() === 'metric' ? 'km' : 'miles';
          const distanceRun = Number.parseFloat(distanceInput.value || '0');
          const weeklyDistance = Number.parseFloat(weeklyInput.value || '0');

          if (Number.isNaN(distanceRun) || distanceRun < 0) {
            resultDiv.classList.remove('hidden');
            resultDiv.innerHTML = '<div class="alert">Please enter a valid non-negative distance.</div>';
            distanceInput.focus();
            return;
          }

          const base = getBase(brandSelect.value, seriesSelect.value, unitKey);
          const factors = {
            weight: getMultiplier('weight', weightSelect.value),
            pronation: getMultiplier('pronation', pronationSelect.value),
            footstrike: getMultiplier('footstrike', footstrikeSelect.value),
            terrain: getMultiplier('terrain', terrainSelect.value),
            shoeType: getMultiplier('shoeType', shoeTypeSelect.value),
          };

          const totalExpected = Math.round(base * factors.weight * factors.pronation * factors.footstrike * factors.terrain * factors.shoeType);
          const remaining = Math.max(0, totalExpected - Math.round(distanceRun));
          const usedPct = totalExpected > 0 ? Math.min(100, Math.round((distanceRun / totalExpected) * 100)) : 0;
          const remainingPct = totalExpected > 0 ? remaining / totalExpected : 0;
          const health = getHealth(remainingPct);

          let replacementText = '<span class="muted">Add weekly distance to estimate replacement date.</span>';
          if (!Number.isNaN(weeklyDistance) && weeklyDistance > 0 && remaining > 0) {
            const weeksLeft = remaining / weeklyDistance;
            const eta = new Date();
            eta.setDate(eta.getDate() + Math.round(weeksLeft * 7));
            replacementText = `Approx. <strong>${weeksLeft.toFixed(1)} weeks</strong> left (around <strong>${eta.toLocaleDateString()}</strong>).`;
          }

          const ctaMarkup = shouldRenderCta(health.key)
            ? `<a class="cta" target="_blank" rel="noopener sponsored nofollow" href="${cta.url}">${cta.label || 'Find replacement shoes'}</a>`
            : '';

          resultDiv.classList.remove('hidden');
          resultDiv.innerHTML = `
            <h3>Estimated remaining lifespan</h3>
            <p class="result-number">${remaining} ${unitKey}</p>
            <div class="meter" aria-label="Usage meter"><span style="width:${usedPct}%"></span></div>
            <p><strong>Status:</strong> ${health.label}</p>
            <div class="alert">${health.tip}</div>
            <p>${replacementText}</p>
            ${ctaMarkup}
            <details>
              <summary>Show calculation details</summary>
              <p class="muted">
                Base lifespan: ${base} ${unitKey}<br>
                × Weight factor (${factors.weight})<br>
                × Pronation factor (${factors.pronation})<br>
                × Footstrike factor (${factors.footstrike})<br>
                × Terrain factor (${factors.terrain})<br>
                × Shoe type factor (${factors.shoeType})<br>
                = Total expected lifespan: ${totalExpected} ${unitKey}<br>
                Distance already run: ${Math.round(distanceRun)} ${unitKey}<br>
                Remaining: ${remaining} ${unitKey}
              </p>
            </details>
          `;

          saveState();
        });

        root.querySelector('.js-reset')?.addEventListener('click', () => {
          localStorage.removeItem(storageKey);
          form.reset();
          populateBrands();
          setUnitPlaceholder();
          resultDiv.classList.add('hidden');
          resultDiv.innerHTML = '';
        });
      })();
    </script>
    <?php

    return ob_get_clean();
}

add_shortcode('calculator', 'running_shoes_calculator_shortcode');
