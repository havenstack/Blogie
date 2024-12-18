# Blogie

**Blogie** is a simple blogging platform built with Laravel. It provides users with the ability to create, edit, and manage blog posts easily.

## Features

- User authentication (registration, login, logout)
- Create, read, update, and delete (CRUD) operations for blog posts
- Responsive design for a seamless experience across devices
- RESTful architecture for future API integration

## Prerequisites

Before starting the project, ensure you have the following installed:

- Docker Desktop
- Composer
- Node.js & npm (optional for frontend assets)

## Getting Started

Follow these steps to set up Blogie locally:

### 1. Clone the Repository

```bash
git clone https://github.com/havenstack/Blogie.git
cd blogie
```

### 2. Install Dependencies

Install PHP dependencies using Composer:

```bash
composer install
```

Install Node.js dependencies (optional, for frontend assets):

```bash
npm install
```

### 3. Set Up Environment Variables

Copy the `.env.example` file to `.env` and update the necessary configuration:

```bash
cp .env.example .env
```

### 4. Start the Docker Containers

Use Laravel Sail to start the application:

```bash
./vendor/bin/sail up
```

This command will build and run the Docker containers for the application.

### 5. Run Migrations and Seed the Database

Once the containers are running, execute the following command to migrate the database and optionally seed it:

```bash
./vendor/bin/sail artisan migrate --seed
```

### 6. Compile Frontend Assets (Optional)

If you plan to work on the frontend, compile the assets:

```bash
npm run dev
```

### 7. Access the Application

The application will be available at [http://localhost](http://localhost).

### 8. Access the Application API

The application API will be available at [http://localhost/api/v1/](http://localhost/api/v1/).
For authentication you need Bearer token. You can generate one in your user's profile section [http://localhost/profile](http://localhost/profile).

------------------------------------------------------------------------------------------

#### Listing existing posts as JSON

<details>
 <summary><code>GET</code> <code><b>localhost/api/v1//posts</b></code> <code>(gets all users posts)</code></summary>

##### Parameters

> None

##### Responses

> | http code     | content-type              | response |
> |---------------|---------------------------|----------|
> | `200`         | `application/json`        | JSON     |


</details>

<details>
 <summary><code>GET</code> <code><b>localhost/api/v1//posts/{post_id}</b></code> <code>(gets post by its unique ID {post_id})</code></summary>

##### Parameters

> | name         |  type     | data type | description               |
> |--------------|-----------|-----------|---------------------------|
> | `post_id`    |  required | int       | The unique post id        |

##### Responses

> | http code     | content-type              | response                                                            |
> |---------------|---------------------------|---------------------------------------------------------------------|
> | `200`         | `application/json`        | JSON                                                         |

</details>

## Additional Commands

Here are some common commands you might use during development:

- **Stop the application:**
  ```bash
  ./vendor/bin/sail down
  ```


- **Clear caches:**
  ```bash
  ./vendor/bin/sail artisan cache:clear
  ./vendor/bin/sail artisan config:clear
  ```

---

Enjoy blogging with **Blogie**!
