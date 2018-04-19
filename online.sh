# update prod-env code
cd /data/maomeng/home/
git pull

# deploy FE
(cd ./layout/ && yarn run deploy)