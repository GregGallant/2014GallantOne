#!/bin/bash

# Page compiling 

jsx ./Layout/GallantHeader.jsx > ../../assets/js/GallantHeader.js;
jsx ./Layout/GallantFooter.jsx > ../../assets/js/GallantFooter.js;
 
jsx ./GallantPortfolio/GallantContent.jsx > ../../assets/js/GallantContent.js;
jsx ./GallantPortfolio/GallantRoute.jsx > ../../assets/js/GallantRoute.js;
jsx ./GallantPortfolio/GallantApp.jsx > ../../assets/js/GallantApp.js;
jsx ./GallantPortfolio/GallantHome.jsx > ../../assets/js/GallantHome.js;
jsx ./GallantPortfolio/GallantFrontpage.jsx > ../../assets/js/GallantFrontpage.js;

# Atari Compiling 
jsx ./Atari/GLifeCycle.jsx > ../../assets/js/GLifeCycle.js;  
jsx ./Atari/Atari.jsx > ../../assets/js/Atari.js;  

# Webpack bundling 
webpack main.js ../../assets/js/bundle.js



