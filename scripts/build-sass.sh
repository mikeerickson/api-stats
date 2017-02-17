#!/bin/bash

source $(dirname $0)/utils/colors.sh

printf "\n ${COL_GREEN}[ • ]${COL_RESET} ${COL_CYAN} ==> Building Sass Files ...  ${COL_RESET}\n"
./node_modules/.bin/node-sass ./src/sass/app.scss > ./public/css/app.css
printf "${COL_GREEN} [ ✓ ] Sass Files Built Successfully ...  ${COL_RESET}\n\n"
