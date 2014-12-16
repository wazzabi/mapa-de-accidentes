mapa-de-accidentes
==================
[![Gitter](https://badges.gitter.im/Join Chat.svg)](https://gitter.im/wazzabi/mapa-de-accidentes?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Un mapa de los accidentes de tránsito ocurridos en Bariloche

#### Requerimientos:

- PHP 5.3.3+
- Alguna base de datos (testeado en mysql)

#### Instalación

1 - Clonar el repositorio:

```bash
$ git clone https://github.com/wazzabi/mapa-de-accidentes.git
$ cd mapa-de-accidentes
```

2 - Descargar Composer - Instalar dependencias del proyecto:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
```

3 - Creación de la base de datos, schema e inicialización de datos:

```bash
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:create
$ php app/console doctrine:migrations:migrate
```

4 - Ejecución del servidor web

```bash
$ php app/console server:start
```

Listo! El sitio podrá verse en http://127.0.0.1:8000
