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
        gherkin: 4
        yml: 4
        json: 4
        css: 4
        scss: 4
        html: 4
        
```
Based on this file, just run from directory where *phpstorm.yml* is placed:
```
phpstorm-configurator configure:inspections
phpstorm-configurator configure:indents
```

### Important

It works properly only on Mac/Linux and tested with *PhpStorm 9*.

For now **.idea** directory has to exist.

If your settings are not imported, please **restart IDE**.

Inspections will be imported only if your files have **proper structure**.
