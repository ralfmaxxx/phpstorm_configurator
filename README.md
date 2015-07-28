# PhpStorm Project Configurator

Now it is easy to prepare and share your phpstorm configuration for projects.

Just create simple *phpstorm*.yml which contains:
```
settings:
    inspection:
        phpmd: "phpmd.xml"
        phpcs: "ruleset.xml"
    indent:
        php: 4
        js: 4
        gharkin: 4
        yml: 4
```
Base on this file, just run
```
phpstorm-configurator configure:inspections
phpstorm-configurator configure:indents
```

### Important

It works properly only on Mac/Linux. If your settings are not imported, please restart IDE.

Inspection will be imported only if your files have **proper structure**.
