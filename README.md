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
    Starfruit\MaintenanceBundle\StarfruitBuilderBundle::class => ['all' => true],
];
```

3. Setup to run a cronjob with command line:
```bash
 ./bin/console stf:maintenance:cleanup
```

# Documents
[docs](docs)
