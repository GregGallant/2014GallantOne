#!/bin/bash

# GallantOne React Strategic Compiling

###################################################
# LAYOUTS
###################################################
for fullfilename in ./Layout/*.jsx
do
    filename='basename ${fullfilename} .jsx'
    jsx "${fullfilename}" > ../../assets/js/"${filename}".js;
done

###################################################
# GALLANTPORTFOLIO
###################################################
for fullfilename in ./GallantPortfolio/*.jsx
do
    filename='basename ${fullfilename} .jsx'
    jsx "${fullfilename}" > ../../assets/js/"${filename}".js;
done

###################################################
# ATARI TESTING
###################################################
for fullfilename in ./Atari/*.jsx
do
    filename='basename ${fullfilename} .jsx'
    jsx "${fullfilename}" > ../../assets/js/"${filename}".js;
done

###################################################
# Webpack bundling
#  --> bundle one universal js to include in <head>
###################################################

webpack main.js ../../assets/js/bundle.js

###################################################


