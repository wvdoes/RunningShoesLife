#!/usr/bin/env bash
set -euo pipefail

PORT="${1:-8080}"

echo "Starting local preview at http://127.0.0.1:${PORT}/local-preview.php"
php -S 0.0.0.0:"${PORT}" -t .
