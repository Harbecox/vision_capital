<?php

namespace Database\Seeders;

use App\Helper\Settings;
use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class AdminSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailTemplate::create([
            "name" => "after_register",
            'content' => '
                    <p>Dear [name],</p>
                    <p>Welcome to Vision Capital! We are delighted to have you on board as we process your application to open your Growth Fund account. Thank you for choosing us to help you achieve your financial goals.</p>
                    <p>Our team is currently processing your application, and we will keep you updated every step of the way. If you have any questions or need assistance, please do not hesitate to reach out to our customer service team at +1-877-528-3001. </p>
                    <p>Once again, welcome to the Vision Capital family! We are excited to embark on this financial journey with you.</p>
                    <p>Best regards,<br>Edward Baker<br>CEO Vision Capital Growth Fund</p>
            '
        ]);

        EmailTemplate::create([
            "name" => "after_approval",
            'content' => '
                    <p>Dear [name], </p>
                    <p>We are pleased to inform you that your account on our website has been successfully confirmed by our administrators.</p>
                    <p>You can now enjoy full access to all the features and benefits of our platform.</p>
                    <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                    <p>Thank you for choosing us! We look forward to providing you with a great experience.</p>
                    <p>Best regards,<br>
                    CEO Vision Capital Growth Fund</p>
            '
        ]);

        Settings::set("register_success_html","<script>console.log('script running')</script>");
        Settings::set("admin_email",'arm0182626@gmail.com');

    }
}
