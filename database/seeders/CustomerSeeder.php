<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::query()->delete();

        $customers = [

            [
                'name' => 'Ahmed Ben Salah',
                'phone' => '20111222',
                'email' => 'ahmed@test.tn',
                'governorate' => 'Tunis',
                'address' => '10 Rue Habib Bourguiba'
            ],

            [
                'name' => 'Sonia Trabelsi',
                'phone' => '22123456',
                'email' => 'sonia@test.tn',
                'governorate' => 'Sfax',
                'address' => '25 Avenue de la Liberté'
            ],

            [
                'name' => 'Mohamed Gharbi',
                'phone' => '55123456',
                'email' => 'mohamed@test.tn',
                'governorate' => 'Sousse',
                'address' => 'Rue 14 Janvier'
            ],

            [
                'name' => 'Amira Kallel',
                'phone' => '98111222',
                'email' => 'amira@test.tn',
                'governorate' => 'Nabeul',
                'address' => 'Rue des Orangers'
            ],

            [
                'name' => 'Youssef Ben Ali',
                'phone' => '94123456',
                'email' => 'youssef@test.tn',
                'governorate' => 'Monastir',
                'address' => 'Avenue Habib Thameur'
            ],

        ];

        foreach ($customers as $customer) {

            Customer::create($customer);

        }
    }
}
