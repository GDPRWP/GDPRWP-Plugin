# GDPRWP-Plugin

## To Test the plugin

To test on your site, call [http://yoursite.com/wp-admin/?debug-gdpr](http://yoursite.com/wp-admin/?debug-gdpr) to see if your assigned data to the GDPR object.
Follow the example found here [https://github.com/GDPRWP/GDPRWP-Plugin-Sample](https://github.com/GDPRWP/GDPRWP-Plugin-Sample)

## Description

GDPR for WP is a proposed solution to GDPR compliance from a technical standpoint.

The core of the project is to supply the WordPress Community with a common way to identify and define Personal Identifiable Information. This means, data that alone or in combination with other data can identify a single human being.

![GDPR WP explained](https://raw.githubusercontent.com/GDPRWP/GDPRWP-Plugin/master/gdpr%20for%20wordpress.jpg)

Our approach is a standardized implementation of functions needed to provide Website administrators with the tools to handel (but not limited to) Right to be forgotten, Data portability, Breach notifications, withdrawal of content, and Plain text policy.

## 2 parts being developed

This project aims to provide a sample plugin, showing you how to identify Personal data in your plugin. The [sample code is available on GitHub](https://github.com/GDPRWP/GDPRWP-Plugin-Sample):

The CORE of the project **THIS repository** (and former Interface), will be available in a [GDPR for WP plugin on GitHub](https://github.com/GDPRWP/GDPRWP-Plugin):

The GDPR for WP plugin will provide the needed functions using WordPress's action/filter hooks. By doing this, the plugin will be able to collect data across all installed plugins in a WordPress installation.

## Moving away from the PHP Interface

Things move fast with a looming deadline approaching, and while this project started as a PHP interface, many of our initial talks with WordPress developers from companies like Mailpoet, Woo has lead us to believe, that while a PHP interface will, in fact, be an OK approach from a common PHP standpoint, it doesn't make much sense in a WordPress setup, where our hook and filter approach makes sense.

**[Discover more about the project.](https://www.gdprwp.com/)**

Here's why we seek to provide a unified approach to GDPR compliancy

1. A single point of entry for Website administrators instead of one options page for each plugin handling personal data.
2. A standardized approach to identifying which fields stores personal data, and allow for more information to be given on these fields, such as expiry data, the reason for collecting it, last updated timestamp and sensitive boolean.

## FAQ

Q: Can I send feedback or get help with a bug?

A: You can, by commenting on the relevant [repository on github](https://github.com/GDPRWP).

### How you can contribute

As a developer, you can use the [GDPRWP Plugin Sample](https://github.com/GDPRWP/GDPRWP-Plugin-Sample) to implement the solution into your own plugin and provide us with code examples in the Issues part of this repository.

General discussions happen in the issues sections and on wordpress.slack.com #gdpr-compliance

### Contributors & Developers

 Peytz & Co - Kåre M Steffensen, Jesper V Nielsen & Stephan V Schønbeck
