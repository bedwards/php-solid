#!/bin/sh

set -eux

vendor/bin/phpstan analyse
vendor/bin/phpunit
