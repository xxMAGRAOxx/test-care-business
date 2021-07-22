<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function trigger_user_activity($what) {
    $ci =& get_instance();

    $data = array(
        'activity_id' => (int) $ci->activities[$what],
        'user_name' => $ci->session->userdata('username'),
        'activity_alias' => $what,
        'activity_content' => ($ci->session->userdata('activity_content')) ? $ci->session->userdata('activity_content') : null
    );

    $ci->db->insert('user_activity', $data);
}

function format_cnpj_cpf($value) {
  $CPF_LENGTH = 11;
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === $CPF_LENGTH) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}