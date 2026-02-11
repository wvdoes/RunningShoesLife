<?php
/**
 * Local preview harness for running-shoes-calculator.php without a full WordPress install.
 *
 * Run:
 *   php -S 0.0.0.0:8080
 * Then open:
 *   http://127.0.0.1:8080/local-preview.php
 */

define('ABSPATH', __DIR__);

if (!function_exists('apply_filters')) {
    function apply_filters($hook_name, $value) {
        return $value;
    }
}

if (!function_exists('shortcode_atts')) {
    function shortcode_atts($pairs, $atts, $shortcode = '') {
        $atts = is_array($atts) ? $atts : [];
        return array_merge($pairs, array_intersect_key($atts, $pairs));
    }
}

if (!function_exists('esc_attr')) {
    function esc_attr($text) {
        return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('esc_url_raw')) {
    function esc_url_raw($url) {
        return filter_var((string) $url, FILTER_SANITIZE_URL) ?: '';
    }
}

if (!function_exists('sanitize_text_field')) {
    function sanitize_text_field($str) {
        return trim(strip_tags((string) $str));
    }
}

if (!function_exists('wp_json_encode')) {
    function wp_json_encode($value) {
        return json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('add_shortcode')) {
    function add_shortcode($tag, $callback) {
        // no-op in local preview
    }
}

require_once __DIR__ . '/running-shoes-calculator.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Running Shoes Lifespan Calculator – Local Preview</title>
  <style>
    body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; margin: 0; padding: 2rem; background: #f8fafc; color: #0f172a; }
    .wrap { max-width: 980px; margin: 0 auto; }
    .intro { margin-bottom: 1rem; }
    code { background: #e2e8f0; padding: .15rem .35rem; border-radius: 4px; }
  </style>
</head>
<body>
  <div class="wrap">
    <h1>Running Shoes Lifespan Calculator</h1>
    <p class="intro">This page is a local preview harness (no WordPress required). In WordPress, use <code>[calculator]</code>.</p>
    <?php echo running_shoes_calculator_shortcode(); ?>
  </div>
</body>
</html>
