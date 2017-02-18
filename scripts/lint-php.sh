#!/bin/bash

source $(dirname $0)/utils/colors.sh

#printf "\n ${COL_GREEN}[ • ]${COL_RESET} ${COL_CYAN} ==> Linting PHP Files ...  ${COL_RESET}\n"
./vendor/bin/phplint -c .phplint.yml || true
#printf "${COL_GREEN} [ ✓ ] Linting Completed Successfully ...  ${COL_RESET}\n\n"
#./node_modules/.bin/notify --title="PHP Linting" --message="PHP Linting Completed..." --sound
