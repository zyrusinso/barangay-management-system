# Barangay Management System

The Barangay Management System is a web-based platform designed to enhance the daily operations of a barangay by managing data such as cases, residents, lupons, medical referrals, and more. The system is intended to streamline administrative processes, render efficient service to residents, and make record-keeping hassle-free.

## Features

1. **Dashboard**

   - Provides an overview of essential metrics such as:
    - Total documents
    - Recent documents added
    - Total escalated cases
    - Pending cases
    - Resolved cases
    - Medical referrals (both total and completed)
    - Lupon cases (total and pending)

2. **Cases Management**

   - **Add New Cases**: Record complaints, disputes, or legal cases submitted by residents.
   - **Monitor Case Status**: Track the progress of each case, including pending, escalated, and resolved.

3. **Residents Management**

   - **Add/Update Resident Profiles**: Manage resident details such as name, age, address, and civil status.
   - Store essential contact information for all barangay residents.

4. **Lupon Management**

   - Manage Lupons, which are local committees responsible for handling disputes.
   - Record Lupon sessions and maintain detailed case resolutions involving these committees.

5. **Schedules Management**

   - **Track Schedules**: Manage important barangay activities like community gatherings, Lupon hearings, or medical sessions.
   - Allows barangay officials to create schedules for meetings, inspections, and more.

6. **Medical Referrals**

   - Manage and track medical referrals for residents who are referred to medical institutions or for medical services.
   - Track the total number of referrals and completed referrals.

7. **Escalated Cases**

   - Track cases that have been escalated from minor disputes to formal legal issues requiring higher intervention.
   - Record the escalation reason and current status of each escalated case.

8. **Documents Management**

   - **Generate Certificates**: Process common barangay documents like barangay clearance, residency certificates, and permit requests.
   - Store scanned copies of important documents.
   - Keep track of document issuance history per resident.

9. **User Management**

   - Configurable roles for barangay officials:
     - **Admin**: Full access to all functionalities.
     - **Staff/Officer**: Limited access based on assigned permissions.
   - Users can be added, edited, or removed as per the barangay's current staffing needs.

10. **Filament Shield (Roles & Permissions)**

    - Manage and enforce role-based access control (RBAC).
    - Authorize specific roles to view or access certain features.

## Installation

### Requirements

- PHP ≥ 7.x
- Laravel (used as backend framework)
- MySQL as the database
- Composer for dependency management
- Node.js (for managing frontend assets)

### Steps

1. Clone the repository:   ```bash
   git clone https://github.com/yourusername/barangay-management-system.git   ```

2. Navigate into the project directory:   ```bash
   cd barangay-management-system   ```

3. Install backend dependencies:   ```bash
   composer install   ```

4. Install frontend dependencies:   ```bash
   npm install   ```

5. Set up environment variables by copying the existing template:   ```bash
   cp .env.example .env   ```

6. Configure your database credentials and other settings within the `.env` file.

7. Generate an application key:   ```bash
   php artisan key:generate   ```

8. Run database migrations to set up the tables:   ```bash
   php artisan migrate   ```

9. Serve the application:   ```bash
   php artisan serve   ```

## Screenshots

Barangay Management - Dashboard

## Technologies Used

- **Backend**: Laravel
- **Frontend**: TailwindCSS & Vue.js
- **Database**: MySQL
- **Version Control**: Git, GitHub
- **Role Management**: Filament Shield (for roles and permissions)

## Contribution

If you wish to contribute:

1. Fork this repository.
2. Create your own feature branch:   ```bash
   git checkout -b feature-name   ```
3. Commit your changes:   ```bash
   git commit -m 'Add some feature'   ```
4. Push to the branch:   ```bash
   git push origin feature-name   ```
5. Open a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

## Contact

Created by [Your Name] - feel free to reach out if you have any suggestions or contributions!