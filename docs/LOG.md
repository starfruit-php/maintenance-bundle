Log
<!-- [TOC] -->

# Config log filename with date

- Reference [Logging Symfony](https://symfony.com/doc/current/logging.html#how-to-rotate-your-log-files)
- Update `config/config.yaml` file to change format log filename :
`\var\log\dev\log-2024-10-03.log`
```bash
monolog:
    handlers:
        main:
            type: rotating_file
            path: "%kernel.logs_dir%/%kernel.environment%/log.log"
            max_files: 30 # max days
```
