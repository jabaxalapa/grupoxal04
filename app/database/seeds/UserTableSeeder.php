<?php
	Class UserTableSeeder extends Seeder{

		public function run(){

			DB::table('users')->delete();

			User::create(array(
					'username'=> 'Admin',
					'password' => Hash::make('Xalapa#1'),
					'name' => 'Administrador',
					'last_name' => 'Administrador',
					'date' => '2014-09-12',
					'phone' => 2281438696,
					'email' => 'hugo@xalapa.com',
					'branch_office' => 1
				));
		}
	}