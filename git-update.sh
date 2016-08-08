#!/bin/bash
git add .
#echo -n "New comment:"
#read $comment
git commit -m  "0.7 FIRST"
git remote add origin https://github.com/mirek001/smcfd.git
git push -u origin master
