Starfruit Maintenance Bundle
<!-- [TOC] -->

# Installation

1. On your Pimcore 11 root project:
```bash
composer require starfruit/maintenance-bundle
```

2. Update `config/bundles.php` file:
```bash
return [
    ....
    Starfruit\MaintenanceBundle\StarfruitMaintenanceBundle::class => ['all' => true],
];
```

3. Setup to run a cronjob with command line:
```bash
 ./bin/console stf:maintenance:cleanup
```

# Supervisord

1. Reference
[Install](http://supervisord.org/installing.html)
[Symfony docs](https://symfony.com/doc/current/messenger.html#supervisor-configuration)

2. Running
```bash
sudo supervisorctl reread
sudo supervisorctl update

sudo supervisorctl start messenger-consume:*
sudo supervisorctl start maintenance:*

# If you deploy an update of your code, don't forget to restart your workers to run the new code
sudo supervisorctl restart messenger-consume:*
sudo supervisorctl restart maintenance:*
```

# Documents
[docs](docs)
