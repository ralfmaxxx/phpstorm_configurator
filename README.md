# PhpStorm Project Configurator

Now it is easy to prepare and share your phpstorm configuration for projects.

Just create simple phpstorm.yml which contains:
```
settings:
    inspection:
        phpmd: "phpmd.xml"
        phpcs: "ruleset.xml"
```
Base on this file, just run
```
phpstorm-configurator configure
```

### Important

It works properly only on Mac/Linux.
