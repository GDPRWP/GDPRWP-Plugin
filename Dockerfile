FROM debian:jessie
COPY docker /docker
RUN sh docker/setup.sh
EXPOSE 80 1080
CMD ["/usr/bin/supervisord", "-n"]
