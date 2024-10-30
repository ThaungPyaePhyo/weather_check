# 🌦️ WeatherApp

Welcome to **WeatherApp**, a Laravel application that fetches real-time weather data for any city you choose! Powered by the OpenWeatherMap API, this app lets you view the current temperature, weather description, and timestamp in a clean, user-friendly interface.

> **Note**: Docker support is provided as an optional feature, making it easier for users who prefer containerization for deployment and environment consistency.

---

## 🚀 Features 

- **Real-time Weather Data**: Get instant weather details for any city, including temperature in Celsius, weather description, and date/time of the data.
- **User-Friendly UI**: Simple and clear form-based UI for quick weather lookups.
- **Error Handling**: Graceful error messages for invalid city names or API request failures.

---

## 🛠️ Setup Instructions

### 1. Clone the Repository

```bash
git clone git@github.com:ThaungPyaePhyo/weather_check.git
cd WeatherApp
```
### 2. Install Dependencies
```bash
  composer install
```

### 3. Configure the Environment
1. **Copy the Example Environment File**  
   First, copy the `.env.example` file to create a new `.env` file:

   ```bash
   cp .env.example .env
    ```
2. **Add Your OpenWeatherMap API Key**  
   Open the .env file in a text editor and add your OpenWeatherMap API key.
    ```bash
      OPENWEATHER_API_KEY="weather_api_key"
    ```

3. **Configure Database Connection**  
   Update the database connection settings according to your server type:

   - **For Normal Server Start (using SQLite):** -
    ```bash
   DB_CONNECTION=sqlite
   ```
    - **For Docker Server Start (using MySQL):** -
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=weather_app
    DB_USERNAME=root
    DB_PASSWORD=password
   ```

### 4. Start the Server
Run the server locally with:
```bash
php artisan serve
```


### 5. Docker Command

Build the Docker images:
```bash
docker compose build
```

Start the Docker containers in detached mode:
```bash
docker compose up -d 
```

Start the Docker containers in detached mode:
```bash
docker compose up
```

Stop and remove the Docker containers:
```bash
docker compose down
```

To access the app container and open a bash shell within it, use the following command:
```bash
docker compose exec 'container name' bash
```

Docker Compose Help Command
```bash
docker compose --help
```
Once inside the app container, run the following commands:
Run the database migrations:
```bash
php artisan migrate
```
