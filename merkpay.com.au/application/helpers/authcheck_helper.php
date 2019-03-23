<?php
function auth_check(){
	$CI= & get_instance();
	$CI->load->library("session");
	

	//if( !isset($CI->session->userdata('mechat_id')) ||  ($CI->session->userdata('mechat_id')==null)  ){
	if( !$CI->session->userdata('mechat_id') || $CI->session->userdata('mechat_id') <=0 ){
		redirect("login");
	}

}


function auth_admin_check(){
	$CI= & get_instance();
	$CI->load->library("session");


	//if( !isset($CI->session->userdata('mechat_id')) ||  ($CI->session->userdata('mechat_id')==null)  ){
	if( !$CI->session->userdata('is_admin') || $CI->session->userdata('is_admin') !=true ){
		redirect("login");
	}

}