<?php 
	
	Class UserLoginController extends BaseController
	{
		public function user()
		{
			//get POST data
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);

			if(Auth::attempt($userdata))
			{

				$user=Auth::user()->id;
				$role=Auth::user()->id_role;
				$branch=Auth::user()->id_branch;

				$sucursal = Branch::where('num_branch', '=', $branch)->get();

				foreach( $sucursal as $sucur){
					$sucu=$sucur->name_branch;
					$short_sucu=$sucur->short_name_branch;
					$id_suc=$sucur->num_branch;
					$role=$sucur->id_role;
				}

				Session::put('suc',$sucu);
				Session::put('id_suc',$id_suc);
				Session::put('short_sucu',$short_sucu);
				Session::put('rol',$role);
				Session::put('user',$user);				

				return Redirect::to('panel_admin');

			}
			else
			{
				//return "no pudieste entrar marco un error";
				return Redirect::to('/')->with('login_errors',true);
			}
		}




	}
 ?>