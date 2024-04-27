FROM ubuntu:latest

ENV TZ=Europe/London
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY . /var/www/html

RUN a2enmod rewrite && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf  # Добавляем директиву ServerName

EXPOSE  80

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

