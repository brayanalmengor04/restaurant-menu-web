# 🍴 Restaurant Management System

Welcome to the **Restaurant Management System**, a modern solution for optimizing restaurant operations. This project is designed to manage dishes, suppliers (web users), and provide a dynamic API management system. Here's a detailed breakdown of its features:


---
## 📸 Website Preview

Here are some images and videos showcasing the **Restaurant Management System** in action.

### Screenshots:
![Dashboard](github/media/screenshots/dashboard.png)
*The Dashboard of the Restaurant Management System.*

![API Documentation](github/media/screenshots/api-doc.png)
*The API Documentation Panel for managing endpoints.*

### Demo Video:
[Watch the demo video](github/media/videos/demo.mp4) showcasing the system's features, including dish management, user reviews, and API usage.

---
## 🖥️ Installation & Setup

Follow these steps to set up the project locally:

```bash
# Step 1: Clone the repository
git clone https://github.com/brayanalmengor04/restaurant-menu-web.git
cd restaurant-menu-web.

# Step 2: Install dependencies
composer install
npm install

# Step 3: Configure the environment
cp .env.example .env
# Update database credentials and API base URL in the .env file

# Step 4: Run database migrations
php artisan migrate

# Step 5: Start the local development server
php artisan serve

```
## 🎯 Features

### 1. **Dish & Supplier Management**
- Add and update dishes served in the restaurant.
- Manage suppliers who provide ingredients or other services.

### 2. **API Management**
- Built with **API Request**, allowing the administrator to manage API endpoints directly.
- Includes a visual documentation panel for viewing all available endpoints.

### 3. **Endpoint Overview**
- Below are the available API endpoints (ready for production deployment on Hostinger):
  ```php
  $endpoints = [
      'districts' => 'https://grupo1.escueladeprogramacion.net/api/districts',
      'district_by_id' => 'https://grupo1.escueladeprogramacion.net/api/districts/1',
      'provinces' => 'https://grupo1.escueladeprogramacion.net/api/provinces',
      'province_by_id' => 'https://grupo1.escueladeprogramacion.net/api/provinces/1',
      'corregimientos' => 'https://grupo1.escueladeprogramacion.net/api/corregimientos',
      'corregimiento_by_id' => 'https://grupo1.escueladeprogramacion.net/api/corregimientos/1',
  ];
   ``` 
## 🔗 API Documentation

The system includes an integrated API documentation panel, which can be accessed after setup:

1. **Access the API documentation**:  
   Visit `/api/documentation` in your browser to explore and interact with the available endpoints.

2. **Features of the API documentation**:
   - **Endpoint Explorer**: View and test all available API endpoints interactively.
   - **Access Control**: Secure your API with admin-managed access tokens, ensuring only authorized users can make certain requests.
   - **Real-time Updates**: The documentation automatically reflects any changes made to the API, ensuring it stays up-to-date with the latest modifications.

--- 


## 📊 Dynamic Top 10 Dishes

The **Top 10 Best Rated Dishes** feature dynamically updates based on user reviews and ratings. Here's how it works:

1. **User Ratings**: Users rate dishes through the platform after trying them.  
2. **Average Rating Calculation**: The system calculates the average rating for each dish based on all submitted reviews.
3. **Real-time Updates**: The top 10 highest-rated dishes are displayed in real-time on the dashboard, updating as new ratings are submitted.

This feature ensures that the most popular dishes always appear at the top, reflecting real-time user feedback.

## ✨ Future Features

We have exciting plans to further enhance the Restaurant Management System. Here are some of the upcoming features:

1. **Advanced Analytics**:  
   - Detailed reporting and dashboards to track dish ratings, supplier performance, and user activity.  
   - Insights will help restaurant owners and managers make data-driven decisions.

2. **Mobile Optimization**:  
   - A fully responsive design that ensures the platform is accessible and optimized for mobile and tablet users.  
   - Enjoy a seamless experience across all devices.

3. **Localization**:  
   - Support for multiple languages to make the platform accessible to users worldwide.  
   - This will allow for a more personalized experience and cater to a global audience.

## 📧 Contact

If you have any questions, feedback, or issues, don't hesitate to reach out to us:

- **Email**: [support@restaurant-management.com](mailto:support@restaurant-management.com)  
- **Website**: [Restaurant Management System](https://grupo1.escueladeprogramacion.net)  
- **GitHub Issues**: [Submit bugs or feature requests](https://github.com/your-username/restaurant-management-system/issues) directly through the repository.

