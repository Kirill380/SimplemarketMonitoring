# Steps to launch 
* cd laradock
* (for mac) ./sync.sh mongo elasticsearch nginx php-fpm
* cd ..
* ./run.sh 
* go to grafana localhost:3002
* create datasource influxdb:8086 with database telegraf
* import new dashboard using grafana_dashboard.json

