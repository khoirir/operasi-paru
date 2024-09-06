<?php
class Login extends CI_Controller{

	function __construct(){
		Parent::__construct();
		$this->load->model("m_login");
	}

	public function index(){
		if($this->session->userdata("sess_ok_paru")){
			redirect('dashboard','refresh');
		}
		else if($this->session->userdata("akun_salah")){
			$sess_data = $this->session->userdata("akun_salah");
			$data["pesan_salah"] = $sess_data["teks"];
			$this->load->view('v_login',$data);
			$this->session->unset_userdata("akun_salah");
		}
		else{
			$this->load->view("v_login");
		}
	}
	public function cekLogin(){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$jml_data = $this->m_login->userLogin($username,$password)->num_rows();
		if($jml_data!=0){
			$data_user = $this->m_login->userLogin($username,$password)->row();
			$sess_data = array(
				"id" => $data_user->ID,
				"nama" => $data_user->NAMA
			);
			$this->session->set_userdata("sess_ok_paru",$sess_data);
			redirect('dashboard','refresh');
		}
		else{
			$sess_data = array(
				"teks" => "Username atau Password Salah"
			);
			$this->session->set_userdata("akun_salah",$sess_data);
			redirect("login","refresh");
		}
	}
	public function keluar(){
		if($this->session->has_userdata("sess_ok_paru")){
			$this->session->unset_userdata("sess_ok_paru");
			redirect("login","refresh");
		}
	}
}
?>