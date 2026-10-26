# Proyecto WordPress + Bootstrap (Docker)

Entorno de desarrollo local de WordPress con dos temas propios, levantado con Docker Compose.

| Tema | Carpeta | Descripción |
|---|---|---|
| **BarRacuda** | `BarRacuda/` | Tema principal: web del *Bar Racuda Bistro Bar* (plantilla Bootstrap 4 adaptada a WordPress). |
| **mi-tema-bootstrap** | `mi-tema-bootstrap/` | Tema secundario de pruebas (Bootstrap). |

## Requisitos

- [Docker](https://docs.docker.com/engine/install/) con el plugin **Docker Compose** v2 (`docker compose`).
- Puerto **8080** libre en tu máquina.
- Git.

Comprueba que todo está instalado:

```bash
docker --version
docker compose version
git --version
```

## Estructura del proyecto

```
proyecto-wp-bootstrap/
├── docker-compose.yml      # Servicios: MariaDB + WordPress
├── .env.example            # Plantilla de variables de entorno (sin valores)
├── .env                    # Tus variables reales (NO se versiona)
├── .gitignore
├── BarRacuda/              # Tema principal
│   ├── style.css           # Cabecera del tema (Theme Name)
│   ├── functions.php       # Encolado de assets y funciones auxiliares
│   ├── header.php / footer.php / nav.php
│   ├── front-page.php      # Portada
│   ├── index.php           # Plantilla de respaldo
│   ├── contact.php         # Plantilla "CONTACT"
│   ├── archives.php        # Plantilla "ARCHIVES"
│   ├── recipes.php         # Plantilla "RECIPES"
│   └── assets/             # CSS, JS, fuentes e imágenes
└── mi-tema-bootstrap/      # Tema secundario
```

## Instalación

### 1. Clonar el repositorio

```bash
git clone <URL-DEL-REPOSITORIO> proyecto-wp-bootstrap
cd proyecto-wp-bootstrap
```

### 2. Configurar las variables de entorno

Las credenciales de la base de datos **no están en el repositorio**: se leen de un archivo `.env` que debes crear a partir de la plantilla.

```bash
cp .env.example .env
```

Abre `.env` y rellena cada variable:

| Variable | Descripción |
|---|---|
| `DB_NAME` | Nombre de la base de datos de WordPress. |
| `DB_USER` | Usuario de la base de datos. |
| `DB_PASSWORD` | Contraseña de ese usuario. |
| `DB_ROOT_PASSWORD` | Contraseña del usuario root de MariaDB. |

> ⚠️ `.env` está en el `.gitignore`: no lo subas nunca al repositorio. Usa contraseñas distintas de las de tus otros servicios.

### 3. Levantar los contenedores

```bash
docker compose up -d
```

La primera vez descarga las imágenes (`mariadb:10.11` y `wordpress:6-php8.3-apache`) y crea el volumen `db_data`, donde persiste la base de datos.

Comprueba que ambos servicios están en marcha:

```bash
docker compose ps
```

Deberías ver `wp_bootstrap_db` y `wp_bootstrap_app` en estado *running*.

Si las variables no se sustituyen bien, comprueba el resultado con `docker compose config`.

### 4. Instalar WordPress

1. Abre <http://localhost:8080> en el navegador.
2. Elige el idioma y completa el asistente: título del sitio, usuario administrador, contraseña y correo.
3. Inicia sesión en <http://localhost:8080/wp-admin>.

### 5. Activar el tema

1. Ve a **Apariencia → Temas**.
2. Activa **BarRacuda**.

Los temas se montan por volumen, así que cualquier cambio que hagas en `BarRacuda/` se refleja al recargar la página, sin reiniciar nada.

### 6. Crear las páginas del menú

El menú de navegación (`nav.php`) enlaza las páginas buscándolas por **título exacto**. Créalas en **Páginas → Añadir nueva** y publícalas:

| Título (en mayúsculas) | Plantilla (Atributos de página) |
|---|---|
| `RECIPES` | RECIPES |
| `ARCHIVES` | ARCHIVES |
| `CONTACT` | CONTACT |
| `NEWS` | Predeterminada (el tema no incluye plantilla propia para esta página) |

Si el título no coincide exactamente o la página no está publicada, el enlace del menú no apuntará a ella.

### 7. Publicar entradas para la sección News

La portada (`front-page.php`) muestra las últimas entradas del blog en la sección *News*. Crea y publica algunas en **Entradas → Añadir nueva**. Si no hay ninguna, esa sección aparecerá vacía.

La portada se carga automáticamente porque WordPress da prioridad a `front-page.php`. No hace falta configurar nada en **Ajustes → Lectura**.

## Comandos útiles

```bash
# Ver los logs de WordPress/Apache (errores de PHP incluidos)
docker logs -f wp_bootstrap_app

# Filtrar solo errores de PHP
docker logs wp_bootstrap_app 2>&1 | grep -i -E "fatal|parse error|warning" | tail -20

# Comprobar la sintaxis de todos los archivos PHP del tema
docker exec wp_bootstrap_app sh -c 'for f in /var/www/html/wp-content/themes/BarRacuda/*.php; do php -l "$f"; done'

# Parar los contenedores (conserva la base de datos)
docker compose stop

# Volver a arrancarlos
docker compose start

# Apagar y eliminar contenedores (conserva la base de datos)
docker compose down

# Reinicio completo: elimina también la base de datos
docker compose down -v
```

> `docker compose down -v` **borra el volumen** `db_data`: se pierden entradas, páginas y ajustes. Tendrás que repetir la instalación desde el paso 4.

> Si cambias `DB_USER` o `DB_PASSWORD` en el `.env` con la base de datos ya creada, WordPress dejará de conectarse: MariaDB solo aplica esos valores al crear el volumen. Para empezar de cero usa `docker compose down -v`.

## Depuración de PHP (solo desarrollo)

Para ver el motivo real de un error en lugar del mensaje genérico, descomenta en `docker-compose.yml`, dentro del servicio `wordpress`, las líneas de `WORDPRESS_DEBUG` y `WORDPRESS_CONFIG_EXTRA`, y aplica el cambio:

```bash
docker compose up -d
```

Los errores se guardan en el log de WordPress sin mostrarse en pantalla. Vuelve a comentarlas antes de publicar el sitio.

## Solución de problemas

| Síntoma | Causa probable | Qué hacer |
|---|---|---|
| *"There has been a critical error on this website"* | Error de PHP en el tema | Revisa `docker logs wp_bootstrap_app` y busca `PHP Parse error` o `PHP Fatal error`: indica archivo y línea. |
| Pantalla en blanco | Error fatal en tiempo de ejecución (variable sin definir, función inexistente) | Mismo comando de logs; el error aparece como `PHP Fatal error`. |
| `PHP Parse error` en un archivo | Falta un `;`, un comentario sin cerrar (`*/`) o un `endif;`/`endwhile;` mal escrito | Corrige la línea indicada. Para revisar todo el tema de golpe, usa el comando `php -l` de arriba. |
| Variables vacías o error de conexión a la base de datos | Falta el `.env` o está en otra carpeta | Comprueba que `.env` está junto al `docker-compose.yml` y ejecuta `docker compose config`. |
| Enlaces del menú que van a la portada | La página no existe, no está publicada o el título no coincide | Revisa el paso 6. |
| Sección *News* vacía | No hay entradas publicadas | Publica al menos una entrada. |
| `404` en `themify.woff` / `themify.ttf` | Faltan esos archivos de fuentes en `assets/fonts/` | No impide que la web cargue; solo afecta a esos iconos. |
| `404` en `/s3.amazonaws.com/uifaces/...` | URLs de avatares sin `https://` (se interpretan como rutas relativas) | Añade `https://` delante de la URL. |
| Error de permisos al montar los volúmenes (SELinux) | Distribuciones con SELinux, como Fedora | El `docker-compose.yml` ya incluye la bandera `:z` en los volúmenes de los temas. |
| El puerto 8080 está ocupado | Otro servicio usa ese puerto | Cambia `"8080:80"` por otro puerto en `docker-compose.yml`, por ejemplo `"8081:80"`. |

## Flujo de trabajo con Git

- `.env` está en el `.gitignore`; solo se versiona `.env.example`.
- Antes de cada commit, comprueba con `git status` que no aparecen `.env`, archivos `.zip` ni volcados `.sql`.
- Mensajes de commit en formato `tipo(ámbito): descripción`, por ejemplo `feat(barracuda): añadir plantilla de página NEWS`.