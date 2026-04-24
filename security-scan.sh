#!/bin/bash

set -euo pipefail

echo "▶️ Running dependency scan..."

if [[ "$OSTYPE" == "darwin"* ]]; then
    TIMEOUT_FLAG="-t 2"
else
    TIMEOUT_FLAG="-W 2"
fi

if ping -c 1 $TIMEOUT_FLAG 8.8.8.8 > /dev/null 2>&1; then
docker run -t --rm \
  --pull=always \
  -v "$HOME/.cache:/root/.cache/" \
  -v "${PWD}:/app" \
  -w /app \
  aquasec/trivy:0.69.3 filesystem /app/composer.lock \
  --quiet \
  --scanners vuln \
  --severity HIGH,CRITICAL \
  --exit-code 1

echo "✅ Dependency scan passed."

echo "▶️ Running code scan..."
docker run -t --rm \
  --pull=always \
  -v "${PWD}:/src" \
  -w /src \
  semgrep/semgrep \
  semgrep --config auto . --error --severity=ERROR
echo "✅Code scan passed."

echo "🎉 All checks completed successfully."
else
echo "Seems there is no outside world connection. OK, skipping"
fi
