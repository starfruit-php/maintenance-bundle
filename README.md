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

# Supervisord
[docs](docs/PROCESS.md)

# Documents
[docs](docs)
