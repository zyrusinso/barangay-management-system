<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Str;

class ShieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions for all resources
        $this->createResourcePermissions();
        
        // Create permissions for pages
        $this->createPagePermissions();
        
        // Create permissions for widgets
        $this->createWidgetPermissions();
        
        // Create custom permissions
        $this->createCustomPermissions();
        
        // Create roles and assign permissions
        $this->createRolesWithPermissions();
        
        // Assign super admin role to admin user
        $this->assignSuperAdminRole();
    }

    private function createResourcePermissions(): void
    {
        // Define all resources based on your migrations
        $resources = [
            'User',
            'DocumentType',
            'DocumentRequest',
            'SupportingDocument',
            'Event',
            'EventRegistration',
            'Announcement',
            'HealthcareService',
            'HealthcareAppointment',
            'MedicalAssistanceRequest',
            'MedicalDocument',
            'EmergencyReport',
            'EmergencyReportImage',
            'Payment',
            'Feedback',
            'Notification',
            'Medicine',
            'MedicineDistribution',
            'EvacuationCenter',
            'ReliefOperation',
            'ReliefGood',
            'ReliefDistribution',
            'Budget',
            'Expenditure',
        ];
        
        // Define standard CRUD operations
        $crudOperations = ['viewAny', 'view', 'create', 'update', 'delete', 'deleteAny', 'forceDelete', 'forceDeleteAny', 'restore', 'restoreAny'];
        
        foreach ($resources as $resource) {
            foreach ($crudOperations as $operation) {
                Permission::create([
                    'name' => $operation . ' ' . Str::kebab($resource),
                    'guard_name' => 'web',
                ]);
            }
        }
    }

    private function createPagePermissions(): void
    {
        // Define all custom pages
        $pages = [
            'Dashboard',
            'Settings',
            'Reports',
            'Analytics',
        ];
        
        foreach ($pages as $page) {
            Permission::create([
                'name' => 'page_' . Str::kebab($page),
                'guard_name' => 'web',
            ]);
        }
    }

    private function createWidgetPermissions(): void
    {
        // Define all widgets
        $widgets = [
            'StatsOverview',
            'DocumentRequestsChart',
            'EventsCalendar',
            'EmergencyAlertsWidget',
            'RecentActivitiesWidget',
        ];
        
        foreach ($widgets as $widget) {
            Permission::create([
                'name' => 'widget_' . Str::kebab($widget),
                'guard_name' => 'web',
            ]);
        }
    }

    private function createCustomPermissions(): void
    {
        // Define custom permissions
        $customPermissions = [
            'approve_document_requests',
            'reject_document_requests',
            'manage_emergency_reports',
            'approve_medical_assistance',
            'manage_relief_operations',
            'manage_budgets',
            'view_financial_reports',
            'manage_users',
            'approve_user_accounts',
        ];
        
        foreach ($customPermissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }

    private function createRolesWithPermissions(): void
    {
        // Create Super Admin role
        $superAdminRole = Role::create([
            'name' => 'super_admin',
            'guard_name' => 'web',
        ]);
        
        // Super admin gets all permissions
        $superAdminRole->givePermissionTo(Permission::all());
        
        // Create Chairman role
        $chairmanRole = Role::create([
            'name' => 'chairman',
            'guard_name' => 'web',
        ]);
        
        // Chairman gets most permissions except some admin-specific ones
        $chairmanPermissions = Permission::whereNotIn('name', [
            'forceDelete user', 'forceDeleteAny user',
            'manage_users', // Only super admin can manage users
        ])->get();
        
        $chairmanRole->givePermissionTo($chairmanPermissions);
        
        // Create Secretary role
        $secretaryRole = Role::create([
            'name' => 'secretary',
            'guard_name' => 'web',
        ]);
        
        // Secretary permissions
        $secretaryPermissions = [
            // Document management
            'viewAny document-type', 'view document-type',
            'viewAny document-request', 'view document-request', 'update document-request',
            'approve_document_requests', 'reject_document_requests',
            
            // Event management
            'viewAny event', 'view event', 'create event', 'update event',
            'viewAny event-registration', 'view event-registration',
            
            // Announcements
            'viewAny announcement', 'view announcement', 'create announcement', 'update announcement',
            
            // Basic permissions
            'page_dashboard', 'page_reports',
            'widget_stats-overview', 'widget_document-requests-chart', 'widget_events-calendar', 'widget_recent-activities-widget',
        ];
        
        $secretaryRole->givePermissionTo($secretaryPermissions);
        
        // Create Treasurer role
        $treasurerRole = Role::create([
            'name' => 'treasurer',
            'guard_name' => 'web',
        ]);
        
        // Treasurer permissions
        $treasurerPermissions = [
            // Financial management
            'viewAny payment', 'view payment', 'update payment',
            'viewAny budget', 'view budget', 'create budget', 'update budget',
            'viewAny expenditure', 'view expenditure', 'create expenditure', 'update expenditure',
            'view_financial_reports',
            
            // Basic permissions
            'page_dashboard', 'page_reports',
            'widget_stats-overview',
        ];
        
        $treasurerRole->givePermissionTo($treasurerPermissions);
        
        // Create Resident role
        $residentRole = Role::create([
            'name' => 'resident',
            'guard_name' => 'web',
        ]);
        
        // Residents have very limited permissions in the admin panel
        $residentPermissions = [
            'view user', // Can view their own profile
            'update user', // Can update their own profile
        ];
        
        $residentRole->givePermissionTo($residentPermissions);
    }

    private function assignSuperAdminRole(): void
    {
        // Find admin user and assign super_admin role
        $adminUser = User::where('email', 'admin@example.com')->first();
        
        if ($adminUser) {
            $adminUser->assignRole('super_admin');
        }
    }
}