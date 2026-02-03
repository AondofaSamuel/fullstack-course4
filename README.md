# School Management System (Nigeria)

A Laravel-based school management system tailored for Nigerian primary and secondary schools. It includes foundational data models, migrations, and example HTTP endpoints for managing schools, campuses, classes, students, staff, subjects, terms, and fees.

## Scope
- **Primary & Secondary schools** with support for multiple campuses.
- **Academic structure**: sessions/terms, classes, arms/streams, subjects.
- **People**: students, guardians, teachers, and non-teaching staff.
- **Operations**: enrollments, promotions, and fee payments.

## Quick start
1. Install Laravel (or drop this into an existing Laravel app).
2. Copy the `app/`, `routes/`, and `database/` folders into your project.
3. Run migrations and seeders.

```bash
php artisan migrate
php artisan db:seed --class=SchoolSeeder
```

## Notes
- Monetary values are stored in kobo to avoid floating point rounding.
- The schema supports multiple schools under one management group.
- Fee items can be configured per term and per level.
