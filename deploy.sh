#!/bin/bash
cd ~/apps/cinema
git fetch --tags --progress git@github.com:aelian-repo/cinema.git +refs/heads/*:refs/remotes/origin/*
git checkout tags/$1
rsync -ravzup ~/apps/cinema/webroot/* ~/public_html/cinema/ 

cd ~/apps/cinema/Plugin/Pdf
git fetch --tags --progress git@github.com:aelian-repo/Pdf.git +refs/heads/*:refs/remotes/origin/*
git pull origin master

cd ~/apps/cinema/Plugin/Pdf/Vendor/make-pdf
git fetch --tags --progress git@github.com:aelian-repo/make-pdf.git +refs/heads/*:refs/remotes/origin/*
git pull origin master

rm -rf ~/apps/cinema/tmp/cache/models/*
rm -rf ~/apps/cinema/tmp/cache/persistent/*
rm -rf ~/apps/cinema/tmp/cache/views/*
rm -rf ~/apps/cinema/tmp/sessions/*
rm -rf ~/apps/cinema/tmp/tests/*
mv ~/apps/cinema/tmp/logs/* ~/suporte/cinema/
cd ~/apps/cinema
git describe --tags > ~/apps/cinema/tmp/version.txt
