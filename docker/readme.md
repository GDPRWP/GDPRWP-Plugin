# Docker Development Environment

NOTE: This is not a production-ready container. Please don't use it in production.

These files, along with `/Dockerfile` and `/docker-compose.yml` can be used to build a standalone container with 
everything you need to run and test this plugin. The single container contains nginx, php-fpm, 
mysql and a few nice-to-have tools for testing and development.

## Building the Docker Image

`docker-compose build`

### Running Docker Image

In your host file, add the following:

`127.0.0.1   gdpr-test-site.test`

Then start the container with:

`docker-compose up`

The test site can now be accessed at `http://gdpr-test-site.test`, and mailcatcher can be accessed at `http://gdpr-test-site.test:1080/`

## Logging into the Running Container

To log into the container:

`docker-compose exec gdpr bash`
