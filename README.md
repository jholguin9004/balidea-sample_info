# Descripción
Módulo desarrollado como parte del proceso de selección con Balidea

# Proceso de instalación del módulo

## 1. Descarga del módulo

### 1.1 Descarga vía composer (recomendado)

Primero es necesario agregar el respositirio al composer.json del sitio Drupal en el que se quiere instalar el módulo:

Bien sea editando el archivo:
```json
  ...
  "repositories": {
      {
          "type": "composer",
          "url": "https://packages.drupal.org/8"
      },
      {
          "type": "git",
          "url": "https://github.com/jholguin9004/balidea-sample_info.git"
      }
  },
  ...
```

o vía composer:
```
composer config repositories.sample_info git https://github.com/jholguin9004/balidea-sample_info.git
```

Un vez agregado el respositorio, instalar el módulo:
```
composer require balidea/sample_info
```

 
### 1.1 Descarga manual
Descargar el módulo en el siguiente [enlace](https://github.com/jholguin9004/balidea-sample_info/archive/refs/tags/1.1.zip)

Una vez descargado, descomprimir en la carpeta modules/custom

## 2 Instalación
Instalar el módulo de la forma habitual, ya sea desde la interfaz gráfica de drupal enel menú "Ampliar", donde lo encontrará con el nombre "Balidea - Sample info", o vía drush con el nombre "sample_info"

