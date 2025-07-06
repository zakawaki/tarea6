# tarea6

# 📺 Gestor de Personajes - Attack on Titan

Esta es una aplicación web desarrollada en PHP que permite gestionar una lista de personajes de una serie, película o anime. La interfaz y el diseño están inspirados en la estética de **[Nombre de la Serie Elegida]**.

---

## 🚀 Características Principales

- CRUD completo (Crear, Leer, Editar, Eliminar) de personajes
- Subida de fotos
- Descarga de perfil en PDF decorado
- Interfaz visual inspirada en la serie
- Asistente automático de configuración de base de datos
- Página "Acerca de" con presentación personal y video

---

## 🧰 Tecnologías Utilizadas

- 🐘 PHP
- 🐬 MariaDB / MySQL
- 🎨 Bootstrap / TailwindCSS
- 🧾 DomPDF

---

## 🗂 Estructura de Archivos
TAREA6/
├── css/ # Estilos CSS
│ └── imagenes/ # Imágenes de los personajes
├── vendor/ # Librerías instaladas vía Composer (como DomPDF)
├── acerca.php # Página "Acerca de"
├── agregar.php # Formulario para agregar personajes
├── composer.json # Configuración de Composer
├── composer.lock # Archivo de bloqueo de Composer
├── db_config.php # Configuración de conexión a la base de datos
├── dump.sql # Respaldo de la base de datos
├── editar.php # Editar un personaje
├── eliminar.php # Eliminar un personaje
├── index.php # Página principal (listado de personajes)
├── info.php # Información del servidor PHP
├── pdf.php # Generación de PDF del personaje
├── test_conn.php # Prueba de conexión a la base de datos
---

## ⚙️ Instalación y Configuración

### 1. Clonar o Descomprimir

Descomprime el archivo ZIP en el directorio de tu servidor local (por ejemplo, `htdocs` de XAMPP o `www` de Laragon).

### 2. Configurar la Base de Datos

Al abrir la aplicación por primera vez, si no detecta la base de datos, se ejecutará automáticamente el **asistente de configuración**.

Este asistente te pedirá:
- Servidor (por defecto: `localhost`)
- Usuario (por defecto: `root`)
- Contraseña
- Nombre de la base de datos (por defecto: `serie_db`)

Al confirmar, se creará la base de datos y la tabla `personajes` automáticamente, y se insertarán datos de ejemplo si el respaldo `dump.sql` está presente.

> Si deseas hacerlo manualmente, puedes importar el archivo `dump.sql` desde phpMyAdmin o usando este comando en terminal:

```bash
mysql -u root -p serie_db < dump.sql


