#!/bin/bash

# GallantOne React Strategic Compiling

#files=( /very/long/path/to/various/files/*.file )
layoutDir="./Layout/"
gallantDir="./GallantPortfolio/"
atariDir="./Atari/"

buildDir="../../assets/js/"

###################################################
# LAYOUTS
###################################################
files=(./Layout/*.jsx)
for file in "${files[@]}"
do
    fullfilename="${file##*/}"
    filename="${fullfilename%.*}"
    #echo "${layoutDir}${fullfilename}"
    jsx "${layoutDir}${fullfilename}" > "${buildDir}${filename}".js;
done

###################################################
# ATARI TESTING
###################################################
files=(./Atari/*.jsx)
for file in "${files[@]}"
do
    fullfilename="${file##*/}"
    filename="${fullfilename%.*}"
    #echo "${atariDir}${fullfilename}"
    jsx "${atariDir}${fullfilename}" > "${buildDir}${filename}".js;
done

###################################################
# GALLANTPORTFOLIO
###################################################
files=(./GallantPortfolio/*.jsx)
for file in "${files[@]}"
do
    fullfilename="${file##*/}"
    filename="${fullfilename%.*}"
    #echo "${gallantDir}${fullfilename}"
    jsx "${gallantDir}${fullfilename}" > "${buildDir}${filename}".js;
done


###################################################
# Webpack bundling
#  --> bundle one universal js to include in <head>
###################################################

webpack main.js ../../assets/js/bundle.js
