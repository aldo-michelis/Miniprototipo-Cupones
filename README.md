## Cupones Electronicos (Prototipo)

### Requerimientos

* php >=7.0.0
* [Composser](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* MySQL 5.7

### Implementacion

* Actualizar las dependencias del repositorio con composer
 ```bash
 composer install
 ```
 * Crear la base de datos
 ```bash
  mysql -u <Nombre de Usuario> -p -e "CREATE DATABASE <nombre de la base de datos>"
  ```
 * Configurar el archivo .env
    * Copiar .env.example a .env
    ```bash
     cp .env.example .env  
     ``` 
     * Agregar los parametros de conexion a la base de datos.
      ```bash
          DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=homestead
          DB_USERNAME=homestead
          DB_PASSWORD=secret 
      ``` 
 * Ejecutar las migraciones
 ```bash
      php artisan migrate  
 ``` 