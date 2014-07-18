#!/bin/sh
echo "executing pre-commit"
grunt export
git add .
exit 0