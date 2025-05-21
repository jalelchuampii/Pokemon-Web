# 🐱‍🏍 Miniweb Pokémon

Esta miniweb muestra una lista de Pokémon con su tipo, generación y una breve descripción, extraída desde una base de datos MySQL. Está desarrollada con **PHP**, usando **Bootstrap 5** para diseño responsive y **jQuery** para interacción dinámica.

## 📦 Tecnologías utilizadas

- PHP
- MySQL
- Bootstrap 5
- jQuery
- Apache (XAMPP)

---

## 📖 Cómo usar esta miniweb

### 📌 1️⃣ Importar la base de datos

- Abre **phpMyAdmin**
- Crea una nueva base de datos llamada `miniweb_pokemon` o `pokemon_web` (según configures en `db.php`)
- Importa el archivo `pokemon.sql` incluido en el proyecto

### 📌 2️⃣ Configurar la conexión a la base de datos

Edita el archivo `db.php` y coloca tus datos de acceso:

```php
<?php
$host = "localhost";
$user = "root"; // tu usuario de MySQL
$pass = "";     // tu contraseña de MySQL (vacía por defecto en XAMPP)
$dbname = "pokemon_web";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
