#!/bin/sh
echo "executing pre-commit"
grunt export
git add . -A
exit 0