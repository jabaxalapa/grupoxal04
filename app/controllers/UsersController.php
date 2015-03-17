<?php 
	
	Class UsersController extends BaseController
	{

		public function __construct(){
			$this->beforeFilter('auth');
		}


		public function getIndex()
		{

			//return "Se generara usuarios";
			//$usuarios = User::all();

			$roles = Role::all();
			$sucursales = Branch::all();

			$role=Auth::user()->id_role;
			$usuarios=DB::table('users AS U')
				->leftJoin('roles AS R', 'R.id', '=', 'U.id_role')
				->leftJoin('branches AS B', 'B.num_branch', '=', 'U.id_branch')
				->select('U.email','U.id','U.last_name','U.username','U.phone','U.password','U.name','B.name_branch','R.name_role','U.id_role')
				->get();

			return View::make("usuarios/index")->with('usuarios',$usuarios)->with('roles',$roles)->with('sucursales',$sucursales);
		}



		public function getCreate(){
			$roles = Role::all();
			$sucursales = Branch::all();

			return View::make('usuarios.crear_usuario')->with('roles',$roles)->with('sucursales',$sucursales);
		}




		public function postGuarda(){

			$reg = new User;
			$reg->id_branch=Input::get('branch');
			$reg->id_role=Input::get('rol');
			$reg->username=Input::get('user_name');
			$reg->password=Hash::make(Input::get('password'));
			$reg->name=Input::get('name');
			$reg->last_name=Input::get('last_name');
			$reg->date=Input::get('date');
			$reg->phone=Input::get('phone');
			$reg->email=Input::get('email');;

			$reg->save();

			return Redirect::to('panel_admin#usuarios');


		}


		public function getElimina(){
			//return "sssss";
			$id=Input::get('id');
	 		$user = User::find($id);
	        
	       if (is_null ($user))
	        {
	            App::abort(404);
	        }
	        
	        $user->delete();

			return Redirect::to('panel_admin#usuarios');

		}





		function getFormedita(){
			$id=Input::get('id');

			$user = User::find($id);
			$roles = Role::all();
			$sucursales = Branch::all();

			return View::make("usuarios/edita")
				->with('roles',$roles)
				->with('sucursales',$sucursales)
				->with('id',$id)
				->with('usuario',$user);
		}



		function postEdita(){
			return "sss";
		}




	}
 ?>
