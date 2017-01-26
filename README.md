# PhpStorm Project Configurator
[![Latest Stable Version](https://poser.pugx.org/ralfmaxxx/phpstorm_configurator/v/stable)](https://packagist.org/packages/ralfmaxxx/phpstorm_configurator) 
[![Total Downloads](https://poser.pugx.org/ralfmaxxx/phpstorm_configurator/downloads)](https://packagist.org/packages/ralfmaxxx/phpstorm_configurator) 
[![Latest Unstable Version](https://poser.pugx.org/ralfmaxxx/phpstorm_configurator/v/unstable)](https://packagist.org/packages/ralfmaxxx/phpstorm_configurator) 
[![License](https://poser.pugx.org/ralfmaxxx/phpstorm_configurator/license)](https://packagist.org/packages/ralfmaxxx/phpstorm_configurator)

### Requirements

*  `PHP>=5.6`

### Usage

Now it is easy to prepare and share your phpstorm configuration for projects.

Just create simple *phpstorm.yml* which contains:
```
settings:
    inspection: ~
    indent: ~
```

Settings have default values as is shown below:
```
settings:
    inspection:
        phpmd: "phpmd.xml"
        phpcs: "ruleset.xml"
    indent:
        php: 4
        js: 4
        gherkin: 4
        yml: 4
        json: 4
        css: 4
        scss: 4
        html: 4
        xml: 4
```

You can easily overwrite them in your *phpstorm.yml* file.

Based on this file, just run from directory where *phpstorm.yml* is placed:
```
phpstorm-configurator configure:inspections
phpstorm-configurator configure:indents
```

### Important

It works properly only on Mac/Linux and tested with *PhpStorm 9* and *PhpStorm 2016.(1,2,3)*.

For now **.idea** directory has to exist.

If your settings are not imported, please **restart IDE**.

Inspections will be imported only if your files have **proper structure**.

For now phpcs file has to be named "ruleset.xml". Otherwise it won't be used by PhpStorm.
