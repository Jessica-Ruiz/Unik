# UNIK

Plataforma web para explorar y comprar productos personalizables. Proyecto académico en desarrollo.

## Tecnologías

- PHP 8.3
- MySQL 8.0
- HTML5, CSS3 y JavaScript
- Apache (XAMPP recomendado)
- Git y GitHub

## Requisitos

- PHP 8.3 o compatible, con extensiones PDO y pdo_mysql habilitadas.
- MySQL 8.0 o compatible.
- Apache.
- Navegador moderno.

## Instalación local con XAMPP

1. Instala e inicia Apache y MySQL desde el panel de XAMPP.
2. Copia la carpeta `UNIK` en `C:\\xampp\\htdocs\\`.
3. Abre `http://localhost/phpmyadmin`.
4. Importa el archivo `database/schema.sql`. Este crea la base de datos `unik` y agrega productos de demostración.
5. Revisa `config/database.php`. Por defecto usa `127.0.0.1`, base `unik`, usuario `root` y contraseña vacía, configuración habitual de XAMPP local.
6. Abre `http://localhost/UNIK/`.

## Funcionalidades iniciales

- Registro e inicio de sesión con contraseñas cifradas mediante `password_hash`.
- Catálogo y búsqueda por categoría o texto.
- Vista de producto y agregado al carrito.
- Creación de pedidos asociados al usuario.
- Consulta de pedidos registrados.

## Importante

Esta es una primera base funcional. La personalización gráfica con editor de diseños, carga segura de imágenes, favoritos persistentes, paneles completos de proveedor y administrador, notificaciones, descuentos, logística e integración real de pasarelas de pago requieren implementaciones posteriores. Los métodos de pago del formulario son demostrativos y no procesan transacciones.

## Publicar en GitHub

Desde una terminal abierta en la carpeta del proyecto:

```bash
git init
git add .
git commit -m "Estructura inicial funcional de UNIK"
git branch -M main
git remote add origin https://github.com/TU-USUARIO/unik.git
git push -u origin main
```

No subas contraseñas reales, archivos `.env`, copias de bases de datos con datos personales ni credenciales.
