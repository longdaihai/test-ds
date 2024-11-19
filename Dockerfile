FROM php:8.3-cli-alpine

RUN apk add make \
  # 安装timezone
  && apk add -U tzdata \
  && ls /usr/share/zoneinfo
# 拷贝需要的时区文件到localtime
RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
  && echo "date.timezone = Asia/Shanghai" >> /usr/local/etc/php/php.ini

WORKDIR /srv

