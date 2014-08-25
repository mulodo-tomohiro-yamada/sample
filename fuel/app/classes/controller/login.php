<?php
class Controller_Login extends Controller{

	public function action_index(){
		//Modelを読み込み
		$test = new Model_Loginm();

		//入力したデータを受け取る
		$name = Input::post('name');
		$pass = md5(Input::post('password'));

		//データベースから値を受け取る
		 //$db = Model_User::find_by_pk(1);
		$db = Model_User::find_one_by('username',$name);

		//入力された値をListに入れる
		$input_user=$test -> getList($name,$pass);
		$db_user=$test -> getList($db['Username'],$db['Password']);

		//入力された値とDBを照合iで返す
		$i=$test -> invoke($input_user,$db_user);
		//結果表示
		return Response::forge(View::forge($i));

	}
}
?>