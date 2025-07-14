# proyecto-clt

```
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
php artisan migrate
```

```
php artisan migrate:fresh --seed
```

Figura X. Diagrama de secuencia – Iniciar sesión

```mermaid
sequenceDiagram
    autonumber
    actor A1 as Administrador
    participant UI_Login as UI Login
    participant Iniciar_Sesion as Iniciar sesión
    participant BD as Base de Datos

    A1 ->> UI_Login: Acceder al formulario de inicio de sesión
    UI_Login -->> A1: Mostrar formulario
    A1 ->> UI_Login: Ingresar credenciales y enviar
    UI_Login ->> Iniciar_Sesion: Enviar usuario y contraseña
    Iniciar_Sesion ->> BD: Verificar credenciales
    BD -->> Iniciar_Sesion: Respuesta (válida o inválida)
    Iniciar_Sesion -->> UI_Login: Resultado de autenticación
    UI_Login -->> A1: Mostrar panel principal o mensaje de error

```

Figura X+1. Diagrama de secuencia – Gestionar especialidades

```mermaid
sequenceDiagram
    autonumber
    actor A1 as Administrador
    participant UI_Especialidades as UI Especialidades
    participant Gestionar_Especialidades as Gestionar especialidades
    participant BD as Base de Datos

    A1 ->> UI_Especialidades: Acceder al módulo de especialidades
    UI_Especialidades -->> A1: Mostrar listado de especialidades
    A1 ->> UI_Especialidades: Registrar nueva especialidad o editar existente
    UI_Especialidades ->> Gestionar_Especialidades: Enviar datos del formulario
    Gestionar_Especialidades ->> BD: Guardar o actualizar registro
    BD -->> Gestionar_Especialidades: Confirmación de operación
    Gestionar_Especialidades -->> UI_Especialidades: Retornar respuesta
    UI_Especialidades -->> A1: Actualizar listado en la interfaz

```

Figura X+2. Diagrama de secuencia – Gestionar personas

```mermaid
sequenceDiagram
    autonumber
    actor A1 as Administrador
    participant UI_Personas as UI Personas
    participant Gestionar_Personas as Gestionar personas
    participant BD as Base de Datos

    A1 ->> UI_Personas: Acceder al módulo de personas
    UI_Personas -->> A1: Mostrar listado de personas
    A1 ->> UI_Personas: Registrar nueva persona o editar existente
    UI_Personas ->> Gestionar_Personas: Enviar datos del formulario
    Gestionar_Personas ->> BD: Guardar o actualizar registro
    BD -->> Gestionar_Personas: Confirmación de operación
    Gestionar_Personas -->> UI_Personas: Retornar respuesta
    UI_Personas -->> A1: Actualizar listado en la interfaz

```

Figura X+3. Diagrama de secuencia – Gestionar médicos

```mermaid
sequenceDiagram
    autonumber
    actor A1 as Administrador
    participant UI_Medicos as UI Médicos
    participant Gestionar_Medicos as Gestionar médicos
    participant BD as Base de Datos

    A1 ->> UI_Medicos: Acceder al módulo de médicos
    UI_Medicos -->> A1: Mostrar listado de médicos
    A1 ->> UI_Medicos: Registrar nuevo médico o editar existente
    UI_Medicos ->> Gestionar_Medicos: Enviar datos del formulario
    Gestionar_Medicos ->> BD: Guardar o actualizar registro
    BD -->> Gestionar_Medicos: Confirmación de operación
    Gestionar_Medicos -->> UI_Medicos: Retornar respuesta
    UI_Medicos -->> A1: Actualizar listado en la interfaz

```

a) Modelo Conceptual
Figura X. Modelo Entidad-Relación Conceptual

```mermaid

erDiagram
	direction LR
	PERSONA {

	}

	MEDICO {

	}

	ESPECIALIDAD {

	}

	PERSONA||--o|MEDICO:"tiene"
	MEDICO}o--||ESPECIALIDAD:"pertenece a"

```

Descripción: Este modelo muestra las entidades principales del sistema y sus relaciones fundamentales, sin detallar atributos ni claves. Se enfoca en representar las conexiones entre los elementos que componen la estructura general de la información.

b) Modelo Lógico
Figura X. Modelo Entidad-Relación Lógico

```mermaid

erDiagram
	direction LR
	PERSONA {
		int id PK ""
		string nombre  ""
		string apellido_paterno  ""
		string apellido_materno  ""
		string tipo_documento  ""
		string numero_documento  ""
		string telefono  ""
		string email  ""
		string direccion  ""
		string ubigeo  ""
	}

	MEDICO {
		int id PK ""
		int persona_id FK ""
		string cmp  ""
		int especialidad_id FK ""
		boolean activo  ""
	}

	ESPECIALIDAD {
		int id PK ""
		string nombre  ""
		string codigo_ups  ""
		boolean activo  ""
	}

	PERSONA||--o|MEDICO:"tiene"
	MEDICO}o--||ESPECIALIDAD:"pertenece a"

```

Descripción:
En este modelo se detallan los atributos clave de cada entidad, incluyendo claves primarias (PK) y foráneas (FK), permitiendo una visión técnica más precisa que sirve como base para el diseño físico de la base de datos.

c) Modelo Físico
Figura X. Modelo Entidad-Relación Físico

```mermaid
erDiagram
    personas {
        int id PK
        varchar nombre
        varchar apellido_paterno
        varchar apellido_materno
        varchar tipo_documento
        varchar numero_documento
        varchar telefono
        varchar email
        varchar direccion
        varchar ubigeo
    }

    medicos {
        int id PK
        int persona_id FK
        varchar cmp
        int especialidad_id FK
        boolean activo
    }

    especialidades {
        int id PK
        varchar nombre
        varchar codigo_ups
        boolean activo
    }

    personas ||--o| medicos : tiene
    medicos }o--|| especialidades : "pertenece a"



```

Descripción:
Representa la implementación de la base de datos con sus tablas, campos y relaciones, incluyendo los tipos de datos comúnmente usados. Refleja cómo será construida la estructura en un sistema de gestión de bases de datos relacional.

```

```

```

```
