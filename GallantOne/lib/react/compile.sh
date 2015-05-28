#!/bin/bash

# Page compiling 

jsx jsx/Layout/GallantHeader.jsx > ./js/GallantHeader.js;
jsx jsx/Layout/GallantFooter.jsx > ./js/GallantFooter.js;
 
jsx jsx/GallantPortfolio/GallantContent.jsx > ./js/GallantContent.js;
jsx jsx/GallantPortfolio/GallantRoute.jsx > ./js/GallantRoute.js;
jsx jsx/GallantPortfolio/GallantApp.jsx > ./js/GallantApp.js;
jsx jsx/GallantPortfolio/GallantHome.jsx > ./js/GallantHome.js;
jsx jsx/GallantPortfolio/GallantFrontpage.jsx > ./js/GallantFrontpage.js;

# Atari Compiling 
jsx jsx/Atari/GLifeCycle.jsx > ./js/GLifeCycle.js;  
jsx jsx/Atari/Atari.jsx > ./js/Atari.js;  

# Webpack bundling 
webpack main.js bundle.js



