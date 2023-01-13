#!/bin/bash
clear
# script pour tranfert db vers github
echo =======================================================
echo REPLICATION DE LA BASE DE DONNEE DANS MON GITHUB
echo
echo assurez-vous que github mon compte est ouvert via google
echo =======================================================
echo " Appuyer sur une touche pour continuer....."
read a		#pause
echo -----------     Nous sommes dans le repertoire    --------
cd c:/Users/user/OneDrive/Documents/projets/laravel
pwd
read a		#pause
echo ------------    Lancement de git add .    ------------------
read a          #pause
git add .
echo ------------    Lancement de git commit   -------------------
read a          #pause
git commit
echo ------------    Lancement de git push   ----------------------
read a          #pause
git push
echo ------------     FIN DU SCRIPT          -----------------------
read a          #pause
