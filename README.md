cli
===

Command line tools untuk mempermudah bekerja dengan framework mim. Module ini
menyediakan tools yang berhubungan dengan aplikasi.

## Instalasi

```
wget http://getmim.github.io/tools/installer.php
php installer.php
```

Fungsi di atas akan mendownload installer tools ini dan memasangnya pada pc. Module
yang dipasang dengan menjalankan perintah di atas adalah module `core`, `cli`, dan
`cli-app`.

## Perintah

Di bawah ini adalah perintah-perintah yang didukung oleh module ini secara default.
Untuk mendukung perintah-perintah lainnya, silahkan memasang module yang bersangkutan.

```
mim help
mim version

# Jika module cli-app terinstall

mim app init
mim app config
mim app install [module[ module[ ...]]]
mim app module
mim app remove [module[ module[ ...]]]
mim app server
mim app update [module[ module[ ...]]]

# Jika module cli-module terinstall

mim module init
mim module controller [name]
mim module helper [name]
mim module library [name]
mim module model [table] [q_field]
mim module service [name]
mim module watch [target]
mim module sync [target]

# Jika module cli-compress terinstall

mim compress [all|webp|gz|br] [file[ file[ ...]]]
```