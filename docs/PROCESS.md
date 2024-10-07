Setup and start maintenance process
<!-- [TOC] -->

# Setup with Supervisord

## Create `supervisord.conf` file with example content:
*(Please replace `path-to-project-root` and `path-to-file`)*

```bash
[program:messenger-consume]
command=sudo php /path-to-project-root/bin/console messenger:consume pimcore_core pimcore_maintenance pimcore_scheduled_tasks pimcore_image_optimize pimcore_asset_update --time-limit=3600
numprocs=1
startsecs=0
autostart=true
autorestart=true
process_name=%(program_name)s_%(process_num)02d
stdout_logfile=/var/log/pimcore.log
stdout_logfile_maxbytes=0
redirect_stderr=true
user=root

[program:maintenance]
command=sudo bash -c 'sleep 3600 && exec php /path-to-project-root/bin/console pimcore:maintenance'
autostart=true
autorestart=true
stdout_logfile=/var/log/pimcore.log
stdout_logfile_maxbytes=0
redirect_stderr=true
user=root

[program:stf-maintenance]
command=sudo bash -c 'sleep 86400 && exec php /path-to-project-root/bin/console stf:maintenance:cleanup'
autostart=true
autorestart=true
stdout_logfile=/var/log/pimcore.log
stdout_logfile_maxbytes=0
redirect_stderr=true
user=root
```

## Install
Reference

- [Supervisord](http://supervisord.org/installing.html)
- [Symfony messenger docs](https://symfony.com/doc/current/messenger.html#supervisor-configuration)

## Update config path:

Update `/etc/supervisor/supervisord.conf`:

```bash
[include]
...
files = /path-to-file/supervisord.conf
```

## Start

Run command lines with root permission:

```bash
sudo supervisorctl reread
sudo supervisorctl update

sudo supervisorctl start messenger-consume:*
sudo supervisorctl start maintenance:*
sudo supervisorctl start stf-maintenance:*

# If you deploy an update of your code, don't forget to restart your workers to run the new code
sudo supervisorctl restart messenger-consume:*
sudo supervisorctl restart maintenance:*
sudo supervisorctl restart stf-maintenance:*
```
