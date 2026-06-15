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

    actor Administrador

    participant LoginView@{ "type": "boundary" }
    participant AuthController@{ "type": "control" }
    participant User@{ "type": "entity" }

    Administrador ->> LoginView: Acceder al formulario de inicio de sesión
    LoginView -->> Administrador: Mostrar formulario

    Administrador ->> LoginView: Ingresar credenciales y enviar
    LoginView ->> AuthController: Enviar usuario y contraseña

    AuthController ->> User: Validar credenciales
    User -->> AuthController: Retornar resultado de validación

    AuthController -->> LoginView: Resultado de autenticación
    LoginView -->> Administrador: Mostrar panel principal o mensaje de error

```

Figura X+1. Diagrama de secuencia – Gestionar especialidades

```mermaid
sequenceDiagram
    autonumber

    actor Administrador

    participant EspecialidadView@{ "type": "boundary" }
    participant EspecialidadController@{ "type": "control" }
    participant Especialidad@{ "type": "entity" }

    Administrador ->> EspecialidadView: Acceder al módulo de especialidades
    EspecialidadView ->> EspecialidadController: Solicitar listado de especialidades

    EspecialidadController ->> Especialidad: Obtener especialidades registradas
    Especialidad -->> EspecialidadController: Retornar listado

    EspecialidadController -->> EspecialidadView: Mostrar listado de especialidades
    EspecialidadView -->> Administrador: Visualizar especialidades registradas

    Administrador ->> EspecialidadView: Registrar o editar especialidad
    EspecialidadView ->> EspecialidadController: Enviar datos del formulario

    EspecialidadController ->> Especialidad: Registrar o actualizar especialidad
    Especialidad -->> EspecialidadController: Confirmar operación

    EspecialidadController -->> EspecialidadView: Retornar resultado
    EspecialidadView -->> Administrador: Actualizar listado de especialidades

```

Figura X+2. Diagrama de secuencia – Gestionar personas

```mermaid
sequenceDiagram
    autonumber

    actor Administrador

    participant PersonaView@{ "type": "boundary" }
    participant PersonaController@{ "type": "control" }
    participant Persona@{ "type": "entity" }

    Administrador ->> PersonaView: Acceder al módulo de personas
    PersonaView ->> PersonaController: Solicitar listado de personas

    PersonaController ->> Persona: Obtener personas registradas
    Persona -->> PersonaController: Retornar listado

    PersonaController -->> PersonaView: Mostrar listado de personas
    PersonaView -->> Administrador: Visualizar personas registradas

    Administrador ->> PersonaView: Registrar o editar persona
    PersonaView ->> PersonaController: Enviar datos del formulario

    PersonaController ->> Persona: Registrar o actualizar persona
    Persona -->> PersonaController: Confirmar operación

    PersonaController -->> PersonaView: Retornar resultado
    PersonaView -->> Administrador: Actualizar listado de personas

```

Figura X+3. Diagrama de secuencia – Gestionar médicos

```mermaid
sequenceDiagram
    autonumber

    actor Administrador

    participant MedicoView@{ "type": "boundary" }
    participant MedicoController@{ "type": "control" }
    participant Medico@{ "type": "entity" }

    Administrador ->> MedicoView: Ingresar al módulo de médicos
    MedicoView ->> MedicoController: Solicitar información de médicos

    MedicoController ->> Medico: Consultar médicos registrados
    Medico -->> MedicoController: Devolver información solicitada

    MedicoController -->> MedicoView: Presentar listado de médicos
    MedicoView -->> Administrador: Visualizar información de médicos

    Administrador ->> MedicoView: Registrar o modificar médico
    MedicoView ->> MedicoController: Remitir datos del formulario

    MedicoController ->> Medico: Procesar registro o actualización
    Medico -->> MedicoController: Confirmar operación

    MedicoController -->> MedicoView: Retornar resultado de la operación
    MedicoView -->> Administrador: Actualizar listado de médicos

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
